---
title: "Ещё про группу Anonymous"
translation: "building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group"
description: "Кто такой анонимный пользователь в MODX и как дать посетителю доступ, отличный от обычного."
---

## Кто такой Anonymous?

Любой посетитель сайта без входа это анонимный пользователь.

**Анонимный пользователь не является группой пользователей**
В базе нет группы «Anonymous». В дереве групп посетитель показан узлом `(аноним)`. Узел правится так же, как любая группа. Меняется при этом доступ анонимного пользователя.

Откройте иконку замка → **Контроль доступа**, вкладка **Группы пользователей & Пользователи**. Щёлкните правой кнопкой `(аноним)` и выберите **Редактировать группу пользователя**. ![](access+controls.png)

## Что может Anonymous?

По умолчанию анонимный пользователь получает Load Only во всех [контекстах](building-sites/contexts "Contexts"), кроме `mgr`. Без Load Only запрос к контексту вернёт 404 Page Not Found.

![](user+group_+anonymous.png)

Load Only не означает, что ресурс можно View.

Если создать [группу ресурсов](building-sites/client-proofing/security/resource-groups "Группы ресурсов") и выдать её конкретной группе пользователей, анонимный пользователь её не увидит. На этом строятся [страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages "Страницы только для участников").

### 401 против 404 на защищённых страницах

У защищённой группы ресурсов у анонимного пользователя по умолчанию нет Load. Ответ будет 404 Page Not Found. Чтобы вернуть 401 Unauthorized, дайте ему доступ к группе ресурсов с политикой Load Only.

Это делается на вкладке Resource Group Access при редактировании анонимного пользователя.

![](screen+shot+2012-10-19+at+11.43.46+pm.png)

Нажмите **Add Resource Group**, выберите защищённую группу ресурсов, контекст (не `mgr`) и политику Load Only. Сохраните.

Ресурсы этой группы он по-прежнему не увидит (нет View). Доступен только Load, ответ будет 401. Свою страницу Unauthorized задайте в настройке [Unauthorized Page](building-sites/settings/unauthorized_page "unauthorized_page").

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
