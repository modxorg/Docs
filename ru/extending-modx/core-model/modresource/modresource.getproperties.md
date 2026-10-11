---
title: "modResource.getProperties"
translation: "extending-modx/core-model/modresource/modresource.getproperties"
description: "Прочитать все свойства пространства имён ресурса"
---

## modResource.getProperties

Возвращает весь массив свойств, хранящийся под `$namespace`, либо пустой массив, если записей для этого пространства имён нет. В поле `properties` лежит по одному массиву на пространство имён; передавайте нужное пространство имён, а не плоский список ключей.

## Синтаксис

``` php
array getProperties ([string $namespace = 'core'])
```

- `$namespace` _(string)_ пространство имён для чтения, по умолчанию `'core'`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperties(array('color' => 'foobar'), 'mycomponent');
$props = $resource->getProperties('mycomponent');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProperties](extending-modx/core-model/modresource/modresource.setproperties)
- [modResource.getProperty](extending-modx/core-model/modresource/modresource.getproperty)
