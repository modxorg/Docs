---
title: "Register"
_old_id: "909"
_old_uri: "revo/login/login.register"
---

## What is Register? 

 Register is a registration form processing [Snippet](developing-in-modx/basic-development/snippets "Snippets"). An example call can be found [here](extras/login/login.register/register.example-form-1 "Register.Example Form 1").

## Usage 

 Simply place the Register snippet in the Resource where your registration form is. (A default one called lgnRegisterForm is provided by the [Login](extras/login "Login") 3PC.) This snippet also requires Activation by the User, so they will get an email in their inbox regarding their signup.

### Default Properties 

 Register has some default properties packaged into it. They are:

| Name                              | Description                                                                                                                                                                                                                                | Default             |
| --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------- |
| activation                        | Whether or not to require activation for proper registration. If true, users will not be marked active until they have activated their account. Defaults to true. Will only work if the registration form passes an email field.           | 1                   |
| activationEmailSubject            | The subject of the activation email.                                                                                                                                                                                                       |                     |
| activationEmailTpl                | The activation email tpl. The text of the email includes a link where users can activate their new account and their username and (generated) password.                                                                                    | lgnActivateEmailTpl |
| activationEmailTplType            | The type of tpls being provided for the activation email.                                                                                                                                                                                  | modChunk            |
| activationResourceId              | The Resource ID where the ConfirmRegister snippet for activation is located.                                                                                                                                                               | 1                   |
| activationttl                     | Number of minutes until the activation email expires. Defaults to 3 hours.                                                                                                                                                                 | 180                 |
| autoLogin                         | Whether or not to automatically login the User after successful registration. (Requires activation = 0)                                                                                                                                    | 0                   |
| customValidators                  | A comma-separated list of custom validator names (snippets) you plan to use in this form. They must be explicitly stated here, or they will not be run.                                                                                    |                     |
| emailField                        | The name of the field to use for the new User's email address.                                                                                                                                                                             | email               |
| ensurePasswordStrength            | If set to Yes, Register will ensure the user enters a strong enough password. Strong passwords are passwords with multiple words or non-alphabetic characters in them.                                                                     | 0                   |
| ensurePasswordStrengthSuggestions | If ensurePasswordStrength is set to Yes, and the password fails the strength test, Register will supply this many number of suggestions to the user for their password.                                                                    | 5                   |
| excludeExtended                   | A comma-separated list of fields to exclude from setting as extended fields.                                                                                                                                                               |                     |
| generatePassword                  | If set to Yes, Register will generate a random password for the user, overwriting any passed password. Useful for automatic generation of passwords.                                                                                       | 0                   |
| maximumPossibleStrongerPasswords  | If ensurePasswordStrength is set to Yes, then this is the maximum amount of suggestions that Register can find to consider the supplied password "strong". Making this number higher makes the check more lenient; lower makes it tougher. | 25                  |
| minimumStrongPasswordWordCount    | If ensurePasswordStrength is set to Yes, if a supplied password has this many words, then it will be consider a strong password.                                                                                                           | 3                   |
| moderatedResourceId               | If a prehook sets the user as moderated, then send to this Resource instead of the submittedResourceId. Leave blank to bypass.                                                                                                             |                     |
| passwordField                     | The name of the field to use for the new User's password.                                                                                                                                                                                  | password            |
| passwordWordSeparator             | If ensurePasswordStrength is set to Yes, this will be the separator between words when determining how many words are in a supplied password.                                                                                              |                     |
| persistParams                     | Optional. A JSON object of parameters to persist across the register process. Useful when using redirect on ConfirmRegister to redirect to another page (eg, for shopping carts).                                                          |                     |
| preHooks                          | A comma-separated list of 'hooks', or Snippets, that will be executed before the user is registered but after validation. Also can specify 'recaptcha' as a hook.                                                                          |                     |
| postHooks                         | A comma-separated list of 'hooks', or Snippets, that will be executed after the user is registered.                                                                                                                                        |                     |
| submitVar                         | The var to check for to load the Register functionality. If empty or set to false, Register will process the form on all POST requests.                                                                                                    | login-register-btn  |
| successMsg                        | Optional. If not redirecting using the submittedResourceId parameter, will display this message instead.                                                                                                                                   |                     |
| submittedResourceId               | If set, will redirect to the specified Resource after the User submits the registration form.                                                                                                                                              |                     |
| trimPassword                      | If set to Yes, Register will trim the password of whitespace at the beginning and end when processing it.                                                                                                                                  | 1                   |
| useExtended                       | Whether or not to set any extra fields in the form to the Profiles extended field. This can be useful for storing extra user fields.                                                                                                       | 1                   |
| usergroups                        | Optional. A comma-separated list of User Group names or IDs to add the newly-registered User to.                                                                                                                                           |                     |
| usergroupsField                   | Optional. The name of the field to use for the new User's usergroups, eg: using checkbox or radio input.                                                                                                                                   |                     |
| usernameField                     | The name of the field to use for the new User's username.                                                                                                                                                                                  | username            |
| validate                          | A comma-separated list of fields to validate, with each field name as name:validator (eg: username:required,email:required). Validators can also be chained, like email:email:required. This property can be specified on multiple lines.  |                     |
| validatePassword                  | Whether or not to validate the sent password when registering. Recommended to leave this Yes unless you are generating your own password in a hook.                                                                                        | 1                   |

### Validators 

 Validators in Login follow the same syntax as [FormIt Validators](extras/formit/formit.validators "FormIt.Validators"). You can use the methods described there to use them in your Login-based snippets.

### Custom Validators 

 You can also do custom validators by creating a Snippet and using that as the validator name. You **must** specify its name in the customValidators property, or it will not be run. Example: We create a Snippet called 'equalTo' and on our field, we set:

``` php 
<label>
  Boxes:<span class="error">[[+error.boxes]]</span>
  <input type="text" name="boxes" id="boxes" value="[[+boxes]]" />
</label>
```

 And in our Register call:

``` php 
[[!Register?
  &validate=`boxes:equalTo=^123^`
  &customValidators=`equalTo`
]]
```

 Now, in our snippet, our code would look like so:

``` php 
<?php
if ($scriptProperties['value'] !== $scriptProperties['param']) {
    return 'Value not equal to: '.$scriptProperties['param'];
}
return true;
?>
```

 Returning true will make the field valid. Any other return value will be the error message. Snippets get passed the following parameters in the $scriptProperties array:

- **key**: The name of the field.
- **value**: The value of the field.
- **param**: The parameter, if applicable, passed to the validator.
- **type**: The name of the validator.
- **validator**: A reference to the lgnValidator instance.

## Post-Validation 

 After the form has been validated, the Register snippet can do the following:

- Assign the user to usergroups
- Send an activation email
- Redirect to a specific Resource (such as a "Registered!" page)
- or, display a success message.

### Assigning User to User Groups 

 Assigning the User to specified User Groups is easy. Just specify a comma-separated list of either the name of the User Group or the User Group's ID in the "&usergroups" property. This example will assign the User to the "Marketing" and "Research" groups:

``` php 
[[!Register? &usergroups=`Marketing,Research`]]
```

 Alternatively, you can also specify the Role you would like to add the user to in the User Group by adding it after the User Group name with a colon, like so:

``` php 
[[!Register? &usergroups=`Marketing:Member,Research:Super User`]]
```

### Sending an Activation Email 

 Register by default requires the User to activate their account before logging in. The Snippet creates the modUser object and sets its "active" field to 0. The User then gets an email with a URL to activate their account with. Once the User visits the page, their account is set to "active=1", and they can then login.

 To enable this, you will need to create an Activation page by creating a new Resource, and putting the [ConfirmRegister](extras/login/login.confirmregister "Login.ConfirmRegister") snippet inside of it.

 Next, you'll need to specify an email template chunk to use for the email being sent to the user. An example one is provided with the name: lgnActivateEmailTpl.

 An example Register snippet call with activation would look like this:

``` php 
[[!Register?
   &activationEmailTpl=`myActivationEmailTpl`
   &activationEmailSubject=`Please activate your account!`
   &activationResourceId=`26`
   &submittedResourceId=`325`
]]
```

 This would send the User the email specified in the "myActivationEmailTpl" chunk, with the specified subject line, which will direct the User to the Resource 26 to activate their account. It will also, after sending the email, redirect the User to a "Please activate your account page" of sorts at Resource 325.

 Activation can be turned off by setting &activation=`0`. Note, though, that this will mean anyone - including spambots - can register and be active users in your site. 

 The &activationEmailTpl field can be a chunk name by default. You can change the type of the field by setting &activationEmailTplType to one of the following values:

- **modChunk** - The default. A name of a chunk.
- **file** - Specify a filename with an absolute path. You can use {core\_path}, {base\_path} or {assets\_path} as placeholders for this value.
- **inline** - Specify the html straight in the property value.

 You can also set the time-to-live for an activation email, as well. This will restrict the number of minutes until the activation window expires. You can do this by setting the value in the "activationttl" property. It defaults to 3 hours. 

### Redirecting to a Resource After Validation 

 Redirection is simple: just specify the ID of the Resource to redirect to in the "submittedResourceId" property. For example:

``` php 
[[!Register? &submittedResourceId=`23`]]
```

 Will redirect to the Resource with ID 23. It will also append "username" and "email" GET parameters to the URL.

### Display a Success Message 

 If the "submittedResourceId" property is not specified, Register will simply display a success message to the \[\[+error.message\]\] placeholder. This is the value of the "successMsg" property. For example:

``` php 
[[!Register? &successMsg=`Thanks for registering!`]]
```

 Will display "Thanks for registering!" in the \[\[+error.message\]\] property in the Resource that your \[\[Register\]\] snippet call is in after the User submits a valid registration form.

## Typical Setup 

 It's really easy to get confused about the various pages (resources) used for registration. In a typical setup, there are four separate pages:

 **Register** - The page containing the Registration form - forwards to the "Thanks for Registering" page. This page contains the form and the Register snippet tag.

 **Thanks for Registering** - The page that the user is forwarded to from the Registration form - This page should contain only text (no snippet tags) saying "Thank you for Registering - you'll get an email" - etc.

 **Confirm Register** - The page the link in the registration email points to. (The user never sees this page.) It activates the user and forwards to the Registration Confirmed page. This page should contain only the ConfirmRegister snippet tag.

 **Registration Confirmed** - The page that the user is forwarded to from the Confirm Register page. This page should contain only text (no snippet tags) saying something like "Congratulations, you're now an active user"

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