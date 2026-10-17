---
title: "xPDO.lastInsertId"
description: "Получает ID последней вставленной строки."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.lastinsertid"
---

## xPDO::lastInsertId

Возвращает ID последней строки, вставленной в базу данных текущим соединением, или `false`, если вставок ещё не было. Для таблиц с последовательностью имя последовательности можно передать аргументом.

## Синтаксис

``` php
string|boolean lastInsertId ([string $name = null])
```

## Пример

``` php
$id = $xpdo->lastInsertId();
```

## Смотрите также

-   [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "xPDOObject.save")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")