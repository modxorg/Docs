---
title: "getPK"
description: "Получает имя (или имена) полей первичного ключа для объекта."
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpk"
---

## xPDOObject::getPK()

Получает имя (или имена) полей первичного ключа для объекта.

## Синтаксис

```php
mixed getPK ()
```

## Пример

Получить PK объекта Person, чье поле PK равно 'id'.

```php
$person = $xpdo->getObject('Person',1);
$pk = $person->getPK();
echo $pk;
// prints "id"
```
