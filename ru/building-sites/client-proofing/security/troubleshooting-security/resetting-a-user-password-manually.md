---
title: "Ручной сброс пароля пользователя"
translation: "building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually"
description: "Сбросить пароль пользователя MODX, когда ссылка для восстановления не доходит: в базе или через API."
---

## Сброс пароля через правку базы данных

Пусть пользователь откроет ссылку Forgot Password на форме входа. Если учётная запись всё ещё недоступна, сбросьте пароль в базе. Нужен клиент, в котором можно выполнить UPDATE.

**Штатный хеш в базе не посчитать**
В MODX 3 пароль хранится классом `MODX\Revolution\Hashing\modNative`. Запросом к базе этот хеш не получить.

Задайте полю `hash_class` пользователя класс `MODX\Revolution\Hashing\modMD5` и запишите пароль как MD5-хеш. В базе для этого есть функция `MD5()`. Выполните этот запрос. В имени таблицы стоит префикс вашей установки:

``` sql
UPDATE modx_users SET hash_class = 'MODX\\Revolution\\Hashing\\modMD5', password = MD5('the-new-password') WHERE username = 'theusername';
```

Пользователь сможет войти. Следующая смена пароля по-прежнему хеширует через `MODX\Revolution\Hashing\modMD5`. Чтобы вернуться к штатному хешеру, поставьте `hash_class` в `MODX\Revolution\Hashing\modNative` и после этого сохраните новый пароль в менеджере. Имя класса задаётся вместе с пространством имён. Старое имя без него работает только через устаревший псевдоним, который печатает предупреждение.

## Сброс пароля через API

Скрипт задаёт новый пароль существующему пользователю. Пароль хешируется классом, который уже записан в `hash_class`.

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
    die('ERROR: Нет пользователя с таким именем.');
}

$user->set('password', $password);
if (!$user->save()) {
    die('ERROR: Не удалось сохранить пользователя.');
}

echo 'SUCCESS: пароль обновлён.';
```

Положите скрипт в любое место на сервере и поправьте путь к основному **index.php**. Запускайте его из браузера или из командной строки.

> [!WARNING]
> С таким скриптом будьте крайне осторожны. По возможности не кладите его внутрь document root. Держите его вне document root и запускайте из командной строки.

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
