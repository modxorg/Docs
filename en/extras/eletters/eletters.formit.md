---
title: "FormIt"
_old_id: "831"
_old_uri: "revo/eletters/eletters.formit"
---

- [FormIt Hooks](#Eletters.FormIt-FormItHooks)
  - [EletterFormItEmail replaces the default FormIt Email hook](#Eletters.FormIt-EletterFormItEmailreplacesthedefaultFormItEmailhook)
      - [Available Properties](#Eletters.FormIt-AvailableProperties)
      - [Example](#Eletters.FormIt-Example)
- [See Also](#Eletters.FormIt-SeeAlso)



## FormIt Hooks

New in version 1.1 are two hooks for FormIt. If you use FormIt to make your forms you can now take advantage of both Eletters and FormIt. FormIt allows you to make easy forms and the build in email hook works but now you can set up an email as a Resource/Document and then log and provide the recipient a link to view the web version. Future versions will have an easy review log in the MODX Manager.

### EletterFormItEmail replaces the default FormIt Email hook

The EletterFormItEmail hook, which is just a snippet, aims to be a drop in replacement for the FormIt Email hook.

#### Available Properties

| Name | Description |
|------|-------------|
| emailNewsletterID | (Int) use the newsletter ID to identify the newsletter |
| emailResourceID | (Int) Optional instead of using the emailNewsletterID use the standard resource ID to identify the newsletter resource |
| emailUseChunk | Boolean, default false - on true it will use the standard chunk rather then the newsletter resource |
| emailUploads | Boolean, default true - on true will send uploads via email |
| emailFiles | Boolean, default true - on true will send any files attachments that a newsletter resource may have, these would be added via the Manager TVs |
| emailLog | Boolean, default true - on true will save output email content to database and allow a you to create a link to View as Webpage. Will also log any error if email is not delivered. |

See the FormIt Email documentation for additional available properties: <http://rtfm.modx.com/display/ADDON/FormIt.Hooks.email>

#### Example

1. After your form is created you will need to create a new Resource and put in placeholders that would match the FormIt form. The Resource needs to have the Eletter TVs, be published and send a test.
2. Then put in the ID of the Resource as the value for the emailResourceID in the FormIt Snippet call.

The following will send out an email of the Resource #10 after the form validated.

\[\[!FormIt? 
 &submitVar=`submit` 
 &validationErrorMessage=`<h3>Please fill in all fields</h3>` 
 &validate=`email:email:required,question:required` 
 &hooks=`eletterFormItEmail` 
 &emailSubject=`Question` 
 &emailTo=`email@email.com` 
 &emailResourceID=`10` 
\]\]

## See Also

1. [Eletters.API](/extras/revo/eletters/eletters.api)
2. [Eletters.FormIt](/extras/revo/eletters/eletters.formit)
3. [Eletters.Import CSV](/extras/revo/eletters/eletters.import-csv)
4. [Eletters.Templates](/extras/revo/eletters/eletters.templates)