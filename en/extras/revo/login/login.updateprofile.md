---
title: "Login.UpdateProfile"
_old_id: "914"
_old_uri: "revo/login/login.updateprofile"
---

<div>- [What is UpdateProfile?](#Login.UpdateProfile-WhatisUpdateProfile%3F)
- [Usage](#Login.UpdateProfile-Usage)
  - [UpdateProfile Properties](#Login.UpdateProfile-UpdateProfileProperties)
  - [The UpdateProfile Form](#Login.UpdateProfile-TheUpdateProfileForm)
- [See Also](#Login.UpdateProfile-SeeAlso)

</div>What is UpdateProfile?
----------------------

UpdateProfile is a simple Snippet that allows users who are logged in the in the front-end the ability to edit their profile.

Usage
-----

To use the profile editing functionality, first create the Resource the   
 user will go to to edit their profile. Then, add this snippet:

```
<pre class="brush: php">[[!UpdateProfile? &validate=`fullname:required,email:required:email`]]

```### UpdateProfile Properties

UpdateProfile comes with some default properties you can override. They are:

<table id="TBL1376497247018"><tbody><tr><th>Name</th> <th>Description</th> <th>Default</th> </tr><tr><td>submitVar</td> <td>The name of the form submit button that triggers the submission.</td> <td>login-updprof-btn</td> </tr><tr><td>validate</td> <td>A comma-separated list of fields to validate, with each field name as name:validator (eg: username:required,email:required). [Validators](/extras/revo/formit/formit.validators "FormIt.Validators") can also be chained, like email:email:required. This property can be specified on multiple lines.</td> <td> </td> </tr><tr><td>redirectToLogin</td> <td>If true, will redirect non-logged-in users that visit the page with the snippet to the Unauthorized Page.</td> <td>1</td> </tr><tr><td>reloadOnSuccess</td> <td>If true, the page will redirect to itself with a GET parameter to prevent double-postbacks. If false, it will simply set a success placeholder.</td> <td>1</td> </tr><tr><td>emailField</td> <td>The field name for the email field in the form.</td> <td>email</td> </tr><tr><td>preHooks</td> <td>A comma-separated list of 'hooks', or Snippets, that will be executed before the user's profile is updated but after validation. Also can specify 'captcha' as a hook.</td> <td> </td> </tr><tr><td>postHooks</td> <td>A comma-separated list of 'hooks', or Snippets, that will be executed after the user's profile is updated.</td> <td> </td> </tr><tr><td>syncUsername</td> <td>If set to a column name in the Profile, UpdateProfile will attempt to sync the username to this field after a successful save.</td> <td> </td> </tr><tr><td>allowedFields</td> <td>A comma-separated list of fields to allow when updating the user's profile. (Leave empty to allow all user profile fields to be updated.)</td> <td></td> </tr><tr><td>useExtended</td> <td>Whether or not to set any extra fields in the form to the Profiles extended field. This can be useful for storing extra user fields.</td> <td>1</td> </tr><tr><td>allowedExtendedFields</td> <td>A comma-separated list of extended fields to allow in the form, when useExtended is enabled. (Leave empty to allow any extra fields to be set.)</td> <td></td> </tr><tr><td>excludeExtended</td> <td>A comma-separated list of fields to exclude from setting as extended fields.</td> <td> </td> </tr><tr><td>placeholderPrefix</td> <td>The prefix to use for all placeholders set by this snippet.</td> <td> </td></tr></tbody></table>### The UpdateProfile Form

Then, below this, add in the following HTML (removing any fields you'd like) to be the form. Feel free to style it and adjust the markup (just don't change the form field names). This is also found in core/components/login/chunks/lgnupdateprofile.chunk.tpl.

```
<pre class="brush: php"><div class="update-profile">
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

```See Also
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