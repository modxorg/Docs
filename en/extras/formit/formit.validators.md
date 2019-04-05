---
title: "Validators"
_old_id: "866"
_old_uri: "revo/formit/formit.validators"
---

## Validation in FormIt

 As of FormIt 2.2.9, all fields will automatically have `html_entities` applied. To allow HTML tags to be saved/stored, you will need to use the ` allowSpecialChars` validator on each field, that should save raw html tags. 

 As of FormIt 1.4.0, validation has changed. The old method of doing validation on the input names will still work until FormIt 2.0.0, when it will be removed. It is recommended to use the new way by using the &validate property. 

 As of FormIt 1.1.4, all fields will automatically have `stripTags` applied. To allow HTML tags to be saved/stored, you will need to use the `allowTags` validator on each field, stipulating which tags are permitted. 

 Validation can simply be done by adding the fields to validate to the &validate property on the Snippet call. For example, to make the username field required, you could do:

 ``` php 
[[!FormIt? &validate=`username:required`]]
```

 Validators can also be "chained", or done in sucession. The following first checks to see if required, then strips all tags from the post:

 ``` php 
[[!FormIt? &validate=`text:required:stripTags`
```

 Multiple fields and validators are separated by commas:

 ``` php 
[[!FormIt? &validate=`date:required:isDate=^%m/%d/%Y^,
    name:required:testFormItValidator,
    email:email:required,
    colors:required,
    subject:required,
    username:required:islowercase,
    message:stripTags,
    numbers:required`]]
```

 FormIt allows you to split the validators on multiple lines if you so choose.

 Note: Don't use backticks ` inside a validate call. Use carets ^ instead:

 ``` php 
[[!FormIt? &validate=`date:required:isDate=^%m/%d/%Y^`]]
```

 This will fix the call and cause it to work properly.

 A general error message for validators, useful if no errors are showing but validation is failing, is used with the following placeholder:

 ``` php 
[[!+fi.validation_error_message]]
```

 This will contain a validation error message, which can be set using the &validationErrorMessage property, and using \[\[+errors\]\] in the property value, which will be replaced by all the field errors.

 Also, there is a 1/0 placeholder as well:

 ``` php 
[[!+fi.validation_error]]
```

## Built-In Validators

 | name              | function                                                                                | parameter                                    | example                                |
 | ----------------- | --------------------------------------------------------------------------------------- | -------------------------------------------- | -------------------------------------- |
 | blank             | Is field blank?                                                                         |                                              | nospam:blank                           |
 | required          | Is field is not empty?                                                                  |                                              | username:required                      |
 | password\_confirm | Does field match value of other field?                                                  | The name of the password field               | password2:password\_confirm=^password^ |
 | email             | Is a valid email address?                                                               |                                              | emailaddr:email                        |
 | minLength         | Is field at least X characters long?                                                    | The min length.                              | password:minLength=^6^                 |
 | maxLength         | Is field no more than X characters long?                                                | The max length.                              | password:maxLength=^12^                |
 | minValue          | Is field at least X?                                                                    | The minimum value.                           | donation:minValue=^1^                  |
 | maxValue          | Is field no higher than X?                                                              | The maximum value.                           | cost:maxValue=^1200^                   |
 | contains          | Does field contain string X?                                                            | The string X.                                | title:contains=^Hello^                 |
 | strip             | Strip a certain string from the field.                                                  | The string to strip.                         | message:strip=^badword^                |
 | stripTags         | Strip all HTML tags from the field. Note that this is on by default.                    | An optional list of allowed tags.            | message:stripTags                      |
 | allowTags         | Don't strip HTML tags in the field. Note that this is off by default.                   |                                              | content:allowTags                      |
 | isNumber          | Is the field a numeric value?                                                           |                                              | cost:isNumber                          |
 | allowSpecialChars | Don't replace HTML special chars with their entities. Note that this is off by default. |                                              | message:allowSpecialChars              |
 | isDate            | Is the field a date?                                                                    | An optional format to format the date.       | startDate:isDate=^%Y-%m-%d^            |
 | regexp            | Does field match an expected format?                                                    | A valid regular expression to match against. | secretPin:regexp=^/\[0-9\]{4}/^        |

## Custom Validators

 Validators can also be custom [Snippets](developing-in-modx/basic-development/snippets "Snippets"). You can do this by simply specifying the snippet name in the customValidators property:

 ``` php 
[[!FormIt? &customValidators=`isBigEnough`]]
```

 As of FormIt 1.2.0, all custom validators **must** be specified in the customValidators property, or they will not be run. 

 And then as a validator on the &validate property:

 ``` php 
[[!FormIt? &validate=`cost:isBigEnough`]]
```

 Then in your Snippet, "isBigEnough":

 ``` php 
<?php
$value = (float)$value;
$success = $value > 1000;
if (!$success) {
  // Note how we can add an error to the field here.
  $validator->addError($key,'Not big enough!');
}
return $success;
?>
```

 The Validator will send the following properties to the snippet, in the $scriptProperties array:

 | name      | function                                                    |
 | --------- | ----------------------------------------------------------- |
 | key       | The key of the field being validated.                       |
 | value     | The value of the field that was POSTed.                     |
 | param     | If a parameter was specified for the validator, this is it. |
 | type      | The name of the validator (or snippet)                      |
 | validator | A reference to the fiValidator class instance.              |

## Custom Error Messages

 As of FormIt 2.0-pl, you can override the error messages displayed by the validators, by sending the appropriate property:

 | validator         | property                                   |
 | ----------------- | ------------------------------------------ |
 | blank             | vTextBlank                                 |
 | required          | vTextRequired                              |
 | password\_confirm | vTextPasswordConfirm                       |
 | email             | vTextEmailInvalid, vTextEmailInvalidDomain |
 | minLength         | vTextMinLength                             |
 | maxLength         | vTextMaxLength                             |
 | minValue          | vTextMinValue                              |
 | maxValue          | vTextMaxValue                              |
 | contains          | vTextContains                              |
 | isNumber          | vTextIsNumber                              |
 | isDate            | vTextIsDate                                |
 | regexp            | vTextRegexp                                |

 You can also specify the message per-field by prefixing the field key in the property. For example, to override the "required" validator message, simply pass in your FormIt call:

 ``` php 
[[!FormIt?
  &vTextRequired=`Please enter a value for this field.`
  &subject.vTextRequired=`Please enter a subject.`
]]
```

 This will use the &subject.vTextRequired for the subject field, and then fallback to the &vTextRequired message for all other fields.

## See Also

1. [FormIt.Hooks](/extras/formit/formit.hooks)
  1. [FormIt.Hooks.email](/extras/formit/formit.hooks/formit.hooks.email)
  2. [FormIt.Hooks.FormItAutoResponder](/extras/formit/formit.hooks/formit.hooks.formitautoresponder)
  3. [FormIt.Hooks.math](/extras/formit/formit.hooks/formit.hooks.math)
  4. [FormIt.Hooks.recaptcha](/extras/formit/formit.hooks/formit.hooks.recaptcha)
  5. [FormIt.Hooks.redirect](/extras/formit/formit.hooks/formit.hooks.redirect)
  6. [FormIt.Hooks.spam](/extras/formit/formit.hooks/formit.hooks.spam)
2. [FormIt.Validators](/extras/formit/formit.validators)
3. [FormIt.FormItRetriever](/extras/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](/extras/formit/formit.tutorials-and-examples)
  7. [FormIt.Examples.Custom Hook](/extras/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
  8. [FormIt.Examples.Simple Contact Page](/extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
  9. [FormIt.Handling Selects, Checkboxes and Radios](/extras/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
  10. [FormIt.Using a Blank NoSpam Field](/extras/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
5. [FormIt.Roadmap](/extras/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](/extras/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](/extras/formit/formit.formitstateoptions)