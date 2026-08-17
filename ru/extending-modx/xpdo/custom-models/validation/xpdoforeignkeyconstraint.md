---
title: "xPDOForeignKeyConstraint"
translation: "extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint"
---

## Что делает правило?

Это правило проверяет валидность внешнего ключа для определённого отношения.

## Использование правила

Здесь нужно убедиться, что объекту не назначен ID категории, для которой категории не существует.

Сначала модель:

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

Сгенерируйте модель из XML-схемы. Затем в сниппете вызовите Test:

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

Если категории с ID `123` нет, будет выведено:

> The category specified does not exist.

Аналогично в схеме можно было бы указать поле `name` как атрибут `foreign`, если бы поле category объекта myTest задавали этим именем.

## Смотрите также

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)
