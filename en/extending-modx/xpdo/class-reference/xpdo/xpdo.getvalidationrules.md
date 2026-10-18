---
title: "xPDO.getValidationRules"
description: "Get the validation rules defined for a class."
_old_id: "1859"
_old_uri: "2.x/class-reference/xpdo/xpdo.getvalidationrules"
---

## xPDO::getValidationRules

Returns the validation rules defined for a class in its schema, keyed by field name. Each rule describes its `name`, `type`, and parameters.

## Syntax

``` php
array|null getValidationRules (string $className)
```

## Example

``` php
$rules = $xpdo->getValidationRules('modResource');
```

## See Also

- [xPDOObject.addValidationRule](extending-modx/xpdo/class-reference/xpdoobject/validation/addvalidationrule "xPDOObject.addValidationRule")
- [Object Validation](extending-modx/xpdo/class-reference/xpdoobject/validation "Object Validation")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")