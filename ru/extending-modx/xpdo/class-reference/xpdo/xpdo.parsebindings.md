---
title: "xPDO.parseBindings"
description: "Заменяет плейсхолдеры в строке SQL связанными значениями."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.parsebindings"
---

## xPDO::parseBindings

Заменяет именованные или позиционные плейсхолдеры в строке SQL соответствующими значениями из массива привязок, при необходимости заключая значения в кавычки. Используется внутренне для построения итогового SQL из запроса с привязками.

## Синтаксис

```php
string parseBindings (string $sql, array $bindings)
```

## Пример

```php
$sql = $xpdo->parseBindings('SELECT * FROM my_table WHERE id = :id', array(':id' => 42));
```

## Смотрите также

-   [xPDO.getPDOType](extending-modx/xpdo/class-reference/xpdo/xpdo.getpdotype "xPDO.getPDOType")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")