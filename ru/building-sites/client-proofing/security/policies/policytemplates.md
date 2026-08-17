---
title: "Шаблоны политик"
translation: "building-sites/client-proofing/security/policies/policytemplates"
---

## Что такое шаблоны политик?

Шаблоны политик определяют, какие разрешения _доступны_ для [Политики доступа](building-sites/client-proofing/security/policies "Политики"). Шаблон политики не определяет, дано ли разрешение или отклонено (это делает политика доступа). Он только задаёт, какие разрешения политика доступа может включать или отключать. Шаблон политики полезен, если вам нужно сузить список доступных разрешений, которые вы хотите задать в политике доступа.

Хотя в каждом шаблоне политики есть пересечения по конкретным разрешениям, каждый шаблон содержит _в основном_ уникальные разрешения. Каждый шаблон определяет все разрешения, которые применяются к целевым спискам контроля доступа (ACL). Каждый шаблон рассчитан на автономное использование.

### AdministratorTemplate

Определяет все разрешения для работы в менеджере MODX. Другими словами, он определяет, какие действия можно выполнять из контекста. Обычно политики на основе этого шаблона не используют в контекстах, кроме менеджера, если только пользователям не нужно запускать из них процессоры (например, расширение фронтенда). [См. все разрешения политики администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy "Разрешения - Политика администратора")

### ElementTemplate

ElementTemplate определяет дополнительные разрешения, связанные с ACL элементов.

### MediaSourceTemplate

Определяет разрешения, связанные с доступом к источникам файлов.

### ObjectTemplate

Общие разрешения xPDOObject, которые может использовать любой modAccessibleObject.

### ResourceTemplate

ResourceTemplate определяет дополнительные разрешения, связанные с ACL групп ресурсов. [См. все разрешения ресурсной политики](building-sites/client-proofing/security/policies/permissions/resource-policy "Разрешения - Ресурсная политика")

### ContextTemplate

ContextTemplate определяет доступ к контексту, когда административные действия не задействованы.

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
