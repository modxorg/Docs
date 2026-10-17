---
title: "xPDOForeignKeyConstraint"
_old_id: "1274"
_old_uri: "2.x/advanced-features/object-validation/xpdoforeignkeyconstraint"
---

## What Does the Rule Do?

This rule tests the validity of a foreign key for a defined relationship. It resolves the relationship from the `<aggregate>` or `<composite>` declared on the object, so the rule only needs the `alias` of that relationship; it does not read `foreign`, `local` or `class` attributes of its own.

## Using the Rule

Here we want to make sure no category ID is assigned to our object that doesn't have a category that exists.

First, our model:

``` xml
<model package="Test" baseClass="xPDO\Om\xPDOObject" platform="mysql"
    defaultEngine="InnoDB" version="3.0">
    <object class="myTest" table="test" extends="xPDO\Om\xPDOSimpleObject">
        <field key="category" dbtype="int" precision="10" attributes="unsigned"
            phptype="integer" default="0" null="false" index="index" />

        <validation>
            <rule field="category"
                name="preventBlank"
                type="xPDOValidationRule"
                rule="xPDOForeignKeyConstraint"
                alias="Category"
                message="The category specified does not exist."
            />
        </validation>

        <aggregate alias="Category" class="MODX\Revolution\modCategory"
            local="category" foreign="id"
            cardinality="one" owner="foreign" />
    </object>
</model>
```

From there, go ahead and generate the model from the XML schema. And now in a Snippet we'll call Test:

``` php
$output = '';
$modx->addPackage('Test', '/path/to/components/test/model/');
$obj = $modx->newObject('Test\myTest');
$obj->set('category', 123);
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
return $output;
```

This will display, assuming that a category doesn't exist with ID '123':

> The category specified does not exist.

## See Also

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)