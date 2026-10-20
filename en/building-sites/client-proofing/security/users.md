---
title: "Users"
description: "The users of MODX: their fields, the flag of the superuser, the settings of a user, and the properties of the user on the front-end."
_old_id: "329"
_old_uri: "2.x/administering-your-site/security/users"
---

## What is a User?

A User is a login in MODX.

Users are assigned to User Groups, which carry [ACLs](building-sites/client-proofing/security/policies/acls "ACLs") that provide the access.

## The Superuser

The field `sudo` makes a user a superuser: `checkPolicy()` returns `true` right away, and the policy checks do not run for it at all. The user sees everything, whatever the ACLs say.

Only a user with the permission `set_sudo` can give it away. The administrator of a fresh installation gets it.

## User Settings

The settings of a user override any System or Context settings with the same key, and they can be unique to that user as well. The order of inheritance for Settings is:

`System Settings → Context Settings → User Settings`

To edit the user settings, navigate to the lock icon in the user menu → **Users** → **Update User** (right-click) → **Settings** (tab).

You can change user-specific settings only _after_ you've created the user. The "Settings" tab is not visible when you first create the user. It is shown only to a user who has the permissions `settings` **and** `namespace`.

## Users in the Front-End

When a user is logged into the frontend of your site, their username and ID are available as [Properties](building-sites/properties-and-property-sets "Properties and Property Sets"):

``` php
[[+modx.user.id]] - Prints the ID
[[+modx.user.username]] - Prints the username
```

If a user is not logged in, ID will be blank, and Username will be "(anonymous)".

The default Username is set with the `default_username` setting.

**Remember**
Keep in mind that confusing caveat: just because you have logged into the _manager_ does not mean that you are logged into the _web_ front-end. The user-specific settings and the [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") API method obeys this same rule. If you're not logged in, the **System Settings → Context Settings → User Settings** cannot fully apply.

## The Fields of a User

Users contain the following fields:

| Name           | Description                                                                                                   |
| -------------- | ------------------------------------------------------------------------------------------------------------- |
| id             | The ID of the user.                                                                                           |
| username       | The username of the user.                                                                                     |
| password       | The user's encrypted password.                                                                                |
| cachepwd       | The cached password of the user.                                                                              |
| class\_key     | The class of the user. A user of a derived class inherits the behaviour of that class.                        |
| active         | Either 1 or 0. If not active, the user will not be able to log in.                                            |
| remote\_key    | A remote user Key used by remote authentication apps.                                                         |
| remote\_data   | A JSON array of data used by remote authentication apps.                                                      |
| hash\_class    | The class that hashes the password of the user. The default of MODX 3 is `MODX\Revolution\Hashing\modNative`. |
| salt           | The salt that the password of the user is hashed with.                                                        |
| primary\_group | The group that the user gets the dashboard and the access of its primary group from.                          |
| session\_stale | Whether the session of the user is stale.                                                                     |
| sudo           | Whether the user is a superuser. See [The Superuser](#the-superuser).                                         |
| createdon      | The date the user was created.                                                                                |

Users also have a Profile attached to them. It contains the following fields:

| Name             | Description                                                                                                                                                                                                                                       |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| internalKey      | The ID of the user.                                                                                                                                                                                                                               |
| fullname         | The full name of the user.                                                                                                                                                                                                                        |
| email            | The email of the user.                                                                                                                                                                                                                            |
| phone            | The phone number.                                                                                                                                                                                                                                 |
| mobilephone      | The cellphone number.                                                                                                                                                                                                                             |
| fax              | The fax number.                                                                                                                                                                                                                                   |
| blocked          | Either 1 or 0. If blocked is set to true, the user will not be able to log in.                                                                                                                                                                    |
| blockeduntil     | A timestamp that, when set, will prevent the user from logging in until this date.                                                                                                                                                                |
| blockedafter     | A timestamp that, when set, will prevent the user from logging in after this date.                                                                                                                                                                |
| logincount       | The number of logins for this user.                                                                                                                                                                                                               |
| lastlogin        | The last time the user logged in.                                                                                                                                                                                                                 |
| thislogin        | The time the user logged in in their current session.                                                                                                                                                                                             |
| failedlogincount | The number of times the user has failed to log in since last logging in.                                                                                                                                                                          |
| sessionid        | The User's session ID that maps to the session table. Deprecated, to be removed in 3.2.                                                                                                                                                           |
| dob              | The date of birth.                                                                                                                                                                                                                                |
| gender           | 0 for neither, 1 for male and 2 for female.                                                                                                                                                                                                       |
| address          | The physical address.                                                                                                                                                                                                                             |
| country          | The country of the user.                                                                                                                                                                                                                          |
| city             | The city of the user.                                                                                                                                                                                                                             |
| zip              | The zip or postal code for the user.                                                                                                                                                                                                              |
| state            | The physical state or province of the user.                                                                                                                                                                                                       |
| photo            | The path to the picture of the user. It is shown in the header of the manager and is loaded through the Media Source of the setting `photo_profile_source`. If the user has no picture and the setting `enable_gravatar` is on, Gravatar is used. |
| comment          | An optional comment field for comments on the User.                                                                                                                                                                                               |
| website          | The website of the user.                                                                                                                                                                                                                          |
| extended         | A JSON array that can be used to store extra fields for the User.                                                                                                                                                                                 |

## The Settings of the Accounts

| Setting                         | What it does                                                          |
| ------------------------------- | --------------------------------------------------------------------- |
| `passwordless_activated`        | Turns the login by a magic link on. Off by default.                   |
| `passwordless_expiration`       | The lifetime of the magic link, in seconds. 3600 by default.          |
| `password_min_length`           | The minimum length of a password. 12 by default.                      |
| `password_generated_length`     | The length of a password that MODX generates. 16 by default.          |
| `allow_multiple_emails`         | Whether a user may have several addresses.                            |
| `clean_phone_number`            | Whether the phone number is cleaned before it is saved.               |
| `default_username`              | The name of the user that is not logged in. `(anonymous)` by default. |
| `enable_gravatar`               | Whether Gravatar is used when the user has no picture.                |
| `photo_profile_source`          | The Media Source the picture of the user is loaded from.              |
| `unauthorized_page`             | The page an unauthorized user is sent to.                             |
| `access_context_enabled`        | Whether the access to a context is checked at all.                    |
| `access_resource_group_enabled` | Whether the access to a resource group is checked at all.             |

## Grabbing the User via the API

The current user can be retrieved in the API via the `$modx->user` reference. For example, this snippet outputs the username of the user:

``` php
return $modx->user->get('username');
```

To read the Profile fields, get the `modUserProfile` object through the Profile alias first. For example, this snippet grabs the email of the user and returns it:

``` php
$profile = $modx->user->getOne('Profile');
return $profile ? $profile->get('email') : '';
```

If the User is not logged in, `$modx->user` is still available as an object, but returns 0 as the ID and (Anonymous) as the username.

To write your own User class, see [Extending modUser](extending-modx/custom-users "Extending modUser").

### Using Extended Fields

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

## See Also

1. [Security (ACLs)](building-sites/client-proofing/security)
2. [Users](building-sites/client-proofing/security/users)
3. [User Groups](building-sites/client-proofing/security/user-groups)
4. [Resource Groups](building-sites/client-proofing/security/resource-groups)
5. [Roles](building-sites/client-proofing/security/roles)
6. [Policies](building-sites/client-proofing/security/policies)
    1. [Permissions](building-sites/client-proofing/security/policies/permissions)
        1. [Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACLs](building-sites/client-proofing/security/policies/acls)
    3. [Policy Templates](building-sites/client-proofing/security/policies/policytemplates)
7. [Security Tutorials](building-sites/client-proofing/security/security-tutorials)
    1. [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Creating a Second Super Admin User](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Restricting an Element from Users](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [More on the Anonymous User Group](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
8. [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security)
    1. [Resetting a User Password Manually](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
