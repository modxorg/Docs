---
title: "xPDO.getPDOType"
description: "Возвращает тип параметра PDO для значения PHP."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getpdotype"
---

## xPDO::getPDOType

Возвращает константу типа параметра `PDO`, соответствующую значению PHP — например, `PDO::PARAM_INT` для целых чисел, `PDO::PARAM_STR` для строк и `PDO::PARAM_NULL` для `null`.

## Синтаксис

```php
integer getPDOType (mixed $value)
```

## Пример

```php
$type = $xpdo->getPDOType(42);
// PDO::PARAM_INT
```

## Смотрите также

-   [xPDO.parseBindings](extending-modx/xpdo/class-reference/xpdo/xpdo.parsebindings "xPDO.parseBindings")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")