---
title: "xPDOMaxValueValidationRule"
translation: "extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule"
---

## Что делает правило?

## Использование правила

Сначала модель:

``` xml
<model package="test" baseClass="xPDOObject" platform="mysql"
       defaultEngine="MyISAM" tablePrefix="test_">
    <object class="myTest" table="test" extends="xPDOSimpleObject">
        <field key="number" dbtype="int" precision="10"
               phptype="integer" default="0" null="false" />

        <validation>
            <rule field="name"
                  name="myMaxValRule"
                  type="xPDOValidationRule"
                  rule="xPDOMaxValueValidationRule"
                  value="100"
                  message="The number cannot be greater than 100."
             />
        </validation>
    </object>
</model>
```

Сгенерируйте модель из XML-схемы. Затем в сниппете вызовите Test:

``` php
$output = '';
$modx->addPackage('test','/path/to/my/test/model/','test_');
$obj = $modx->newObject('myTest');
$obj->set('number',101);
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
```

Будет выведено:

> The number cannot be greater than 100.

## Смотрите также

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)
