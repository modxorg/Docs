---
title: "xPDOObjectExistsValidationRule"
_old_id: "1288"
_old_uri: "2.x/advanced-features/object-validation/xpdoobjectexistsvalidationrule"
---

## What Does the Rule Do?

This rule checks whether another object exists. If that object doesn't exist, validation on the current object fails. The object is specified by the `className` and `pk` attributes in the rule schema definition.

> [!NOTE]
> `pk` is a fixed value written into the schema, not a reference to a field of the object being validated. The rule therefore always checks the same row, which is rarely what you want. To validate the current object's field, use the `xPDOForeignKeyConstraint` rule instead.

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
                name="chunkExists"
                type="xPDOValidationRule"
                rule="xPDOObjectExistsValidationRule"
                pk="12"
                className="MODX\Revolution\modChunk"
                message="The Chunk does not exist, so this object cannot be saved."
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
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
return $output;
```

This will display:

> The Chunk does not exist, so this object cannot be saved.

## See Also

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)