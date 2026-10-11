---
title: "modUser.remove"
translation: "extending-modx/core-model/moduser/moduser.remove"
description: "Удалить пользователя и вызвать OnUserBeforeRemove и OnUserRemove"
---

## modUser::remove

Метод удаляет запись пользователя и оборачивает удаление в xPDO двумя событиями. Оба выполняются, когда экземпляр xpdo — modX. `OnUserRemove` срабатывает даже если родительское удаление вернуло `false`, в отличие от `OnUserSave` в `save()`.

`$ancestors` содержит объекты, уже удалённые в текущей цепочке: xPDO разрывает ими циклические ссылки. При вызове верхнего уровня массив пуст.

## Синтаксис

``` php
boolean remove ([array $ancestors = array()])
```

- `$ancestors` _(array)_ Уже удалённые объекты, по умолчанию `array()`.

## Пример

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->remove();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
