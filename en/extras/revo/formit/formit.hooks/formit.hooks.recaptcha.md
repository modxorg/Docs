---
title: "FormIt.Hooks.recaptcha"
_old_id: "860"
_old_uri: "revo/formit/formit.hooks/formit.hooks.recaptcha"
---

The recaptcha hook
------------------

 The recaptcha hook will enable reCaptcha support for FormIt forms.

Usage
-----

 First off, add "recaptcha" to your &hooks parameter in your FormIt call. Then you'll need to include the following placeholders in your form:

 ```
<pre class="brush: php">
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]

``` The first placeholder is where the reCaptcha form will be rendered; the 2nd is the error message (if any) for reCaptcha.

 Finally, you'll need to setup your reCaptcha private and public keys in System Settings. The settings available for reCaptcha are:

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> formit.recaptcha\_public\_key </td> <td> Your reCaptcha public key. </td> </tr><tr><td> formit.recaptcha\_private\_key </td> <td> Your reCaptcha private key. </td> </tr><tr><td> formit.recaptcha\_use\_ssl </td> <td> Whether or not to use SSL for reCaptcha requests. Defaults to false. </td></tr></tbody></table>Available Properties
--------------------

 The reCaptcha hook has a few extra configuration options:

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> recaptchaJs </td> <td> A JSON object to pass into the RecaptchaOptions var, which configures the reCaptcha widget. See the official reCaptcha docs for more information. </td> <td> {} </td> </tr><tr><td> recaptchaTheme </td> <td> The recaptcha theme to use. </td> <td> clean </td></tr></tbody></table>See Also
--------

1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)