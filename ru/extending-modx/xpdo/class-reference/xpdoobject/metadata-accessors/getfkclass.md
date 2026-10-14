---
title: "getFKClass"
description: "Получить имя класса, связанного внешним ключом с указанным ключом поля."
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfkclass"
---

## xPDOObject::getFKClass()

Получить имя класса, связанного внешним ключом с указанным ключом поля. Это обычно используется для поиска классов, участвующих в непосредственных отношениях с текущим объектом.

## Синтаксис

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
