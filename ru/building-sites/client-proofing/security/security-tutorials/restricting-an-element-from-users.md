---
title: "Ограничение Element для пользователей"
translation: "building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users"
---

## Введение

Урок показывает, как скрыть любой Element (Template, Snippet и т. д.) в менеджере MODX. Для этого используют Element Category ACL: они защищают Elements в Categories от просмотра. Пользователи группы Editors увидят элементы. Пользователи вне группы их не увидят.

### Кратко

1. Создайте Category или возьмите существующую
2. Поместите Element, который нужно защитить, в эту Category
3. Создайте User Group или выберите существующую
4. Добавьте пользователей, которым нужен Element, в группу с ролью Member
5. На вкладке Element Category Access добавьте Element Category ACL (context: mgr, minimum role: Member (9999), access policy: Element)
6. Выполните Flush permissions и перезагрузите

## Пошагово

### 1. Создайте Category

На вкладке Elements в левом дереве нажмите иконку Category на панели или правым кликом по "Categories" внизу выберите "New Category". Создайте и сохраните категорию. Можно взять уже существующую Category.

### 2. Поместите Element в Category

Отредактируйте Element и задайте ему Category из шага 1.

### 3. Создайте User Group

Откройте Security -> Access Controls в верхнем меню, вкладка "User Groups". Создайте новую группу или выберите существующую. Правым кликом по группе выберите "Update User Group".

В Revolution 2.3.x пункт Access Control Lists лежит в меню Admin (значок шестерёнки).

Если используете форму Access Wizard, в поле Context дайте группе доступ "mgr", а Category укажите в Element Categories. В поле Users можно перечислить пользователей для добавления в группу. Если wizard не используете, обновите новую группу правым кликом.

### 4. Добавьте пользователей в User Group

На экране обновления группы откройте вкладку Users и добавьте пользователей, которым нужен Element. Дайте роль **не слабее** Member. Либо добавляйте пользователей в группу со страницы редактирования пользователя, вкладка Access Permission.

### 5. Добавьте Element Category ACL

Откройте вкладку "Element Category Access". В Revolution 2.3.x она в боковой панели вкладки Permissions группы пользователей.

Нажмите "Add Category" над таблицей. Выберите:

- Category: ваша Category из шагов выше
- Minimum Role: Member
- Access Policy: Element
- Context: mgr
- Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху

### 6. Flush Permissions

В верхнем меню: "Security -> Flush Permissions". В Revolution 2.3.x это Manage -> Logout All Users.

Всех заставят войти снова. Element Category теперь защищена от пользователей вне группы Editors.

## Скрытие конкретных Elements от части пользователей

Иногда нужно скрыть элементы от всех, кто не в группе Administrator. Положите элементы в категорию как выше, но привяжите её к группе Administrator:

- Откройте редактирование группы Administrator (Security -> Access Controls -> User Groups -> правый клик по "Administrator" -> Update User Group). В Revolution 2.3.x это Access Control Lists в меню Admin (шестерёнка).
- Откройте вкладку Element Category Access
- Добавьте ACL через "Add Category":
    - Category: ваша Category из шагов выше
    - Minimum Role: admin Super User
    - Access Policy: Element
    - Context: mgr
    - Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху

- В верхнем меню: Security -> Flush All Sessions. В Revolution 2.3.x это Manage -> Logout All Users.

Теперь Elements видит только admin Super User.

## Особый случай для Templates

Допустим, вы ограничили Template способом выше. Другой User Group без доступа к Template всё же должна править (но не создавать) Resources с этим Template и видеть TV шаблона. Сейчас вторая группа (назовём её Editors) видит Resource, в combobox Template показывает ID, но TV не видит. Нужна ещё одна ACL для группы Editors, чтобы загружались Template и связанные TV.

- Откройте редактирование группы Editors (Security -> Access Controls -> User Groups -> правый клик по "Editors" -> Update User Group)
- Откройте вкладку Element Category Access
- Добавьте ACL через "Add Category":
    - Category: ваша Category из шагов выше
    - Minimum Role: Member
    - Access Policy: Load Only
    - Context: mgr
    - Нажмите "Save" в диалоге
- Нажмите "Save" справа вверху

- Пользователи Editors должны выйти и войти снова, либо Security -> Flush Sessions в верхнем меню

Готово. Editors увидят и будут править TV для Template в защищённой Category. Пользователи вне Editors их не увидят.

## Смотрите также

1. [Доступ пользователя к менеджеру](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
3. [Второй пользователь Super Admin](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
4. [Ограничение Element для пользователей](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
5. [Подробнее о группе Anonymous](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
