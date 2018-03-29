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

##  What is a User? 

 A User is simply a representation of a login in MODx Revolution.

 Users can also be assigned to User Groups, which can have [ACLs](administering-your-site/security/policies/acls "ACLs") attached to them to provide Access Controls.

##  User Settings 

 User Settings in MODx Revolution will automatically override any System or Context settings with the same key for that user. They can also be completely unique settings as well. The order of inheritance for Settings is:

`System Settings -> Context Settings -> User Settings`

 To edit the user settings, navigate to **Security -> Manage Users -> Update User (_right-click_) -> Settings (_tab_)**

 You can change user-specific settings only _after_ you've created the user. The "Settings" tab is not visible when you first create the user. 

##  Users in the Front-End 

 When a user is logged into the frontend of your site, their username and ID can be accessed by the following [Properties](making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets"):

 ``` php 

[[+modx.user.id]] - Prints the ID
[[+modx.user.username]] - Prints the username

```

 If a user is not logged in, ID will be blank, and Username will be "(anonymous)".

 As of MODX 2.4.0, the default Username can be set in the Systems Settings with the **default\_username** setting. 

 **Remember** 
 Keep in mind that confusing caveat: just because you have logged into the _manager_ does not mean that you are logged into the _web_ front-end. The user-specific settings and the [getOption](xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") API method obeys this same rule, so if you're not logged in, then the **System Settings -> Context Settings -> User Settings** cannot fully apply. 

##  User Fields 

 Users contain the following fields:

 | Name | Description |

-----
| id | The ID of the user. |
| username | The username of the user. |
| password | The user's encrypted password. |
| active | Either 1 or 0. If not active, the user will not be able to log in. |
| remote\_key | A remote user Key used by remote authentication apps. |
| remote\_data | A JSON array of data used by remote authentication apps. |
 Users also have a Profile attached to them. It contains the following fields:

 | Name | Description |

-----
| internalKey | The ID of the user. |
| fullname | The full name of the user. |
| email | The email of the user. |
| phone | The phone number. |
| mobilephone | The cellphone number. |
| fax | The fax number. |
| blocked | Either 1 or 0. If blocked is set to true, the user will not be able to log in. |
| blockeduntil | A timestamp that, when set, will prevent the user from logging in until this date. |
| blockedafter | A timestamp that, when set, will prevent the user from logging in after this date. |
| logincount | The number of logins for this user. |
| lastlogin | The last time the user logged in. |
| thislogin | The time the user logged in in their current session. |
| failedlogincount | The number of times the user has failed to log in since last logging in. |
| sessionid | The User's session ID that maps to the session table. |
| dob | The date of birth. |
| gender | 0 for neither, 1 for male and 2 for female. |
| address | The physical address. |
| country | The country of the user. |
| city | The city of the user. |
| zip | The zip or postal code for the user. |
| state | The physical state or province of the user. |
| photo | An optional field for a photo. Not used in the UI. |
| comment | An optional comment field for comments on the User. |
| website | The website of the user. |
| extended | A JSON array that can be used to store extra fields for the User. |
##  Grabbing the User via the API 

 The current user can be retrieved in the API via the $modx->user reference. For example, this snippet outputs the username of the user:

 ``` php 

return $modx->user->get('username');

```

 Note that to grab Profile fields, you'll need to first get the modUserProfile object via the Profile alias. For example, this snippet grabs the email of the user and returns it:

 ``` php 

$profile = $modx->user->getOne('Profile');
return $profile ? $profile->get('email') : '';

```

 If the User is not logged in, $modx->user will still be available as an object, but will return 0 as the ID and (Anonymous) as the username.

###  Using Extended Fields 

 Values in the extended field return as an array. They can be manipulated like so:

 ``` php 

/* get the extended field named "color": */
$fields = $profile->get('extended');
$color = $fields['color'];
/* set the color field to red */
$fields = $profile->get('extended');
$fields['color'] = 'red';
$profile->set('extended',$fields);
$profile->save();

```

##  See Also 

1. [Users](administering-your-site/security/users)
2. [User Groups](administering-your-site/security/user-groups)
3. [Resource Groups](administering-your-site/security/resource-groups)
4. [Roles](administering-your-site/security/roles)
5. [Policies](administering-your-site/security/policies)
  1. [Permissions](administering-your-site/security/policies/permissions)
      1. [Permissions - Administrator Policy](administering-your-site/security/policies/permissions/permissions-administrator-policy)
      2. [Permissions - Resource Policy](administering-your-site/security/policies/permissions/permissions-resource-policy)
  2. [ACLs](administering-your-site/security/policies/acls)
  3. [PolicyTemplates](administering-your-site/security/policies/policytemplates)
6. [Security Tutorials](administering-your-site/security/security-tutorials)
  1. [Giving a User Manager Access](administering-your-site/security/security-tutorials/giving-a-user-manager-access)
  2. [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages)
  3. [Creating a Second Super Admin User](administering-your-site/security/security-tutorials/creating-a-second-super-admin-user)
  4. [Restricting an Element from Users](administering-your-site/security/security-tutorials/restricting-an-element-from-users)
  5. [More on the Anonymous User Group](administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Hardening MODX Revolution](administering-your-site/security/hardening-modx-revolution)
8. [Security Standards](administering-your-site/security/security-standards)
9. [Troubleshooting Security](administering-your-site/security/troubleshooting-security)
  1. [Resetting a User Password Manually](administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually)

 [Extending modUser](developing-in-modx/advanced-development/extending-moduser "Extending modUser")