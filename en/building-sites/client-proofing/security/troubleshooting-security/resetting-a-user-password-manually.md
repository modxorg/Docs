---
title: "Resetting a User Password Manually"
description: "Reset the password of a user of MODX when the link for a forgotten password does not reach them: through the API."
_old_id: "484"
_old_uri: "2.x/administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually"
---

## Resetting a User Password via Database Manipulation

It is not uncommon for a User account to become inaccessible because of a lost or forgotten password. In many cases, this can easily be resolved by having the user use the Forgot Password link on the login form. In some cases you need to reset the password directly.

**The password cannot be written into the database by hand**
MODX 3 hashes the passwords with `MODX\Revolution\Hashing\modNative`, which is the `password_hash()` function of PHP. A database has no such function, so the value of the field `password` cannot be calculated outside of PHP.

There is a second way. Set the field `hash_class` of the user to the class `MODX\Revolution\Hashing\modMD5`, and write the password as an MD5 hash. The user can then log in with it, and the hash is recalculated with `modNative` the next time the password is changed. The name of the class has to be given with its namespace. The older name without it works only through a deprecated alias that prints a warning.

## Resetting a Password via the API

You can also reset the password (or manipulate any part of the MODX application) by using the API. Below is a sample script to update the password and e-mail address of a given user. It also ensures this user is in the Administrator User Group.

``` php
<?php
define('MODX_API_MODE', true); // Gotta set this one constant.

// Reset the password and email of an existing user
// and ensure they are a member of the specified group
$username = 'theusername';
$password = 'newpassword';
$email = 'new@email.com';

$user_group = 1; // 1 for Administrator

// Full path to the MODX index.php file
require_once('/full/path/to/index.php');

// ====== Don't change anything below this line ======
if (empty($username) || empty($password) || empty($email)) {
        die('ERROR: Missing criteria.');
}

$modx = new \MODX\Revolution\modX();
$modx->initialize('mgr');

$query = $modx->newQuery(\MODX\Revolution\modUser::class);
$query->where(['username' => $username]);
$user = $modx->getObjectGraph(\MODX\Revolution\modUser::class, '{ "Profile":{}, "UserGroupMembers":{} }', $query);
if (!$user) {
        die("ERROR: No user with username $username");
}

$user->set('username', $username);
$user->set('active', 1);
$user->set('password', $password);
$user->Profile->set('email', $email);
$user->Profile->set('blocked', 0);
$user->Profile->set('blockeduntil', 0);
$user->Profile->set('blockedafter', 0);

// Verify the user is a member of specified User Group
$is_member = false;
if (!empty($user->UserGroupMembers)) {
        foreach ($user->UserGroupMembers as $UserGroupMembers) {
                if ($UserGroupMembers->get('user_group') == $user_group) {
                        $is_member = true;
                        break;
                }
        }
}
// Add the User to the User Group if he is not a member
if (!$is_member) {
        // Verify the user group exists
        $UserGroup = $modx->getObject(\MODX\Revolution\modUserGroup::class, $user_group);
        if (!$UserGroup) {
                die("ERROR: User Group $user_group does not exist.");
        }

        $Member = $modx->newObject(\MODX\Revolution\modUserGroupMember::class);
        $Member->set('user_group', $user_group);
        $Member->set('member', $user->get('id'));
        // Super User = role 2
        $Member->set('role', 2);
        $Member->set('rank', 0);
        $user->addOne($Member, 'UserGroupMembers');
}

/* save user */
if (!$user->save()) {
        die('ERROR: Could not save user.');
}

print "SUCCESS: User $username updated.";

?>
```

You can put this script anywhere on your server so long as you update the path to the primary **index.php** file. You can execute the script by hitting it in a browser or via the command line.

**Warning**
Be extremely careful when using a script like this! If possible, do NOT put it inside your document root. Put it outside of your document root and execute the script via the command line.

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
