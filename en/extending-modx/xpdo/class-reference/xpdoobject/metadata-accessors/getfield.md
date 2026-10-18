---
title: "getField"
_old_id: "1869"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getfield"
---

## xPDOObject::getField

Resolves a field name or alias to the actual field name of the object. If `$key` is a declared field, it is returned unchanged; if it is a field alias, the aliased field is returned.

## Syntax

``` php
string|boolean getField (string $key, [boolean $validate = false])
```

- `$key` — the field name or alias to resolve.
- `$validate` — when true, returns `false` if the key is neither a field nor an alias; when false (the default), the key is returned as passed.

## Example

``` php
$store = $xpdo->getObject('sfStore', 1);
echo $store->getField('postalcode');
// 'zip'
```

## See Also

- [xPDO.getFieldAliases](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldaliases "xPDO.getFieldAliases")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")