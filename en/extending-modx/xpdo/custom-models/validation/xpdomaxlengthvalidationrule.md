---
title: "xPDOMaxLengthValidationRule"
_old_id: "1283"
_old_uri: "2.x/advanced-features/object-validation/xpdomaxlengthvalidationrule"
---

## What Does the Rule Do?

This rule verifies that a field has less than X number of chars, where X is defined by the "value" attribute in the XML schema.

## Using the Rule

First, our model:

``` xml 
<model package="test" baseClass="xPDOObject" platform="mysql"
       defaultEngine="MyISAM" tablePrefix="test_">    
    <object class="myTest" table="test" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255"
               phptype="string" default="" null="false" />
                
        <validation>
            <rule field="name" 
                  name="myMaxLenRule"
                  type="xPDOValidationRule"
                  rule="xPDOMaxLengthValidationRule"
                  value="10"
                  message="The name must be less than 10 characters."
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
$obj->set('name','This is a really long string that will fail.');
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
```

This will display:

> The name must be less than 10 characters.

## See Also

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)