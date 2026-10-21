---
title: "Ручной сброс пароля пользователя"
translation: "building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually"
description: "Сбросить пароль пользователя MODX, когда ссылка для восстановления не доходит: в базе или через API."
---

## Сброс пароля через правку базы данных

Бывает, что учётная запись недоступна из-за утерянного или забытого пароля. Часто помогает ссылка Forgot Password на форме входа. Иногда пароль нужно сбросить вручную прямо в базе. Нужен доступ к базе с таблицами MODX через PHPMyAdmin или другой клиент, где можно править или UPDATE записи.

**Пароль нельзя записать в базу вручную**
В MODX 3 пароли хешируются классом `MODX\Revolution\Hashing\modNative` — это функция `password_hash()` из PHP. В базе такой функции нет, поэтому значение поля `password` нельзя посчитать вне PHP.

Есть и второй путь: полю `hash_class` пользователя можно задать класс `MODX\Revolution\Hashing\modMD5`, а пароль записать как MD5-хеш — в базе для этого есть функция `MD5()`. Вот запрос, который выполняется в базе — в имени таблицы стоит префикс вашей установки:

``` sql
UPDATE modx_users SET hash_class = 'MODX\\Revolution\\Hashing\\modMD5', password = MD5('the-new-password') WHERE username = 'theusername';
```

Пользователь сможет войти, и при следующей смене пароля хеш будет пересчитан через `modNative`. Имя класса задаётся вместе с пространством имён; старое имя без него работает только через устаревший псевдоним, который печатает предупреждение.

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

$modx = new \MODX\Revolution\modX();
$modx->initialize('mgr');

$query = $modx->newQuery(\MODX\Revolution\modUser::class);
$query->where( array('username'=>$username) );
$user = $modx->getObjectGraph(\MODX\Revolution\modUser::class, '{ "Profile":{}, "UserGroupMembers":{} }', $query);
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
        $UserGroup = $modx->getObject(\MODX\Revolution\modUserGroup::class, $user_group);
        if (!$UserGroup) {
                die ("ERROR: User Group $user_group does not exist.");
        }

        $Member = $modx->newObject(\MODX\Revolution\modUserGroupMember::class);
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

## Смотрите также

1. [Безопасность (ACLs)](building-sites/client-proofing/security)
2. [Пользователи](building-sites/client-proofing/security/users)
3. [Группы пользователей](building-sites/client-proofing/security/user-groups)
4. [Группы ресурсов](building-sites/client-proofing/security/resource-groups)
5. [Роли](building-sites/client-proofing/security/roles)
6. [Политики](building-sites/client-proofing/security/policies)
    1. [Разрешения](building-sites/client-proofing/security/policies/permissions)
        1. [Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACL](building-sites/client-proofing/security/policies/acls)
    3. [Шаблоны политик](building-sites/client-proofing/security/policies/policytemplates)
7. [Учебники по безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Доступ менеджера](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Второй суперпользователь](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение элемента](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Об анонимном пользователе](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
8. [Диагностика безопасности](building-sites/client-proofing/security/troubleshooting-security)
    1. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
