---
title: "modResource.addLock"
translation: "extending-modx/core-model/modresource/modresource.addlock"
description: "Взять блокировку на редактирование ресурса"
---

## modResource.addLock

Записывает запись о блокировке в реестр `locks` (`modDbRegister`) под `/resource/`, ключ — md5 от ID ресурса. Блокировка живёт `lock_ttl` секунд, по умолчанию 360, повторный вызов тем же пользователем продлевает её.

Возвращаемое значение не всегда логическое: `true` — блокировка получена; целое число — ID текущего владельца; `false` — метод выполнен вне `modX`. Сравнивайте с `=== true`, чтобы узнать, ваша ли блокировка.

## Синтаксис

``` php
boolean|integer addLock ([int $user = 0 [, array $options = array()]])
```

- `$user` _(integer)_ владелец блокировки; `0` — вошедший пользователь
- `$options` _(array)_ читается на предмет опции `lock_ttl`, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->addLock() === true) {
    echo 'lock granted';
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getLock](extending-modx/core-model/modresource/modresource.getlock)
- [modResource.removeLock](extending-modx/core-model/modresource/modresource.removelock)
