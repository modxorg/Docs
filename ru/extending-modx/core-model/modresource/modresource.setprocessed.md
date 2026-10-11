---
title: "modResource.setProcessed"
translation: "extending-modx/core-model/modresource/modresource.setprocessed"
description: "Пометить вывод ресурса как построенный"
---

## modResource.setProcessed

Прямо записывает флаг `_processed`, приводя значение к логическому.

Единственный вызов в ядре — `modRequest` ставит его в `true` после восстановления ресурса из кэша сайта. Так `process()` работает с закэшированным `_content` вместо нового парсинга.

## Синтаксис

``` php
void setProcessed ($processed)
```

- `$processed` _(boolean)_ значение, сохраняемое во флаге

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->_content = 'foobar';
$resource->setProcessed(true);
$resource->process();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProcessed](extending-modx/core-model/modresource/modresource.getprocessed)
