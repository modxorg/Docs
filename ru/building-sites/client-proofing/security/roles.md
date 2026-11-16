---
title: "Роли"
translation: "building-sites/client-proofing/security/roles"
description: "Роли MODX: число authority, которое они несут, и как оно сравнивается с доступом группы."
---

## Что такое роль?

Роль задаёт положение пользователя внутри группы пользователей, например "Editor" или "Front-end Read Only".

Роли используют целое число Authority. **Меньшее число означает более сильные полномочия.** Пользователь проходит проверку ACL, когда authority его роли **не больше** authority этого ACL. Пользователь с ролью authority 10 проходит все ACL, которые проходит пользователь с ролью authority 11.

Authority удобно читать как порядковый номер: первый, второй, третий. **Authority=1** это первые полномочия, и они сильнее **Authority=2**.

**Номера Authority уникальны**
База не даст создать две роли с одинаковым authority: у столбца уникальный индекс.

## Роли MODX

В MODX 3 поставляется две роли:

| Роль | Authority |
| --- | --- |
| Member | 9999 |
| Super User | 0 |

Роль **Super User** проходит проверку любого ACL, потому что authority у ACL не бывает ниже 0. Роль **Member** проходит только те ACL, у которых authority равен 9999 или больше.

## Права страницы

| Право | Что даёт |
| --- | --- |
| `view_role` | Увидеть список. |
| `new_role`, `save_role` | Создать роль. |
| `edit_role` | Изменить роль. |
| `delete_role` | Удалить роль. |

## Использование

Создайте роли по должностям. Authority должен быть уникальным. У Super User уже стоит 0, у Member уже стоит 9999.

- Director - 1
- Coordinator - 2
- Supervisor - 3
- Employee - 10

![](roles-grid.png)

Создайте группу пользователей "HR Department" и назначьте пользователям эти роли. На одну роль может приходиться несколько пользователей.

У John роль Coordinator, у Mark роль Supervisor. Группе "HR Department" дайте политику доступа "AccountPolicy" на контексте "web" и поставьте Minimum Role в "Supervisor":

![](ug-ctx-grid1.png)

В политике такие разрешения:

- `view_accounts`
- `save_accounts`

У Mark есть эти разрешения. Он в группе, и его роль не слабее "Supervisor".

Они есть и у John. У Coordinator authority сильнее, чем у Supervisor, поэтому у John есть разрешения, которые есть у Mark как у Supervisor.

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
