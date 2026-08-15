---
title: "getFieldName"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfieldname"
---

## xPDOObject::getFieldName()

Получает имя поля, представленное в контейнере базы данных. Это получает имя поля, полностью уточненное либо по имени таблицы объектов, либо по указанному псевдониму, и правильно заключенное в кавычки.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getFieldName()>

```php
string getFieldName (string $k, [string $alias = null])
```

## Примеры

```php
$document = $xpdo->getObject('Document',1);
echo $document->getFieldName('editedby');
// prints `documents`.`editedby`
```
