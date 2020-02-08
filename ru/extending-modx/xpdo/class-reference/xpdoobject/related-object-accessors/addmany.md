---
title: "addMany"
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany"
---

## xPDOObject::addMany()

Добавляет объект или коллекцию объектов, связанных с этим классом.

## Синтаксис

API Docs: [xPDOObject::addMany()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::addMany()>)

```php
boolean addMany (
   mixed &$obj,
   [string $alias = '']
)
```

## Пример

Добавьте клюшки для гольфа в сумку и сохраните.

```php
$bag = $xpdo->newObject('GolfBag');
$bag->set('name',"Chris's Bag");
$bag->set('color','blue');
$clubs = array();
for ($i=1;$i<10;$i++) {
   $club = $xpdo->newObject('GolfClub');
   $club->set('name',$i.' Iron');
   $clubs[] = $club;
}
$bag->addMany($clubs);
$bag->save(); // сохраняет как сумку, так и все клубы
```

**Вложенные вызовы** Вы можете вложить один вызов `addMany()` в другой и, таким образом, создать все связанные данные с помощью одной операции `save()`.

## Исправление проблем

Помните, что эта операция предназначена для вызова только для объектов, отношения которых определены как количество элементов = "многие".

## Смотрите также

-   [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
-   [addOne()](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone)
