---
title: "xPDO.setAttribute"
description: "Устанавливает атрибут соединения PDO."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.setattribute"
---

## xPDO::setAttribute

Устанавливает атрибут соединения PDO, например `PDO::ATTR_ERRMODE` или `PDO::ATTR_DEFAULT_FETCH_MODE`. Возвращает `true` при успехе, `false` при ошибке.

## Синтаксис

```php
boolean setAttribute (integer $attribute, mixed $value)
```

## Пример

```php
$xpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

## Смотрите также

-   [xPDO.getAttribute](extending-modx/xpdo/class-reference/xpdo/xpdo.getattribute "xPDO.getAttribute")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")