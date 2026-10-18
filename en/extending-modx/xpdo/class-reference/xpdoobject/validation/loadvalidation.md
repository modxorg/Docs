---
title: "_loadValidation"
_old_id: "1875"
_old_uri: "2.x/class-reference/xpdoobject/validation/loadvalidation"
---

## xPDOObject::_loadValidation

Loads the validation rules defined for the object's class into the validator. Called automatically by [getValidator()](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator "getValidator") the first time validation is needed; pass `true` to force a reload.

## Syntax

``` php
void _loadValidation ([boolean $reload = false])
```

## Example

``` php
$object->_loadValidation(true);
```

## See Also

- [getValidator](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator "getValidator")
- [addValidationRule](extending-modx/xpdo/class-reference/xpdoobject/validation/addvalidationrule "addValidationRule")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")