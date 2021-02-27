---
title: "getFKDefinition"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfkdefinition"
---

## xPDOObject::getFKDefinition()

Получить определение внешнего ключа для определенного имени класса. Это обычно используется для поиска классов в отношении «один ко многим» с текущим объектом.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getFKDefinition>

```php
array getFKDefinition (string $alias)
```

## Примеры

Получить определение FK пользователя, который только что отредактировал документ.

```php
$document = $xpdo->getObject('Document',1);
$fkdef = $document->getFKDefinition('EditedBy');
print_r($fkdef);

/* Outputs:
Array (
  [class] => User
  [key] => editedby
  [local] => editedby
  [foreign] => id
  [cardinality] => one
  [owner] => foreign
  [type] => aggregate
) */
```
