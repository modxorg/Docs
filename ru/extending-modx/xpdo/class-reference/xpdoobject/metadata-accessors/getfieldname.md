---
title: "getFieldName"
description: "Получает имя поля, представленное в контейнере базы данных."
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfieldname"
---

## xPDOObject::getFieldName()

Получает имя поля, представленное в контейнере базы данных. Это получает имя поля, полностью уточненное либо по имени таблицы объектов, либо по указанному псевдониму, и правильно заключенное в кавычки.

## Синтаксис

```php
string getFieldName (string $k, [string $alias = null])
```

## Примеры

```php
$document = $modx->getObject('modResource',1);
echo $document->getFieldName('editedby');
// prints `site_content`.`editedby`
```
