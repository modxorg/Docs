---
title: "xPDO.getInherit"
description: "Получает тип наследования класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getinherit"
---

## xPDO::getInherit

Возвращает режим наследования класса: `'single'` для наследования с одной таблицей (производные классы хранятся в той же таблице и различаются по `class_key`), `'multiple'` для наследования с таблицей на класс или пустую строку, если класс ничего не наследует.

## Синтаксис

``` php
string getInherit (string $className)
```

## Пример

``` php
$inherit = $xpdo->getInherit('modResource');
// 'single'
```

## Смотрите также

-   [xPDO.addDerivativeCriteria](extending-modx/xpdo/class-reference/xpdo/xpdo.addderivativecriteria "xPDO.addDerivativeCriteria")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")