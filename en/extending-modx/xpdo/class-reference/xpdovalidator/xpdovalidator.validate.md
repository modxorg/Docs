---
title: "xPDOValidator.validate"
description: "Executes validation against the object attached to this validator."
_old_id: "1310"
_old_uri: "2.x/class-reference/xpdovalidator/xpdovalidator.validate"
---

## xPDOValidator::validate

Executes validation against the object attached to this validator. The optional array may contain keys `stopOnFail` and `stopOnRuleFail` to control whether validation stops on the first failing column or rule.

## Syntax

``` php
boolean validate ([array $parameters = array()])
```

## Example

Check to see if any validation errors occurred.

``` php
$validator = $obj->getValidator();
if (!$validator->validate()) {
   echo 'Errors occurred!';
}
```

## See Also

1. [xPDOValidator.addMessage](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate)