---
title: "xPDOMinValueValidationRule"
_old_id: "1286"
_old_uri: "2.x/advanced-features/object-validation/xpdominvaluevalidationrule"
---

## What Does the Rule Do?

This rule compares the numeric value of a field with a minimum given by the `value` attribute in the schema.

::: danger
`xPDOMinValueValidationRule` never fails validation in xPDO 3.x. Its `isValid()` method computes the comparison and adds the message, but does not return the result, so the rule scores as passed. `xPDOValidator::validate()` returns `true` even when the minimum is not met.

The message is still written to `getMessages()`, so a caller that inspects the messages unconditionally sees it, while a caller that only checks the return value of `validate()` does not. Use the `callable` rule below instead if you need a minimum.
:::

Without `value`, the minimum defaults to `0`.

## Working Alternative: a callable Rule

Declare the minimum as a `callable` rule, which returns its result correctly:

``` xml
<model package="Test" baseClass="xPDO\Om\xPDOObject" platform="mysql"
    defaultEngine="InnoDB" version="3.0">
    <object class="myTest" table="test" extends="xPDO\Om\xPDOSimpleObject">
        <field key="number" dbtype="int" precision="10"
            phptype="integer" default="0" null="false" />

        <validation>
            <rule field="number"
                name="myMinValRule"
                type="callable"
                rule="StoreFinder\Model\Validation\myMinValue"
                value="20"
                message="The number must be at least 20."
            />
        </validation>
    </object>
</model>
```

The rule attribute must be fully qualified, because a bare name is resolved against the `xPDO\Validation\` namespace.

``` php
<?php
namespace StoreFinder\Model\Validation;

class myMinValue {
    public function __invoke($value, $parameters) {
        return $value >= (int) $parameters['value'];
    }
}
```

Generate the model from the XML schema, then validate an object in a Snippet:

``` php
$output = '';
$modx->addPackage('Test', '/path/to/components/test/model/');
$obj = $modx->newObject('Test\myTest');
$obj->set('number', 12);
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= $errorMsg['message'];
    }
}
return $output;
```

This will display:

> The number must be at least 20.

## See Also

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)
