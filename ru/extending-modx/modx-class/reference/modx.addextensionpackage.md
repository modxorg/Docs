---
title: "modX.addExtensionPackage"
translation: "extending-modx/modx-class/reference/modx.addextensionpackage"
description: "Записать пакет расширения в системную настройку extension_packages"
---

## modX::addExtensionPackage

Записывает запись о пакете в системную настройку [extension_packages](building-sites/settings/extension_packages), создавая её заранее, если настройки ещё нет. Сохранённое значение — JSON-массив: каждая запись связывает имя пакета с его опциями, а путь хранится в ключе `path`.

Пакет загружается при следующей инициализации, а не в текущем запросе: сначала нужно обновить кэш настроек. Далее `initialize()` читает настройку, подставляет токены вроде `[[++core_path]]` и вызывает `xPDO::addPackage()`.

Классы пакета становятся доступны `loadClass()`, `newObject()` и `getTableName()`. `serviceName` и `serviceClass` уходят в `xPDO::getService()`, который сам помечен устаревшим в пользу контейнера сервисов.

Ядро пометило хранение в настройке устаревшим в 2.3 — его заменяют записи `modExtensionPackage`. Код по-прежнему объявляет удаление, которое так и не случилось, поэтому настройка в этой версии продолжает работать.

## Синтаксис

``` php
boolean addExtensionPackage (string $name, string $path, [array $options = array()])
```

- `$name` _(string)_ имя пакета, используется как ключ записи
- `$path` _(string)_ каталог с моделью пакета
- `$options` _(array)_ значения `tablePrefix`, `serviceName` и `serviceClass`, по умолчанию `array()`

## Пример

``` php
$modx->addExtensionPackage('mypkg', MODX_CORE_PATH . 'components/mypkg/model/', array(
    'tablePrefix' => 'mypkg_',
));
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.removeExtensionPackage](extending-modx/modx-class/reference/modx.removeextensionpackage)
- [extension_packages](building-sites/settings/extension_packages)
