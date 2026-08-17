---
title: "Validation Rules"
_old_id: "1692"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/validation-rules-in-your-schema"
description: "Define field validation rules in an xPDO XML schema (callable, preg_match, xPDOValidationRule)"
---

## Overview

Your XML schema can define validation rules with nodes that follow this pattern:

``` xml
<validation>
    <rule
        field="$name_of_field"
        name="$name_of_rule"
        type="callable|preg_match|xPDOValidationRule"
        rule="$various"
        value="$optional_parameter"
        message="string"
    />
</validation>
```

The **rule** element may use these attributes:

- **field**: field name _(required)_
- **name**: unique name for this rule. You can attach several rules to one field _(required)_
- **type**: must be `callable`, `preg_match`, or `xPDOValidationRule` _(required)_. Use `callable`, not `callback`. Older docs and samples sometimes said `callback`; xPDO’s validator only recognizes `callable` (see `xPDOValidator` in Revolution 3.x under `core/vendor/xpdo/.../Validation/`)
- **rule**: depends on **type**. For `callable`, the PHP function or `Class::method` name. For `preg_match`, the regular expression. For `xPDOValidationRule`, a class that extends `xPDOValidationRule` _(required)_
- **value**: optional argument for some `xPDOValidationRule` classes _(optional)_
- **message**: failure message _(required)_. In MODX 2+, this is often a lexicon key for translated strings

``` xml
<rule
    field="category"
    name="preventBlank"
    type="xPDOValidationRule"
    rule="xPDOMinLengthValidationRule"
    value="1"
    message="category_err_ns_name"
/>
```

## Regex Validation

Example from the `modChunk` schema:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
    <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
    <!-- ... more fields ... -->
    <validation>
        <rule
            field="name"
            name="invalid"
            type="preg_match"
            rule="/^(?!\s)[a-zA-Z0-9\x2d-\x2f\x7f-\xff_-\s]+(?!\s)$/"
            message="chunk_err_invalid_name"
        />
    </validation>
</object>
```

## Callable Validation

Set `type="callable"` to run your own PHP function through [`call_user_func_array()`](https://www.php.net/manual/en/function.call-user-func-array.php). The name lives in XML, so you cannot reference an object instance. Use a global function (`my_function`) or a static method (`MyClass::myFunction`). See also [The callable Rule](extending-modx/xpdo/custom-models/validation#the-callable-rule).

## xPDOValidationRule Validation

Built-in rules ship with xPDO under `core/vendor/xpdo/xpdo/src/xPDO/Validation/` (Revolution 3.x). Common classes:

- `xPDOMinLengthValidationRule`
- `xPDOMaxLengthValidationRule`
- `xPDOMinValueValidationRule`
- `xPDOMaxValueValidationRule`
- `xPDOObjectExistsValidationRule`
- `xPDOForeignKeyConstraint`

Example from `modContentType`:

``` xml
<object class="modContentType" table="content_type" extends="xPDOSimpleObject">
    <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" index="unique" />
    <!-- ... more fields ... -->
    <validation>
        <rule
            field="name"
            name="name"
            type="xPDOValidationRule"
            rule="xPDOMinLengthValidationRule"
            value="1"
            message="content_type_err_ns_name"
        />
    </validation>
</object>
```

## Using xPDOValidator

You can pre-validate an `xPDOObject` with the validator, or let `save()` validate when `xPDO::OPT_VALIDATE_ON_SAVE` is enabled.

Pre-validation pattern from Revolution’s `modObjectCreateProcessor`:

``` php
if (!$this->object->validate()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
        }
    }
}
```

After a failed `save()`:

``` php
if (!$this->object->save()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
        }
    }
}
```

### Writing Your Own Validation Rules

For a custom `xPDOValidationRule` subclass, add one PHP class file per rule under your package model folder, for example `core/components/my_pkg/model/my_pkg/normalparents.class.php`. Use a lowercase filename with a `.class.php` extension so xPDO can find the class.

Schema snippet for a Custom Resource Class that only allows built-in parents:

``` xml
<object class="MyCRC" extends="modResource">
    <composite alias="Things" cardinality="many" class="Things" foreign="parent" local="id" owner="local"></composite>
    <validation>
        <rule
            field="parent"
            message="Invalid parent"
            name="parent"
            rule="NormalParents"
            type="xPDOValidationRule"
        />
    </validation>
</object>
```

Matching rule class:

``` php
<?php
/**
 * @param mixed $value candidate value
 * @param array $options from the XML schema
 * @return boolean false on failed validation, true on pass
 */
class NormalParents extends xPDOValidationRule
{
    public function isValid($value, array $options = array())
    {
        parent::isValid($value, $options);
        $result = false;
        $obj = &$this->validator->object;
        $xpdo = &$obj->xpdo;
        $xpdo->log(xPDO::LOG_LEVEL_INFO, 'Running NormalParents validation rule');
        $validParentClasses = array('modDocument', 'modWebLink', 'modSymLink', 'modStaticResource');
        if ($obj->get('parent') === 0 || ($obj->Parent && in_array($obj->Parent->class_key, $validParentClasses))) {
            $result = true;
        }
        if ($result === false) {
            $this->validator->addMessage($this->field, $this->name, $this->message);
        }

        return $result;
    }
}
```

## See Also

- [Object Validation](extending-modx/xpdo/custom-models/validation)
- [xPDOValidator](extending-modx/xpdo/class-reference/xpdovalidator)
