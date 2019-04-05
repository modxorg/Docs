---
title: "FormIt.Examples.Simple Contact Page"
_old_id: "851"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
---

A simple Contact page with email sending, validation and redirection to Resource with ID 123.

Will also strip tags from the message, validate the email as a real email address, and make sure none of the fields are blank.

And finally, we want reCaptcha support. We've already setup our public and private keys for reCaptcha via the following System Settings:

- formit.recaptcha\_public\_key
- formit.recaptcha\_private\_key

## Snippet Tag

``` php 
[[!FormIt?
   &hooks=`recaptcha,spam,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
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

## Contact Form

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

``` php 
This is the Formit Email Chunk.

<br />[[+name]] ([[+email]]) Wrote: <br />

[[+text]]
```