---
title: "addFieldAlias"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/addfieldalias"
---

## xPDOObject::addFieldAlias

Добавляет псевдоним для поля объекта. Псевдоним регистрируется глобально для класса (в карте `fieldAliases` класса), поэтому он доступен каждому экземпляру этого класса в рамках запроса.

## Синтаксис

```php
boolean addFieldAlias (string $field, string $alias)
```

## Пример

```php
$store = $xpdo->getObject('sfStore', 1);
$store->addFieldAlias('zip', 'postalcode');
echo $store->get('postalcode');
```

## Смотрите также

-   [getField](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfield "getField")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")