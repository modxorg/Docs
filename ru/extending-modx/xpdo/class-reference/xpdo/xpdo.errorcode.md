---
title: "xPDO.errorCode"
description: "Возвращает код ошибки SQLSTATE последней операции."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.errorcode"
---

## xPDO::errorCode

Возвращает код ошибки SQLSTATE, связанный с последней операцией с базой данных, как это определено в спецификации PDO. Возвращает `null`, если ошибок не было.

## Синтаксис

```php
string|null errorCode ()
```

## Пример

```php
$code = $xpdo->errorCode();
```

## Смотрите также

-   [xPDO.errorInfo](extending-modx/xpdo/class-reference/xpdo/xpdo.errorinfo "xPDO.errorInfo")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")