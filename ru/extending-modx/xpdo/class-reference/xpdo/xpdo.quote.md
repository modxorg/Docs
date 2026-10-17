---
title: "xPDO.quote"
description: "Экранирует строку для использования в SQL-операторе."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.quote"
---

## xPDO::quote

Экранирует строку для использования в SQL-операторе согласно текущему драйверу. Отдавайте предпочтение подготовленным запросам со связанными параметрами; используйте этот метод только тогда, когда вам необходимо построить сырой SQL.

## Синтаксис

```php
string|boolean quote (string $string, [integer $parameter_type = PDO::PARAM_STR])
```

-   `$string` — значение, которое нужно экранировать.
-   `$parameter_type` — тип параметра PDO: по умолчанию `PDO::PARAM_STR`, а для целых чисел — `PDO::PARAM_INT`.

## Пример

```php
$username = $xpdo->quote($username);
$sql = "SELECT * FROM users WHERE username = $username";
```

## Смотрите также

-   [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
-   [xPDO.literal](extending-modx/xpdo/class-reference/xpdo/xpdo.literal "xPDO.literal")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")