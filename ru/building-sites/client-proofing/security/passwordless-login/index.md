---
title: "Вход без пароля"
translation: "building-sites/client-proofing/security/passwordless-login"
sortorder: 0
description: "Вход в MODX по волшебной ссылке вместо пароля: как включить, сколько живёт ссылка и что при этом не меняется."
---

MODX3 имеет новую функцию под названием "Вход без пароля", которая может быть активирована с помощью системных настроек. После активации этой функции вам больше не нужно вводить пароль и имя пользователя для входа. Вместо этого вы просто вводите адрес электронной почты своей учетной записи, и система отправит вам электронное письмо со ссылкой для одноразового входа. Нажав на эту ссылку, вы сразу же войдете в менеджер.

## Преимущества входа без пароля

Потребность в надежном пароле часто заставляет людей выбирать универсальные псевдозащищенные пароли, повторно используя проверенную надежную фразу и, возможно, просто добавляя число к услуге. Как администратор сайта, вы не должны поощрять своих пользователей делать небезопасные вещи. Это устраняет риск незащищенного пароля от вашей установки MODX, но, конечно, для ваших пользователей нужна защищенная учетная запись электронной почты. Но это также относится и к традиционному входу в систему по имени пользователя и паролю, потому что здесь также есть самообслуживание паролем, где вы можете сбросить пароль по электронной почте.

Пароль пользователя всё равно остаётся в базе: при каждом входе по ссылке в поле `password` пишется хеш временного пароля. Выигрыш в том, что пользователю не нужно придумывать, запоминать и переиспользовать пароль, а не в том, что пароля в базе нет.

## Как включить пароль без логина

Чтобы активировать вход без пароля, необходимо установить системный параметр `passwordless_activated` в области «Аутентификация и безопасность» основных настроек системы на «Да». При следующем входе в систему вам будет представлен следующий экран входа в систему:

![](passwordless-login-screen.jpg)

Просто введите адрес электронной почты вашей учетной записи, и вы получите письмо с персональной ссылкой для входа.

![](passwordless-email.png)

## Настройка срока действия ссылки

Вы можете настроить срок действия ссылки для входа в систему через системный параметр `passwordless_expiration`. По умолчанию оно установлено на 3600 секунд, что должно быть достаточно для всех, чтобы войти в систему. Если вы параноик, вы можете легко установить на более низкое значение, например, 600 разрешить использование ссылки только на 10 минут. Срок действия также будет указан в самом электронном письме.

## Ссылка работает один раз

Ссылка работает только один раз: запись удаляется из реестра, как только её использовали. Токен ссылки подписан хешем пароля пользователя, поэтому ссылка перестаёт работать, как только пароль сменился.

## Дополнительные примечания

Имейте в виду, что _не будет сообщения об ошибке_, если вы введете неизвестный адрес электронной почты во время входа в систему. Это хорошо известное и предполагаемое поведение для предотвращения попыток перечисления пользователей.

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
6. [Учебники по безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Доступ менеджера](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Второй суперпользователь](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение элемента](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Об анонимном пользователе](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Диагностика безопасности](building-sites/client-proofing/security/troubleshooting-security)
    1. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
