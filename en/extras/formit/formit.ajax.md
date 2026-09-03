---
title: "AJAX Form Submission"
---

## AJAX Form Submission

From FormIt **5.2.0**, forms can submit via AJAX without a full page reload. Validation errors, success messages, and redirects are handled by the built-in `formit.js`. The same script drives [reCAPTCHA v3](extras/formit/formit.hooks/recaptcha) token requests before POST.

## Setup

Set the `formit.frontend_js` system setting (a fresh FormIt install already has this default):

| Setting | Value |
|---|---|
| `formit.frontend_js` | `js/web/formit.js` |

FormIt registers `assets/components/formit/js/web/formit.js` and passes the `action.php` URL into the JS config. If the `recaptcha` hook is active and a site key is set, it also registers Google `api.js?render=...`.

## How It Works

1. Before a POST, the FormIt snippet stores its configuration (hooks, validation rules, and so on) in the session and cache, and outputs a random token as `[[!+fi.ajaxToken]]` (32 hex characters from `random_bytes`, not an MD5 hash).
2. You put that token on the `<form>` as `data-formit-ajax-token`.
3. On page load, `formit.js` attaches to every `<form>`. AJAX runs only when `data-formit-ajax-token` is present. Without that attribute, if the form has `g-recaptcha-response`, the script still intercepts submit, fills the reCAPTCHA token, then does a normal POST.
4. In AJAX mode the JS posts form data with the `X-FormIt-Token` header via `fetch()` to `action.php`.
5. The endpoint loads the stored configuration by token, runs FormIt server-side, and returns JSON.
6. The JS updates the DOM: field errors, validation messages, success, or redirect.

## Snippet Call

The snippet call is the same as for a regular form. No special parameters are needed for AJAX:

``` php
[[!FormIt?
    &hooks=`email,redirect`
    &emailTpl=`MyEmailChunk`
    &emailTo=`user@example.com`
    &emailFrom=`[[++emailsender]]`
    &redirectTo=`123`
    &validate=`name:required,
        email:email:required,
        subject:required,
        text:required:stripTags`
]]
```

## Form HTML

To make a form work with AJAX, add the `data-formit-ajax-token` attribute to the `<form>` tag and use `data-formit-*` attributes for error and message elements:

``` html
<form action="[[~[[*id]]]]" method="post" class="form"
      data-formit-ajax-token="[[!+fi.ajaxToken]]">

    <div data-formit-validation-error-message>[[!+fi.validation_error_message]]</div>
    <div data-formit-success-message>[[!+fi.successMessage]]</div>

    <div class="form-field">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="[[!+fi.name]]" />
        <span data-formit-error="name">[[!+fi.error.name]]</span>
    </div>

    <div class="form-field">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="[[!+fi.email]]" />
        <span data-formit-error="email">[[!+fi.error.email]]</span>
    </div>

    <div class="form-field">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />
        <span data-formit-error="subject">[[!+fi.error.subject]]</span>
    </div>

    <div class="form-field">
        <label for="text">Message:</label>
        <textarea name="text" id="text" cols="55" rows="7">[[!+fi.text]]</textarea>
        <span data-formit-error="text">[[!+fi.error.text]]</span>
    </div>

    <div class="form-field">
        <label for="numbers">Numbers:</label>
        <select name="numbers" id="numbers">
            <option value="">Select an option...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected=`one`]]>One</option>
            <option value="two" [[!+fi.numbers:FormItIsSelected=`two`]]>Two</option>
            <option value="three" [[!+fi.numbers:FormItIsSelected=`three`]]>Three</option>
        </select>
        <span data-formit-error="numbers">[[!+fi.error.numbers]]</span>
    </div>

    <div class="form-field">
        <label>Colors:</label>
        <input type="hidden" name="colors[]" value="" />
        <ul>
            <li><label><input type="checkbox" name="colors[]" value="red" [[!+fi.colors:FormItIsChecked=`red`]] /> Red</label></li>
            <li><label><input type="checkbox" name="colors[]" value="blue" [[!+fi.colors:FormItIsChecked=`blue`]] /> Blue</label></li>
            <li><label><input type="checkbox" name="colors[]" value="green" [[!+fi.colors:FormItIsChecked=`green`]] /> Green</label></li>
        </ul>
        <span data-formit-error="colors">[[!+fi.error.colors]]</span>
    </div>

    <div class="form-buttons">
        <input type="submit" value="Send Contact Inquiry" />
    </div>
</form>
```

> **Note:** The `action` attribute is kept as a fallback for when JavaScript is disabled. In AJAX mode the form is submitted to `action.php` instead.

### Data Attributes Reference

| Attribute | Element | Description |
|---|---|---|
| `data-formit-ajax-token` | `<form>` | Activates AJAX mode. Value must be `[[!+fi.ajaxToken]]`. |
| `data-formit-error="fieldname"` | `<span>` | Displays the validation error for a specific field. The JS fills `innerHTML` with the error text. |
| `data-formit-validation-error-message` | `<div>` | Displays the general validation error message (equivalent of `[[!+fi.validation_error_message]]`). |
| `data-formit-success-message` | `<div>` | Displays the success message (from `&successMessage` property). |
| `data-formit-error-message` | `<div>` | Displays hooks error message (from `[[!+fi.error_message]]`). |

All `data-formit-error` and message elements are cleared before each submission.

## JavaScript API

### Auto-initialization

On `DOMContentLoaded`, `formit.js` initializes **every** `<form>` on the page. You do not need extra JS for the basic flow. AJAX for a given form is enabled only by `data-formit-ajax-token`.

## JavaScript Events

The form element dispatches `CustomEvent`s that you can listen to with `addEventListener`. All events bubble.

| Event | Cancelable | `event.detail` | Description |
|---|---|---|---|
| `formit:beforesubmit` | Yes | `{ form }` | Fired before the reCAPTCHA token request / submit. Call `event.preventDefault()` to cancel. |
| `formit:success` | No | `{ data }` | Fired on successful submission. |
| `formit:error` | No | `{ data }` | Fired when validation fails. |
| `formit:complete` | No | `{}` | Fired after every request (success or error). |
| `formit:redirect` | Yes | `{ url }` | Fired before redirect. Call `event.preventDefault()` to cancel. |

Example:

``` javascript
document.getElementById('my-form').addEventListener('formit:success', function (e) {
    alert('Thank you! Your form has been submitted.');
});
```

## Redirect Handling

When the `redirect` hook is used, AJAX mode does **not** perform a server-side redirect. Instead:

1. The server returns a `redirect_url` field in the JSON response.
2. The JS dispatches a cancelable `formit:redirect` event.
3. If not canceled (via `event.preventDefault()` or `onRedirect` returning `false`), the JS sets `window.location.href` to the redirect URL.

This lets you intercept the redirect and handle it your own way (e.g., load content via AJAX, show a thank-you message in place, etc.).

## CSS Loading State

While the reCAPTCHA token request and/or AJAX request runs:

- The `formit-loading` CSS class is added to the `<form>` element.
- All `[type="submit"]` buttons inside the form are set to `disabled`.

Both are removed when the flow finishes (or if reCAPTCHA fails).

You can use this to style a loading indicator:

``` css
.formit-loading {
    opacity: 0.6;
    pointer-events: none;
}
```

## JSON Response Structure

For advanced use cases, the AJAX endpoint returns a JSON object with this structure:

``` json
{
    "success": true,
    "message": "Success message or error message",
    "redirect_url": "https://example.com/thank-you",
    "placeholders": {
        "error.name": "<span class=\"error\">This field is required.</span>",
        "error.email": "<span class=\"error\">Please enter a valid email.</span>",
        "validation_error_message": "<p class=\"error\">A form validation error occurred.</p>",
        "successMessage": "Form submitted successfully."
    }
}
```

| Field | Type | Description |
|---|---|---|
| `success` | Boolean | `true` if the form passed all validation and hooks succeeded. |
| `message` | String | Success or error message. |
| `redirect_url` | String | Present only when the `redirect` hook is active. |
| `placeholders` | Object | All FormIt placeholders (with the `fi.` prefix stripped). Field errors are under `error.fieldname`. |

## See Also

1. [FormIt.Hooks](extras/formit/formit.hooks)
    1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
    2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
    3. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
    4. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
    5. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
    6. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
    7. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
2. [FormIt.Validators](extras/formit/formit.validators)
3. [FormIt.FormItRetriever](extras/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](extras/formit/formit.tutorials-and-examples)
    1. [FormIt.Examples.Custom Hook](extras/formit/formit.tutorials-and-examples/examples.custom-hook)
    2. [FormIt.Examples.Simple Contact Page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
    3. [FormIt.Handling Selects, Checkboxes and Radios](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios)
    4. [FormIt.Using a Blank NoSpam Field](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field)
5. [FormIt.FormItCountryOptions](extras/formit/formit.formitcountryoptions)
6. [FormIt.FormItStateOptions](extras/formit/formit.formitstateoptions)
