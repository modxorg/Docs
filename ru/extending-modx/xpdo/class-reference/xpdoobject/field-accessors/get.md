---
title: "get"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/get"
---

## xPDOObject::get()

Получает значение поля (или набор значений) по ключу (ключам) поля или по имени/именам.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#get>

```php
mixed get(
   string|array $k,
   [string|array $format = null],
   [mixed $formatTemplate = null]
)
```

Не используйте параметр `$format` при получении нескольких значений различных типов, поскольку строка формата будет применяться ко всем типам, скорее всего, с непредсказуемыми результатами. При желании вы можете предоставить ассоциированный массив строк формата с ключом поля в качестве ключа для массива формата.

## Примеры

Получить значение поля имени объекта.

```php
$object->set('name','Charles');
$name = $object->get('name');
echo $name; // produces "Charles"
```

Получить массив значений для нескольких полей:

```php
$object->set('name_first','Charles');
$object->set('name_last','Longbottom');
$names = $object->get(array('name_first','name_last'));
echo $names['name_first'].' '.$names['name_last'];
// produces "Charles Longbottom"
```
