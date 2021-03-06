---
title: "Login.Using Pre and Post Hooks"
_old_id: "917"
_old_uri: "revo/login/login.tutorials/login.using-pre-and-post-hooks"
---

## Hooking it Up with Login

The [Register](extras/login/login.register "Login.Register"), [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") and [Login](extras/login/login "Login.Login") snippets have properties named 'preHooks' and 'postHooks'. These properties allow you to attach custom functionality to both before and after each one of those Snippets executes its main actions.

## Using Custom Hooks

Hooks are basically Snippets that run after the form is validated. Hooks can be chained; the first hook will execute, and if succeeds, will proceed onto the next hook. The snippet should return true on success and either false or an error message on failure. If the snippet returns false, hooks listed after the snippet in the respective hooks parameter will not execute. However, if the specified snippet is not found, the hooks following it in the list will still execute.

Your custom Snippets must return **true** when used as a hook. Returning "false" indicates failure, and execution of the process stops (e.g. Login or Register).

- Pre-Hooks in Login are fired before the action occurs, but after field validation. If a preHook fails, the snippet wont proceed with its normal action.
- Post-Hooks in Login are fired after the action occurs. The User is already saved at this point. However, note that getUser() will not necessarily return the active user object!

## Coding Hooks

To create a custom hook, create a Snippet and reference its name in the &preHooks or &postHooks property in the Register and/or UpdateProfile snippets.

### Accessing the fields in the hook

The fields in the form are available in the snippet in the 'fields' via the Hooks API. Example:

``` php
$email = $hook->getValue('email');
```

You can also grab all the values of the form:

``` php
$formFields = $hook->getValues();
$email = $formFields['email'];
```

Post-Hooks have special fields in addition to the ones passed in the form that can be accessed for each Snippet:

#### Register

``` php
// A reference to the modUser object
$user = $hook->getValue('register.user');
// A reference to the modUserProfile object
$profile = $hook->getValue('register.profile');
// An array of usergroup names that the User joined
$usergroups = $hook->getValue('register.usergroups');
```

#### UpdateProfile

``` php
// A reference to the modUser object
$user = $hook->getValue('updateprofile.user');
// A reference to the modUserProfile object
$profile = $hook->getValue('updateprofile.profile');
// A boolean stating if the username was changed
$changed = $hook->getValue('updateprofile.usernameChanged');
```

### Accessing Snippet Properties

You can access properties passed to Snippets like Register and Login, like this:

``` php
$properties = $hook->login->controller->config;
```

### Custom preHook return values

Snippets should return true on success. On failure, the snippet can set error messages in the preHook object's errors variable and return false. In either case, hooks listed after the custom hook in the &preHooks parameter will not execute.

The $hook object is available in the snippet in the 'hook' member of the $scriptProperties array. It can be used to return generic error messages to the preHook from the snippet:

``` php
$errorMsg = 'User not found';
$hook->addError('user',$errorMsg);
return false;
```

## Examples

### Register custom email postHook

Say we want to send a custom email to communitymanager@jerrys.com every time a user signs up.

We'd create a snippet named 'hookComEmail', and use this code:

``` php
$message = 'Hi, a new User signed up: '.$hook->getValue('username')
 . ' with email '.$hook->getValue('email').'.';
$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,'admin@jerrys.org');
$modx->mail->set(modMail::MAIL_FROM_NAME,'Jerrys Site');
$modx->mail->set(modMail::MAIL_SENDER,'Jerrys Site');
$modx->mail->set(modMail::MAIL_SUBJECT,'New User Signed Up');
$modx->mail->address('to','communitymanager@jerrys.com');
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$err);
}
$modx->mail->reset();
/* tell our snippet we're good and can continue */
return true;
```

Then we'd adjust our Register snippet call to load the postHook:

``` php
[[!Register? &postHooks=`hookComEmail`]]
```

And we're done!

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