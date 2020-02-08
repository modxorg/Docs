---
title: "set"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/set"
---

## xPDOObject::set()

Установите значение поля по ключу или имени поля.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#set>

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
