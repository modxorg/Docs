---
title: "FormIt.Using a Blank NoSpam Field"
_old_id: "865"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field"
---

## Using a Blank No-Spam Field

Often, spambots fill every form field to pass validation. Thus, a good way to prevent spam is to add a field in your form and require it to be blank for submission to succeed.

FormIt provides you with the "blank" validator, which can be used to achieve a "nospam" field.

## Setup

Simply add the following input into your form. You can change the name of the field at any time; using commonly used field names like "workemail" can be used to trick spambots into filling in the field:

``` html
<input type="hidden" name="workemail" value="" />
```

Then, in your FormIt call, add the blank validation:

 ``` php
[[!FormIt? &validate=`workemail:blank`]]
```

If you wish to provide an error message to be displayed, you can do so in the normal FormIt syntax (this example would be `[[+fi.error.workemail]]`).

Make sure not to use an existing field name in your form for the nospam field! This will prevent FormIt from processing your form.

## See Also

1. [FormIt.Examples.Custom Hook](extras/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
2. [FormIt.Examples.Simple Contact Page](extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
3. [FormIt.Handling Selects, Checkboxes and Radios](extras/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
4. [FormIt.Using a Blank NoSpam Field](extras/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
