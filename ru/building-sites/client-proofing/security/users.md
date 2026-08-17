---
title: "Пользователи"
translation: "building-sites/client-proofing/security/users"
---

## Что такое пользователь?

Пользователь (User) в MODX Revolution это учётная запись для входа.

Пользователей можно включать в группы пользователей. К группам подключают [ACL](building-sites/client-proofing/security/policies/acls "ACL"), которые задают контроль доступа.

## Настройки пользователя

Настройки пользователя (User Settings) в MODX Revolution автоматически перекрывают системные и контекстные настройки с тем же ключом для этого пользователя. Они могут быть и полностью уникальными. Порядок наследования настроек:

`System Settings -> Context Settings -> User Settings`

Чтобы править настройки пользователя, откройте **Security -> Manage Users -> Update User (_правый клик_) -> Settings (_вкладка_)**

Пользовательские настройки доступны только _после_ создания пользователя. Вкладки "Settings" нет, пока вы только создаёте пользователя.

## Пользователи на front-end

Когда пользователь вошёл на front-end сайта, его username и ID доступны через такие [Properties](building-sites/properties-and-property-sets "Properties and Property Sets"):

``` php
[[+modx.user.id]] - Prints the ID
[[+modx.user.username]] - Prints the username
```

Если пользователь не вошёл, ID будет пустым, а Username будет "(anonymous)".

Начиная с MODX 2.4.0, имя пользователя по умолчанию задаётся в System Settings настройкой **default\_username**.

**Помните**
Важный нюанс: вход в _manager_ не означает вход на _web_ front-end. Пользовательские настройки и API-метод [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") подчиняются тому же правилу. Если вы не вошли на front-end, цепочка **System Settings -> Context Settings -> User Settings** применяется не полностью.

## Поля пользователя

У пользователя есть такие поля:

| Name         | Description                                                                          |
| ------------ | ------------------------------------------------------------------------------------ |
| id           | ID пользователя.                                                                     |
| username     | Имя пользователя.                                                                    |
| password     | Зашифрованный пароль.                                                                |
| active       | 1 или 0. Если не active, пользователь не сможет войти.                               |
| remote\_key  | Удалённый ключ пользователя для приложений удалённой аутентификации.                 |
| remote\_data | JSON-массив данных для приложений удалённой аутентификации.                          |

К пользователю также привязан Profile со следующими полями:

| Name             | Description                                                                                          |
| ---------------- | ---------------------------------------------------------------------------------------------------- |
| internalKey      | ID пользователя.                                                                                     |
| fullname         | Полное имя.                                                                                          |
| email            | Email.                                                                                               |
| phone            | Телефон.                                                                                             |
| mobilephone      | Мобильный телефон.                                                                                   |
| fax              | Факс.                                                                                                |
| blocked          | 1 или 0. Если blocked = true, пользователь не сможет войти.                                          |
| blockeduntil     | Timestamp: до этой даты вход запрещён.                                                               |
| blockedafter     | Timestamp: после этой даты вход запрещён.                                                            |
| logincount       | Число входов пользователя.                                                                           |
| lastlogin        | Время последнего входа.                                                                              |
| thislogin        | Время входа в текущей сессии.                                                                        |
| failedlogincount | Число неудачных попыток входа с момента последнего успешного входа.                                  |
| sessionid        | ID сессии пользователя, связанный с таблицей сессий.                                                 |
| dob              | Дата рождения.                                                                                       |
| gender           | 0 - не указано, 1 - мужской, 2 - женский.                                                            |
| address          | Физический адрес.                                                                                    |
| country          | Страна.                                                                                              |
| city             | Город.                                                                                               |
| zip              | Почтовый индекс.                                                                                     |
| state            | Штат или область.                                                                                    |
| photo            | Необязательное поле для фото. В UI не используется.                                                  |
| comment          | Необязательный комментарий о пользователе.                                                           |
| website          | Сайт пользователя.                                                                                   |
| extended         | JSON-массив для дополнительных полей пользователя.                                                   |

## Получение пользователя через API

Текущего пользователя в API даёт ссылка $modx->user. Например, этот сниппет выводит username:

``` php
return $modx->user->get('username');
```

Чтобы взять поля Profile, сначала получите объект modUserProfile через алиас Profile. Например, этот сниппет возвращает email:

``` php
$profile = $modx->user->getOne('Profile');
return $profile ? $profile->get('email') : '';
```

Если пользователь не вошёл, $modx->user всё равно доступен как объект, но вернёт 0 как ID и (Anonymous) как username.

### Работа с extended-полями

Значения в поле extended приходят как массив. С ними можно работать так:

``` php
/* get the extended field named "color": */
$fields = $profile->get('extended');
$color = $fields['color'];
/* set the color field to red */
$fields = $profile->get('extended');
$fields['color'] = 'red';
$profile->set('extended',$fields);
$profile->save();
```

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
9. [Расширение modUser](extending-modx/custom-users "Extending modUser")
