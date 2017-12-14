---
title: "FormIt.Hooks.FormItSaveForm"
_old_id: "1733"
_old_uri: "revo/formit/formit.hooks/formit.hooks.formitsaveform"
---

The FormItSaveForm hook
-----------------------

 This hook will save submitted forms inside an CMP.

<div class="info"> FormIt 3.0 introduces an update to the encryption methods used for encrypting form submissions. Prior to 3.0 mcrypt was used, which in 3.0 is replaced with openssl, due to mcrypt being deprecated as of PHP 7.2. FormIt 3.0 comes with a migration page which is accessible from the manager. </div>Available Properties
--------------------

 It has the following properties to be passed into the FormIt snippet call:

 <table><tbody><tr><th> name </th> <th> description </th> </tr><tr><td> formName </td> <td> The name of the form. Defaults to "form-{resourceid}". </td> </tr><tr><td> formEncrypt </td> <td> If is set to '1' _(true)_ the submitted form will be encrypted before saving inside the DB. </td> </tr><tr><td> formFields </td> <td> A comma-separated list of fields that will be saved. Defaults will save all fields including the submit button. </td> </tr><tr><td> fieldNames </td> <td> Change the name of the field inside the CMP. So if the field name is email2 you could change the name to "secondary email".   
 Ex: &fieldnames=`fieldname==newfieldname, anotherone==anothernewname`. </td></tr></tbody></table>See Also
--------

1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)