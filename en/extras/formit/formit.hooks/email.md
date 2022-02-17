---
title: "email"
_old_id: "857"
_old_uri: "revo/formit/formit.hooks/email"
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
| emailReplyTo            | An email to set as the reply-to. If not set, will first look for an `email` form field. If none is found, will default to value set in `emailFrom`. NOTE: Set emailReplyTo to valid emailaddress from the same domain as `emailFrom` to avoid rejected email due to SPF/DMARC violations.                                                                                                                                                                                             |
| emailReplyToName        | Optional. The name for the Reply-To field.                                                                                                                                                                                                                                                                                                          |
| emailCC                 | A comma-separated list of emails to send via cc.                                                                                                                                                                                                                                                                                                    |
| emailCCName             | Optional. A comma-separated list of names to pair with the emailCC values.                                                                                                                                                                                                                                                                          |
| emailBCC                | A comma-separated list of emails to send via bcc.                                                                                                                                                                                                                                                                                                   |
| emailBCCName            | Optional. A comma-separated list of names to pair with the emailBCC values.                                                                                                                                                                                                                                                                         |
| emailMultiWrapper       | Wraps values submitted by checkboxes/multi-selects with this value. Defaults to just the value. (1.6.0+)                                                                                                                                                                                                                                            |
| emailMultiSeparator     | Separates checkboxes/multi-selects with this value. Defaults to a newline. (1.6.0+)                                                                                                                                                                                                                                                                 |
| emailSelectField        | The name of the form field, that selects the email addresses to send to. (4.2.5+)                                                                                                                                                                                                                                                                   |
| emailSelectTo           | A semicolon-separated list of comma-separated email addresses to send to. (4.2.5+)                                                                                                                                                                                                                                                                  |
| emailSelectToName       | A semicolon-separated list of comma-separated email names to send to. (4.2.5+)                                                                                                                                                                                                                                                                      |

Any of the email hook properties can have placeholders of field names from your form in them that will be evaluated.

## Usage

Simply specify it as a hook in your FormIt call, and then specify the email-specific properties in the FormIt call as well.

```
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

```html
<p>Hello,</p>
<p>[[+name]] just purchased the CDO package: [[+cdo_package]].</p>
<p>Their email: [[+email]]</p>
<p>Thanks!</p>
```

This assumes, of course, that you have the fields "name", "cdo\_package" and "email" in your form.

### Specifying Dynamic To Addresses

FormIt, as of 4.2.5+, can select the receiver of the mail by the numeric value of a field i.e. by the option value of a select. This way you can avoid creating a spoofable form field where a frontend user can easily enter any mail address. The frontend user will only see a numbered list of recipients translated into email addresses by FormIt properties.

For this, you can use the following FormIt properties (The different groups of email addresses and names are separated by semicolon, each group can contain multiple adresses and names separated by comma):

```
&emailSelectTo=`mail1@my.domain,mail2@my.domain;different@my.domain`
&emailSelectToName=`Mail1,Mail2;Different`
&emailSelectField=`emailselect`
```

and the following form field

```html
<select name="emailselect">
    <option value="1" [[!+fi.emailselect:default=`1`:FormItIsSelected=`1`]]>Address 1</option>
    <option value="2" [[!+fi.emailselect:default=`1`:FormItIsSelected=`2`]]>Address 2</option>
</select>
```

If Address 1 is selected, the mail will be sent to `mail1@my.domain,mail2@my.domain`, if Address 2 is selected, the mail will be sent to `different@my.domain`.

### Using a Subject Field as the Email Subject Line

Let's say you have a subject field in your form. You want that to be the subject of the email sent out. The email hook has the ability to do this:

```
[[!FormIt?
    ...
    &emailUseFieldForSubject=`1`
]]
```

This will then look for a field named "subject" that will be used in the email. If it's not found or empty, it will default to the &emailSubject property.

### Handling Checkboxes and Multi-Selects in the Email

FormIt, as of 1.6.0+, will automatically handle checkboxes and combine them into one field. You can use the &emailMultiSeparator and &emailMultiWrapper properties to specify how they are joined. For example, to wrap checkboxes in LI tags:

```
[[!FormIt?
    ...
    &emailMultiWrapper=`<li>[[+value]]</li>`
]]
```

Or just to separate them with BR tags:

```
[[!FormIt?
    ...
    &emailMultiSeparator=`<br />`
]]
```

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
5. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
7. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
