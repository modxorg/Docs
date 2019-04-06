---
title: "FormIt.Examples.Custom Hook"
_old_id: "850"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook"
---

Often, a form submission should include various logging information such as the visitor's IP address or date the form was submitted. You could print this information as hidden fields in your form, but in this example, we'll show you how to add those values via a custom hook.

We'll base this off of a generic contact form as outlined in the [Contact Page](extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page "FormIt.Examples.Simple Contact Page") example.

## Snippet Tag

The only thing we need to add to the basic call here is a new **hook**: we've added a hook named **customhook**

``` php 
[[!FormIt?
   &hooks=`spam,customhook,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &validate=`name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
]]
```

## customhook Snippet

The name of the hook corresponds to the name of a Snippet. So we create a Snippet named **customhook**. It's useful when writing a custom hook to do some testing first, to make sure it is firing. Since the custom hook is only supposed to _return_ either a true or false value, it's not easy to print out debugging information. Instead, we can write something to the MODx log using the [$modx->log()](http://rtfm.modx.com/display/xPDO20/xPDO.log) function.

Remember you must return **true** if you want to consider your form validated! Here's our sample code for our new **customhook** Snippet:

### Testing

The first thing you'll want to do when writing a custom hook is test it to make sure it is executing.

``` php 
<?php
$modx->log(xPDO::LOG_LEVEL_ERROR,'Testing my custom hook.');
return true;  //<-- if you omit this or return false, your form won't validate
```

Save your Snippet, and try submitting your form. Check the MODx system log (**Reports --> Error Log**) to ensure that your Snippet fired. You should see something like this in the logs:

``` php 
[2011-10-24 11:23:20] (ERROR @ /index.php) Testing my custom hook.
```

### Setting Values

One common thing for custom hooks to do is to calculate new field values – this emulates having a hidden field on the form. For example, your **customhook** Snippet can set a datestamp for when the form was submitted.

``` php 
<?php
$datestamp = date('Y-m-d H:i:s');
$hook->setValue('datestamp_submitted', $datestamp);
return true;
```

Once you have saved this, you can update your **MyEmailChunk** chunk to include the new information, e.g.

**MyEmailChunk**:

``` php 
[[+name]] ([[+email]]) <br/>

Date Submitted: [[+datestamp_submitted]]<br/>
```

### Reading Values

Another common thing for custom hooks to do is to read the submitted information and do something with it, e.g. write data to the database. Values can be read individually using **$hook->getValue()**, e.g.:

``` php 
$email = $hook->getValue('email');
```

Or all values can be read at once using **$hook->getValues()**:

``` php 
$formFields = $hook->getValues();
$email = $formFields['email'];
```