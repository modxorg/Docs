---
title: "getPKType"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpktype"
---

## xPDOObject::getPKType()

Получает тип поля первичного ключа для объекта.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getPKType()>

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
