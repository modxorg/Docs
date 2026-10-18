---
title: "xPDOGenerator.getIndex"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getindex"
---

## xPDOGenerator::getIndex

Возвращает определение индекса для разобранной схемы, которое генератор использует при обратном проектировании или выводе метаданных индексов.

## Синтаксис

```php
array|null getIndex (mixed $index)
```

## Пример

```php
$generator = $manager->getGenerator();
$index = $generator->getIndex($indexName);
```

## Смотрите также

-   [writeSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.writeschema "writeSchema")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")