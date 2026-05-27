---
title: "recaptcha"
_old_id: "860"
_old_uri: "revo/formit/formit.hooks/formit.hooks.recaptcha"
---

## The recaptcha hook

The recaptcha hook enables reCAPTCHA v3 support for FormIt forms. reCAPTCHA v3 works invisibly in the background — no checkbox or challenge is shown to the user. Google returns a score (0.0–1.0) indicating how likely the submission is from a human; submissions below the minimum score are rejected.

## Requirements

- A reCAPTCHA v3 site key and secret key from [https://www.google.com/recaptcha](https://www.google.com/recaptcha)
- FormIt's frontend JS enabled via the `formit.frontend_js` system setting (set to `js/web/formit.js`)

## Usage

Add `recaptcha` to your `&hooks` parameter:

``` php
[[!FormIt?
    &hooks=`recaptcha,email`
]]
```

Add the reCAPTCHA placeholder and the error placeholder to your form:

``` html
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

`[[+formit.recaptcha_html]]` renders two hidden fields (`g-recaptcha-response` and `g-recaptcha-action`) required for v3. FormIt automatically loads the Google reCAPTCHA script and executes the token request on form submit.

## System Settings

Configure your keys in **System Settings** under the `formit_recaptcha` area:

| Setting | Description | Default |
| --- | --- | --- |
| `formit.recaptcha_site_key` | Your reCAPTCHA v3 site key (public). | |
| `formit.recaptcha_secret_key` | Your reCAPTCHA v3 secret key (private). | |
| `formit.recaptcha_min_score` | Minimum score to accept a submission (0.0–1.0). | `0.5` |

## Available Properties

| Name | Description | Default |
| --- | --- | --- |
| `recaptchaAction` | Action name sent to Google with the token request. Visible in the reCAPTCHA admin dashboard. | `submit` |

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
5. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
7. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
