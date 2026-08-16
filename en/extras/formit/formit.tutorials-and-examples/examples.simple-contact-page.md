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

## Form submits but no email arrives

FormIt uses MODX’s mail settings. If the form “works” (redirect, success message) but the inbox stays empty, treat it as a mail/SMTP problem first.

### 1. Confirm FormIt itself is fine

1. Check validation and hook errors on the page: `[[!+fi.error_message]]`, `[[!+fi.validation_error_message]]`, and field errors such as `[[!+fi.error.email]]`.
2. Keep `&hooks=` order sensible: validation-related hooks (for example `recaptcha`) before `email`, then `redirect` last. If `email` fails, later hooks may not run as you expect.
3. Set `&emailTo=` to an address you can open right now.
4. Keep `&emailFrom=` as `[[++emailsender]]` (or another address on a domain you control). Do not use the visitor’s address as `From`.
5. Confirm the `emailTpl` chunk exists and renders. Wrong chunk names fail the email hook silently from the visitor’s point of view.

### 2. Separate FormIt from SMTP with QuickEmail

Install [QuickEmail](extras/quickemail) (Bob Ray) from Package Management. On a temporary Resource, put:

``` php
[[!QuickEmail? &debug=`1`]]
```

Preview that Resource. QuickEmail sends a test message through the same MODX mail stack FormIt uses and prints a debug log.

- If QuickEmail fails, fix System Settings under **System → System Settings → area Mail** before you chase FormIt hooks.
- If QuickEmail succeeds and FormIt still does not, re-check `&emailTo`, `&emailTpl`, hooks, and spam folders.

Remove the QuickEmail call when you finish. Leaving `&debug=` on a public page can expose mail configuration details.

Full SMTP setup, deliverability notes, and provider examples: [Sending mail](building-sites/sending-mail).

### 3. Typical SMTP settings (MODX 3)

Enable `mail_use_smtp` and usually `mail_smtp_auth`. Set host, port, user, password, and encryption (`mail_smtp_secure`: `tls` or `ssl`, or leave empty and rely on `mail_smtp_autotls` when appropriate).

| Provider | `mail_smtp_hosts` | Port | Secure | Notes |
| -------- | ----------------- | ---- | ------ | ----- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` or `465` | `tls` (587) or `ssl` (465) | Use an [app password](https://support.google.com/accounts/answer/185833) or OAuth-capable setup. Account password alone usually fails. |
| Yandex Mail | `smtp.yandex.com` (or `smtp.yandex.ru`) | `465` or `587` | `ssl` (465) | Create an app password in Yandex Mail client settings. |
| Mail.ru | `smtp.mail.ru` | `465` or `587` | `ssl` / `tls` | Use an app password from Mail.ru security settings. |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Confirm current values in Rambler help; they change with account security rules. |
| Mailgun | `smtp.mailgun.org` (EU: `smtp.eu.mailgun.org`) | `587`, `465`, or `2525` | `tls` / `ssl` as required by port | SMTP user/password come from the Mailgun domain’s SMTP credentials. |
| Custom VPS / hosting | Your host’s SMTP hostname | Often `587` or `465` | Per host docs | Many hosts block outbound port `25`. Prefer authenticated submission on 587/465. |

Also set `emailsender` to an address allowed by that provider (verified domain for Mailgun/SES, or the mailbox you authenticate as for consumer SMTP).

Community thread that prompted this section: [Can’t get FormIt to send form](https://community.modx.com/t/cant-get-formit-to-send-form/3736).

## See Also

1. [Sending mail](building-sites/sending-mail)
2. [QuickEmail](extras/quickemail)
3. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
4. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
5. [FormIt.Validators](extras/formit/formit.validators)
