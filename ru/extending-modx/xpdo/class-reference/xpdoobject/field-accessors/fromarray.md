---
title: "fromArray"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray"
---

## xPDOObject::fromArray()

Устанавливает поля объекта из ассоциативного массива пар `ключ => значение`.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#fromArray>

```php
void fromArray(
   array $fldarray,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)
```

## Примеры

Введите имя человека из массива.

```php
$object->fromArray(array(
    'fname' => 'Boo',
    'lname' => 'Radley',
));
echo $object->get('fname').' '.$object->get('lname');
// prints "Boo Radley"
```

Уберите префиксы `ghost_` из предоставленного массива:

```php
$object->fromArray(array(
    'ghost_fname' => 'Nearly Headless',
    'ghost_lname' => 'Nick',
),'ghost_');
echo $object->get('fname').' '.$object->get('lname');
// prints "Nearly Headless Nick"
```

Создание ресурса MODX:

```php
$page = $modx->newObject('modResource');

$data = array(
    'pagetitle' => 'My Page',
    'description' => 'Why not?',
    // ... etc...
);

$page->fromArray($data);
$page->save();
```

## Смотрите также

-   [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
-   [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
-   [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
-   [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")
