---
title: "xPDO.getFKDefinition"
description: "Возвращает определение агрегированной или составной связи для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getfkdefinition"
---

## xPDO::getFKDefinition

Возвращает определение одной связи — агрегированной или составной — для класса, найденное по алиасу связи. Возвращаемый массив содержит `class`, `local`, `foreign`, `cardinality` и `owner`, а также ключ `type` (`aggregate` или `composite`). Если определение не найдено, возвращает `null` и пишет ошибку в журнал.

## Синтаксис

```php
array|null getFKDefinition (string $parentClass, string $alias)
```

## Пример

```php
$def = $xpdo->getFKDefinition('modResource', 'Template');
print_r($def);
// array('class' => 'MODX\Revolution\modTemplate', 'local' => 'template',
//       'foreign' => 'id', 'cardinality' => 'one', 'owner' => 'foreign',
//       'type' => 'aggregate')
```

## Смотрите также

-   [xPDO.getAggregates](extending-modx/xpdo/class-reference/xpdo/xpdo.getaggregates "xPDO.getAggregates")
-   [xPDO.getComposites](extending-modx/xpdo/class-reference/xpdo/xpdo.getcomposites "xPDO.getComposites")
-   [xPDOObject.getFKDefinition](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfkdefinition "xPDOObject.getFKDefinition")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")