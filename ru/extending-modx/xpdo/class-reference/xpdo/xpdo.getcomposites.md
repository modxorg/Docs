---
title: "xPDO.getComposites"
description: "Возвращает составные связи по внешнему ключу, определённые для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcomposites"
---

## xPDO::getComposites

Возвращает определения составных связей класса с ключом — алиасом связи. Составная связь указывает на связанные объекты, которые сами владеют внешним ключом (связь «один ко многим», где связанные объекты принадлежат текущему классу). Именно составные связи каскадно обрабатываются в `remove()`.

## Синтаксис

```php
array getComposites (string $className)
```

## Пример

```php
$composites = $xpdo->getComposites('modResource');
print_r($composites['Children']);
```

## Смотрите также

-   [xPDO.getAggregates](extending-modx/xpdo/class-reference/xpdo/xpdo.getaggregates "xPDO.getAggregates")
-   [xPDO.getFKDefinition](extending-modx/xpdo/class-reference/xpdo/xpdo.getfkdefinition "xPDO.getFKDefinition")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")