---
title: "ACL (Список контроля доступа)"
translation: "building-sites/client-proofing/security/policies/acls"
---

## Что такое ACL (список контроля доступа)?

ACL, или список контроля доступа (Access Control List), это набор [Разрешений](building-sites/client-proofing/security/policies/permissions "Разрешения"), прикреплённых к объекту. Подробнее об ACL можно прочитать [в Википедии](http://en.wikipedia.org/wiki/Access_control_list).

## Использование

В MODX ACL можно применить к любому modAccessibleObject. В первую очередь MODX Revolution 2.0 позволяет использовать ACL для ресурсов и контекстов.

### ACL контекста

ACL контекста состоит из 4 частей:

- [Контекст](building-sites/contexts "Контексты")
- [Группа пользователей](building-sites/client-proofing/security/user-groups "Группы пользователей")
- [Минимальная роль](building-sites/client-proofing/security/roles "Роли")
- [Политика доступа](building-sites/client-proofing/security/policies "Политики")

Это означает, что вы можете назначить ACL для контекста, который будет применяться к:

- Всем пользователям в группе пользователей
- ... с минимальной указанной ролью
- ... и даст пользователям все разрешения в назначенной политике доступа.

### ACL ресурса

ACL для ресурсов работают немного иначе и в основном позволяют ограничить доступ к ресурсам (документы, веб-ссылки и т. д.) через группы ресурсов. Они состоят из 5 частей:

- [Группа ресурсов](building-sites/client-proofing/security/resource-groups "Группы ресурсов")
- [Группа пользователей](building-sites/client-proofing/security/user-groups "Группы пользователей")
- [Минимальная роль](building-sites/client-proofing/security/roles "Роли")
- [Политика доступа](building-sites/client-proofing/security/policies "Политики")
- [Контекст](building-sites/contexts "Контексты")

Это означает, что ACL, применённый к группе ресурсов:

- Затронет всех пользователей в указанной группе пользователей
- ... с минимальной указанной ролью
- ... даст разрешения на ресурсы (save, load, delete и т. д.) из указанной политики
- ... для всех ресурсов в группе ресурсов

## Смотрите также

1. [Пользователи](building-sites/client-proofing/security/users)
2. [Группы пользователей](building-sites/client-proofing/security/user-groups)
3. [Группы ресурсов](building-sites/client-proofing/security/resource-groups)
4. [Роли](building-sites/client-proofing/security/roles)
5. [Политики](building-sites/client-proofing/security/policies)
    1. [Разрешения](building-sites/client-proofing/security/policies/permissions)
        1. [Разрешения - Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Разрешения - Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACL](building-sites/client-proofing/security/policies/acls)
    3. [Шаблоны политик](building-sites/client-proofing/security/policies/policytemplates)
6. [Уроки по безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Предоставление доступа менеджеру пользователей](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Создание страниц только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Создание второго суперадминистратора](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение доступа пользователей к элементу](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Подробнее о группе анонимных пользователей](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Защита MODX Revolution](getting-started/maintenance/securing-modx)
8. [Устранение проблем с безопасностью](building-sites/client-proofing/security/troubleshooting-security)
    1. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
