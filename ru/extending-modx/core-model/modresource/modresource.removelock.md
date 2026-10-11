---
title: "modResource.removeLock"
translation: "extending-modx/core-model/modresource/modresource.removelock"
description: "Снять блокировку на редактирование ресурса"
---

## modResource.removeLock

Удаляет запись о блокировке, но только если она свободна или принадлежит указанному пользователю.

Возвращает `false`, если блокировку удерживает другой пользователь, если работа идёт вне `modX` или если служба реестра недоступна. В этих случаях ничего не удаляется.

## Синтаксис

``` php
boolean removeLock ([int $user = 0])
```

- `$user` _(int)_ пользователь, чью блокировку нужно снять; `0` — вошедший пользователь

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->removeLock();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.addLock](extending-modx/core-model/modresource/modresource.addlock)
- [modResource.getLock](extending-modx/core-model/modresource/modresource.getlock)
