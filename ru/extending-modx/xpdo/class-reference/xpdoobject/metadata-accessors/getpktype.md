---
title: "getPKType"
description: "Получает тип поля первичного ключа для объекта."
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpktype"
---

## xPDOObject::getPKType()

Получает тип поля первичного ключа для объекта.

## Синтаксис

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
