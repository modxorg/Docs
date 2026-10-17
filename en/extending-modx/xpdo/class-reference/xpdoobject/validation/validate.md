---
title: "validate"
description: "Validate the field values using the object's validator."
_old_id: "1224"
_old_uri: "2.x/class-reference/xpdoobject/validation/validate"
---

## xPDOObject::validate()

Validate the field values using the validator returned by [`getValidator()`](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator "getValidator"), which is `xPDO\Validation\xPDOValidator` by default.

## Syntax

``` php
boolean validate ([array $options = array()])
```