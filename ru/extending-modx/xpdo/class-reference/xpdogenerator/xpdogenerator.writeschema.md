---
title: "xPDOGenerator.writeSchema"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.writeschema"
---

## xPDOGenerator::writeSchema

Анализирует существующую базу данных и генерирует из нее XML-схему XPDO.

## Синтаксис

API Docs: [http://api.modxcms.com/xpdo/om-mysql/xPDOGenerator_mysql.html#writeSchema](http://api.modxcms.com/xpdo/om-mysql/xPDOGenerator_mysql.html#writeSchema)

```php
boolean writeSchema (
    string $schemaFile,
    [string $package = ''],
    [string $baseClass = ''],
    [string $tablePrefix = ''],
    [boolean $restrictPrefix = false])
```

## Пример

Создайте XML-схему из существующей базы данных. Это также генерирует XML только для таблиц с префиксом 'mydb\_'.

```php
$xpdo= new xPDO('mysql:host=localhost;dbname=myolddatabase','username','password','mydb_');
$manager= $xpdo->getManager();
$generator= $manager->getGenerator();

$xml= $generator->writeSchema('/path/to/my/new/packagename.schema.xml','mypackage', 'xPDOObject','mydb_');
```

Примечание: генерация схемы XML не генерирует совокупные и составные отношения - только определения полей и объектов. Вам нужно будет указать эти отношения самостоятельно. Прочти [Defining Relationships](http://rtfm.modx.com/display/xPDO20/Defining+Relationships) для получения подробностей.

## Смотрите также

-   [Generating the Model Code](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")
-   [Creating a Model With xPDO](extending-modx/xpdo/custom-models/defining-a-schema "Creating a Model With xPDO")
-   [xPDOGenerator.parseSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "xPDOGenerator.parseSchema")
