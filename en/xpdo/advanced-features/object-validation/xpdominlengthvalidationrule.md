---
title: "xPDOMinLengthValidationRule"
_old_id: "1285"
_old_uri: "2.x/advanced-features/object-validation/xpdominlengthvalidationrule"
---

## What Does the Rule Do?

This rule verifies that the field is at least X number of characters long, where X is defined by the "value" field in the schema.

## Using the Rule

First, our model:

``` php 
<model package="test" baseClass="xPDOObject" platform="mysql"
       defaultEngine="MyISAM" tablePrefix="test_">    
    <object class="myTest" table="test" extends="xPDOSimpleObject">
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

From there, go ahead and generate the model from the XML schema. And now in a Snippet we'll call Test:

``` php 
$output = '';
$modx->addPackage('test','/path/to/my/test/model/','test_');
$obj = $modx->newObject('myTest');
$obj->set('name','');
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
```

This will display:

> Please specify a name.

## See Also

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)