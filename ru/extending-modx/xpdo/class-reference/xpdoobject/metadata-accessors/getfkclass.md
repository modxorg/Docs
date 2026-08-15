---
title: "getFKClass"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfkclass"
---

## xPDOObject::getFKClass()

Получить имя класса, связанного внешним ключом с указанным ключом поля. Это обычно используется для поиска классов, участвующих в непосредственных отношениях с текущим объектом.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getFKClass()>

```php
void getFKClass (string $k)
```

## Примеры

Получите имя класса, связанного с полем 'book' объекта 'myChapter':

```php
$chapter = $xpdo->getObject('myChapter',12);
echo $chapter->getFKClass('book');
// prints "myBook"
```
