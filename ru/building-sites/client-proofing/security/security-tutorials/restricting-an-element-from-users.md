---
title: "Ограничение Element для пользователей"
translation: "building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users"
description: "Скрыть элемент MODX от пользователей, которым нельзя его править, через доступ к его категории."
---

## Кратко

Элемент (Template, Snippet и другие) скрывает ACL его категории. Пользователи группы Editors его видят. Остальные нет.

1. Создайте категорию или возьмите существующую
2. Поместите элемент, который нужно защитить, в эту категорию
3. Создайте группу пользователей или выберите существующую
4. Добавьте пользователей, которым нужен элемент, в группу с ролью Member
5. На вкладке Element Category Access добавьте ACL категории (context: mgr, minimum role: Member (9999), access policy: Element)
6. Откройте **Перезагрузить права доступа** и обновите страницу

## Пошагово

### 1. Создайте категорию

На вкладке Elements в левом дереве нажмите иконку Category на панели. Или правым кликом по "Categories" внизу выберите "New Category". Сохраните категорию. Можно взять уже существующую.

### 2. Поместите элемент в категорию

Отредактируйте элемент и задайте ему категорию из шага 1.

### 3. Создайте группу пользователей

Откройте иконку замка → **Контроль доступа**, вкладка **Группы пользователей & Пользователи**. Создайте группу или выберите существующую. Щёлкните её правой кнопкой и выберите **Редактировать группу пользователя**.

В форме Access Wizard в поле Context дайте группе "mgr", а категорию укажите в Element Categories. В поле Users можно перечислить пользователей для добавления в группу. Без мастера обновите новую группу правым кликом.

### 4. Добавьте пользователей в группу

На экране группы откройте вкладку Users и добавьте пользователей, которым нужен элемент. Дайте роль **не слабее** Member. Или добавьте пользователя со страницы его редактирования, вкладка Access Permission.

### 5. Добавьте ACL категории элемента

Откройте вкладку "Element Category Access". Она в панели группы, рядом с другими вкладками доступа.

Нажмите "Add Category" над таблицей. Выберите:

- Category: категория из шагов выше
- Minimum Role: Member
- Access Policy: Element
- Context: mgr
- Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху

### 6. Перезагрузите права доступа

Откройте иконку замка → **Перезагрузить права доступа**, затем **Завершить все сеансы**.

После этого все входят заново. Категория элемента закрыта от пользователей вне группы Editors.

## Скрытие отдельных элементов

Иногда нужно скрыть элементы от всех, кто не в группе Administrator. Положите элементы в категорию, как выше, и привяжите её к группе Administrator:

- Откройте редактирование группы Administrator (иконка замка в меню пользователя → **Контроль доступа** → вкладка **Группы пользователей & Пользователи** → правый клик по "Administrator" → **Редактировать группу пользователя**)
- Откройте вкладку Element Category Access
- Добавьте ACL через "Add Category":
    - Category: категория из шагов выше
    - Minimum Role: Super User
    - Access Policy: Element
    - Context: mgr
    - Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху
- В верхнем меню: **Завершить все сеансы**

Теперь элементы видит только admin Super User.

## Особый случай для Template

Вы ограничили Template способом выше. Другая группа пользователей должна править ресурсы с этим Template, но не создавать их. Она должна видеть TV шаблона, хотя доступа к самому Template у неё нет. Эта группа (назовём её Editors) видит ресурс. В списке Template показан его ID, а TV не видны. Нужна ещё одна ACL на группу Editors, чтобы загружались Template и его TV.

- Откройте редактирование группы Editors (иконка замка в меню пользователя → **Контроль доступа** → вкладка **Группы пользователей & Пользователи** → правый клик по "Editors" → **Редактировать группу пользователя**)
- Откройте вкладку Element Category Access
- Добавьте ACL через "Add Category":
    - Category: категория из шагов выше
    - Minimum Role: Member
    - Access Policy: Load Only
    - Context: mgr
    - Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху
- Пользователи Editors выходят и входят снова, либо нажмите **Завершить все сеансы** в верхнем меню

Editors увидят и будут править TV для Template в защищённой категории. Template остаётся скрыт от пользователей не из группы Editors.

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
