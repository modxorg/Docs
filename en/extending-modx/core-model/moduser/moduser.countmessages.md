---
title: "modUser.countMessages"
description: "Count the modUserMessage rows addressed to the User"
---

## modUser::countMessages

Counts `modUserMessage` records whose `recipient` is this User.

## Syntax

``` php
integer countMessages ([mixed $read = ''])
```

- `$read` _(mixed)_ Builds the `messageread` criterion, by default `''` (no criterion):
    - `'read'` — `messageread = 1`, read messages only.
    - `'unread'` — maps to `0`, which is not truthy, so no criterion is applied and every message is counted.
    - any other truthy value — written into the criterion as-is.

## Example

``` php
$total = $modx->user->countMessages();
$read  = $modx->user->countMessages('read');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
