---
title: "Login.ResetPassword"
_old_id: "911"
_old_uri: "revo/login/login.resetpassword"
---

<div>- [What is ResetPassword?](#Login.ResetPassword-WhatisResetPassword%3F)
- [Usage](#Login.ResetPassword-Usage)
  - [ResetPassword Properties](#Login.ResetPassword-ResetPasswordProperties)
  - [tplType Options](#Login.ResetPassword-tplTypeOptions)
- [See Also](#Login.ResetPassword-SeeAlso)

</div>What is ResetPassword?
----------------------

 ResetPassword is a simple Snippet that is used in conjunction with [ForgotPassword](/extras/revo/login/login.forgotpassword "Login.ForgotPassword"), allowing users to retrieve and reset their password. This Snippet is placed on the page the User will receive in an email, which when they visit will reset their password.

Usage
-----

 To use the password retrieval functionality, first create the Resource the   
 user will log in to should they click on the confirmation email, and put   
 the [ResetPassword](/extras/revo/login/login.resetpassword "Login.ResetPassword") snippet in. Tell it what Resource the Login snippet is   
 in - or where you'd like it to provide a link back to:

 ```
<pre class="brush: php">[[!ResetPassword? &loginResourceId=`72`]]

``` Then create another resource with the [ForgotPassword](/extras/revo/login/login.forgotpassword "Login.ForgotPassword") snippet, and tell it   
 what Resource the Reset snippet is in:

 ```
<pre class="brush: php">[[!ForgotPassword? &resetResourceId=`123`]]

```### ResetPassword Properties

 ResetPassword comes with some default properties you can override. They are:

 <table id="TBL1376497247020"><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> tpl  
  
</td> <td> The reset password message tpl. May be the type specified by the _tplType_ property. </td> <td> lgnResetPassTpl </td> </tr><tr><td> tplType  
  
</td> <td> The type of tpl being provided by _tpl_ </td> <td> modChunk </td> </tr><tr><td> loginResourceId  
  
</td> <td> The resource to direct users to on successful reset. </td> <td> 1 </td> </tr><tr><td> expiredTpl </td> <td>The temporary password has expired tpl.</td> <td>lgnExpiredTpl

</td></tr><tr><td>changePasswordTpl

 </td> <td>The change password form tpl.</td> <td>lgnResetPassChangePassTpl

</td> </tr><tr><td> autoLogin

 </td> <td> Immediately log in the user upon clicking the reset link from email.</td> <td>false</td> </tr><tr><td>forceChangePassword

 </td> <td> Require immediate password change upon clicking the reset link from email.</td> <td>false</td></tr></tbody></table>### tplType Options

 The tplType property takes a different options. They can be:

- _modChunk_ - The tpl provided must be the name of a chunk.
- _file_ - Must be an absolute path to the tpl file.
- _inline_ - The content of the tpl will be directly in the tpl property itself.
- _embedded_ - The tpl is already in the page; just make the error properties be placeholders.

See Also
--------

1. [Login.Login](/extras/revo/login/login.login)
2. [Login.Profile](/extras/revo/login/login.profile)
3. [Login.UpdateProfile](/extras/revo/login/login.updateprofile)
4. [Login.Register](/extras/revo/login/login.register)
  1. [Register.Example Form 1](/extras/revo/login/login.register/register.example-form-1)
5. [Login.ConfirmRegister](/extras/revo/login/login.confirmregister)
6. [Login.ForgotPassword](/extras/revo/login/login.forgotpassword)
7. [Login.ResetPassword](/extras/revo/login/login.resetpassword)
8. [Login.ChangePassword](/extras/revo/login/login.changepassword)
9. [Login.Tutorials](/extras/revo/login/login.tutorials)
  1. [Login.Basic Setup](/extras/revo/login/login.tutorials/login.basic-setup)
  2. [Login.Extended User Profiles](/extras/revo/login/login.tutorials/login.extended-user-profiles)
  3. [Login.Request Membership](/extras/revo/login/login.tutorials/login.request-membership)
  4. [Login.User Profiles](/extras/revo/login/login.tutorials/login.user-profiles)
  5. [Login.Using Custom Fields](/extras/revo/login/login.tutorials/login.using-custom-fields)
  6. [Login.Using Pre and Post Hooks](/extras/revo/login/login.tutorials/login.using-pre-and-post-hooks)
10. [Login.Roadmap](/extras/revo/login/login.roadmap)