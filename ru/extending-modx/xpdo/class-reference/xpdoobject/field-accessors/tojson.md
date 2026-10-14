---
title: "toJSON"
description: "Возвращает JSON-представление объекта."
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson"
---

## xPDOObject::toJSON()

Возвращает JSON-представление объекта.

## Синтаксис

```php
string toJSON (
   [string $keyPrefix = ''],
   [boolean $rawValues = false]
)
```

## Пример

```php
$object->set('name','Bob');
$object->set('email','pinkdaisies@gmail.com');
$json = $object->toJSON();
echo $json;
// prints {"name":"Bob","email":"pinkdaisies@gmail.com"}
```

## Смотрите также

-   [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
-   [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
-   [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
-   [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")
