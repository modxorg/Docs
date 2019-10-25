---
title: "ConfirmRegister"
_old_id: "904"
_old_uri: "revo/login/login.confirmregister"
---

## What is ConfirmRegister?

ConfirmRegister is a simple snippet that confirms a registration by a User from the [Register](extras/login/login.register "Login.Register") snippet, when 'activation' in that snippet is set to 1 (the default). It is placed on a separate, "Registration Activated" page.

## Usage

[Register](extras/login/login.register "Login.Register") by default requires the User to activate their account before logging in. The Snippet creates the modUser object and sets its "active" field to 0. The User then gets an email with a URL to activate their account with. Once the User visits the page, their account is set to "active=1", and they can then login.

To enable this, you will need to create an Activation page by creating a new Resource, and putting this [ConfirmRegister](extras/login/login.confirmregister "Login.ConfirmRegister") snippet inside of it:

 ``` php
[[!ConfirmRegister]]
```

An example [Register](extras/login/login.register "Login.Register") snippet call with activation would look like this:

 ``` php
[[!Register?
   &activationEmailTpl=`myActivationEmailTpl`
   &activationEmailSubject=`Please activate your account!`
   &activationResourceId=`26`
]]
```

This would send the User the email specified in the "myActivationEmailTpl" chunk, with the specified subject line, which will direct the User to the Resource 26 - the Resource you put the ConfirmRegister snippet call in - to activate their account.

### Default Properties

ConfirmRegister has some default properties packaged into it. They are:

| Name                 | Description                                                                                                                 | Default |
| -------------------- | --------------------------------------------------------------------------------------------------------------------------- | ------- |
| redirectTo           | Optional. After a successful confirmation, redirect to this Resource.                                                       |         |
| redirectParams       | Optional. A JSON object of parameters to pass when redirecting using redirectTo.                                            |         |
| authenticate         | Authenticate and login the user to the current context after confirming registration.                                       | 1       |
| authenticateContexts | Optional. A comma-separated list of contexts to authenticate to. Defaults to the current context.                           |         |
| errorPage            | Optional. If set, will redirect user to a custom error page if they try to access this page after activating their account. |

### Events

ConfirmRegister also fires the [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate "OnUserActivate") plugin event after the User is activated, and passes in a 'user' parameter, which contains the newly-activated modUser object.

## See Also

1. [Login.Login](extras/login/login)
2. [Login.Profile](extras/login/login.profile)
3. [Login.UpdateProfile](extras/login/login.updateprofile)
4. [Login.Register](extras/login/login.register)
   1. [Register.Example Form 1](extras/login/login.register/example-form-1)
5. [Login.ConfirmRegister](extras/login/login.confirmregister)
6. [Login.ForgotPassword](extras/login/login.forgotpassword)
7. [Login.ResetPassword](extras/login/login.resetpassword)
8. [Login.ChangePassword](extras/login/login.changepassword)
9. [Login.Tutorials](extras/login/login.tutorials)
    1. [Login.Basic Setup](extras/login/login.tutorials/basic-setup)
    2. [Login.Extended User Profiles](extras/login/login.tutorials/extended-user-profiles)
    3. [Login.Request Membership](extras/login/login.tutorials/request-membership)
    4. [Login.User Profiles](extras/login/login.tutorials/profiles)
    5. [Login.Using Custom Fields](extras/login/login.tutorials/using-custom-fields)
10. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
11. [Login.Roadmap](extras/login/login.roadmap)
