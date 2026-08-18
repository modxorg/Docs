---
title: "modX.getService"
translation: "extending-modx/modx-class/reference/modx.getservice"
description: "getService() загружает именованный сервис. В 3.x метод устарел в пользу DI-контейнера."
---

## modX::getService

**Устарел в MODX 3.x.** xPDO помечает `getService()` как deprecated и отправляет к контейнеру сервисов (`$modx->services`). PhpStorm из-за phpdoc предупреждает об удалении в 3.1. Удаления **не было**. Метод есть в текущих 3.x, ядро само его ещё вызывает. В новом коде берите `$modx->services`. См. [Контейнер внедрения зависимостей](extending-modx/di-container).

`getService` живёт в xPDO (modX его наследует). Загружает и возвращает экземпляр сервиса или `null`, если класс не поднялся. Экземпляр создаётся один раз. Повторные вызовы отдают тот же объект. В 3.x он ещё кладётся в `$modx->services`.

## Синтаксис

``` php
object getService (string $name, [string $class = ''], [string $path = ''], [array $params = array ()])
```

- `$name` _(string)_ ключ сервиса.
- `$class` _(string)_ имя класса для `new` или точечная нотация для подпапок относительно `$path`.
- `$path` _(string)_ каталог с файлом класса.
- `$params` _(array)_ второй аргумент конструктора. Первый всегда экземпляр xPDO/MODX.

Определение: [`xPDO::getService()`](https://github.com/modxcms/xpdo/blob/3.x/src/xPDO/xPDO.php).

## Примеры (по-прежнему работают)

Сервис Smarty:

``` php
$modx->getService('smarty','smarty.modSmarty');
```

Свой сервис с путём и параметрами конструктора:

``` php
$modx->getService('twitter','modTwitter','/path/to/',array(
  'api_key' => 3212423,
));
$modx->twitter->tweet('Успех!');
```

В Extra:

``` php
// Путь сразу в каталог класса:
if(!$Product = $this->modx->getService('mypkg.product','Product',MODX_CORE_PATH.'components/mypkg/model/mypkg/')) {
    return 'НЕ НАЙДЕН';
}
// Или точечная нотация и $path на каталог модели:
if(!$Product = $this->modx->getService('mypkg.product','mypkg.Product',MODX_CORE_PATH.'components/mypkg/model/')) {
    return 'НЕ НАЙДЕН';
}
```

У `getService` бывают проблемы с PHP-пространствами имён. Передайте FQCN или зарегистрируйте объект в контейнере сами.

## Замена в MODX 3

Используйте `$modx->services` (`has` / `add` / `get`). Ядро так делает в `modX::runProcessor()` для lexicon и error.

Регистрация сервиса ядра (пример: `modError`):

``` php
use MODX\Revolution\Error\modError;

if (!$modx->services->has('error')) {
    $modx->services->add('error', new modError($modx));
}
$modx->error = $modx->services->get('error');
```

Свой Extra: создайте класс (Composer / autoload namespace) и добавьте его. Обычно это [`bootstrap.php` пространства имён](extending-modx/namespaces):

``` php
$modx->services->add('twitter', function($c) use ($modx) {
    return new MyPackage\Twitter($modx, ['api_key' => 3212423]);
});
```

Дальше:

``` php
$twitter = $modx->services->get('twitter');
$twitter->tweet('Успех!');
```

`modError` (`$modx->error`) и `modErrorHandler` (`$modx->errorHandler`) это разные сервисы. Ключи не путайте.

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [MODX Services](extending-modx/services)
- [Контейнер внедрения зависимостей](extending-modx/di-container)
- [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass) загружает класс без создания экземпляра
