---
title: "Login"
_old_id: "668"
_old_uri: "revo/login"
---

## What is Login?

Login is a security Extra for MODx Revolution, that allows for front-end login capabilities, as well as profile updating, registration, and forgot password functionality.

## History

Login was written by Shaun McCormick as a login/security Extra, and first released on June 25th, 2009. It is now maintained in its fork by the MODX team.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/login>

### Development and Bug Reporting

Login is stored and developed in GitHub, and can be found here: <https://github.com/modxcms/Login>

Bugs can be filed here: <https://github.com/modxcms/Login/issues>

## Usage

The Login Extra is composed of 10 Snippets:

- [Login](/extras/revo/login/login.login "Login.Login") - For login forms.
- [UpdateProfile](/extras/revo/login/login.updateprofile "Login.UpdateProfile") - For adding front-end profile editing.
- [Profile](/extras/revo/login/login.profile "Login.Profile") - Sets Profile fields as placeholders, which allows you to display a User's Profile.
- [ForgotPassword](/extras/revo/login/login.forgotpassword "Login.ForgotPassword") - For retrieving lost passwords.
- [ResetPassword](/extras/revo/login/login.resetpassword "Login.ResetPassword") - Confirmation page snippet for actually resetting the User's password.
- [Register](/extras/revo/login/login.register "Login.Register") - For processing registration forms.
- [ConfirmRegister](/extras/revo/login/login.confirmregister "Login.ConfirmRegister") - Confirmation page for processing a Registration form using activation.
- [ChangePassword](/extras/revo/login/login.changepassword "Login.ChangePassword") - For changing user passwords on the front-end.
- ActiveUsers - Shows a list of active, signed-on users
- isLoggedIn - Will check to see if user is logged into the current or specific context. If not, redirects to unauthorized page.

### Specific Functionality

You can also see these articles for implementing different functionality in the Login package:

- [Using Custom Fields](/extras/revo/login/login.tutorials/login.using-custom-fields "Login.Using Custom Fields")
- [Using Pre and Post Hooks](/extras/revo/login/login.tutorials/login.using-pre-and-post-hooks "Login.Using Pre and Post Hooks")

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