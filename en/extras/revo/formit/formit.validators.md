---
title: "FormIt.Validators"
_old_id: "866"
_old_uri: "revo/formit/formit.validators"
---

<div>- [Validation in FormIt](#FormIt.Validators-ValidationinFormIt)
- [Built-In Validators](#FormIt.Validators-BuiltInValidators)
- [Custom Validators](#FormIt.Validators-CustomValidators)
- [Custom Error Messages](#FormIt.Validators-CustomErrorMessages)
- [See Also](#FormIt.Validators-SeeAlso)
 
</div>Validation in FormIt
--------------------

<div class="info"> As of FormIt 2.2.9, all fields will automatically have `html_entities` applied. To allow HTML tags to be saved/stored, you will need to use the ` allowSpecialChars` validator on each field, that should save raw html tags. </div><div class="note"> As of FormIt 1.4.0, validation has changed. The old method of doing validation on the input names will still work until FormIt 2.0.0, when it will be removed. It is recommended to use the new way by using the &validate property. </div><div class="info"> As of FormIt 1.1.4, all fields will automatically have `stripTags` applied. To allow HTML tags to be saved/stored, you will need to use the `allowTags` validator on each field, stipulating which tags are permitted. </div> Validation can simply be done by adding the fields to validate to the &validate property on the Snippet call. For example, to make the username field required, you could do:

 ```
<pre class="brush: php">
[[!FormIt? &validate=`username:required`]]

``` Validators can also be "chained", or done in sucession. The following first checks to see if required, then strips all tags from the post:

 ```
<pre class="brush: php">
[[!FormIt? &validate=`text:required:stripTags`

``` Multiple fields and validators are separated by commas:

 ```
<pre class="brush: php">
[[!FormIt? &validate=`date:required:isDate=^%m/%d/%Y^,
    name:required:testFormItValidator,
    email:email:required,
    colors:required,
    subject:required,
    username:required:islowercase,
    message:stripTags,
    numbers:required`]]

``` FormIt allows you to split the validators on multiple lines if you so choose.

 Note: Don't use backticks ` inside a validate call. Use carets ^ instead:

 ```
<pre class="brush: php">
[[!FormIt? &validate=`date:required:isDate=^%m/%d/%Y^`]]

``` This will fix the call and cause it to work properly.

 A general error message for validators, useful if no errors are showing but validation is failing, is used with the following placeholder:

 ```
<pre class="brush: php">
[[!+fi.validation_error_message]]

``` This will contain a validation error message, which can be set using the &validationErrorMessage property, and using \[\[+errors\]\] in the property value, which will be replaced by all the field errors.

 Also, there is a 1/0 placeholder as well:

 ```
<pre class="brush: php">
[[!+fi.validation_error]]

```Built-In Validators
-------------------

 <table><tbody><tr><th> name </th> <th> function </th> <th> parameter </th> <th> example </th> </tr><tr><td> blank </td> <td> Is field blank? </td> <td> </td> <td> nospam:blank </td> </tr><tr><td> required </td> <td> Is field is not empty? </td> <td> </td> <td> username:required </td> </tr><tr><td> password\_confirm </td> <td> Does field match value of other field? </td> <td> The name of the password field </td> <td> password2:password\_confirm=^password^ </td> </tr><tr><td> email </td> <td> Is a valid email address? </td> <td> </td> <td> emailaddr:email </td> </tr><tr><td> minLength </td> <td> Is field at least X characters long? </td> <td> The min length. </td> <td> password:minLength=^6^ </td> </tr><tr><td> maxLength </td> <td> Is field no more than X characters long? </td> <td> The max length. </td> <td> password:maxLength=^12^ </td> </tr><tr><td> minValue </td> <td> Is field at least X? </td> <td> The minimum value. </td> <td> donation:minValue=^1^ </td> </tr><tr><td> maxValue </td> <td> Is field no higher than X? </td> <td> The maximum value. </td> <td> cost:maxValue=^1200^ </td> </tr><tr><td> contains </td> <td> Does field contain string X? </td> <td> The string X. </td> <td> title:contains=^Hello^ </td> </tr><tr><td> strip </td> <td> Strip a certain string from the field. </td> <td> The string to strip. </td> <td> message:strip=^badword^ </td> </tr><tr><td> stripTags </td> <td> Strip all HTML tags from the field. Note that this is on by default. </td> <td> An optional list of allowed tags. </td> <td> message:stripTags </td> </tr><tr><td> allowTags </td> <td> Don't strip HTML tags in the field. Note that this is off by default. </td> <td> </td> <td> content:allowTags </td> </tr><tr><td> isNumber </td> <td> Is the field a numeric value? </td> <td> </td> <td> cost:isNumber </td> </tr><tr><td> allowSpecialChars </td> <td> Don't replace HTML special chars with their entities. Note that this is off by default. </td> <td> </td> <td> message:allowSpecialChars </td> </tr><tr><td> isDate </td> <td> Is the field a date? </td> <td> An optional format to format the date. </td> <td> startDate:isDate=^%Y-%m-%d^ </td> </tr><tr><td> regexp </td> <td> Does field match an expected format? </td> <td> A valid regular expression to match against. </td> <td> secretPin:regexp=^/\[0-9\]{4}/^ </td></tr></tbody></table>Custom Validators
-----------------

 Validators can also be custom [Snippets](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets"). You can do this by simply specifying the snippet name in the customValidators property:

 ```
<pre class="brush: php">
[[!FormIt? &customValidators=`isBigEnough`]]

```<div class="note"> As of FormIt 1.2.0, all custom validators **must** be specified in the customValidators property, or they will not be run. </div> And then as a validator on the &validate property:

 ```
<pre class="brush: php">
[[!FormIt? &validate=`cost:isBigEnough`]]

``` Then in your Snippet, "isBigEnough":

 ```
<pre class="brush: php">
<?php
$value = (float)$value;
$success = $value > 1000;
if (!$success) {
  // Note how we can add an error to the field here.
  $validator->addError($key,'Not big enough!');
}
return $success;
?>

``` The Validator will send the following properties to the snippet, in the $scriptProperties array:

 <table><tbody><tr><th> name </th> <th> function </th> </tr><tr><td> key </td> <td> The key of the field being validated. </td> </tr><tr><td> value </td> <td> The value of the field that was POSTed. </td> </tr><tr><td> param </td> <td> If a parameter was specified for the validator, this is it. </td> </tr><tr><td> type </td> <td> The name of the validator (or snippet) </td> </tr><tr><td> validator </td> <td> A reference to the fiValidator class instance. </td></tr></tbody></table>Custom Error Messages
---------------------

 As of FormIt 2.0-pl, you can override the error messages displayed by the validators, by sending the appropriate property:

 <table><tbody><tr><th> validator </th> <th> property </th> </tr><tr><td> blank </td> <td> vTextBlank </td> </tr><tr><td> required </td> <td> vTextRequired </td> </tr><tr><td> password\_confirm </td> <td> vTextPasswordConfirm </td> </tr><tr><td> email </td> <td> vTextEmailInvalid, vTextEmailInvalidDomain </td> </tr><tr><td> minLength </td> <td> vTextMinLength </td> </tr><tr><td> maxLength </td> <td> vTextMaxLength </td> </tr><tr><td> minValue </td> <td> vTextMinValue </td> </tr><tr><td> maxValue </td> <td> vTextMaxValue </td> </tr><tr><td> contains </td> <td> vTextContains </td> </tr><tr><td> isNumber </td> <td> vTextIsNumber </td> </tr><tr><td> isDate </td> <td> vTextIsDate </td> </tr><tr><td> regexp </td> <td> vTextRegexp </td></tr></tbody></table> You can also specify the message per-field by prefixing the field key in the property. For example, to override the "required" validator message, simply pass in your FormIt call:

 ```
<pre class="brush: php">
[[!FormIt?
  &vTextRequired=`Please enter a value for this field.`
  &subject.vTextRequired=`Please enter a subject.`
]]

``` This will use the &subject.vTextRequired for the subject field, and then fallback to the &vTextRequired message for all other fields.

See Also
--------

1. [FormIt.Hooks](/extras/revo/formit/formit.hooks)
  1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
  2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
  3. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
  4. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
  5. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
  6. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)
2. [FormIt.Validators](/extras/revo/formit/formit.validators)
3. [FormIt.FormItRetriever](/extras/revo/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](/extras/revo/formit/formit.tutorials-and-examples)
  1. [FormIt.Examples.Custom Hook](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
  2. [FormIt.Examples.Simple Contact Page](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
  3. [FormIt.Handling Selects, Checkboxes and Radios](/extras/revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
  4. [FormIt.Using a Blank NoSpam Field](/extras/revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
5. [FormIt.Roadmap](/extras/revo/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](/extras/revo/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](/extras/revo/formit/formit.formitstateoptions)