---
title: "getPKType"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpktype"
---

## xPDOObject::getPKType()

Получает тип поля первичного ключа для объекта.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getPKType>

```php
string getPKType()
```

## Примеры

Захватывает тип PK таблицы ресурсов, у которой есть поле идентификатора `auto_increment`:

```php
$resource = $xpdo->getObject('Resource',1);
echo $resource->getPKType();
// prints "integer"
```
