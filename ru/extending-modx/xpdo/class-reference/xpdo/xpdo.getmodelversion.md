---
title: "xPDO.getModelVersion"
description: "Получает версию схемы, из которой был сгенерирован класс."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getmodelversion"
---

## xPDO::getModelVersion

Возвращает строку `version` схемы, из которой был сгенерирован класс, например `'3.0'`. Возвращает `'1.0'`, если для класса не зафиксирована версия.

## Синтаксис

``` php
string getModelVersion (string $className)
```

## Пример

``` php
$version = $xpdo->getModelVersion('MODX\\Revolution\\modResource');
// '3.0'
```

## Смотрите также

-   [Определение базы данных и таблиц](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables "Defining the Database and Tables")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")