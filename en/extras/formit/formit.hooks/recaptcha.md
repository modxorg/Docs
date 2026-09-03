---
title: "recaptcha"
_old_id: "860"
_old_uri: "revo/formit/formit.hooks/formit.hooks.recaptcha"
---

## The recaptcha hook

The `recaptcha` hook adds [Google reCAPTCHA v3](https://www.google.com/recaptcha/about/) checks to a FormIt form. v3 runs in the background. There is no checkbox and no challenge widget.

Google returns a score from `0.0` to `1.0`. FormIt accepts the submission only when verification succeeds and the score is at least `formit.recaptcha_min_score` (default `0.5`).

This is the current FormIt behavior from **5.2.1** onward ([Sterc/FormIt](https://github.com/Sterc/FormIt)). Older FormIt releases used reCAPTCHA v1 APIs and settings that no longer apply.

## Requirements

1. FormIt **5.2.1+** (package that ships reCAPTCHA v3).
2. A **reCAPTCHA v3** site key and secret key from the [Google reCAPTCHA admin](https://www.google.com/recaptcha/admin). Create a v3 key for your domain. v2 checkbox keys will not work with this hook.
3. System settings `formit.recaptcha_site_key` and `formit.recaptcha_secret_key` filled in (area `formit_recaptcha`).
4. Frontend JS enabled: `formit.frontend_js` set to `js/web/formit.js` (the FormIt default on a normal install).

Without `formit.frontend_js`, FormIt does not load Google's script or request a token, so the hook fails on submit.

## How the JavaScript loads

When the page renders (before a POST) and the `recaptcha` hook is in `&hooks`, FormIt:

1. Sets `[[+formit.recaptcha_html]]` to two hidden inputs: `g-recaptcha-response` and `g-recaptcha-action`.
2. Registers `https://www.google.com/recaptcha/api.js?render={siteKey}` if the site key is set.
3. Registers `assets/components/formit/js/web/formit.js` when `formit.frontend_js` is set, and passes `recaptchaSiteKey` / `recaptchaDefaultAction` into the `FormIt` JS config.

On submit, `formit.js` calls `grecaptcha.execute()`, writes the token into `g-recaptcha-response`, then continues with a normal POST or with [AJAX](extras/formit/formit.ajax) if `data-formit-ajax-token` is present.

You do not add the Google script by hand. You do need the placeholder in the form markup and a working frontend JS setting.

## Usage

``` php
[[!FormIt?
    &hooks=`recaptcha,email`
    &recaptchaAction=`contact`
]]
```

Inside the `<form>`:

``` html
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

Place `recaptcha` before hooks that should run only after a valid human score (for example before `email`). Put `redirect` last when you use it.

Example with fields and email: [Simple Contact Page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## System settings

Configure keys under **System Settings** in the `formit_recaptcha` area:

| Setting | Description | Default |
| --- | --- | --- |
| `formit.recaptcha_site_key` | reCAPTCHA v3 site key (public). | |
| `formit.recaptcha_secret_key` | reCAPTCHA v3 secret key (private). | |
| `formit.recaptcha_min_score` | Minimum Google score to accept (`0.0` to `1.0`). | `0.5` |

Also required for the token request:

| Setting | Description | Default |
| --- | --- | --- |
| `formit.frontend_js` | Path under the FormIt assets URL to the frontend script. | `js/web/formit.js` |

After upgrading from FormIt versions that used reCAPTCHA v1, remove reliance on `formit.recaptcha_public_key`, `formit.recaptcha_private_key`, `recaptchaTheme`, `recaptchaJs`, and `recaptcha_use_ssl`. Those keys and properties are gone. Use the v3 settings above.

## Available properties

| Name | Description | Default |
| --- | --- | --- |
| `recaptchaAction` | Action name sent with `grecaptcha.execute()`. Shown in the Google reCAPTCHA admin analytics. Use letters, numbers, and underscores only (Google's action rules). | `submit` |

## Troubleshooting

| Symptom | What to check |
| --- | --- |
| Always `fi.error.recaptcha` / "incorrect" | Site and secret keys match a **v3** key pair. Domain is listed in the Google admin. Score may be below `formit.recaptcha_min_score` (try `0.3` while testing, then raise it). |
| Empty token / fails with no widget | `[[+formit.recaptcha_html]]` is inside the form. View source for `g-recaptcha-response`. Confirm `formit.frontend_js` is `js/web/formit.js` and that `api.js?render=` plus `formit.js` appear in the page. |
| Works locally, fails on production | Production host must be allowed on the Google key. Clear MODX cache after changing settings. |
| Upgraded site still mentions old keys | Re-enter v3 keys under `formit.recaptcha_site_key` / `formit.recaptcha_secret_key`. Old public/private key settings are unused. |

Server-side verification posts to Google's `siteverify` endpoint with the secret, the token, and the client IP. PHP needs outbound HTTPS (cURL) to `www.google.com`.

## See also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
5. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
6. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
7. [AJAX Form Submission](extras/formit/formit.ajax)
8. [Simple Contact Page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
