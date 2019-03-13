---
title: "Validation Rules"
_old_id: "1692"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/validation-rules-in-your-schema"
---

## Overview

 Your XML schema can define validation rules using nodes in the XML that follow this pattern

 ``` xml 
<validation>
    <rule field="$name_of_field" 
        name="$name_of_rule" 
        type="callback|preg_match|xPDOValidationRule" 
        rule="$various" 
        value="$optional_parameter"
        message="string" />
</validation>
```

 The **rule** may have have these attributes:

- **field**: the field's name. _(required)_
- **name**: a unique name for this validation rule. You can have multiple validation rules for each field. _(required)_
- **type**: can be "callback", "preg\_match" or "xPDOValidationRule" _(required)_
- **rule**: varies depending on the type. For type=callback, this will be the name of the callback function. For type=preg\_match, this will be the regular expression. For type=xPDOValidationRule, a valid child class must be supplied. _(required)_
- **value**: an optional argument to pass to the validation functions, e.g. when the type is `xPDOValidationRule` and the rule is a class that extends it. _(optional)_
- **message**: this is a string describing the the validation rule if it fails. _(required)_ In MODX 2+, the message field contains a lexicon string which can provide language specific message translations.
  
``` xml 
<rule field="category" name="preventBlank" type="xPDOValidationRule" rule="xPDOMinLengthValidationRule" value="1" message="category_err_ns_name" />

```

## Regex Validation

 Let's take this example from the modChunk schema:

 ``` xml 
    <object class="modChunk" table="site_htmlsnippets" extends="modElement">
        <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
        <!-- ... more fields here -->
        <validation>
            <rule field="name" name="invalid" type="preg_match" rule="/^(?!\s)[a-zA-Z0-9\x2d-\x2f\x7f-\xff_-\s]+(?!\s)$/" message="chunk_err_invalid_name" />
        </validation>
    </object>
```

## Callback Validation

 You can use your own functions for validation purposes by using "callback" as the type -- this relies on PHP's [call\_user\_func()](http://php.net/manual/en/function.call-user-func.php) function. Because the function name is defined in XML where it is impossible to reference an object instance, you can only reference a regular PHP function like `my_function` or a static class method, e.g. `MyClass::myFunction`. Likewise, you cannot pass parameters to these functions (?).

## xPDOValidationRule Validation

 This is how you can tie-into the built-in MODX validation rules. See the classes available inside the `core/xpdo/validation/xpdovalidator.class.php` file:

- **xPDOMinLengthValidationRule**
- **xPDOMaxLengthValidationRule**
- **xPDOMinValueValidationRule**
- **xPDOMaxValueValidationRule**
- **xPDOObjectExistsValidationRule**
- **xPDOForeignKeyConstraint**

 For example, look a the the rule defined for the `modContentType`

 ``` xml 
    <object class="modContentType" table="content_type" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" index="unique" />
        <!-- ... more fields here ... -->
        <validation>
            <rule field="name" name="name" type="xPDOValidationRule" rule="xPDOMinLengthValidationRule" value="1" message="content_type_err_ns_name" />
        </validation>
    </object>
```

## Using xPDOValidator

 You can use the xPDOValidator to pre-validate the current state of an `xPDOObject` or you can allow `save()` to call validation (see `xPDO::OPT_VALIDATE_ON_SAVE`) itself and fail if validation fails.

 An example of pre-validation from MODX Revolution's `modObjectCreateProcessor` class:

 ``` php 
/* run object validation */
if (!$this->object->validate()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'],$this->modx->lexicon($message['message']));
        }
    }
}
```

 An example of examining the validation messages after `save()` failure from MODX Revolution's `modError` class:

 ``` php 
/* save object and report validation errors */
if (!$this->object->save()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'],$this->modx->lexicon($message['message']));
        }
    }
}
```

### Writing Your Own Validation Rules

If you want to write your own validation rules, you need to create a PHP class file inside of your namespace's model folder _for each validation rule you define_, e.g. `core/components/my_pkg/model/my_pkg/my_validation_rule.class.php`. The name should be all lowercase and include a `.class.php` extension. This is how xPDO knows how to find your class file (this is xPDO's "autoload-like" convention).

Let's look at a Custom Resource Class (CRC) that does not want to be nested under other CRC's -- it wants as its parent only the built-in MODX classes (modDocument, a WebLink, etc). Here's its XML schema definition:

 ``` xml 
    <object class="MyCRC" extends="modResource">
        <composite alias="Things" cardinality="many" class="Things" foreign="parent" local="id" owner="local"></composite>
        <validation>
          <rule field="parent" message="Invalid parent" name="parent" rule="NormalParents" type="xPDOValidationRule"></rule>
        </validation>
    </object>
```

And here's the corresponding validation rule from `core/components/my_pkg/model/my_pkg/normalparents.class.php`:

 ``` php 
<?php /**
 * @param mixed $value candidate value
 * @param array $options from the XML schema
 * @return boolean false on failed validation, true on pass
 */
class NormalParents extends xPDOValidationRule {
    public function isValid($value, array $options = array()) {
        parent::isValid($value, $options);
        $result = false;
        $obj=& $this-?>validator->object;
        $xpdo=& $obj->xpdo;
                $xpdo->log(1, 'Running TaxonomyParents Validation rule');
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
