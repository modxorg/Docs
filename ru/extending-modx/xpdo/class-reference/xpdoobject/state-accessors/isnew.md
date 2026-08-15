---
title: "isNew"
translation: "extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isnew"
---

## xPDOObject::isNew()

Указывает, является ли экземпляр новым и еще не сохранен.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::isNew()>

```php
boolean isNew ()
```

## Примеры

Укажите, была ли Broom сохранена.

```php
$broom = $xpdo->newObject('Broom');
$broom->set('name','Firebolt');

echo $broom->isNew() ? 1 : 0; // prints 1

$broom->save();

echo $broom->isNew() ? 1 : 0; // prints 0
```
