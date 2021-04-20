---
title: "modX.getService"
translation: "extending-modx/modx-class/reference/modx.getservice"
description: "getService() загружает и возвращает экземпляр именованного класса обслуживания"
---

## modX::getService

**Примечание**: getService перемещен на уровень xPDO 

Загружает и возвращает экземпляр именованного класса обслуживания. Возвращает ссылку на экземпляр класса обслуживания или значение null, если он не может быть загружен. Вы можете подумать, что это простая инъекция зависимости.

Обратите внимание, что экземпляр класса создается только один раз: последующие вызовы возвращают ссылку на сохраненный экземпляр.

## Синтаксис

API Doc: [modX::getService()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getService())

``` php
object getService (string $name, [string $class = ''], [string $path = ''], [array $params = array ()])
```

- `$name` _(string)_ ключ, который однозначно идентифицирует службу.
- `$class` _(string)_ полное имя класса, совместимого с оператором "new", ИЛИ вы можете использовать "точечную нотацию" для указания вложенных папок относительно `$path`.
- `$path` _(string)_ полный путь к каталогу, содержащему рассматриваемый класс.
- `$params` _(array)_ передается в качестве второго аргумента в конструктор. Первый аргумент всегда является ссылкой на xPDO/MODX.

## Примеры

Получение сервиса `modSmarty`.

``` php
$modx->getService('smarty','smarty.modSmarty');
```

Получить пользовательский, определенный пользователем сервис под названием 'modTwitter' из пользовательского пути ('/path/to/modtwitter.class.php'), и передать некоторые пользовательские параметры.

``` php
$modx->getService('twitter','modTwitter','/path/to/',array(
  'api_key' => 3212423,
));
$modx->twitter->tweet('Успех!');
```

Еще один пример использования getService внутри пользовательского Extra:

``` php
// Используйте путь, чтобы указать непосредственно на соответствующий вложенный каталог:
if(!$Product = $this->modx->getService('mypkg.product','Product',MODX_CORE_PATH.'components/mypkg/model/mypkg/')) {
    return 'НЕ НАЙДЕН';
}
// Или используйте точечную нотацию в имени класса и укажите $path на каталог модели:
if(!$Product = $this->modx->getService('mypkg.product','mypkg.Product',MODX_CORE_PATH.'components/mypkg/model/')) {
    return 'НЕ НАЙДЕН';
}
```

У `getService` могут возникнуть проблемы с пространствами имен PHP.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [MODX Services](extending-modx/services "MODX Services")
- [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass "xPDO.loadClass") – similar to getService, but it just loads the class and doesn't instantiate it.
