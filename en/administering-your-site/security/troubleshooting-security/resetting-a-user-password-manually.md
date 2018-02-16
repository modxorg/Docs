---
title: "Resetting a User Password Manually"
_old_id: "484"
_old_uri: "2.x/administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually"
---

<div>- [Resetting a User Password via Database Manipulation](#ResettingaUserPasswordManually-ResettingaUserPasswordviaDatabaseManipulation)
  - [Resetting Password in MODX 2.1+](#ResettingaUserPasswordManually-ResettingPasswordinMODX2.1)
  - [Resetting Password in MODX 2.0.x](#ResettingaUserPasswordManually-ResettingPasswordinMODX2.0.x)
- [Resetting a Password via the API](#ResettingaUserPasswordManually-ResettingaPasswordviatheAPI)

</div>Resetting a User Password via Database Manipulation
---------------------------------------------------

It is not uncommon for a User account to become inaccessible because of a lost/forgotten password. In many cases, this can easily be resolved by having the user use the Forgot Password link on the login form. But in some cases you may need to manually reset the password directly in the database. You will need access to the database containing the MODX tables in order to this, either via PHPMyAdmin or another database client that allows you to edit or UPDATE database records.

### Resetting Password in MODX 2.1+

In MODX 2.1+, users are created by default with the a hashing algorithm called PBKDF2. Databases like MySQL or SQL Server generally do not have functions for calculating these hashes, and as a result, in order to manually reset the password in the database, you will also need to change the hash\_class specified for the user from hashing.modPBKDF2 to hashing.modMD5. Then you can use the native MD5() function to set the value of the password field appropriately. Here is an example MySQL UPDATE statement:

```
<pre class="brush: php">
UPDATE modx_users SET hash_class = 'hashing.modMD5', password = MD5('the-new-password') WHERE username = 'theusername';

```If you want to then have the user password automatically converted back to PBKDF2, you can install the [pbkdf2Convert Plugin](http://modx.com/extras/package/pbkdf2convert) available from Package Management.

### Resetting Password in MODX 2.0.x

In MODX 2.0.x, you can simply reset the password field with a valid MD5 hash value directly in the database table. Here is an example MySQL UPDATE statement that can reset a user's password by username:

```
<pre class="brush: php">
UPDATE modx_users SET password = MD5('the-new-password') WHERE username = 'theusername';

```Resetting a Password via the API
--------------------------------

You can also reset the password (or manipulate any part of the MODX application) by using the API. Below is a sample script to update the password and email address of a given user. It also ensures this user is in the Administrator User Group.

```
<pre class="brush: php">
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



$modx= new modX();
$modx->initialize('mgr');

$query = $modx->newQuery('modUser');
$query->where( array('username'=>$username) );
$user = $modx->getObjectGraph('modUser', '{ "Profile":{}, "UserGroupMembers":{} }', $query);
// print_r($user); exit;
if (!$user) {
        die("ERROR: No user with username $username");
}


$user->set('username',$username);
$user->set('active',1);
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
        $UserGroup = $modx->getObject('modUserGroup', $user_group);
        if (!$UserGroup) {
                die ("ERROR: User Group $user_group does not exist.");
        }

        $Member = $modx->newObject('modUserGroupMember');
        $Member->set('user_group', $user_group); 
        $Member->set('member', $user->get('id'));
        // Super User = role 2
        $Member->set('role', 2); 
        $Member->set('rank', 0);
        $user->addOne($Member,'UserGroupMembers');
}

/* save user */
if (!$user->save()) {
        die('ERROR: Could not save user.');
}

print "SUCCESS: User $username updated.";

?>

```You can put this script anywhere on your server so long as you update the path to the primary **index.php** file. You can execute the script by hitting it in a browser or via the command line.

<div class="warning">**Warning**  
Be extremely careful when using a script like this! If possible, do NOT put it inside your document root – instead put it outside of your document root and execute the script via the command line.</div>