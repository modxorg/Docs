---
title: "xPDOMinLengthValidationRule"
_old_id: "1285"
_old_uri: "2.x/advanced-features/object-validation/xpdominlengthvalidationrule"
---

## What Does the Rule Do?

This rule verifies that the field is at least X characters long, where X is the `value` attribute in the schema. If `value` is omitted, X is `0` and only a non-string value fails.

The field the rule is attached to must be declared in the same object, and the value being checked must be a string: a numeric field fails this rule regardless of its value.

## Using the Rule

First, our model:

``` xml
<model package="Test" baseClass="xPDO\Om\xPDOObject" platform="mysql"
    defaultEngine="InnoDB" version="3.0">
    <object class="myTest" table="test" extends="xPDO\Om\xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255"
            phptype="string" default="" null="false" />

        <validation>
            <rule field="name"
                name="myMinLenRule"
                type="xPDOValidationRule"
                rule="xPDOMinLengthValidationRule"
                value="1"
                message="Please specify a name."
            />
        </validation>
    </object>
</model>
```

Generate the model from the XML schema, then validate an object in a Snippet:

``` php
$output = '';
$modx->addPackage('Test', '/path/to/components/test/model/');
$obj = $modx->newObject('Test\myTest');
$obj->set('name','');
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
return $output;
```

This will display:

> Please specify a name.

## See Also

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)
