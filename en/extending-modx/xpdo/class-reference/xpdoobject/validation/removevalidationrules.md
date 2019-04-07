---
title: "removeValidationRules"
_old_id: "1205"
_old_uri: "2.x/class-reference/xpdoobject/validation/removevalidationrules"
---

## xPDOObject::removeValidationRules()

Remove one or more validation rules from this instance.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#removeValidationRules>

``` php
void removeValidationRules ([string $field = null], [array $rules = array()])
```

## Examples

Remove all rules from this Book object.

``` php
$book = $xpdo->getObject('Book',1);
$book->removeValidationRules();
```