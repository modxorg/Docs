---
title: "Роли"
translation: "building-sites/client-proofing/security/roles"
---

## Что такое роль?

Роль это должность или статус в конкретной ситуации. В MODX ею задают положение пользователя внутри группы пользователей, например "Editor" или "Front-end Read Only".

Роли в MODX используют целое число Authority. **Меньшее число означает более сильные полномочия.** Например, роль с Authority 10 наследует все Group Policies, назначенные ей самой и любым ролям с Authority 11. Роль с Authority 11 не наследует Group Policies роли с Authority 10.

Говоря об Authority, формулируйте аккуратно: обратная зависимость часто путает формулировки.

Authority удобно мыслить как порядковые номера: первый, второй, третий и так далее. **Authority=1** это первые полномочия и они сильнее **Authority=2** (вторых).

Одинаковые номера Authority лучше не дублировать.

## Использование

Частый пример: роли по структуре должностей. Допустим, вы создаёте такие роли и уровни Authority:

- Administrator - 0
- Director - 1
- Coordinator - 2
- Supervisor - 3
- Employee - 9999

![](roles-grid.png)

Затем создайте группу пользователей "HR Department". Внутри группы назначьте пользователям эти роли (на одну роль может приходиться несколько пользователей).

Допустим, у John роль Coordinator, у Mark роль Supervisor. Группе пользователей "HR Deparment" вы даёте Access Policy (набор Permissions) с именем "AccountPolicy" и такими Access Permissions:

- view\_accounts
- save\_accounts

Эту политику вы назначили контексту "web" для группы "HR Department". Значение Minimum Role поставили в "Supervisor":

![](ug-ctx-grid1.png)

Значит, у Mark есть эти Permissions: он в группе и его роль не слабее "Supervisor" (именно эту роль он и занимает).

Но **также** эти Permissions есть у John: у него роль "Coordinator" с более сильным Authority, чем у "Supervisor". То есть John как Coordinator «унаследовал» Permissions, которые Mark имел как Supervisor.

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
