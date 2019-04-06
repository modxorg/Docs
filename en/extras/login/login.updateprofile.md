---
title: "UpdateProfile"
_old_id: "914"
_old_uri: "revo/login/login.updateprofile"
---

## What is UpdateProfile?

UpdateProfile is a simple Snippet that allows users who are logged in the in the front-end the ability to edit their profile.

## Usage

To use the profile editing functionality, first create the Resource the 
 user will go to to edit their profile. Then, add this snippet:

``` php 
[[!UpdateProfile? &validate=`fullname:required,email:required:email`]]
```

### UpdateProfile Properties

UpdateProfile comes with some default properties you can override. They are:

| Name                  | Description                                                                                                                                                                                                                                                                                       | Default           |
| --------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| submitVar             | The name of the form submit button that triggers the submission.                                                                                                                                                                                                                                  | login-updprof-btn |
| validate              | A comma-separated list of fields to validate, with each field name as name:validator (eg: username:required,email:required). [Validators](extras/formit/formit.validators "FormIt.Validators") can also be chained, like email:email:required. This property can be specified on multiple lines. |                   |
| redirectToLogin       | If true, will redirect non-logged-in users that visit the page with the snippet to the Unauthorized Page.                                                                                                                                                                                         | 1                 |
| reloadOnSuccess       | If true, the page will redirect to itself with a GET parameter to prevent double-postbacks. If false, it will simply set a success placeholder.                                                                                                                                                   | 1                 |
| emailField            | The field name for the email field in the form.                                                                                                                                                                                                                                                   | email             |
| preHooks              | A comma-separated list of 'hooks', or Snippets, that will be executed before the user's profile is updated but after validation. Also can specify 'captcha' as a hook.                                                                                                                            |                   |
| postHooks             | A comma-separated list of 'hooks', or Snippets, that will be executed after the user's profile is updated.                                                                                                                                                                                        |                   |
| syncUsername          | If set to a column name in the Profile, UpdateProfile will attempt to sync the username to this field after a successful save.                                                                                                                                                                    |                   |
| allowedFields         | A comma-separated list of fields to allow when updating the user's profile. (Leave empty to allow all user profile fields to be updated.)                                                                                                                                                         |                   |
| useExtended           | Whether or not to set any extra fields in the form to the Profiles extended field. This can be useful for storing extra user fields.                                                                                                                                                              | 1                 |
| allowedExtendedFields | A comma-separated list of extended fields to allow in the form, when useExtended is enabled. (Leave empty to allow any extra fields to be set.)                                                                                                                                                   |                   |
| excludeExtended       | A comma-separated list of fields to exclude from setting as extended fields.                                                                                                                                                                                                                      |                   |
| placeholderPrefix     | The prefix to use for all placeholders set by this snippet.                                                                                                                                                                                                                                       |                   |

### The UpdateProfile Form

Then, below this, add in the following HTML (removing any fields you'd like) to be the form. Feel free to style it and adjust the markup (just don't change the form field names). This is also found in core/components/login/chunks/lgnupdateprofile.chunk.tpl.

``` html 
<div class="update-profile">
    <div class="updprof-error">[[+error.message]]</div>
    [[+login.update_success:is=`1`:then=`[[%login.profile_updated? &namespace=`login` &topic=`updateprofile`]]`]]

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam" value="" />

        <label for="fullname">[[!%login.fullname? &namespace=`login` &topic=`updateprofile`]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname" id="fullname" value="[[+fullname]]" />

        <label for="email">[[!%login.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email" id="email" value="[[+email]]" />

        <label for="phone">[[!%login.phone]]
            <span class="error">[[+error.phone]]</span>
        </label>
        <input type="text" name="phone" id="phone" value="[[+phone]]" />

        <label for="mobilephone">[[!%login.mobilephone]]
            <span class="error">[[+error.mobilephone]]</span>
        </label>
        <input type="text" name="mobilephone" id="mobilephone" value="[[+mobilephone]]" />

        <label for="fax">[[!%login.fax]]
            <span class="error">[[+error.fax]]</span>
        </label>
        <input type="text" name="fax" id="fax" value="[[+fax]]" />

        <label for="address">[[!%login.address]]
            <span class="error">[[+error.address]]</span>
        </label>
        <input type="text" name="address" id="address" value="[[+address]]" />

        <label for="country">[[!%login.country]]
            <span class="error">[[+error.country]]</span>
        </label>
        <input type="text" name="country" id="country" value="[[+country]]" />

        <label for="city">[[!%login.city]]
            <span class="error">[[+error.city]]</span>
        </label>
        <input type="text" name="city" id="city" value="[[+city]]" />

        <label for="state">[[!%login.state]]
            <span class="error">[[+error.state]]</span>
        </label>
        <input type="text" name="state" id="state" value="[[+state]]" />

        <label for="zip">[[!%login.zip]]
            <span class="error">[[+error.zip]]</span>
        </label>
        <input type="text" name="zip" id="zip" value="[[+zip]]" />

        <label for="website">[[!%login.website]]
            <span class="error">[[+error.website]]</span>
        </label>
        <input type="text" name="website" id="website" value="[[+website]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>
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