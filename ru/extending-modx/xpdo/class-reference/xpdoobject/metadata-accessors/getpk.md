---
title: "getPK"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpk"
---

## xPDOObject::getPK()

Получает имя (или имена) полей первичного ключа для объекта.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getPK()>

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
