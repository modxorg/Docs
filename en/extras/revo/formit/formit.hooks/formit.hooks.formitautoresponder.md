---
title: "FormIt.Hooks.FormItAutoResponder"
_old_id: "858"
_old_uri: "revo/formit/formit.hooks/formit.hooks.formitautoresponder"
---

The FormItAutoResponder hook
----------------------------

 The email hook will email an auto-response to the submitter.

Available Properties
--------------------

 It has the following properties to be passed into the FormIt snippet call:

 <table><tbody><tr><th> name </th> <th> description </th> </tr><tr><td> fiarTpl </td> <td> Required. Tpl chunk for auto-response message. </td> </tr><tr><td> fiarSubject </td> <td> The subject of the email. </td> </tr><tr><td> fiarToField </td> <td> The name of the form field to use as the submitter's email. Defaults to "email". </td> </tr><tr><td> fiarFrom </td> <td> Optional. If set, will specify the From: address for the email. Defaults to the `emailsender` system setting. </td> </tr><tr><td> fiarFromName </td> <td> Optional. If set, will specify the From: name for the email. </td> </tr><tr><td> fiarSender </td> <td> Optional. Specify the email Sender header. Defaults to the `emailsender` system setting. </td> </tr><tr><td> fiarHtml </td> <td> Optional. Whether or not the email should be in HTML-format. Defaults to true. </td> </tr><tr><td> fiarReplyTo </td> <td> Required.An email to set as the reply-to. </td> </tr><tr><td> fiarReplyToName </td> <td> Optional. The name for the Reply-To field. </td> </tr><tr><td> fiarCC </td> <td> A comma-separated list of emails to send via cc. </td> </tr><tr><td> fiarCCName </td> <td> Optional. A comma-separated list of names to pair with the fiarCC values. </td> </tr><tr><td> fiarBCC </td> <td> A comma-separated list of emails to send via bcc. </td> </tr><tr><td> fiarBCCName </td> <td> Optional. A comma-separated list of names to pair with the fiarBCC values. </td> </tr><tr><td> fiarMultiWrapper </td> <td> Wraps values submitted by checkboxes/multi-selects with this value. Defaults to just the value. </td> </tr><tr><td>fiarMultiSeparator</td> <td>Separates checkboxes/multi-selects with this value. Defaults to a newline. ("\\n")</td> </tr><tr><td> fiarFiles </td> <td> Optional. Comma separated list of files to add as attachment to the email. You cannot use a url here, only a local filesystem path. </td> </tr><tr><td> fiarRequired </td> <td> Optional. If set to false, the FormItAutoResponder hook doesn't stop when the field defined in 'fiarToField' is left empty. Defaults to true. </td></tr></tbody></table>See Also
--------

1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)