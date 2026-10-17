---
title: "xPDOMaxLengthValidationRule"
_old_id: "1283"
_old_uri: "2.x/advanced-features/object-validation/xpdomaxlengthvalidationrule"
---

## What Does the Rule Do?

This rule verifies that a field is X characters long or fewer, where X is the `value` attribute in the XML schema. A value of `0` disables the check: every value passes.

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
                name="myMaxLenRule"
                type="xPDOValidationRule"
                rule="xPDOMaxLengthValidationRule"
                value="10"
                message="The name must be 10 characters or fewer."
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
$obj->set('name','This is a really long string that will fail.');
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
return $output;
```

This will display:

> The name must be 10 characters or fewer.

## See Also

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)
