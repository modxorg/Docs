---
title: "Второй пользователь Super Admin"
translation: "building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user"
---

## Задача

Вы хотите, чтобы ещё один пользователь MODX Revolution имел полный доступ к менеджеру со всеми [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") администратора. Это может быть коллега или клиент. Создавая ещё одного Administrator, вы отдаёте ключи от _всего_ сайта. Сценарий упрощённый: другой админ сможет изменить или удалить вашу учётную запись, так что для вашей задачи это может не подойти. По ходу шагов страница кратко знакомит с ролями и политиками доступа.

## Решение

Войдите в менеджер сайта и сделайте следующее:

1. Создайте нового пользователя: Manage -> Users -> New User (кнопка)
2. Задайте уникальные username, password и email.
3. Перед сохранением откройте вкладку **Access Permissions** и нажмите **Add User Group to User**
    1. **User Group:**`Administrator`
    2. **Role:**`Super User`
4. Сохраните пользователя. (Позже можно вернуться в Security -> Manage Users и правым кликом обновить свойства.)
5. Проверьте вход в менеджер из другого браузера.

## Почему нельзя добавить ещё одного Administrator с другой [ролью](building-sites/client-proofing/security/roles "Roles"), например "Member"?

Попробуйте. При входе под другим именем только с ролью "Member" доступ отклонят. Почему? Дело в [Context Access](building-sites/contexts "Contexts") и [Access Policies](building-sites/client-proofing/security/policies "Policies"). Они быстро усложняются. Откройте Security -> Access Controls, правым кликом по группе Administrator выберите Update User Group, затем вкладку **Context Access**. Увидите примерно такое:

![](user-group-perms.jpg)

По умолчанию в MODX Revolution два контекста: **web** (front-end) и **mgr** (back-end). Из таблицы видно два факта: минимальная роль это Super User, а Access Policy для этого контекста это "Administrator". Даже если смысл всего этого ещё не ясен, с этой точки удобно начинать разбираться в правах.

### Minimum Role

На экране Context Access видно: нужна как минимум роль "Super User". Одной роли "Member" недостаточно. Поэтому вход не проходит у администраторов только с ролью "Member".

### Roles

Зачем давать другому пользователю другую роль, если у него будут _те же_ привилегии, что у вас? Если привилегии совпадают, роль по сути эквивалентна вашей. Новая роль не нужна.

Думая о ролях, смотрите на access policy. Политика говорит, что пользователь с назначенной ролью может и чего не может.

## Смотрите также

См. также урок [Доступ пользователя к менеджеру](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access "Giving a User Manager Access"): там пример пользователя с уровнем прав ниже вашего.

Видео Shaun McCormick [Understanding MODX Revolution Security](http://vimeo.com/13856994) подробно показывает сложные схемы прав.

1. [Доступ пользователя к менеджеру](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
3. [Второй пользователь Super Admin](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
4. [Ограничение Element для пользователей](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
5. [Подробнее о группе Anonymous](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
