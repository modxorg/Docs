---
title: "xPDO.getPKType"
description: "Получает PHP-тип поля (полей) первичного ключа класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getpktype"
---

## xPDO::getPKType

Возвращает `phptype` поля первичного ключа класса или массив типов для составного первичного ключа. Возвращает `null`, если первичный ключ не найден.

## Синтаксис

``` php
mixed getPKType (string $className, [mixed $pk = false])
```

-   `$className` — класс, для которого выполняется поиск.
-   `$pk` — необязательная конкретная колонка (или колонки) первичного ключа, тип (или типы) которых нужно получить. Если аргумент опущен, тип определяется по первичному ключу класса.

## Пример

``` php
$type = $xpdo->getPKType('modResource');
// 'integer'
```

## Смотрите также

-   [xPDO.getPK](extending-modx/xpdo/class-reference/xpdo/xpdo.getpk "xPDO.getPK")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")