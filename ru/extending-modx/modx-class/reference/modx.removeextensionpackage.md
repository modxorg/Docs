---
title: "modX.removeExtensionPackage"
translation: "extending-modx/modx-class/reference/modx.removeextensionpackage"
description: "Удалить запись пакета расширения из настройки extension_packages"
---

## modX::removeExtensionPackage

Читает системную настройку `extension_packages`, удаляет запись, у которой ключ пакета равен `$name`, и записывает настройку обратно. В текущем запросе ничего не меняется: пакет перестанет загружаться при следующей инициализации.

Возвращает false, если настройки нет или ни одна запись не совпала с `$name`, иначе возвращает результат сохранения.

## Синтаксис

``` php
boolean removeExtensionPackage (string $name)
```

- `$name` _(string)_ имя пакета в том виде, в котором оно хранится в настройке

## Пример

``` php
$removed = $modx->removeExtensionPackage('mypkg');
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.addExtensionPackage](extending-modx/modx-class/reference/modx.addextensionpackage)
- [extension_packages](building-sites/settings/extension_packages)
