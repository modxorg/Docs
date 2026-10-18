---
title: "xPDO.escape"
description: "Экранирует строку для использования в качестве идентификатора в SQL."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.escape"
---

## xPDO::escape

Экранирует идентификатор (имя таблицы или столбца) для текущего драйвера, обрамляя его в соответствующие кавычки (обратные кавычки для MySQL, двойные кавычки для большинства других). Это только для идентификаторов — чтобы экранировать значение, используйте [quote()](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote").

## Синтаксис

``` php
string escape (string $string)
```

## Пример

``` php
$sql = 'SELECT * FROM ' . $xpdo->escape('my_table');
```

## Смотрите также

-   [xPDO.literal](extending-modx/xpdo/class-reference/xpdo/xpdo.literal "xPDO.literal")
-   [xPDO.quote](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")