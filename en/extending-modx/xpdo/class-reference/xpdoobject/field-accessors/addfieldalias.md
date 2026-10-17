---
title: "addFieldAlias"
_old_id: "1870"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/addfieldalias"
---

## xPDOObject::addFieldAlias

Adds an alias for a field of the object. The alias is registered globally for the class (in the class's `fieldAliases` map), so it is available on every instance of that class in the request.

## Syntax

``` php
boolean addFieldAlias (string $field, string $alias)
```

## Example

``` php
$store = $xpdo->getObject('sfStore', 1);
$store->addFieldAlias('zip', 'postalcode');
echo $store->get('postalcode');
```

## See Also

- [getField](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfield "getField")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")