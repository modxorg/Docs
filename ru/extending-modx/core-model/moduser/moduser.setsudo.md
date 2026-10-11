---
title: "modUser.setSudo"
translation: "extending-modx/core-model/moduser/moduser.setsudo"
description: "Записать флаг sudo напрямую, в обход запрета в set"
---

## modUser::setSudo

Метод пишет поле `sudo` напрямую и помечает его изменённым: `set()` вне setup этот ключ отклоняет. Он всегда возвращает `true` и ничего не хеширует и не проверяет.

Sudo-пользователь обходит любую проверку Access Permissions, поэтому флаг действует только после `save()`.

## Синтаксис

``` php
boolean setSudo (boolean $sudo)
```

- `$sudo` _(boolean)_ Значение приводится к boolean перед записью.

## Пример

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->setSudo(true);
$user->save();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.set](extending-modx/core-model/moduser/moduser.set)
