---
title: "xPDO.escSplit"
description: "Разделяет строку по символу, игнорируя экранированные вхождения."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.escsplit"
---

## xPDO::escSplit

Делит строку по символу-разделителю, учитывая токен экранирования (по умолчанию — обратные кавычки), поэтому экранированные разделители не разбивают строку. Это вспомогательная функция, используемая при разборе списков колонок, которые могут содержать экранированные идентификаторы.

## Синтаксис

``` php
array escSplit (string $char, string $str, [string $escToken = '`'], [integer $limit = 0])
```

-   `$char` — символ-разделитель.
-   `$str` — разделяемая строка.
-   `$escToken` — символ экранирования, который нужно учитывать.
-   `$limit` — необязательное максимальное количество возвращаемых элементов.

## Пример

``` php
$parts = xPDO::escSplit(',', 'id,name,`weird,col`');
// array('id', 'name', '`weird,col`')
```

## Смотрите также

-   [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")