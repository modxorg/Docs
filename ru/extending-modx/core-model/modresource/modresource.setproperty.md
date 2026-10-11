---
title: "modResource.setProperty"
translation: "extending-modx/core-model/modresource/modresource.setproperty"
description: "Записать одно свойство ресурса в пространстве имён"
---

## modResource.setProperty

Записывает одно значение в поле `properties` с пространством имён, создавая пространство имён, если его ещё нет. Значение хранится на объекте до `save()`.

Возвращает результат присваивания поля: `true` только если сохранённое значение изменилось, поэтому запись идентичного значения даёт `false`.

## Синтаксис

``` php
boolean setProperty ($key, $value [, string $namespace = 'core'])
```

- `$key` _(string)_ имя свойства
- `$value` _(mixed)_ сохраняемое значение
- `$namespace` _(string)_ пространство имён для сохранения свойства, по умолчанию `'core'`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperty('color', 'foobar', 'mycomponent');
$resource->save();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProperty](extending-modx/core-model/modresource/modresource.getproperty)
- [modResource.setProperties](extending-modx/core-model/modresource/modresource.setproperties)
