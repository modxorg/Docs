---
title: "ChangePassword"
_old_id: "903"
_old_uri: "revo/login/login.changepassword"
---

- [What is ChangePassword?](#Login.ChangePassword-WhatisChangePassword%3F)
- [Usage](#Login.ChangePassword-Usage)
  - [ChangePassword Properties](#Login.ChangePassword-ChangePasswordProperties)
- [See Also](#Login.ChangePassword-SeeAlso)



## What is ChangePassword? 

ChangePassword is a simple Snippet that is used in conjunction with [Login](/extras/revo/login/login.login "Login.Login"), allowing users to change their password. You can place it anywhere, and it will process a form you must provide and change the user's password.

## Usage 

Simply create a Change Password form, and at the top of the page, put the snippet call. For example:

``` php 
<h2>Change Password</h2>
[[!ChangePassword?
   &submitVar=`change-password`
   &placeholderPrefix=`cp.`
   &validateOldPassword=`1`
   &validate=`nospam:blank`
]]
<div class="updprof-error">[[!+cp.error_message]]</div>
<form class="form" action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <div class="ff">
        <label for="password_old">Old Password
            <span class="error">[[!+cp.error.password_old]]</span>
        </label>
        <input type="password" name="password_old" id="password_old" value="[[+cp.password_old]]" />
    </div>
    <div class="ff">
        <label for="password_new">New Password
            <span class="error">[[!+cp.error.password_new]]</span>
        </label>
        <input type="password" name="password_new" id="password_new" value="[[+cp.password_new]]" />
    </div>
    <div class="ff">
        <label for="password_new_confirm">Confirm New Password
            <span class="error">[[!+cp.error.password_new_confirm]]</span>
        </label>
        <input type="password" name="password_new_confirm" id="password_new_confirm" value="[[+cp.password_new_confirm]]" />
    </div>
    <div class="ff">
        <input type="submit" name="change-password" value="Change Password" />
    </div>
</form>
```

### ChangePassword Properties 

ChangePassword comes with some default properties you can override. They are:

| Name | Description | Default |
|------|-------------|---------|
| submitVar | The var to check for to load the ChangePassword functionality. If empty or set to false, ChangePassword will process the form on all POST requests. | logcp-submit |
| fieldOldPassword | The field name of the old password field. | password\_old |
| fieldNewPassword | The field name of the new password field. | password\_new |
| fieldConfirmNewPassword | Optional. If set, the field name of the confirm password field, and will be checked against the new password field during submission. | password\_new\_confirm |
| validateOldPassword | Set to 1 or 0. Define whether user is required to enter current password to successfully reset password. | 1 |
| preHooks | What scripts to fire, if any, after the form passes validation but before save. This can be a comma-separated list of hooks, and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet. |  |
| postHooks | What scripts to fire, if any, after the user has been registered. This can be a comma-separated list of hooks, and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet. |  |
| redirectToLogin | If a user is not logged in and accesses this Resource, redirect them to the Unauthorized Page. | 1 |
| reloadOnSuccess | If 1, the page will redirect to itself with a GET parameter to prevent double-postbacks. If 0, it will simply set a success placeholder. | 1 |
| successMessage | If reloadOnSuccess is set to 0, output this message in the \[prefix\].successMessage placeholder. |  |
| placeholderPrefix | The prefix to use for all placeholders set by this snippet. | logcp. |

## See Also 

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