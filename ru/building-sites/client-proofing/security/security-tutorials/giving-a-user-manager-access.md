---
title: "Доступ пользователя к Менеджеру"
translation: "building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access"
description: "Дать пользователю MODX права менеджера: группа, роли и политика, которые это делают."
---

## Задача

Нужен доступ к редактированию в менеджере без полного набора [разрешений](building-sites/client-proofing/security/policies/permissions "Разрешения") администратора. Часть учебника написал BobRay.

## Решение

1. В иконке замка → **Контроль доступа** откройте вкладку **Роли** и создайте роль (например, `Editor`) с authority `10`.
2. На вкладке **Политики доступа** продублируйте политику Administrator и переименуйте (например, `AdminLite`).
3. В политике AdminLite оставьте только нужные [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions").
4. На вкладке **Группы пользователей & Пользователи** щёлкните правой кнопкой группу `Administrator` и выберите **Редактировать группу пользователя**.
5. На вкладке **Контексты** нажмите **Добавить доступ к контексту** и добавьте две строки:
    1. Context: `mgr`, Minimum Role: `Editor`, Access Policy: `AdminLite`
    2. Context: `web`, Minimum Role: `Editor`, Access Policy: `Load, List and View`
6. В иконке замка → **Пользователи** создайте пользователя или откройте существующего. На вкладке **Права доступа** добавьте его в группу Administrator с ролью Editor.
7. Откройте иконку замка → **Завершить все сеансы** и войдите снова.

## Публикация в менеджере

Если пользователь редактирует ресурсы, но не может публиковать (чекбокс Published откатывается, нет дат, нет Publish в меню дерева):

- В стоковой политике **Content Editor** нет `publish_document` / `unpublish_document`.
- Эти ключи должны быть в Context Access ACL на **`mgr`**, а не только на `web` или другом фронтовом контексте.
- Разрешения Resource Policy `publish` / `unpublish` текущий UI публикации в менеджере не открывают.

Подробнее: [ACL: публикация в менеджере](building-sites/client-proofing/security/policies/acls#publikaciya-v-menedzhere-i-neskolko-grupp).

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
