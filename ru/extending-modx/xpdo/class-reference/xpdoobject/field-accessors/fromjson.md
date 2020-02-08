---
title: "fromJSON"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson"
---

## xPDOObject::fromJSON()

Устанавливает поля объекта из строки объекта JSON.

## Синтаксис

API Docs: [https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html](https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html)

```php
void fromJSON (
   string $jsonSource,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)
```

## Пример

```php
$str = '{"name":"Sirius","email":"Black"}';
$object->fromJSON($str);
echo $object->get('name').' '.$object->get('email');
// prints "Sirius Black"
```

## Смотрите также

-   [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
-   [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
-   [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
-   [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")
