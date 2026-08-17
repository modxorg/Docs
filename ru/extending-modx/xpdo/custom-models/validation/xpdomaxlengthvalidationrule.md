---
title: "xPDOMaxLengthValidationRule"
translation: "extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule"
---

## Что делает правило?

Это правило проверяет, что в поле меньше X символов, где X задаётся атрибутом `value` в XML-схеме.

## Использование правила

Сначала модель:

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

Сгенерируйте модель из XML-схемы. Затем в сниппете вызовите Test:

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

Будет выведено:

> The name must be less than 10 characters.

## Смотрите также

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)
