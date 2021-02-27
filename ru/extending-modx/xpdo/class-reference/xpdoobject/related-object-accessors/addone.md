---
title: "addOne"
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone"
---

## xPDOObject::addOne()

Добавляет объект, связанный с этим экземпляром посредством отношения внешнего ключа.

## Синтаксис

API Docs: [xPDOObject::addOne()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::addOne()>)

```php
boolean addOne (
   mixed &$obj,
   [string $alias = '']
)
```

## Пример

Добавьте ранг вновь созданного персонажа, затем сохраните оба с помощью каскадирования.

```php
$person = $xpdo->newObject('Person',1);
$person->set('fname','Johnny');
$person->set('lname','Benjamins');
$rank = $xpdo->newObject('Rank');
$rank->set('title','CEO');
$rank->set('level',1);
$person->addOne($rank);
$person->save(); // will save both person and rank
```

## Исправление проблем

Если у вас возникли проблемы с использованием этой функции, полезно повысить уровень ведения журнала:

```php
$modx->setLogLevel(4); // show all debugging info
```

Если вы получаете ошибки, подобные следующим:

```php
Foreign key definition for class , alias XXXXX not found, or cardinality is not 'one'.
```

тогда вы, вероятно, должны использовать [addMany()](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany). Проверьте файл XML-схемы для объекта, который пытается запустить addOne, и убедитесь, что отношение к объекту, который вы пытаетесь добавить, определено с помощью cardinality="one".

## Смотрите также

-   [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
-   [addMany()](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany)
