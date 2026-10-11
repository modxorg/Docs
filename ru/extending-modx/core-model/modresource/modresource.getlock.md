---
title: "modResource.getLock"
translation: "extending-modx/core-model/modresource/modresource.getlock"
description: "Прочитать ID пользователя, удерживающего блокировку ресурса"
---

## modResource.getLock

Читает одно сообщение из реестра `locks`, не удаляя его, и возвращает сохранённый там ID пользователя. Реестр подписан на каждый ресурс, поэтому читается блокировка только этого ресурса.

Возвращает `0` при свободной блокировке, вне `modX` или когда службу реестра не удалось загрузить.

## Синтаксис

``` php
integer getLock ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$lockedBy = $resource->getLock();
if ($lockedBy) {
    echo 'locked by user ' . $lockedBy;
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.addLock](extending-modx/core-model/modresource/modresource.addlock)
- [modResource.removeLock](extending-modx/core-model/modresource/modresource.removelock)
