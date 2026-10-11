---
title: "modResource.getProperty"
translation: "extending-modx/core-model/modresource/modresource.getproperty"
description: "Прочитать одно свойство ресурса в пространстве имён"
---

## modResource.getProperty

Читает одно значение из поля `properties` ресурса с пространством имён. Возвращает `$default`, если нет либо пространства имён, либо ключа. Отсутствующее свойство и свойство, явно установленное в `null`, различить нельзя.

Значение живёт на объекте до `save()`; записывайте его через `setProperty()`.

## Синтаксис

``` php
mixed getProperty ($key [, string $namespace = 'core' [, mixed $default = null]])
```

- `$key` _(string)_ имя свойства
- `$namespace` _(string)_ пространство имён, которому принадлежит свойство, по умолчанию `'core'`
- `$default` _(mixed)_ возвращаемое значение, если свойство не задано, по умолчанию `null`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$color = $resource->getProperty('color', 'mycomponent', 'foobar');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProperty](extending-modx/core-model/modresource/modresource.setproperty)
- [modResource.getProperties](extending-modx/core-model/modresource/modresource.getproperties)
