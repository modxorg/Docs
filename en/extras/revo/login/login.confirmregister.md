---
title: "Login.ConfirmRegister"
_old_id: "904"
_old_uri: "revo/login/login.confirmregister"
---

<div>- [What is ConfirmRegister?](#Login.ConfirmRegister-WhatisConfirmRegister%3F)
- [Usage](#Login.ConfirmRegister-Usage)
  - [Default Properties](#Login.ConfirmRegister-DefaultProperties)
  - [Events](#Login.ConfirmRegister-Events)
- [See Also](#Login.ConfirmRegister-SeeAlso)

</div>What is ConfirmRegister? 
-------------------------

ConfirmRegister is a simple snippet that confirms a registration by a User from the [Register](/extras/revo/login/login.register "Login.Register") snippet, when 'activation' in that snippet is set to 1 (the default). It is placed on a separate, "Registration Activated" page.

Usage 
------

[Register](/extras/revo/login/login.register "Login.Register") by default requires the User to activate their account before logging in. The Snippet creates the modUser object and sets its "active" field to 0. The User then gets an email with a URL to activate their account with. Once the User visits the page, their account is set to "active=1", and they can then login.

To enable this, you will need to create an Activation page by creating a new Resource, and putting this [ConfirmRegister](/extras/revo/login/login.confirmregister "Login.ConfirmRegister") snippet inside of it:

```
<pre class="brush: php">
[[!ConfirmRegister]]

```An example [Register](/extras/revo/login/login.register "Login.Register") snippet call with activation would look like this:

```
<pre class="brush: php">
[[!Register? 
   &activationEmailTpl=`myActivationEmailTpl`
   &activationEmailSubject=`Please activate your account!`
   &activationResourceId=`26`
]]

```This would send the User the email specified in the "myActivationEmailTpl" chunk, with the specified subject line, which will direct the User to the Resource 26 - the Resource you put the ConfirmRegister snippet call in - to activate their account.

### Default Properties 

ConfirmRegister has some default properties packaged into it. They are:

<table><tbody><tr><th>Name </th><th>Description </th><th>Default </th></tr><tr><td>redirectTo </td><td>Optional. After a successful confirmation, redirect to this Resource. </td><td></td></tr><tr><td>redirectParams </td><td>Optional. A JSON object of parameters to pass when redirecting using redirectTo. </td><td></td></tr><tr><td>authenticate </td><td>Authenticate and login the user to the current context after confirming registration. </td><td>1 </td></tr><tr><td>authenticateContexts </td><td>Optional. A comma-separated list of contexts to authenticate to. Defaults to the current context. </td><td></td></tr><tr><td>errorPage </td><td>Optional. If set, will redirect user to a custom error page if they try to access this page after activating their account. </td></tr></tbody></table>### Events 

ConfirmRegister also fires the [OnUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuseractivate "OnUserActivate") plugin event after the User is activated, and passes in a 'user' parameter, which contains the newly-activated modUser object.

See Also 
---------

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