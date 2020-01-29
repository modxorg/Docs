---
title: "xPDOGenerator.parseSchema"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema"
---

## xPDOGenerator::parseSchema

Анализирует XML-схему XPDO и создает из нее классы и файлы карт.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOGenerator.html#parseSchema>

```php
boolean parseSchema (string $schemaFile, [string $outputDir = ''], [boolean $compile = false])
```

## Пример

Создайте файлы карты и класса для схемы XML:

```php
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$generator->parseSchema('mypackage.mysql.schema.xml','/path/to/mypackage/model/');
```

## Смотрите также

-   [Generating the Model Code](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")
-   [Creating a Model With xPDO](extending-modx/xpdo/custom-models/defining-a-schema "Creating a Model With xPDO")
-   [xPDOGenerator.writeSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.writeschema "xPDOGenerator.writeSchema")
