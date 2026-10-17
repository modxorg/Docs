---
title: "xPDO.addDerivativeCriteria"
description: "Добавляет условие по class_key, фильтрующее производные классы по ключу класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.addderivativecriteria"
---

## xPDO::addDerivativeCriteria

Добавляет условие `class_key` в критерии для классов, использующих одиночное наследование по таблице. Когда родительский класс помечен как `inherit="single"`, его производные классы хранятся в той же таблице и различаются по `class_key`; этот метод гарантирует, что запросы к родительскому классу возвращают только строки запрошенного класса.

## Синтаксис

``` php
mixed addDerivativeCriteria (string $className, mixed $criteria)
```

## Пример

``` php
$criteria = $xpdo->addDerivativeCriteria('modResource', array('parent' => 12));
$resources = $xpdo->getCollection('modResource', $criteria);
```

## Смотрите также

-   [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")