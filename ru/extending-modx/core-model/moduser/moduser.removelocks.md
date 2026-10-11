---
title: "modUser.removeLocks"
translation: "extending-modx/core-model/moduser/moduser.removelocks"
description: "Снять блокировки ресурсов, которые держит пользователь"
---

## modUser::removeLocks

Метод снимает блокировки ресурсов у этого пользователя: читается каталог `locks` реестра, выполняется подписка на `/resource/`, затем вытаскиваются все сообщения о блокировках с его id. `endSession()` вызывает метод без аргументов до уничтожения сеанса.

`$options` не действует: тело метода его не читает, хотя docblock обещает управление типами блокировок. Возвращаемое значение сообщает, запустился ли обход, а не то, снялось ли что-то: `false` возвращается, когда xpdo — не modX или сервис реестра не загрузился.

## Синтаксис

``` php
boolean removeLocks ([array $options = array()])
```

- `$options` _(array)_ Принимается, но не используется, по умолчанию `array()`.

## Пример

``` php
$user->removeLocks();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.endSession](extending-modx/core-model/moduser/moduser.endsession)
