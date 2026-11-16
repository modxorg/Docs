---
title: "Ресурсная политика"
translation: "building-sites/client-proofing/security/policies/permissions/resource-policy"
description: "Ресурсная политика MODX и список её разрешений."
---

## Ресурсная политика

Эта политика упакована в MODX и предоставляется пользователям в любом контексте, которые хотят иметь доступ к содержимому базового объекта. Разрешения являются универсальными и применяются ко всем объектам MODX.

## Разрешения по умолчанию

| Имя |
|------|
| add\_children |
| copy |
| create |
| delete |
| list |
| load |
| move |
| publish |
| remove |
| save |
| steal\_lock |
| undelete |
| unpublish |
| view |

Не путайте разрешения Resource `publish` / `unpublish` с контекстным `publish_document` из политики администратора. Чекбокс публикации, даты, пункты в дереве и процессоры в менеджере смотрят на `publish_document` для контекста **`mgr`**. Одних `publish` / `unpublish` на Resource ACL недостаточно. См. [ACL: публикация в менеджере](building-sites/client-proofing/security/policies/acls#publikaciya-v-menedzhere-i-neskolko-grupp).

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
