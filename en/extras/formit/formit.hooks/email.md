---
title: "email"
_old_id: "857"
_old_uri: "revo/formit/formit.hooks/formit.hooks.email"
---

## FormIt email Hook

 The email hook will email out your form contents to any email(s).

## Available Properties

 | name                    | description                                                                                                                                                                                                                                                                                                                                         |
 | ----------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
 | emailTpl                | Required. Tpl chunk for email message. If one is not specified, it will send a list of fields with their values.                                                                                                                                                                                                                                    |
 | emailSubject            | The subject of the email.                                                                                                                                                                                                                                                                                                                           |
 | emailUseFieldForSubject | If 1, and the field 'subject' is passed, then will use that field's value as the email's subject line.                                                                                                                                                                                                                                              |
 | emailTo                 | A comma-separated list of emails to send to.                                                                                                                                                                                                                                                                                                        |
 | emailToName             | Optional. A comma-separated list of names to pair with the emailTo values.                                                                                                                                                                                                                                                                          |
 | emailFrom               | Optional. If set, will specify the From: address for the email. If not set, will first look for an `email` form field. If none is found, will default to the `emailsender` system setting. NOTE: Always set the emailFrom to a valid emailaddress (that is allowed to send from your server) to avoid rejected emails due to SPF/ DMARC violations. |
 | emailFromName           | Optional. If set, will specify the From: name for the email.                                                                                                                                                                                                                                                                                        |
 | emailHtml               | Optional. Whether or not the email should be in HTML-format. Defaults to 1.                                                                                                                                                                                                                                                                         |
 | emailConvertNewlines    | Optional. If set to 1, will convert all newlines to br tags.                                                                                                                                                                                                                                                                                        |
 | emailReplyTo            | An email to set as the reply-to. If not set, will first look for an `email` form field. If none is found, will default to value set in `emailFrom`.                                                                                                                                                                                                 |
 | emailReplyToName        | Optional. The name for the Reply-To field.                                                                                                                                                                                                                                                                                                          |
 | emailCC                 | A comma-separated list of emails to send via cc.                                                                                                                                                                                                                                                                                                    |
 | emailCCName             | Optional. A comma-separated list of names to pair with the emailCC values.                                                                                                                                                                                                                                                                          |
 | emailBCC                | A comma-separated list of emails to send via bcc.                                                                                                                                                                                                                                                                                                   |
 | emailBCCName            | Optional. A comma-separated list of names to pair with the emailBCC values.                                                                                                                                                                                                                                                                         |
 | emailMultiWrapper       | Wraps values submitted by checkboxes/multi-selects with this value. Defaults to just the value. (1.6.0+)                                                                                                                                                                                                                                            |
 | emailMultiSeparator     | Separates checkboxes/multi-selects with this value. Defaults to a newline. (1.6.0+)                                                                                                                                                                                                                                                                 |

 Any of the email hook properties can have placeholders of field names from your form in them that will be evaluated.

## Usage

 Simply specify it as a hook in your FormIt call, and then specify the email-specific properties in the FormIt call as well.

 ``` php
[[!FormIt?
   ...
   &hooks=`email`
   &emailTpl=`CentralizedDebtObligationEmailTpl`
   &emailSubject=`Some Sucker Bought Another CDO`
   &emailTo=`sales@mortgagemoney.com`
   &emailCC=`boss@mortgagemoney.com`
   &emailBCC=`fbi@gov.com`
   &emailBCCName=`CDO Fraud Informant`
]]
```

 Note the &emailTpl property points to the name of a Chunk. In that Chunk, you'll have placeholders for each field in your form. Our Chunk could look like this:

 ``` html
<p>Hello,</p>
<p>[[+name]] just purchased the CDO package: [[+cdo_package]].</p>
<p>Their email: [[+email]]</p>
<p>Thanks!</p>
```

 This assumes, of course, that you have the fields "name", "cdo\_package" and "email" in your form.

### Specifying a Dynamic To Address

 An example is using the form to specify who to send to:

 ``` php
[[!FormIt?
   ...
   &emailTo=`[[+addressTo]]`
]]
...
<select name="addressTo">
   <option value="john@doe.com" [[!+fi.addressTo:FormItIsSelected=`john@doe.com`]]>John</option>
   <option value="jane@doe.com" [[!+fi.addressTo:FormItIsSelected=`jane@doe.com`]]>Jane</option>
</select>
```

 This will send the email to whoever is selected in the "addressTo" field.

### Using a Subject Field as the Email Subject Line

 Let's say you have a subject field in your form. You want that to be the subject of the email sent out. The email hook has the ability to do this:

 ``` php
[[!FormIt?
    ...
    &emailUseFieldForSubject=`1`
]]
```

 This will then look for a field named "subject" that will be used in the email. If it's not found or empty, it will default to the &emailSubject property.

### Handling Checkboxes and Multi-Selects in the Email

 FormIt, as of 1.6.0+, will automatically handle checkboxes and combine them into one field. You can use the &emailMultiSeparator and &emailMultiWrapper properties to specify how they are joined. For example, to wrap checkboxes in LI tags:

 ``` php
[[!FormIt?
    ...
    &emailMultiWrapper=`<li>[[+value]]</li>`
]]
```

 Or just to separate them with BR tags:

 ``` php
[[!FormIt?
    ...
    &emailMultiSeparator=`<br />`
]]
```

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](extras/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](extras/formit/formit.hooks/formit.hooks.spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.prehooks.formitloadsavedform)
