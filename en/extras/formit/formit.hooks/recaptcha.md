---
title: "recaptcha"
_old_id: "860"
_old_uri: "revo/formit/formit.hooks/formit.hooks.recaptcha"
---

## The recaptcha hook

 The recaptcha hook will enable reCaptcha support for FormIt forms.

## Usage

 First off, add "recaptcha" to your &hooks parameter in your FormIt call. Then you'll need to include the following placeholders in your form:

 ``` php 
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

 The first placeholder is where the reCaptcha form will be rendered; the 2nd is the error message (if any) for reCaptcha.

 Finally, you'll need to setup your reCaptcha private and public keys in System Settings. The settings available for reCaptcha are:

 | Name                           | Description                                                          |
 | ------------------------------ | -------------------------------------------------------------------- |
 | formit.recaptcha\_public\_key  | Your reCaptcha public key.                                           |
 | formit.recaptcha\_private\_key | Your reCaptcha private key.                                          |
 | formit.recaptcha\_use\_ssl     | Whether or not to use SSL for reCaptcha requests. Defaults to false. |

## Available Properties

 The reCaptcha hook has a few extra configuration options:

 | Name           | Description                                                                                                                                       | Default |
 | -------------- | ------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
 | recaptchaJs    | A JSON object to pass into the RecaptchaOptions var, which configures the reCaptcha widget. See the official reCaptcha docs for more information. | {}      |
 | recaptchaTheme | The recaptcha theme to use.                                                                                                                       | clean   |

## See Also

1. [FormIt.Hooks.email](/extras/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/formit/formit.hooks/formit.hooks.spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.prehooks.formitloadsavedform)