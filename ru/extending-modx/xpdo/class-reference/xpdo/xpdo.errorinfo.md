---
title: "xPDO.errorInfo"
description: "Возвращает информацию об ошибке последней операции."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.errorinfo"
---

## xPDO::errorInfo

Возвращает массив с информацией об ошибке последней операции с базой данных: код SQLSTATE, код ошибки драйвера и текст ошибки драйвера. Если ошибок не было, возвращает пустой массив.

## Синтаксис

```php
array errorInfo ()
```

## Пример

```php
print_r($xpdo->errorInfo());
```

## Смотрите также

-   [xPDO.errorCode](extending-modx/xpdo/class-reference/xpdo/xpdo.errorcode "xPDO.errorCode")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")