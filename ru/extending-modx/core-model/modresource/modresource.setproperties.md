---
title: "modResource.setProperties"
translation: "extending-modx/core-model/modresource/modresource.setproperties"
description: "Записать все свойства пространства имён ресурса"
---

## modResource.setProperties

Записывает пространство имён свойств целиком за один вызов. При заданном `$merge` значения `$newProperties` накладываются поверх уже существующих. Пропущенные ключи сохраняют прежние значения; при `$merge` в `false` пространство имён заменяется целиком. Другие пространства имён не затрагиваются никогда.

Возвращает результат присваивания поля; в базу данных ничего не попадает до `save()`.

## Синтаксис

``` php
boolean setProperties (array $newProperties [, string $namespace = 'core' [, boolean $merge = true]])
```

- `$newProperties` _(array)_ записываемые свойства
- `$namespace` _(string)_ пространство имён для записи, по умолчанию `'core'`
- `$merge` _(boolean)_ объединять с существующим пространством имён вместо замены, по умолчанию `true`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperties(array('color' => 'foobar', 'size' => '10'), 'mycomponent');
$resource->setProperties(array('color' => 'bar'), 'mycomponent', false);
$resource->save();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProperties](extending-modx/core-model/modresource/modresource.getproperties)
- [modResource.setProperty](extending-modx/core-model/modresource/modresource.setproperty)
