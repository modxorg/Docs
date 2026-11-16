---
title: "Пользователи"
translation: "building-sites/client-proofing/security/users"
description: "Пользователи MODX: их поля, флаг суперпользователя, настройки пользователя и свойства пользователя на сайте."
---

## Что такое пользователь?

Пользователь это вход в MODX.

Пользователей назначают в группы пользователей. У групп есть [ACL](building-sites/client-proofing/security/policies/acls "ACL"), и они задают доступ.

## Суперпользователь

Поле `sudo` делает пользователя суперпользователем. Проверки политик для него не выполняются. Пользователь видит всё, что бы ни говорили ACL.

Выдать этот флаг может только пользователь с правом `set_sudo`. Администратор свежей установки получает его.

## Настройки пользователя

Настройка пользователя перекрывает настройку группы с тем же ключом. Настройка группы перекрывает настройку контекста. Настройка контекста перекрывает системную. Порядок такой:

`системная настройка → настройка контекста → настройка группы → настройка пользователя`

Чтобы изменить настройки пользователя, откройте иконку замка → **Пользователи**, щёлкните пользователя правой кнопкой и выберите **Редактировать**, затем вкладку **Настройки**.

Менять эти настройки можно только после создания пользователя. На форме создания вкладки нет, и видит её только sudo. Войдите как sudo, чтобы править настройки пользователя.

## Пользователи на сайте

Когда пользователь вошёл на сайт, его имя и ID доступны через следующие [свойства](building-sites/properties-and-property-sets "Свойства и наборы свойств"):

``` php
[[+modx.user.id]] - Выводит ID
[[+modx.user.username]] - Выводит имя
```

Если пользователь не вошёл, ID равен 0, а имя `anonymous`.

Имя по умолчанию задаёт настройка `default_username`.

**Помните**
Вход в _manager_ не выполняет вход на сайт, в контекст _web_. Если вы не вошли на сайт, цепочка **системная настройка → настройка контекста → настройка группы → настройка пользователя** применяется не полностью. [Код, который читает настройку](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption"), следует тому же разделению.

## Поля пользователя

Пользователи содержат следующие поля:

| Имя | Описание |
| --- | --- |
| id | ID пользователя. |
| username | Имя пользователя. |
| password | Зашифрованный пароль пользователя. |
| cachepwd | Кэшированный пароль пользователя. |
| class\_key | Класс пользователя. Пользователь производного класса наследует его поведение. |
| active | 1 или 0. Если не активно, пользователь не сможет войти. |
| remote\_key | Ключ внешнего пользователя для приложений внешней аутентификации. |
| remote\_data | JSON-массив данных для приложений внешней аутентификации. |
| hash\_class | Класс, которым хешируется пароль. В MODX 3 по умолчанию `MODX\Revolution\Hashing\modNative`. |
| salt | Соль, записанная у пользователя. Штатный хешер `modNative` эту колонку не использует. |
| primary\_group | Группа, из которой пользователь получает дашборд и права своей основной группы. |
| session\_stale | Устарела ли сессия пользователя. |
| sudo | Является ли пользователь суперпользователем. См. [Суперпользователь](#суперпользователь). |
| createdon | Дата создания пользователя. |

К пользователю привязан профиль. В нём следующие поля:

| Имя | Описание |
| --- | --- |
| internalKey | ID пользователя. |
| fullname | Полное имя пользователя. |
| email | Адрес почты пользователя. |
| phone | Номер телефона. |
| mobilephone | Номер мобильного телефона. |
| fax | Номер факса. |
| blocked | 1 или 0. Если включено, пользователь не сможет войти. |
| blockeduntil | Метка времени, до которой пользователь не сможет войти. |
| blockedafter | Метка времени, после которой пользователь не сможет войти. |
| logincount | Число входов пользователя. |
| lastlogin | Когда пользователь входил в последний раз. |
| thislogin | Когда пользователь вошёл в текущей сессии. |
| failedlogincount | Сколько раз вход не удался с последнего успешного. |
| sessionid | ID сессии пользователя. Устарело, будет удалено в 3.2. |
| dob | Дата рождения. |
| gender | 0: ни одного, 1: мужской, 2: женский. |
| address | Физический адрес. |
| country | Страна пользователя. |
| city | Город пользователя. |
| zip | Индекс или почтовый код пользователя. |
| state | Область или провинция пользователя. |
| photo | Путь к картинке пользователя. Она показывается в шапке менеджера и загружается через медиа-источник из настройки `photo_profile_source`. Если картинки нет и включена настройка `enable_gravatar`, используется Gravatar. |
| comment | Необязательное поле для комментариев о пользователе. |
| website | Сайт пользователя. |
| extended | JSON-массив для хранения дополнительных полей пользователя. |

## Настройки учётных записей

| Настройка | Что делает |
| --- | --- |
| `passwordless_activated` | Включает вход по волшебной ссылке. По умолчанию выключено. |
| `passwordless_expiration` | Время жизни волшебной ссылки, в секундах. По умолчанию 3600. |
| `password_min_length` | Минимальная длина пароля. По умолчанию 12. |
| `password_generated_length` | Длина пароля, который генерирует MODX. По умолчанию 16. |
| `allow_multiple_emails` | Может ли у пользователя быть несколько адресов. |
| `clean_phone_number` | Чистится ли номер телефона перед сохранением. |
| `default_username` | Имя пользователя, который не вошёл. По умолчанию `(anonymous)`. |
| `enable_gravatar` | Используется ли Gravatar, если у пользователя нет картинки. |
| `photo_profile_source` | Медиа-источник, из которого грузится картинка пользователя. |
| `unauthorized_page` | Страница, куда попадает пользователь без доступа. |
| `access_context_enabled` | Проверяется ли доступ к контексту вообще. |
| `access_resource_group_enabled` | Проверяется ли доступ к группе ресурсов вообще. |

## Получение пользователя через API

Текущий пользователь доступен в API как `$modx->user`. Этот сниппет выводит имя:

``` php
return $modx->user->get('username');
```

Чтобы прочитать поля профиля, сначала получите объект `modUserProfile` через псевдоним Profile. Этот сниппет возвращает адрес почты:

``` php
$profile = $modx->user->getOne('Profile');
return $profile ? $profile->get('email') : '';
```

Если пользователь не вошёл, объект `$modx->user` всё равно доступен. Он вернёт ID `0` и имя `anonymous`.

### Работа с дополнительными полями

Значения поля `extended` возвращаются массивом:

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
