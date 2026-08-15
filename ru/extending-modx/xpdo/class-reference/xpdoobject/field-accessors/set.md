---
title: "set"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/set"
---

## xPDOObject::set()

Установите значение поля по ключу или имени поля.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::set()>

```php
boolean set(
   string $k,
   [mixed $v = null],
   [string|callable $vType = '']
)
```

## Пример

Установите имя объекта:

```php
$object->set('name','Billy');
```
