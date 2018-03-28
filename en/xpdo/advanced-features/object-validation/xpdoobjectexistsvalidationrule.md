---
title: "xPDOObjectExistsValidationRule"
_old_id: "1288"
_old_uri: "2.x/advanced-features/object-validation/xpdoobjectexistsvalidationrule"
---

## What Does the Rule Do?

This rule checks to see if another object exists. If that object doesn't exist, then the validation on this current object fails. The object can be specified by stating the "classKey" and "pk" values in the rule schema definition.

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
                  name="chunkExists"
                  type="xPDOValidationRule"
                  rule="xPDOObjectExistsValidationRule"
                  pk="12"
                  classKey="modChunk"
                  message="The Chunk does not exist, so this object cannot be saved."
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
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
```

This will display:

> The Chunk does not exist, so this object cannot be saved.

## See Also

1. [xPDOForeignKeyConstraint](/xpdo/2.x/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](/xpdo/2.x/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](/xpdo/2.x/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](/xpdo/2.x/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](/xpdo/2.x/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](/xpdo/2.x/advanced-features/object-validation/xpdoobjectexistsvalidationrule)