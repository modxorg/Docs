---
title: "xPDOObjectExistsValidationRule"
translation: "extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule"
---

## Что делает правило?

Это правило проверяет, существует ли другой объект. Если объекта нет, валидация текущего объекта не проходит. Объект задают значениями `classKey` и `pk` в определении правила в схеме.

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

Сгенерируйте модель из XML-схемы. Затем в сниппете вызовите Test:

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

Будет выведено:

> The Chunk does not exist, so this object cannot be saved.

## Смотрите также

1. [xPDOForeignKeyConstraint](xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)
