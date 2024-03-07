---
title: "Simple Contact Page"
_old_id: "851"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
---

Here we will give a simple example of Contact page. 

We presume that you have already installed Formit component via [Package Management](developing-in-modx/advanced-development/package-management "Package Management") and got acquainted Formit [How To Use](/extras/formit#how-to-use "How To Use") section. 

This example Contact form will validate input data, send an email and finally redirect to Resource with ID 123. 

Validation process (see how it works [here](extras/formit/formit.validators), in short - each hook executes some kind of logic, if successful - transfers processing to the next hook ) in this example does the following: also strip tags from the message, validate the email as a real email address, and make sure none of the fields are blank. All this is specified in &validate parameter.

And finally, we want [reCaptcha](https://www.google.com/recaptcha/about/) support. We've already setup our public and private keys for reCaptcha via the following System Settings:

- formit.recaptcha\_public\_key
- formit.recaptcha\_private\_key

## Snippet Tag

You can call this snippet anywhere: inside template, chunk, page content body, or even call programmatically via [runSnippet](extending-modx/modx-class/reference/modx.runsnippet). 

There is only one condition - Formit must be launched on the page where data from Contact form below will be sent (see "action" field value).

``` php
[[!FormIt?
   &hooks=`recaptcha,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &emailFrom=`[[++emailsender]]`
   &redirectTo=`123`
   &validate=`nospam:blank,
      name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]
```

> Please make sure that emailFrom is set to `[[++emailsender]]`, otherwise the email field of the form will be taken. This is now causing issues as most hosters no longer send mails with a `from` from unknown domains.

## Contact Form

This HTML code must be called on website page where you want to see Contact Form. "Action" field value points to the page where the snippet call is located, in our case we call it on the same page, so we use [~ tag](building-sites/tag-syntax/common#default-resource-content-field-tags) to generate a link for the current page.  

``` html
<h2>Contact Form</h2>

[[!+fi.validation_error_message:notempty=`<p>[[!+fi.validation_error_message]]</p>`]]

<form action="[[~[[*id]]]]" method="post" class="form">
    <input type="hidden" name="nospam" value="" />

    <label for="name">
        Name:
        <span class="error">[[!+fi.error.name]]</span>
    </label>
    <input type="text" name="name" id="name" value="[[!+fi.name]]" />

    <label for="email">
        Email:
        <span class="error">[[!+fi.error.email]]</span>
    </label>
    <input type="text" name="email" id="email" value="[[!+fi.email]]" />

    <label for="subject">
        Subject:
        <span class="error">[[!+fi.error.subject]]</span>
    </label>
    <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />

    <label for="text">
        Message:
        <span class="error">[[!+fi.error.text]]</span>
    </label>
    <textarea name="text" id="text" cols="55" rows="7" value="[[!+fi.text]]">[[!+fi.text]]</textarea>

    <label>
        Numbers:[[+fi.error.numbers]]
        <select name="numbers" value="[[!+fi.numbers]]">
            <option value="">Select an option...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected=`one`]]>One</option>
            <option value="two" [[!+fi.numbers:FormItIsSelected=`two`]]>Two</option>
            <option value="three" [[!+fi.numbers:FormItIsSelected=`three`]]>Three</option>
        </select>
    </label>

    <label>
        Colors:[[!+fi.error.colors]]
        <input type="hidden" name="colors[]" value="" />
    </label>
    <ul>
      <li>
        <label><input type="checkbox" name="colors[]" value="red" [[!+fi.colors:FormItIsChecked=`red`]] /> Red</label>
      </li>
      <li>
        <label><input type="checkbox" name="colors[]" value="blue" [[!+fi.colors:FormItIsChecked=`blue`]] /> Blue</label>
      </li>
      <li>
        <label><input type="checkbox" name="colors[]" value="green" [[!+fi.colors:FormItIsChecked=`green`]] /> Green</label>
      </li>
    </ul>

    <br class="clear" />
    [[!+formit.recaptcha_html]]
    [[!+fi.error.recaptcha]]

    <br class="clear" />

    <div class="form-buttons">
        <input type="submit" value="Send Contact Inquiry" />
    </div>
</form>
```

## MyEmailChunk (Tpl Chunk)

Below is email chunk(from _&emailTpl_) that we send to specified in _&emailTo_ Formit parameter after form data receipt and validation.

``` php
This is the Formit Email Chunk.

<br />[[+name]] ([[+email]]) Wrote: <br />

[[+text]]
```

## See Also

1. [AjaxForm](https://modx.com/extras/package/ajaxform) Submit any form via Ajax (FormIt wrapper extra)
2. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. What is [Google Recaptcha](https://www.google.com/recaptcha/about/)
4. [ReCaptchaV2](https://modx.com/extras/package/recaptchav2) Google Recaptcha(V2 and V3 supported) extra for MODX 
