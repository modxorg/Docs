---
title: "modResource.getProcessed"
translation: "extending-modx/core-model/modresource/modresource.getprocessed"
description: "Проверить, построен ли уже вывод ресурса"
---

## modResource.getProcessed

Сообщает состояние флага `_processed`. `process()` и `parseContent()` устанавливают его, как только распарсили содержимое.

`modRequest` тоже ставит его в `true` для ресурса, восстановленного из кэша сайта. Так `process()` не парсит закэшированный `_content` повторно. `modCacheManager::generateResource()` читает тот же флаг перед записью ресурса в кэш.

## Синтаксис

``` php
boolean getProcessed ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if (!$resource->getProcessed()) {
    $resource->prepare();
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProcessed](extending-modx/core-model/modresource/modresource.setprocessed)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)
