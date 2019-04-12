---
title: "xPDOForeignKeyConstraint"
_old_id: "1274"
_old_uri: "2.x/advanced-features/object-validation/xpdoforeignkeyconstraint"
---

## What Does the Rule Do?

This rule tests the validity of a foreign key for a defined relationship.

## Using the Rule

Here we want to make sure no category ID is assigned to our object that doesnt have a category that exists.

First, our model:

``` xml
<model package="test" baseClass="xPDOObject" platform="mysql"
       defaultEngine="MyISAM" tablePrefix="test_">
    <object class="myTest" table="test" extends="xPDOSimpleObject">
        <field key="category" dbtype="int" precision="10" attributes="unsigned"
               phptype="integer" default="0" null="false" index="index" />

        <validation>
            <rule field="name"
                  name="preventBlank"
                  type="xPDOValidationRule"
                  rule="xPDOForeignKeyConstraint"
                  foreign="id"
                  local="category"
                  alias="Category"
                  class="modCategory"
                  message="The category specified does not exist."
             />
        </validation>

        <aggregate alias="Category" class="modCategory"
                   local="category" foreign="id"
                   cardinality="one" owner="foreign" />
    </object>
</model>
```

From there, go ahead and generate the model from the XML schema. And now in a Snippet we'll call Test:

``` php
$output = '';
$modx->addPackage('test','/path/to/my/test/model/','test_');
$obj = $modx->newObject('myTest');
$obj->set('category',123);
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
```

This will display, assuming that a category doesn't exist with ID '123':

> The category specified does not exist.

Similarly, we could have used the 'name' field as the "foreign" attribute in our schema, if we were setting our myTest object's category field to that name.

## See Also

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)
