---
title: "Login.Using Custom Fields"
_old_id: "916"
_old_uri: "revo/login/login.tutorials/login.using-custom-fields"
---

## What are Custom Fields?

Login supports setting custom (or, "Extended") fields using Revolution's User Profile "extended" field. Basically, MODx stores the field data in a JSON object, which can be retrieved at any time.

Login does it quite simply: using the &useExtended property on the [Register](extras/login/login.register "Login.Register"), [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") and [Profile](extras/login/login.profile "Login.Profile") snippets. It is set enabled by default.

## Usage

Basically, to start using extended fields, all you have to do is add a form field to your [Register](extras/login/login.register "Login.Register") and [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") forms. That's it. The snippets will automatically then check for any fields in the POST that aren't in the User table, and if found, store them as extended (custom) fields. They will then be expanded when using the [Profile](extras/login/login.profile "Login.Profile") snippet. For example, a Register form that has this in it:

 ``` php
[[!Register? &submitVar=`go`]]
...
<label>Favorite Color:
<span class="error">[[+error.color]]</span>
<input type="text" name="color:required" value="[[+color]]" />
</label>
...
<input type="submit" name="go" value="Register!" />
```

will automatically store the "color" field in the extended fields data. You can even use validators, such as :required as shown here, on the custom field in your Register snippet.

Login won't store the field named in the &submitVar property. In this example, "go" wont be stored because it's passed in the &submitVar property.

Then, you can use [Profile](extras/login/login.profile "Login.Profile") to display this data somewhere on a page:

 ``` php
[[!Profile]]

<p>[[+username]]'s Favorite Color: [[+color]]</p>
```

Or even when using the [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") snippet:

 ``` php
[[!UpdateProfile]]
...
<label>Favorite Color:
<span class="error">[[+error.color]]</span>
<input type="text" name="color:required" value="[[+color]]" />
</label>
```

Simple as that!

### Directly Creating and Populating Attribute Containers

 ``` php
  <input type="hidden" name="january[Spaces]" value="" />
  <input type="hidden" name="january[Tables]" value="" />
  <input type="hidden" name="january[Chairs]" value="" />
  <input type="hidden" name="january[NeedsElectric]" value="" />
  <input type="hidden" name="january[Misc]" value="" />
```

![](/download/attachments/21135392/login.extendedUserContainers.png?version=1&modificationDate=1329484036000)

### Excluding Fields from Saving as Extended

Both the [Register](extras/login/login.register "Login.Register") and [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") snippets have a property called "excludeExtended" that takes a comma-separated list of field names to exclude from being saved as extended fields. So, say you had fields named 'nospam' and 'customProp', that you didn't want to be saved as custom fields in Register. You'd simply call Register like so:

 ``` php
[[!Register? &excludeExtended=`nospam,customProp`]]
```

### In the Manager

Extended fields can also be edited and added from within the Manager, by editing the User and clicking on the "Extended Fields" tab. Make sure if you add fields there, though, that you add them to your UpdateProfile and/or Register forms.

Also, if you have an extended field in a container, such as in this example, where you have test -> boo:

![](/download/attachments/21135392/login.extended.nest.png?version=1&modificationDate=1281708667000)

You can access them with the . syntax:

 ``` php
[[!Profile]]

Value of nested attribute: [[+test.below]]
```

...will display 'boo!' there.

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
  1. [Login.Basic Setup](extras/login/login.tutorials/login.basic-setup)
  2. [Login.Extended User Profiles](extras/login/login.tutorials/login.extended-user-profiles)
  3. [Login.Request Membership](extras/login/login.tutorials/login.request-membership)
  4. [Login.User Profiles](extras/login/login.tutorials/login.user-profiles)
  5. [Login.Using Custom Fields](extras/login/login.tutorials/login.using-custom-fields)
  6. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/login.using-pre-and-post-hooks)
10. [Login.Roadmap](extras/login/login.roadmap)
