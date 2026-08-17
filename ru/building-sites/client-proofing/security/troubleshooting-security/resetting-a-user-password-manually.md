---
title: "Ручной сброс пароля пользователя"
translation: "building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually"
---

## Сброс пароля через правку базы данных

Бывает, что учётная запись недоступна из-за утерянного или забытого пароля. Часто помогает ссылка Forgot Password на форме входа. Иногда пароль нужно сбросить вручную прямо в базе. Нужен доступ к базе с таблицами MODX через PHPMyAdmin или другой клиент, где можно править или UPDATE записи.

### Сброс пароля в MODX 2.1+

В MODX 2.1+ пользователи по умолчанию создаются с алгоритмом хеширования PBKDF2. В MySQL или SQL Server обычно нет функций для таких хешей. Поэтому при ручном сбросе в базе также смените hash\_class пользователя с hashing.modPBKDF2 на hashing.modMD5. Затем через родную функцию MD5() задайте значение поля password. Пример MySQL UPDATE:

``` php
UPDATE modx_users SET hash_class = 'hashing.modMD5', password = MD5('the-new-password') WHERE username = 'theusername';
```

Чтобы пароль потом снова автоматически перешёл на PBKDF2, установите [pbkdf2Convert Plugin](https://modx.com/extras/package/pbkdf2convert) из Package Management.

### Сброс пароля в MODX 2.0.x

В MODX 2.0.x достаточно записать в поле password валидный MD5-хеш прямо в таблице. Пример MySQL UPDATE по username:

``` php
UPDATE modx_users SET password = MD5('the-new-password') WHERE username = 'theusername';
```

## Сброс пароля через API

Пароль (и любую часть приложения MODX) можно менять через API. Ниже пример скрипта: обновляет пароль и email пользователя и гарантирует членство в группе Administrator.

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
```

Скрипт можно положить в любое место на сервере, если обновить путь к основному **index.php**. Запускайте его из браузера или из командной строки.

**Warning**
С таким скриптом будьте крайне осторожны. По возможности не кладите его внутрь document root. Держите его вне document root и запускайте из командной строки.
