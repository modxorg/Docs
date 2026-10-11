---
title: "modResource.getTVValue"
translation: "extending-modx/core-model/modresource/modresource.gettvvalue"
description: "Прочитать отображённое значение Template Variable"
---

## modResource.getTVValue

Возвращает вывод одной Template Variable для этого ресурса. Имена проходят через парсер, числовые ID идут сразу в модель.

Значение создаётся `renderOutput()`, поэтому применяются биндинги, модификаторы вывода и отрисовка ТВ. Возвращает `null`, если ни одна ТВ не подошла под аргумент.

## Синтаксис

``` php
mixed getTVValue ($pk)
```

- `$pk` _(mixed)_ ID ТВ, если значение числовое, иначе имя ТВ

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$byName = $resource->getTVValue('subtitle');
$byId = $resource->getTVValue(12);
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.setTVValue](extending-modx/core-model/modresource/modresource.settvvalue)
- [modResource.getTemplateVars](extending-modx/core-model/modresource/modresource.gettemplatevars)
