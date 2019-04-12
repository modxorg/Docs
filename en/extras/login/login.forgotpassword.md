---
title: "ForgotPassword"
_old_id: "906"
_old_uri: "revo/login/login.forgotpassword"
---

## What is ForgotPassword?

 ForgotPassword is a simple Snippet that handles the form when a User has forgotten their password and needs to retrieve it.

## Usage

 To use the password retrieval functionality, first create the Resource the user will log into when they click on the confirmation email, and put the [ResetPassword](extras/login/login.resetpassword "Login.ResetPassword") snippet in. Tell it what Resource the Login snippet is in - or where you'd like it to provide a link back to:

 ``` php
[[!ResetPassword? &loginResourceId=`72`]]
```

 Then create another resource with the ForgotPassword snippet, and tell it
 what Resource the Reset snippet is in:

 ``` php
[[!ForgotPassword? &resetResourceId=`123`]]
```

### ForgotPassword Properties

 ForgotPassword comes with some default properties you can override. They are:

 | Name            | Description                                                                                                           | Default                  |
 | --------------- | --------------------------------------------------------------------------------------------------------------------- | ------------------------ |
 | tpl             | The reset password message tpl. May be the type specified by the _tplType_ property.                                  | lgnForgotPassTpl         |
 | tplType         | The type of tpl being provided by _tpl_                                                                               | modChunk                 |
 | errTpl          | The error message tpl. May be the type specified by the _errTplType_ property.                                        | lgnErrTpl                |
 | errTplType      | The type of tpls being provided by _errTpl_                                                                           | modChunk                 |
 | emailTpl        | The confirmation email message tpl.                                                                                   | lgnForgotPassEmail       |
 | emailTplAlt     | alternate confirmation email message tpl - for multi-part email with text alternative.                                |                          |
 | emailSubject    | The subject of the email message                                                                                      | Password Retrieval Email |
 | emailTplType    | The type of tpl being provided by _emailTpl_                                                                          | modChunk                 |
 | sentTpl         | The message tpl to show when an email was successfully sent.                                                          | lgnForgotPassSentTpl     |
 | sentTplType     | The type of tpl being provided by _sentTpl_                                                                           | modChunk                 |
 | loginResourceId | The resource to direct users to on successful confirmation.                                                           | 1                        |
 | resetResourceId | The resource that contains the [Login.ResetPassword](extras/login/login.resetpassword "Login.ResetPassword") Snippet. | 1                        |

### tplType Options

 The tplType property takes a different options. They can be:

- _modChunk_ - The tpl provided must be the name of a chunk.
- _file_ - Must be an absolute path to the tpl file.
- _inline_ - The content of the tpl will be directly in the tpl property itself.
- _embedded_ - The tpl is already in the page; just make the error properties be placeholders.

## See Also

1. [Login.Login](extras/login/login.login)
2. [Login.Profile](extras/login/login.profile)
3. [Login.UpdateProfile](extras/login/login.updateprofile)
4. [Login.Register](extras/login/login.register)
   1. [Register.Example Form 1](extras/login/login.register/register.example-form-1)
5. [Login.ConfirmRegister](extras/login/login.confirmregister)
6. [Login.ForgotPassword](extras/login/login.forgotpassword)
7. [Login.ResetPassword](extras/login/login.resetpassword)
8. [Login.ChangePassword](extras/login/login.changepassword)
9. [Login.Tutorials](extras/login/login.tutorials)
    1. [Login.Basic Setup](extras/login/login.tutorials/login.basic-setup)
    2. [Login.Extended User Profiles](extras/login/login.tutorials/login.extended-user-profiles)
    3. [Login.Request Membership](extras/login/login.tutorials/login.request-membership)
    4. [Login.User Profiles](extras/login/login.tutorials/login.user-profiles)
    5. [Login.Using Custom Fields](extras/login/login.tutorials/login.using-custom-fields)
    6. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/login.using-pre-and-post-hooks)
10. [Login.Roadmap](extras/login/login.roadmap)
