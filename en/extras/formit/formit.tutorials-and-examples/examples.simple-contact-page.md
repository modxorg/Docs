---
title: "Simple Contact Page"
_old_id: "851"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
---

Here we will give a simple example of a Contact page.

We presume that you have already installed FormIt via [Package Management](developing-in-modx/advanced-development/package-management "Package Management") and read the [How To Use](/extras/formit#how-to-use "How To Use") section.

This example form validates input data, sends an email, and redirects to a resource with ID 123.

Validation (see [FormIt Validators](extras/formit/formit.validators)) in this example strips tags from the message, validates the email address, and requires all fields to be filled in.

It also uses [reCAPTCHA v3](https://www.google.com/recaptcha/about/) support. Set up your keys in System Settings:

- `formit.recaptcha_site_key`
- `formit.recaptcha_secret_key`

## Snippet Tag

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

> Make sure `emailFrom` is set to `[[++emailsender]]`, otherwise the form's email field will be used as the sender — most hosting providers will reject or block such emails.

## Contact Form

``` html
<h2>Contact Form</h2>

<form action="[[~[[*id]]]]" method="post" class="form">
    [[!+fi.validation_error_message]]
    [[!+fi.successMessage]]
    <div class="error">[[!+fi.error_message]]</div>

    <input type="hidden" name="nospam" value="" />

    <div class="form-field">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="[[!+fi.name]]" />
        [[!+fi.error.name]]
    </div>

    <div class="form-field">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="[[!+fi.email]]" />
        [[!+fi.error.email]]
    </div>

    <div class="form-field">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />
        [[!+fi.error.subject]]
    </div>

    <div class="form-field">
        <label for="text">Message:</label>
        <textarea name="text" id="text" cols="55" rows="7">[[!+fi.text]]</textarea>
        [[!+fi.error.text]]
    </div>

    <div class="form-field">
        <label for="numbers">Numbers:</label>
        <select name="numbers" id="numbers">
            <option value="">Select an option...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected=`one`]]>One</option>
            <option value="two" [[!+fi.numbers:FormItIsSelected=`two`]]>Two</option>
            <option value="three" [[!+fi.numbers:FormItIsSelected=`three`]]>Three</option>
        </select>
        [[!+fi.error.numbers]]
    </div>

    <div class="form-field">
        <label>Colors:</label>
        <input type="hidden" name="colors[]" value="" />
        <ul>
            <li><label><input type="checkbox" name="colors[]" value="red" [[!+fi.colors:FormItIsChecked=`red`]] /> Red</label></li>
            <li><label><input type="checkbox" name="colors[]" value="blue" [[!+fi.colors:FormItIsChecked=`blue`]] /> Blue</label></li>
            <li><label><input type="checkbox" name="colors[]" value="green" [[!+fi.colors:FormItIsChecked=`green`]] /> Green</label></li>
        </ul>
        [[!+fi.error.colors]]
    </div>

    <div class="form-field">
        [[+formit.recaptcha_html]]
        [[!+fi.error.recaptcha]]
    </div>

    <div class="form-buttons">
        <input type="submit" value="Send Contact Inquiry" />
    </div>
</form>
```

## MyEmailChunk (Tpl Chunk)

``` php
This is the FormIt Email Chunk.

<br />[[+name]] ([[+email]]) Wrote: <br />

[[+text]]
```

## See Also

1. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
2. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Validators](extras/formit/formit.validators)
