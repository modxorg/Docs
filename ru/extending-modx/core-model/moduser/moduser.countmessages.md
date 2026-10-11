---
title: "modUser.countMessages"
translation: "extending-modx/core-model/moduser/moduser.countmessages"
description: "Посчитать записи modUserMessage, адресованные пользователю"
---

## modUser::countMessages

Считает сообщения `modUserMessage`, у которых в `recipient` стоит id этого пользователя. Каждый вызов выполняет отдельный запрос: готового счётчика в записи пользователя нет.

`$read` превращается в условие по полю `messageread`:

- `'read'` даёт `messageread = 1`, считаются только прочитанные;
- `'unread'` превращается в `0`, условие не добавляется, поэтому считается всё подряд;
- любое другое непустое значение попадает в условие в исходном виде.

## Синтаксис

``` php
integer countMessages ([mixed $read = ''])
```

- `$read` _(mixed)_ Выборка по признаку прочтения, по умолчанию `''` — условие по `messageread` не добавляется.

## Пример

``` php
$total = $modx->user->countMessages();
$read  = $modx->user->countMessages('read');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
