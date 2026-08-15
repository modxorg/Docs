---
title: "Процессоры"
translation: "extending-modx/processors"
description: "Процессоры: PHP-классы, которые выполняют одно действие: создать ресурс, отдать список, авторизовать пользователя"
---

## Что такое процессор

Процессор: PHP-класс, который выполняет **одно** действие в MODX: создать чанк, отдать список ресурсов, авторизовать пользователя, загрузить файл. Интерфейс менеджера, коннекторы, сниппеты и плагины ходят к одним и тем же действиям через процессоры.

С MODX 2.2 процессоры классовые (наследники базового класса процессора). Плоские `.php`-файлы без класса в MODX 3.0 больше не поддерживаются.

Где лежат процессоры ядра:

- **3.x:** [`core/src/Revolution/Processors/`](https://github.com/modxcms/revolution/tree/3.x/core/src/Revolution/Processors)
- **2.x:** `core/model/modx/processors/` (старая раскладка)

Из PHP их вызывают через [`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor). AJAX менеджера идёт через [коннектор](extending-modx/processors/connectors) и в итоге попадает в тот же метод.

```php
$response = $modx->runProcessor(
    'resource/create',
    $properties,
    $options // опционально; для процессоров ядра часто не нужен
);
```

`$response`: [`ProcessorResponse`](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/Processors/ProcessorResponse.php) (3.x) / `modProcessorResponse` (2.x). Сначала проверьте ошибку, потом читайте данные:

```php
if ($response->isError()) {
    return $response->getMessage();
}
$object = $response->getObject(); // массив полей из ответа процессора
```

Полезные методы: `isError()`, `getMessage()`, `getObject()`, `getResponse()`, `hasFieldErrors()`, `getFieldErrors()`.

## Берите процессоры ядра

Если нужное действие уже есть в MODX, вызывайте его процессор вместо сырого `newObject()` / `save()`. Так вы получаете права, валидацию, генерацию `alias` и события плагинов (`OnDocFormSave` и другие). Дополнения, которые слушают эти события, продолжают работать с вашим кодом.

### Вход и выход

```php
$data = [
    'username' => $username,
    'password' => $password,
    'rememberme' => 1,
    'login_context' => 'web',
];
$response = $modx->runProcessor('security/login', $data);
if ($response->isError()) {
    $modx->log(
        modX::LOG_LEVEL_ERROR,
        'Ошибка входа для ' . $username . ': ' . $response->getMessage()
    );
}
```

```php
$response = $modx->runProcessor('security/logout');
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, $response->getMessage());
}
```

В 3.x можно передать и namespaced-класс, например `\MODX\Revolution\Processors\Security\Login`. Пути со слэшем вроде `security/login` по-прежнему резолвятся. См. [логику загрузки процессора](extending-modx/modx-class/reference/modx.runprocessor#processor-loading-logic).

### Создание ресурса

```php
$response = $modx->runProcessor('resource/create', [
    'pagetitle' => 'Моя страница',
    'content' => '<p>Привет</p>',
    'parent' => 0,
    'template' => 1,
    'context_key' => 'web',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$id = $response->getObject()['id'];
```

Ненужные поля можно не передавать. Процессор подставит значения по умолчанию из системных настроек. Для своего типа ресурса укажите `class_key`.

## Свои процессоры

Дополнения держат процессоры в своём дереве, обычно `core/components/myextra/processors/`. Укажите этот каталог в `processors_path`:

```php
$response = $modx->runProcessor(
    'web/orders/getlist',
    ['id' => 55],
    [
        'processors_path' => $modx->getOption('core_path')
            . 'components/myextra/processors/',
    ]
);
if ($response->isError()) {
    return $response->getMessage();
}
return $modx->toJSON($response->getResponse());
```

В `action` нет расширения файла. MODX ищет `{processors_path}web/orders/getlist.class.php` и ждёт класс процессора. Коннектор делает то же самое: задаёт `processors_path` и маршрутизирует `action` в файл.

### Вызов процессора ядра из своего

Внутри своего create-процессора можно сначала вызвать ядерный, затем дописать свои данные:

```php
$response = $modx->runProcessor('resource/create', $resourceData);
if ($response->isError()) {
    return $this->failure($response->getMessage());
}
$id = $response->getObject()['id'];
// дальше привяжите свои записи к $id …
```

Плагины на сохранение ресурса сработают. `alias` и остальное поведение ядра совпадут с менеджером.

## Классовый процессор

Минимальный create-процессор для своего xPDO-объекта (имена классов 3.x):

```php
<?php
namespace MyExtra\Processors\Item;

use MODX\Revolution\Processors\Model\CreateProcessor;

class Create extends CreateProcessor
{
    public $classKey = 'MyExtra\\Model\\Item';
    public $objectType = 'myextra.item';
    public $primaryKeyField = 'id';

    public function beforeSet()
    {
        $name = trim((string)$this->getProperty('name'));
        if ($name === '') {
            $this->addFieldError('name', $this->modx->lexicon('myextra.item_err_name'));
        }
        return parent::beforeSet();
    }
}

return Create::class;
```

Частые model-хелперы (полный список: в [заметках по апгрейду 3.0](getting-started/upgrading-to-3.0/processors)):

| Задача | Класс 3.x |
| ------ | --------- |
| Create | `\MODX\Revolution\Processors\Model\CreateProcessor` |
| Update | `\MODX\Revolution\Processors\Model\UpdateProcessor` |
| Get | `\MODX\Revolution\Processors\Model\GetProcessor` |
| Get list | `\MODX\Revolution\Processors\Model\GetListProcessor` |
| Remove | `\MODX\Revolution\Processors\Model\RemoveProcessor` |

В 2.x те же роли: `modObjectCreateProcessor`, `modObjectGetListProcessor` и т.д. Чаще всего переопределяют `initialize`, `beforeSet`, `beforeSave`, `afterSave`, для списков: `prepareQueryBeforeCount`.

## Дальше

- [Использование runProcessor](extending-modx/processors/using-runprocessor): примеры из сниппетов
- [modX.runProcessor](extending-modx/modx-class/reference/modx.runprocessor): параметры и правила загрузки в 3.x
- [Коннекторы](extending-modx/processors/connectors): AJAX-вход для CMP
- [Процессоры в гайде по апгрейду на 3.0](getting-started/upgrading-to-3.0/processors)
- [Developing an Extra, Part II](extending-modx/tutorials/developing-an-extra/part-2): коннектор и getlist
- [Class-based processors](https://www.markhamstra.com/xpdo/2012/getting-started-with-class-based-processors-2.2/) и [modObjectGetListProcessor](https://www.markhamstra.com/xpdo/2012/modobjectgetlistprocessor-class-based-processor/) (Mark Hamstra)
- [Список процессоров](https://bobsguides.com/modx-processor-list.html) (Bob's Guides, пути в основном 2.x)

Материал опирается в том числе на статью [«Процессоры в MODX»](https://modx.pro/development/3156) на modx.pro, с правками под актуальные пути и классы 3.x.
