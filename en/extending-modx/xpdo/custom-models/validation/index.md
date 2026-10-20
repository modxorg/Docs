---
title: "Object Validation"
_old_id: "1198"
_old_uri: "2.x/advanced-features/object-validation"
---

## What is Object Validation in xPDO?

Object validation is done through `xPDO\Validation\xPDOValidator`, xPDO's validation class (MODX 3 swaps in `MODX\Revolution\Validation\modValidator`). It's automatically accessible from any `xPDOObject` via the [`getValidator()`](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator) method.

## How is it Done?

Validation rules can be declared in the XML schema of an object, or attached at run time through [`addValidationRule()`](extending-modx/xpdo/class-reference/xpdoobject). Either way, `xPDOValidator::validate()` executes them and collects failure messages.

## Example Usage

Rules are attached to a field, and the field must be declared in the same object. This model declares both `name` and `number`:

``` xml
<model package="Test" baseClass="xPDO\Om\xPDOObject" platform="mysql" defaultEngine="InnoDB" version="3.0">
    <object class="myTest" table="test" extends="xPDO\Om\xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255"
            phptype="string" default="" null="false" />
        <field key="number" dbtype="int" precision="10"
            phptype="integer" default="0" null="false" />

        <validation>
            <rule field="name"
                name="preventBlank"
                type="xPDOValidationRule"
                rule="xPDOMinLengthValidationRule"
                value="1"
                message="Please specify a name."
            />
        </validation>
    </object>
</model>
```

> [!WARNING]
> A rule whose `field` names a column that the object does not declare is dropped silently. `xPDOObject::addValidationRule()` looks the field up in the map first and keeps the rule only if the lookup succeeds, so validation then passes with no messages and no error.

Generate the model from the schema, then validate an object in a Snippet:

``` php
$output = '';
$modx->addPackage('Test', '/path/to/components/test/model/');
$obj = $modx->newObject('Test\myTest');
$obj->set('name','');
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= 'An error occurred on field "'.$errorMsg['field'].'": '.$errorMsg['message'];
    }
}
return $output;
```

This will output:

> An error occurred on field "name": Please specify a name.

Validation only runs on fields that were changed on the object. An untouched object has nothing to check and `validate()` returns `true`.

## Rules

There are three different types of rules: `callable`, `preg_match`, and `xPDOValidationRule`.

### The `callable` Rule

A callable rule runs a PHP function you pass. In the `rule` attribute you name a global function, or a static method as `Class::method`. You cannot pass an object instance, because the name lives in XML.

The function receives two parameters: the current value of the field, and an array of the remaining attributes on the `rule` element. Return `true` to pass, `false` to fail. For example, a model with a rule as such:

``` php
<rule field="number" name="callable2"
    type="callable" rule="myCallable"
    min="10" message="Value is too low. Must be 10 or more."
/>
```

Called with the code:

``` php
function myCallable($value, $parameters) {
    return $value >= $parameters['min'];
}
$obj->set('number', 5);
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= 'An error occurred on field "'.$errorMsg['field'].'": '.$errorMsg['message'].'<br />';
    }
}
```

Will return:

> An error occurred on field "number": Value is too low. Must be 10 or more.

When the `message` attribute is present, its text is what reaches `getMessages()`. Without it, the validator falls back to the rule name followed by `failed`, for example `callable2 failed`.

### The `preg_match` Rule

A `preg_match` rule is a regular expression that must match the field for the object to validate. This one checks that the field contains the string `php`:

``` php
<rule field="name" name="phpMatch"
    type="preg_match" rule="/php/i"
    message="Does not contain the string 'php'." />
```

And in the PHP:

``` php
$obj->set('name','test');
$validator = $obj->getValidator();
if (!$validator->validate()) {
    foreach ($validator->getMessages() as $errorMsg) {
        $output .= 'An error occurred on field "'.$errorMsg['field'].'": '.$errorMsg['message'].'<br />';
    }
}
```

This outputs:

> An error occurred on field "name": Does not contain the string 'php'.

A field that is `NULL` fails the rule without running the expression.

### The `xPDOValidationRule` Rule

An `xPDOValidationRule` rule delegates to a class that extends `xPDOValidationRule`. A name without a backslash is resolved against the `xPDO\Validation\` namespace, so `rule="xPDOMinLengthValidationRule"` and `rule="xPDO\Validation\xPDOMinLengthValidationRule"` are the same rule. Built-in rules:

1. [xPDOForeignKeyConstraint](extending-modx/xpdo/custom-models/validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](extending-modx/xpdo/custom-models/validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](extending-modx/xpdo/custom-models/validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](extending-modx/xpdo/custom-models/validation/xpdoobjectexistsvalidationrule)

See [Validation Rules](extending-modx/xpdo/custom-models/defining-a-schema/validators) for how to declare rules in a schema and write your own.

## See Also

- [xPDOValidator](extending-modx/xpdo/class-reference/xpdovalidator "xPDOValidator")