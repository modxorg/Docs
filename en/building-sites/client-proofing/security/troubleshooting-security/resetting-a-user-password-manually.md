---
title: "Resetting a User Password Manually"
description: "Reset the password of a user of MODX when the link for a forgotten password does not reach them: in the database or through the API."
_old_id: "484"
_old_uri: "2.x/administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually"
---

## Resetting a User Password via Database Manipulation

Have the user try the Forgot Password link on the login form. If the account is still unreachable, reset the password in the database.

**The password cannot be written into the database by hand**
MODX 3 stores the password as a hash that only PHP can produce. A database statement cannot calculate that hash.

Set the user's `hash_class` to `MODX\Revolution\Hashing\modMD5` and write the password as an MD5 hash. The database has an `MD5()` function for that. Run this statement. The table name carries your installation's prefix:

``` sql
UPDATE modx_users SET hash_class = 'MODX\\Revolution\\Hashing\\modMD5', password = MD5('the-new-password') WHERE username = 'theusername';
```

The user can then log in with it. The next password change keeps hashing with `MODX\Revolution\Hashing\modMD5`. To return to the shipped hasher, set `hash_class` to `MODX\Revolution\Hashing\modNative` and then save a new password in the manager. The name of the class has to be given with its namespace. The older name without it works only through a deprecated alias that prints a warning.

## Resetting a Password via the API

This script sets a new password for an existing user. The password is hashed with the class already stored in `hash_class`.

``` php
<?php
define('MODX_API_MODE', true);
require_once '/full/path/to/index.php';

$username = 'theusername';
$password = 'newpassword';

$modx = new \MODX\Revolution\modX();
$modx->initialize('mgr');

$user = $modx->getObject(\MODX\Revolution\modUser::class, ['username' => $username]);
if (!$user) {
    die('ERROR: No user with that username.');
}

$user->set('password', $password);
if (!$user->save()) {
    die('ERROR: Could not save the user.');
}

echo 'SUCCESS: password updated.';
```

Put the script anywhere on the server, and update the path to the main **index.php**. Run it in a browser or from the command line.

> [!WARNING]
> Be extremely careful with a script like this. If possible, do not put it inside your document root. Put it outside the document root and run it from the command line.

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
