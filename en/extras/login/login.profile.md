---
title: "Profile"
_old_id: "908"
_old_uri: "revo/login/login.profile"
---

## What is Profile?

Profile sets all the current User's (or a specified User's) Profile fields as placeholders, allowing you to display User Profile information on a page.

## Usage

Simply add this Snippet to whatever page you want to set the User's Profile fields as placeholders on:

 ``` php
[[!Profile]]
```

And then display them with placeholders like such:

 ``` php
<p>Username: [[+username]]</p>
<p>Email: [[+email]]</p>
<p>State: [[+state]]</p>
```

The password fields are never set as placeholders, and are never accessible, for security reasons.

### Profile Properties

Profile comes with some default properties you can override. They are:

| Name        | Description                                                                                                 | Default |
| ----------- | ----------------------------------------------------------------------------------------------------------- | ------- |
| prefix      | A string to prefix all placeholders for fields that will be set by this Snippet.                            |         |
| user        | Optional. Either a user ID or username. If set, will use this user rather than the currently logged in one. |         |
| useExtended | If true, will set as placeholders all extended fields as well.                                              | 1       |

## Example

Display the currently logged in user's email and username.

 ``` php
[[!Profile]]

<p>Username: [[+username]]</p>
<p>Email: [[+email]]</p>
```

Grab the profile for the user 'marksmith', and add a prefix to the placeholders of 'user.':

 ``` php
[[!Profile? &user=`marksmith` &prefix=`user.`]]
```

Display the currently logged in username's favorite color (an extended field), with the prefix of 'usr.':

 ``` php
[[!Profile? &prefix=`usr.`]]

<p>[[+usr.username]]'s favorite color is [[+usr.color]]</p>
```

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
    4. [Login.User Profiles](extras/login/login.tutorials/user-profiles)
    5. [Login.Using Custom Fields](extras/login/login.tutorials/using-custom-fields)
    6. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
10. [Login.Roadmap](extras/login/login.roadmap)
