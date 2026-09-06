---
title: "Доступ пользователя к Менеджеру"
translation: "building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access"
---

## Задача

Нужен доступ к редактированию в Менеджере без полного набора [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") администратора. Учебник частично написан BobRay.

## Решение

1. В **Access Controls → Roles** создайте роль (например, `Editor`) с authority `10`.
2. В **Settings → Access Control Lists → Access Policies** продублируйте политику Administrator и переименуйте (например, `AdminLite`).
3. В политике AdminLite оставьте только нужные [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions").
4. В **Settings → Access Control Lists → User Groups** кликните правой кнопкой группу `Administrator` и выберите **Update User Group**.
5. На вкладке **Permissions → Context Access** добавьте две строки:
    1. Context: `mgr`, Minimum Role: `Editor`, Access Policy: `AdminLite`
    2. Context: `web`, Minimum Role: `Editor`, Access Policy: `Load, List and View`
6. В **Manage → Users** создайте пользователя или откройте существующего. На вкладке Access Permissions добавьте его в группу Administrator с ролью Editor.
7. Откройте **Security → Flush Sessions** и войдите снова.

## Публикация в менеджере

Если пользователь редактирует ресурсы, но не может публиковать (чекбокс Published откатывается, нет дат, нет Publish в меню дерева):

- В стоковой политике **Content Editor** нет `publish_document` / `unpublish_document`.
- Эти ключи должны быть в Context Access ACL на **`mgr`**, а не только на `web` или другом фронтовом контексте.
- Разрешения Resource Policy `publish` / `unpublish` текущий UI публикации в менеджере не открывают.

Подробнее: [ACL: публикация в менеджере](building-sites/client-proofing/security/policies/acls#публикация-в-менеджере-и-несколько-групп).

## Смотрите также

1. [Доступ пользователя к Менеджеру](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
3. [Создание второго Super Admin](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
4. [Ограничение элемента для пользователей](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
5. [Ещё про группу Anonymous](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
