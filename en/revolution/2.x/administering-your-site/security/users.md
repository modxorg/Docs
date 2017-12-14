---
title: "Users"
_old_id: "329"
_old_uri: "2.x/administering-your-site/security/users"
---

- [What is a User?](#Users-WhatisaUser?)
- [User Settings](#Users-UserSettings)
- [Users in the Front-End](#Users-UsersintheFrontEnd)
- [User Fields](#Users-UserFields)
- [Grabbing the User via the API](#Users-GrabbingtheUserviatheAPI)
  - [Using Extended Fields](#Users-UsingExtendedFields)

 What is a User? 
-----------------

 A User is simply a representation of a login in MODx Revolution.

 Users can also be assigned to User Groups, which can have [ACLs](/revolution/2.x/administering-your-site/security/policies/acls "ACLs") attached to them to provide Access Controls.

 User Settings 
---------------

 User Settings in MODx Revolution will automatically override any System or Context settings with the same key for that user. They can also be completely unique settings as well. The order of inheritance for Settings is:

`System Settings -> Context Settings -> User Settings`

 To edit the user settings, navigate to **Security -> Manage Users -> Update User (_right-click_) -> Settings (_tab_)**

<div class="warning"> You can change user-specific settings only _after_ you've created the user. The "Settings" tab is not visible when you first create the user. </div> Users in the Front-End 
------------------------

 When a user is logged into the frontend of your site, their username and ID can be accessed by the following [Properties](/revolution/2.x/making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets"):

```
<pre class="brush: php">[[+modx.user.id]] - Prints the ID
[[+modx.user.username]] - Prints the username

``` If a user is not logged in, ID will be blank, and Username will be "(anonymous)".

<div class="note"> **Remember**   
 Keep in mind that confusing caveat: just because you have logged into the _manager_ does not mean that you are logged into the _web_ front-end. The user-specific settings and the [getOption](/xpdo/2.x/class-reference/xpdoobject/configuration-accessors/getoption "getOption") API method obeys this same rule, so if you're not logged in, then the **System Settings -> Context Settings -> User Settings** cannot fully apply. </div> User Fields 
-------------

 Users contain the following fields:

<table><thead><tr><th> Name </th> <th> Description </th> </tr></thead><tbody><tr><td> id </td> <td> The ID of the user. </td> </tr><tr><td> username </td> <td> The username of the user. </td> </tr><tr><td> password </td> <td> The user's encrypted password. </td> </tr><tr><td> active </td> <td> Either 1 or 0. If not active, the user will not be able to log in. </td> </tr><tr><td> remote\_key </td> <td> A remote user Key used by remote authentication apps. </td> </tr><tr><td> remote\_data </td> <td> A JSON array of data used by remote authentication apps. </td></tr></tbody></table> Users also have a Profile attached to them. It contains the following fields:

<table id="TBL1376497247036"><thead><tr><th> Name </th> <th> Description </th> </tr></thead><tbody><tr><td> internalKey </td> <td> The ID of the user. </td> </tr><tr><td> fullname </td> <td> The full name of the user. </td> </tr><tr><td> email </td> <td> The email of the user. </td> </tr><tr><td> phone </td> <td> The phone number. </td> </tr><tr><td> mobilephone </td> <td> The cellphone number. </td> </tr><tr><td> fax </td> <td> The fax number. </td> </tr><tr><td> blocked </td> <td> Either 1 or 0. If blocked is set to true, the user will not be able to log in. </td> </tr><tr><td> blockeduntil </td> <td> A timestamp that, when set, will prevent the user from logging in until this date. </td> </tr><tr><td> blockedafter </td> <td> A timestamp that, when set, will prevent the user from logging in after this date. </td> </tr><tr><td> logincount </td> <td> The number of logins for this user. </td> </tr><tr><td> lastlogin </td> <td> The last time the user logged in. </td> </tr><tr><td> thislogin </td> <td> The time the user logged in in their current session. </td> </tr><tr><td> failedlogincount </td> <td> The number of times the user has failed to log in since last logging in. </td> </tr><tr><td> sessionid </td> <td> The User's session ID that maps to the session table. </td> </tr><tr><td> dob </td> <td> The date of birth. </td> </tr><tr><td> gender </td> <td> 0 for neither, 1 for male and 2 for female. </td> </tr><tr><td> address </td> <td> The physical address. </td> </tr><tr><td> country </td> <td> The country of the user. </td> </tr><tr><td> city </td> <td> The city of the user. </td> </tr><tr><td> zip </td> <td> The zip or postal code for the user. </td> </tr><tr><td> state </td> <td> The physical state or province of the user. </td> </tr><tr><td> photo </td> <td> An optional field for a photo. Not used in the UI. </td> </tr><tr><td> comment </td> <td> An optional comment field for comments on the User. </td> </tr><tr><td> website </td> <td> The website of the user. </td> </tr><tr><td> extended </td> <td> A JSON array that can be used to store extra fields for the User. </td></tr></tbody></table> Grabbing the User via the API 
-------------------------------

 The current user can be retrieved in the API via the $modx->user reference. For example, this snippet outputs the username of the user:

```
<pre class="brush: php">return $modx->user->get('username');

``` Note that to grab Profile fields, you'll need to first get the modUserProfile object via the Profile alias. For example, this snippet grabs the email of the user and returns it:

```
<pre class="brush: php">$profile = $modx->user->getOne('Profile');
return $profile ? $profile->get('email') : '';

``` If the User is not logged in, $modx->user will still be available as an object, but will return 0 as the ID and (Anonymous) as the username.

###  Using Extended Fields 

 Values in the extended field return as an array. They can be manipulated like so:

```
<pre class="brush: php">/* get the extended field named "color": */
$fields = $profile->get('extended');
$color = $fields['color'];
/* set the color field to red */
$fields = $profile->get('extended');
$fields['color'] = 'red';
$profile->set('extended',$fields);
$profile->save();

``` See Also 
----------

1. [Users](/revolution/2.x/administering-your-site/security/users)
2. [User Groups](/revolution/2.x/administering-your-site/security/user-groups)
3. [Resource Groups](/revolution/2.x/administering-your-site/security/resource-groups)
4. [Roles](/revolution/2.x/administering-your-site/security/roles)
5. [Policies](/revolution/2.x/administering-your-site/security/policies)
  1. [Permissions](/revolution/2.x/administering-your-site/security/policies/permissions)
      1. [Permissions - Administrator Policy](/revolution/2.x/administering-your-site/security/policies/permissions/permissions-administrator-policy)
      2. [Permissions - Resource Policy](/revolution/2.x/administering-your-site/security/policies/permissions/permissions-resource-policy)
  2. [ACLs](/revolution/2.x/administering-your-site/security/policies/acls)
  3. [PolicyTemplates](/revolution/2.x/administering-your-site/security/policies/policytemplates)
6. [Security Tutorials](/revolution/2.x/administering-your-site/security/security-tutorials)
  1. [Giving a User Manager Access](/revolution/2.x/administering-your-site/security/security-tutorials/giving-a-user-manager-access)
  2. [Making Member-Only Pages](/revolution/2.x/administering-your-site/security/security-tutorials/making-member-only-pages)
  3. [Creating a Second Super Admin User](/revolution/2.x/administering-your-site/security/security-tutorials/creating-a-second-super-admin-user)
  4. [Restricting an Element from Users](/revolution/2.x/administering-your-site/security/security-tutorials/restricting-an-element-from-users)
  5. [More on the Anonymous User Group](/revolution/2.x/administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Hardening MODX Revolution](/revolution/2.x/administering-your-site/security/hardening-modx-revolution)
8. [Security Standards](/revolution/2.x/administering-your-site/security/security-standards)
9. [Troubleshooting Security](/revolution/2.x/administering-your-site/security/troubleshooting-security)
  1. [Resetting a User Password Manually](/revolution/2.x/administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually)

 [Extending modUser](/revolution/2.x/developing-in-modx/advanced-development/extending-moduser "Extending modUser")