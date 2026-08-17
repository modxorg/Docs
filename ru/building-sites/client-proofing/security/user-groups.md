---
title: "Группы пользователей"
translation: "building-sites/client-proofing/security/user-groups"
---

## Что такое группа пользователей?

Группы пользователей (User Groups) в MODX задают права доступа. В отличие от некоторых CMS, в MODX пользователь может входить в _несколько_ групп пользователей.

## Использование

Права в MODX выдают _группам пользователей_, а не отдельным пользователям. Поэтому пользователь должен состоять хотя бы в одной группе, чтобы иметь какие-либо права. Иначе говоря, что пользователь может и чего не может, зависит от его групп. В других CMS это иногда называют «ролью».

Чтобы править права группы, откройте Admin (значок шестерёнки) -> Access Control Lists, затем щёлкните правой кнопкой по существующей группе, чтобы обновить её, или создайте новую.

Группа пользователей может задавать доступ к четырём областям:

- **Context Access** - доступ к менеджеру или к front-end порталу входа.
- **Resource Group Access** - доступ к группе ресурсов.
- **Element Category Access** - ограничение, например, только определёнными Chunks или только отдельными полями ресурса.
- **Media Source Access** - ограничение доступа к папкам на файловой системе или к S3 buckets.

## Управление участниками

Добавлять и убирать пользователей из групп можно при редактировании пользователя (Manage -> Users): щёлкните правой кнопкой по пользователю и откройте вкладку "Access Permissions".

Другой способ: Admin -> Access Control Lists. Там дерево групп пользователей и их участников. Назначить пользователя в группу можно правым кликом по группе и далее:

- добавить пользователя через пункт контекстного меню
- отредактировать группу и добавить пользователя в таблице

### Назначение политик

Кратко, какие политики брать:

- Политики на вкладке Context Access стройте на основе стандартной политики Administrator.
- Политики на вкладке Resource Group Access стройте на основе стандартной политики Resource.
- Политики на вкладке Element Category Access стройте на основе стандартной политики Element.

## Роли в группах пользователей

Внутри группы у пользователей могут быть конкретные роли, если вы так решите. Пользователь может состоять в группе и без роли. Роли дают более тонкую настройку прав, чем в предыдущих версиях MODX.

Допустим, доступ к некоторым ресурсам нужен только Supervisor в группе "HR Department". Создайте роль "Supervisor", задайте authority ниже 9999 (например 3), затем добавьте пользователей в группу "HR Department" (через экран редактирования группы) и назначьте будущим supervisor роль Supervisor.

Затем добавьте Resource Policy (подойдёт встроенная в MODX) к группе ресурсов, доступ к которой вы ограничиваете. Получится примерно так:

![](ug-rg-grid1.png)

Готово: доступ по роли. Эта ACL ограничит все ресурсы (документы) в контексте web и в группе ресурсов "TestResourceGroup4" только пользователями группы "HR Department" с ролью не слабее Supervisor. Роли с меньшим номером authority тоже получат доступ. Например, роль Coordinator с authority 2: пользователи этой группы тоже попадут под эту ACL.

### Назначение групп и ролей через MODX API

Работая с объектом modUser в MODX API, права можно назначать через modUser::[joinGroup](http://api.modx.com/revolution/2.1/_model_modx_moduser.class.html#%5CmodUser::joinGroup()). Этим методом вы добавляете пользователя напрямую в группу и при желании назначаете роль.

``` php
<?php
// Get modUser object
$user = $modx->getObject('modUser', array('username' => $username));
if( $user ){
    // Assign new user to User Group / Role
    $user->joinGroup('UserGroupNameOrId','OptionalRoleNameOrId');}
?>
```

## Смотрите также

1. [Пользователи](building-sites/client-proofing/security/users)
2. [Группы пользователей](building-sites/client-proofing/security/user-groups)
3. [Группы ресурсов](building-sites/client-proofing/security/resource-groups)
4. [Роли](building-sites/client-proofing/security/roles)
5. [Политики](building-sites/client-proofing/security/policies)
    1. [Разрешения](building-sites/client-proofing/security/policies/permissions)
        1. [Разрешения - политика Administrator](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Разрешения - политика Resource](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACL](building-sites/client-proofing/security/policies/acls)
    3. [PolicyTemplates](building-sites/client-proofing/security/policies/policytemplates)
6. [Уроки по безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Доступ пользователя к менеджеру](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Второй пользователь Super Admin](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение Element для пользователей](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Подробнее о группе Anonymous](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Усиление защиты MODX Revolution](getting-started/maintenance/securing-modx)
8. [Устранение проблем безопасности](building-sites/client-proofing/security/troubleshooting-security)
    1. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
