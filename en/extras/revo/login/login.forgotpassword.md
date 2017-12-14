---
title: "Login.ForgotPassword"
_old_id: "906"
_old_uri: "revo/login/login.forgotpassword"
---

<div>- [What is ForgotPassword?](#Login.ForgotPassword-WhatisForgotPassword%3F)
- [Usage](#Login.ForgotPassword-Usage)
  - [ForgotPassword Properties](#Login.ForgotPassword-ForgotPasswordProperties)
  - [tplType Options](#Login.ForgotPassword-tplTypeOptions)
- [See Also](#Login.ForgotPassword-SeeAlso)
 
</div>What is ForgotPassword?
-----------------------

 ForgotPassword is a simple Snippet that handles the form when a User has forgotten their password and needs to retrieve it.

Usage
-----

 To use the password retrieval functionality, first create the Resource the user will log into when they click on the confirmation email, and put the [ResetPassword](/extras/revo/login/login.resetpassword "Login.ResetPassword") snippet in. Tell it what Resource the Login snippet is in - or where you'd like it to provide a link back to:

 ```
<pre class="brush: php">
[[!ResetPassword? &loginResourceId=`72`]]

``` Then create another resource with the ForgotPassword snippet, and tell it   
 what Resource the Reset snippet is in:

 ```
<pre class="brush: php">
[[!ForgotPassword? &resetResourceId=`123`]]

```### ForgotPassword Properties

 ForgotPassword comes with some default properties you can override. They are:

 <table id="TBL1376497247019"><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> tpl </td> <td> The reset password message tpl. May be the type specified by the _tplType_ property. </td> <td> lgnForgotPassTpl </td> </tr><tr><td> tplType </td> <td> The type of tpl being provided by _tpl_ </td> <td> modChunk </td> </tr><tr><td> emailTpl </td> <td> The confirmation email message tpl. </td> <td> lgnForgotPassEmail </td> </tr><tr><td> emailTplAlt </td> <td> alternate confirmation email message tpl - for multi-part email with text alternative. </td> <td> </td> </tr><tr><td> emailSubject </td> <td> The subject of the email message </td> <td> Password Retrieval Email </td> </tr><tr><td> emailTplType </td> <td> The type of tpl being provided by _emailTpl_ </td> <td> modChunk </td> </tr><tr><td> sentTpl </td> <td> The message tpl to show when an email was successfully sent. </td> <td> lgnForgotPassSentTpl </td> </tr><tr><td> sentTplType </td> <td> The type of tpl being provided by _sentTpl_ </td> <td> modChunk </td> </tr><tr><td> loginResourceId </td> <td> The resource to direct users to on successful confirmation. </td> <td> 1 </td> </tr><tr><td> resetResourceId </td> <td> The resource that contains the [Login.ResetPassword](/extras/revo/login/login.resetpassword "Login.ResetPassword") Snippet. </td> <td> 1 </td></tr></tbody></table>### tplType Options

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