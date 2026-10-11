---
title: "modResource.setTVValue"
translation: "extending-modx/core-model/modresource/modresource.settvvalue"
description: "Записать значение Template Variable для ресурса"
---

## modResource.setTVValue

Сохраняет значение одной Template Variable этого ресурса. Загружается `modTemplateVar`, вызывается `setValue()` с ID этого ресурса, и ТВ сохраняется сразу. Отдельный `save()` для ресурса не нужен.

Значение, равное значению ТВ по умолчанию, сохранять не нужно: в этом случае `setValue()` пропускает создание новой записи. Возвращает `false`, если ни одна ТВ не подошла под аргумент, иначе — результат сохранения ТВ.

## Синтаксис

``` php
boolean setTVValue ($pk, $value)
```

- `$pk` _(mixed)_ ID ТВ, если значение числовое, иначе имя ТВ
- `$value` _(string)_ сохраняемое значение

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setTVValue('subtitle', 'foobar');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getTVValue](extending-modx/core-model/modresource/modresource.gettvvalue)
