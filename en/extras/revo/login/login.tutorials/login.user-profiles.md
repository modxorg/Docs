---
title: "Login.User Profiles"
_old_id: "915"
_old_uri: "revo/login/login.tutorials/login.user-profiles"
---

<div>- [Outline](#Login.UserProfiles-Outline)
- [Create the Required Pages](#Login.UserProfiles-CreatetheRequiredPages)
  - [Update Profile (10)](#Login.UserProfiles-UpdateProfile%2810%29)
  - [View Profile (11)](#Login.UserProfiles-ViewProfile%2811%29)
  - [Change Password (12)](#Login.UserProfiles-ChangePassword%2812%29)
  - [Members Home Page (4)](#Login.UserProfiles-MembersHomePage%284%29)
- [Testing: Making it all Work](#Login.UserProfiles-Testing%3AMakingitallWork)
  - [Login](#Login.UserProfiles-Login)
  - [View Profile (11)](#Login.UserProfiles-ViewProfile%2811%29)
  - [Update Profile (10)](#Login.UserProfiles-UpdateProfile%2810%29)
- [Next](#Login.UserProfiles-Next)

</div>Outline
-------

This tutorial builds the [Basic Setup](/extras/revo/login/login.tutorials/login.request-membership "Login.Request Membership") tutorial (which in turn was based on the [Basic Setup](/extras/revo/login/login.tutorials/login.basic-setup "Login.Basic Setup")). Do not attempt this tutorial until you've gotten the other login flows setup and working on your site!

Create the Required Pages
-------------------------

As with the [Basic Setup](/extras/revo/login/login.tutorials/login.basic-setup "Login.Basic Setup"), we want to make sure we have the required pages in place before we add in all the Snippets. Make sure the following **9** pages exist on your MODx Revo site (1 - 9 are the same as the previous setup, additional pages highlighted in green):

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

### Update Profile (10)

On this page, we will be featuring the [UpdateProfile](/extras/revo/login/login.updateprofile "Login.UpdateProfile") Snippet. You put the Snippet at the top of the page, and some placeholders throughout the page.

Create the page, and add it to the "Members Only" Resource Group.

For the content, use something like this:

```
<pre class="brush: php">
[[!UpdateProfile? &useExtended=`0`]]
 
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
 
                <br class="clear" />
 
        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>

```This is a stripped down example from what appears on the [UpdateProfile](/extras/revo/login/login.updateprofile "Login.UpdateProfile") page. There are a couple things to note, just for your MODX education:

1. The example uses MODX lexicon entries to translate text, e.g. . See \[[Internationalization](/revolution/2.x/developing-in-modx/advanced-development/internationalization "Internationalization")\] for how you can translate lexicon entries. E.g. `<label>[[!%login.email]]</label>` instead of `<label>Email</label>`. The tag will translate; hard-coding it will not.
2. Note that the password field is **never** made available for direct editing. This is for security reasons. Use the [ChangePassword](/extras/revo/login/login.changepassword "Login.ChangePassword") Snippet for that.

<div class="note">If you don't want a user to be able to edit a field, simply omit it from the form.</div>### View Profile (11)

On this page, we will be featuring the [Profile](/extras/revo/login/login.profile "Login.Profile") Snippet. It's pretty straight forward. You put the Snippet at the top of the page, and some placeholders throughout the page.

Create the page, and add it to the "Members Only" Resource Group.

For the content, use something like this:

```
<pre class="brush: php">
[[!Profile]]
 
<p>Username: [[+username]]</p>
<p>Full Name: [[+fullname]]</p>
<p>Email: [[+email]]</p>

<p><a href="[[~10]]">Edit</a></p>

```Notice that we're putting a link in there so we can edit the profile. Remember: the password is never made available for security reasons.

### Change Password (12)

This is a page where the user can change their password. It happens on a separate page. We're just following along with \[[ChangePassword](/extras/revo/login/login.changepassword "Login.ChangePassword")\] playbook.

```
<pre class="brush: php">
<h2>Change Password</h2>
[[!ChangePassword?
   &submitVar=`change-password`
   &placeholderPrefix=``
   &validateOldPassword=`1`
   &validate=`nospam:blank`
   &reloadOnSuccess=`0`
   &successMessage=`Your password has been updated!`
]]
<div>[[!+successMessage]]</div>
<div class="updprof-error">[[!+error_message]]</div>
<form class="form" action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <div class="ff">
        <label for="password_old">Old Password
            <span class="error">[[!+error.password_old]]</span>
        </label>
        <input type="password" name="password_old" id="password_old" value="[[+password_old]]" />
    </div>
    <div class="ff">
        <label for="password_new">New Password
            <span class="error">[[!+error.password_new]]</span>
        </label>
        <input type="password" name="password_new" id="password_new" value="[[+password_new]]" />
    </div>
    <div class="ff">
        <label for="password_new_confirm">Confirm New Password
            <span class="error">[[!+error.password_new_confirm]]</span>
        </label>
        <input type="password" name="password_new_confirm" id="password_new_confirm" value="[[+password_new_confirm]]" />
    </div>
    <div class="ff">
        <input type="submit" name="change-password" value="Change Password" />
    </div>
</form>

```<div class="note">Watch out for the **&placeholderPrefix** parameter. It has a default of "logcp.", which can have unintended consequences ... so you will almost set this parameter.</div>You'll probably want to put a link to this page on your Profile Editing page.

### Members Home Page (4)

Just to be thorough, you should put a link on your Members Home Page so users can view their profile, e.g.

```
<pre class="brush: php">
...
<p><a href="[[~11]]">View Profile</a></p>

```Testing: Making it all Work
---------------------------

### Login

Using a separate browser, you need to log into the front-end. This stuff should work from the previous tutorial.

### View Profile (11)

1. **CHECK:** This page should display your info.

### Update Profile (10)

Try changing your info.

1. **CHECK:** Can you edit your info? Try changing the Full Name or Email and saving.

Next
----

If you've got this working, try the next tutorial on [Extended User Profiles](/extras/revo/login/login.tutorials/login.extended-user-profiles "Login.Extended User Profiles"). See also the tutorial on [Using Custom Fields](/extras/revo/login/login.tutorials/login.using-custom-fields "Login.Using Custom Fields")