---
title: "Login.Extended User Profiles"
_old_id: "905"
_old_uri: "revo/login/login.tutorials/login.extended-user-profiles"
---

## Outline

This tutorial builds the [Basic Setup](extras/login/login.tutorials/login.user-profiles "Login.User Profiles") and [User Profiles](extras/login/login.tutorials/login.user-profiles "Login.User Profiles") tutorials. Do not attempt this tutorial until you've gotten the other login flows setup and working on your site! In this tutorial, you will see how to add extended fields to your users' profiles.

So what going to do in this tutorial is to modify the Snippets that we've already put in place in the standard [User Profiles](extras/login/login.tutorials/login.user-profiles "Login.User Profiles") tutorial.

## Verify that you have the Required Pages

We're not creating any new pages here, but for reference, here are the pages we're dealing with (same as the previous tutorials):

- **Login Page (1)** : the page containing your login form
- **Forgot Password (2)** : the page where users can go when they forgot their password
- **Reset Password Handler (3)** : the hidden page that will actually do the resetting of the password
- **Members Home Page (4)** : the secret clubhouse, available only to valid members
- **Come Again Soon (5)** : the page displayed upon successful logout
- **Request Membership (6)** : the page where users can request membership, i.e. the "Become a Member" page.
- **Request Pending (7)** : notifies the user that the user's request has been received
- **Membership Confirmation Handler (8)** : the hidden page that will actually register the user
- **Home Page (9)** : we're just being thorough – you probably already some page designated as your home page.
- **Update Profile (10)** – where the user can edit their profile
- **View Profile (11)** – where the user can view their profile
- **Change Password (12)** – where the user can change their password.

## Orient Yourself

Just so you know what we're talking about here, we're talking about a user's _extended_ fields. If you edit a user, e.g. the one you created while testing out your login process (**Security -> Manage Users -> Right-click your user**), head over to the Extended Fields tab and you can see any custom user fields.

![](/download/attachments/39355781/user_extended_fields.jpg?version=1&modificationDate=1339739076000)

In the screenshot, you can see that our earlier shenanigans created a few extra fields! See this [forum post](http://forums.modx.com/thread/72395/update-profile-created-bogus-extended-fields#dis-post-426733).

The point is this: any field you add here will be available as a placeholder in your profile.

## Update Pages

### Request Membership (6)

You will probably want to add the extended fields to your membership sign-up form so they can be created from the get-go. If you only want users to be able to add extended fields after they've registered, then you can skip this.

Your request membership form will look a lot like what we're going to build for the Update Profile form. We're merely adding the extra fields to the form that was already in place from the previous tutorial. Here we've added a field named "custom\_field":

``` html
[[!Register?
    &submitVar=`registerbtn`
    &activationResourceId=`8`
    &activationEmailTpl=`lgnActivateEmailTpl`
    &activationEmailSubject=`Thanks for Registering!`
    &submittedResourceId=`7`
    &usergroups=`Members`
    &excludeExtended=`email:required:email,login-updprof-btn`
]]

<div class="register">
    <div class="registerMessage">[[+error.message]]</div>

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam:blank" value="" />

        <label for="username">[[%register.username? &namespace=`login` &topic=`register`]]
            <span class="error">[[+error.username]]</span>
        </label>
        <input type="text" name="username:required:minLength=6" id="username" value="[[+username]]" />

        <label for="password">[[%register.password]]
            <span class="error">[[+error.password]]</span>
        </label>
        <input type="password" name="password:required:minLength=6" id="password" value="[[+password]]" />

        <label for="password_confirm">[[%register.password_confirm]]
            <span class="error">[[+error.password_confirm]]</span>
        </label>
        <input type="password" name="password_confirm:password_confirm=`password`" id="password_confirm" value="[[+password_confirm]]" />

        <label for="fullname">[[%register.fullname]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname:required" id="fullname" value="[[+fullname]]" />

        <label for="email">[[%register.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email:email" id="email" value="[[+email]]" />

        <label for="custom_field">Custom Field
            <span class="error">[[+error.custom_field]]</span>
        </label>
        <input type="text" name="custom_field" id="custom_field" value="[[+custom_field]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="registerbtn" value="Register" />
        </div>
    </form>
</div>
```

Make sure you reference the correct Email Chunk in the **&activationEmailTpl** parameter. In this example, we're using Login's default name, **lgnActivateEmailTpl**.

### Update Profile (10)

We're gonna edit this page to use some more of features of the [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") Snippet. We're going to add a "custom\_field". We're going to verbosely set the **&useExtended** parameter. This ensures that any extra fields posted here end up getting tracked as extended fields.

``` html
[[!UpdateProfile? &excludeExtended=`email:required:email,login-updprof-btn` &useExtended=`1`]]

<div class="update-profile">
    <div class="updprof-error">[[+error.message]]</div>
    [[+login.update_success:if=`[[+login.update_success]]`:is=`1`:then=`[[%login.profile_updated? &namespace=`login` &topic=`updateprofile`]]`]]

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam:blank" value="" />

        <label for="fullname">[[!%login.fullname? &namespace=`login` &topic=`updateprofile`]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname" id="fullname" value="[[+fullname]]" />

        <label for="email">[[!%login.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email:required:email" id="email" value="[[+email]]" />

        <label for="custom_field">Custom Field
            <span class="error">[[+error.custom_field]]</span>
        </label>
        <input type="text" name="custom_field" id="custom_field" value="[[+custom_field]]" /><br/>

                <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>

<p><a href="[[~12]]">Change Password</a></p>
```

Why are we using the **&excludeExtended** parameter? Well... there seems to be a bug in the Login Snippet where these fields with validation rules.

### View Profile (11)

As before, we will be featuring the [Profile](extras/login/login.profile "Login.Profile") Snippet. We just need to add placeholders for the extra fields. In our example we added a **custom\_field** field:

 ``` php
[[!Profile]]

<p>Username: [[+username]]</p>
<p>Full Name: [[+fullname]]</p>
<p>Email: [[+email]]</p>
<p>Custom Field: [[+custom_field]]</p>

<p><a href="[[~10]]">Edit</a></p>
```

## Testing: Making it all Work

### Login

Using a separate browser, you need to log into the front-end. This stuff should work from the previous tutorial.

### View Profile (11)

1. **CHECK:** This page should display your info, including the custom\_field value (or values).

### Update Profile (10)

Try changing your info.

1. **CHECK:** Can you edit your info? Try changing the custom\_field value(s) and saving.

## Variations

The FormIt Snippet has a useful helper Snippet: [FormItCountryOptions](extras/formit/formit.formitcountryoptions "FormIt.FormItCountryOptions"). If you want to track a user's country, it can be a great way to add a country dropdown.

 ``` php
<select name="country">
[[!FormItCountryOptions? &selected=`[[!+country]]` &prioritized=`US,GB,CA,AU` &prioritizedGroupText=`Frequent Visitors` &allGroupText=`Other Countries`]]
</select>
```

There is a similar Snippet for US State options: [FormItStateOptions](extras/formit/formit.formitstateoptions "FormIt.FormItStateOptions")
