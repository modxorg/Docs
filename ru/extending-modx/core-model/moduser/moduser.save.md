---
title: "modUser.save"
translation: "extending-modx/core-model/moduser/moduser.save"
description: "Сохранить пользователя и вызвать OnUserBeforeSave и OnUserSave"
---

## modUser::save

Метод сохраняет объект и оборачивает сохранение в xPDO двумя событиями. У нового объекта, у которого `createdon` меньше `1`, сначала проставляется текущая метка времени.

Оба события вызываются только когда экземпляр xpdo — modX. `OnUserSave` срабатывает лишь при успешном сохранении, а `OnUserBeforeSave` — до попытки в любом случае.

## Синтаксис

``` php
boolean save ([boolean $cacheFlag = false])
```

- `$cacheFlag` _(boolean)_ Передаётся в `xPDOObject::save()`, по умолчанию `false`. Целое значение задаёт время жизни кэша в секундах.

## Пример

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->set('active', 1);
$user->save();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
