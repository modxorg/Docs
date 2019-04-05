---
title: "FormItAutoResponder"
_old_id: "858"
_old_uri: "revo/formit/formit.hooks/formit.hooks.formitautoresponder"
---

## The FormItAutoResponder hook

 The email hook will email an auto-response to the submitter.

## Available Properties

 It has the following properties to be passed into the FormIt snippet call:

 | name | description |
|------|-------------|
| fiarTpl | Required. Tpl chunk for auto-response message. |
| fiarSubject | The subject of the email. |
| fiarToField | The name of the form field to use as the submitter's email. Defaults to "email". |
| fiarFrom | Optional. If set, will specify the From: address for the email. Defaults to the `emailsender` system setting. |
| fiarFromName | Optional. If set, will specify the From: name for the email. |
| fiarSender | Optional. Specify the email Sender header. Defaults to the `emailsender` system setting. |
| fiarHtml | Optional. Whether or not the email should be in HTML-format. Defaults to true. |
| fiarReplyTo | Required.An email to set as the reply-to. |
| fiarReplyToName | Optional. The name for the Reply-To field. |
| fiarCC | A comma-separated list of emails to send via cc. |
| fiarCCName | Optional. A comma-separated list of names to pair with the fiarCC values. |
| fiarBCC | A comma-separated list of emails to send via bcc. |
| fiarBCCName | Optional. A comma-separated list of names to pair with the fiarBCC values. |
| fiarMultiWrapper | Wraps values submitted by checkboxes/multi-selects with this value. Defaults to just the value. |
| fiarMultiSeparator | Separates checkboxes/multi-selects with this value. Defaults to a newline. ("\\n") |
| fiarFiles | Optional. Comma separated list of files to add as attachment to the email. You cannot use a url here, only a local filesystem path. |
| fiarRequired | Optional. If set to false, the FormItAutoResponder hook doesn't stop when the field defined in 'fiarToField' is left empty. Defaults to true. |

## See Also

1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.prehooks.formitloadsavedform)