---
title: "getValidator"
description: "Get the validator class configured for this instance."
_old_id: "1182"
_old_uri: "2.x/class-reference/xpdoobject/validation/getvalidator"
---

## xPDOObject::getValidator()

Get the validator configured for this instance. The class comes from the `xPDO::OPT_VALIDATOR_CLASS` option and defaults to `xPDO\Validation\xPDOValidator`; MODX 3 overrides it with `MODX\Revolution\modValidator`. The global name `xPDOValidator` is **not** available in 3.x — `core/include/deprecated.php` defines no alias for it, so the namespaced name is the only one that resolves.

The rules for the object's class are loaded on first use by [`_loadValidation()`](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation "_loadValidation").

## Syntax

``` php
xPDO\Validation\xPDOValidator|null getValidator ()
```

## Example

``` php
$validator = $object->getValidator();
if ($validator->hasMessages()) {
    print_r($validator->getMessages());
}
```

## See Also

- [_loadValidation](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation)
- [validate](extending-modx/xpdo/class-reference/xpdoobject/validation/validate)
- [isValidated](extending-modx/xpdo/class-reference/xpdoobject/validation/isvalidated)