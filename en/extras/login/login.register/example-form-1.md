---
title: "Register.Example Form 1"
_old_id: "975"
_old_uri: "revo/login/login.register/register.example-form-1"
---

This example form will register a user and do the following:

- Only work if the 'registerbtn' POST value is sent (via the register submit button)
- Assign them to the User Groups "Marketing" and "Research"
- Send an activation email with the content in the myActivationEmailTpl (shown at the bottom of this page) and the subject line "Thanks for Registering!"
- Redirect the User to the Resource with ID 45 after the email is sent
- Prefix all Register placeholders with "reg."

## The Resource

``` php 
<h2>Register</h2>

[[!Register?
    &submitVar=`registerbtn`
    &activationResourceId=`12`
    &activationEmailTpl=`myActivationEmailTpl`
    &activationEmailSubject=`Thanks for Registering!`
    &submittedResourceId=`45`
    &usergroups=`Marketing,Research`
    &validate=`nospam:blank,
  username:required:minLength=^6^,
  password:required:minLength=^6^,
  password_confirm:password_confirm=^password^,
  fullname:required,
  email:required:email`
    &placeholderPrefix=`reg.`
]]

<div class="register">
    <div class="registerMessage">[[!+reg.error.message]]</div>

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam" value="[[!+reg.nospam]]" />

        <label for="username">[[%register.username? &namespace=`login` &topic=`register`]]
            <span class="error">[[!+reg.error.username]]</span>
        </label>
        <input type="text" name="username" id="username" value="[[!+reg.username]]" />

        <label for="password">[[%register.password]]
            <span class="error">[[!+reg.error.password]]</span>
        </label>
        <input type="password" name="password" id="password" value="[[!+reg.password]]" />

        <label for="password_confirm">[[%register.password_confirm]]
            <span class="error">[[!+reg.error.password_confirm]]</span>
        </label>
        <input type="password" name="password_confirm" id="password_confirm" value="[[!+reg.password_confirm]]" />

        <label for="fullname">[[%register.fullname]]
            <span class="error">[[!+reg.error.fullname]]</span>
        </label>
        <input type="text" name="fullname" id="fullname" value="[[!+reg.fullname]]" />

        <label for="email">[[%register.email]]
            <span class="error">[[!+reg.error.email]]</span>
        </label>
        <input type="text" name="email" id="email" value="[[!+reg.email]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="registerbtn" value="Register" />
        </div>
    </form>
</div>
```

## The myActivationEmailTpl Chunk

``` php 
<p>[[+username]],</p>

<p>Thanks for registering! To activate your new account, please click on the following link:</p>

<p><a href="[[+confirmUrl]]">[[+confirmUrl]]</a></p>

<p>After activating, you may login with your password and username:</p>

<p>
Username: <strong>[[+username]]</strong><br />
Password: <strong>[[+password]]</strong></p>

<p>If you did not request this message, please ignore it.</p>

<p>Thanks,<br />
<em>Site Administrator</em></p>
```

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
  2. [Login.Basic Setup](extras/login/login.tutorials/login.basic-setup)
  3. [Login.Extended User Profiles](extras/login/login.tutorials/login.extended-user-profiles)
  4. [Login.Request Membership](extras/login/login.tutorials/login.request-membership)
  5. [Login.User Profiles](extras/login/login.tutorials/login.user-profiles)
  6. [Login.Using Custom Fields](extras/login/login.tutorials/login.using-custom-fields)
  7. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/login.using-pre-and-post-hooks)
10. [Login.Roadmap](extras/login/login.roadmap)