---
title: "DitsNews"
description: "Компонент MODX Revolution для управления рассылками и подписчиками"
translation: "extras/ditsnews/index"
---

**Предупреждение**
Автор больше не работает в Dit's Media. Пакет не обновлялся с июля 2011 года.

## Что такое DitsNews?

DitsNews: компонент для управления рассылками в MODX Revolution.

### Возможности

- управление рассылками, группами и подписчиками
- импорт и экспорт подписчиков (CSV) (в 0.2.1)
- очередь сообщений (50 сообщений за пакет)
- подписка через форму
- подтверждение подписки (ссылка в письме)
- отписка по ссылке в рассылке
- публичные и приватные группы (на публичные можно подписаться через форму)

### История

Разработка ведётся с декабря 2010 года. Автор: [ditsmedia](https://modx.com/extras/author/ditsmedia).

| Version                                                  | Release date | Contributors | Remarks / highlights |
| -------------------------------------------------------- | ------------ | ------------ | -------------------- |
| [0.1.0 alpha](https://modx.com/extras/package/ditsnews)  | 24 Dec 2010  | ditsmedia    | Initial release.     |
| [0.1.0 alpha2](https://modx.com/extras/package/ditsnews) | 11 Jan 2011  | ditsmedia    | several issues fixed |
| [0.2.0 alpha](https://modx.com/extras/package/ditsnews)  | soon!        | ditsmedia    | New codebase         |

### Требования

- MODX Revolution (протестировано с 2.1.1)
- [FormIt](extras/formit "FormIt") (для формы подписки)
- Cronjobs (или другой способ периодического запуска скрипта)

### Разработка и сообщения об ошибках

DitsNews разрабатывается на GitHub. Там же можно **[сообщать об ошибках](https://github.com/ditsmedia/DitsNews/issues)**, оставлять **запросы функций** и **предложения по улучшению**. Последние коммиты можно брать из ветки Develop.

Github: <https://github.com/ditsmedia/DitsNews>

## Установка

**Предупреждение**
Версия 0.2.0 не на 100% совместима с 0.1.0! Есть изменения в базе данных и функциональности. Как всегда, сделайте резервную копию перед обновлением! Также в этом релизе отсутствует импорт и экспорт CSV. Они вернутся в 0.2.1.

1. Установите через Package Management
2. Добавьте cronjob (измените пути): \*/5 \* \* \* \* /path/to/php /path/to/core/components/ditsnews/cron/cron.php
3. Создайте шаблон рассылки (обычный шаблон MODX. CSS должен быть в самом шаблоне с полными URL путей к изображениям. Без внешнего CSS!)
4. Создайте страницу подписки (чанк ditsnewssignup. измените по необходимости)
5. Создайте страницу «Спасибо» (и укажите её как redirectTo в чанке ditsnewssignup)
6. Создайте страницу подтверждения / opt-in (добавьте сниппет ditsnewsconfirm) и укажите её id в чанке ditsnewssignup
7. Создайте страницу отписки (добавьте сниппет ditsnewsunsubscribe) и добавьте ссылку на эту страницу в шаблон рассылки
8. Перейдите в Components -> DitsNews и измените настройки (Menu -> Settings)

## Использование

DitsNews состоит из двух частей. Первая: компонент для бэкенда, где вы управляете рассылками, подписчиками, группами и настройками. Вторая: форма подписки, через которую пользователи подписываются на рассылку.

**В разработке**
Этот раздел нуждается в обновлении с корректными именами и техническими настройками

### Краткое руководство

1. Добавьте тестовую группу
2. Добавьте себя как подписчика (и включите себя в тестовую группу)
3. Создайте новую рассылку и выберите документ для отправки. Отправьте только в тестовую группу!
4. После запуска cronjob вы получите рассылку
5. Проверьте рассылку в разных почтовых клиентах (Apple Mail, Outlook, Gmail и т.д.)
6. Для каждого webmail-клиента: проверьте рассылку в разных браузерах!

### Бэкенд: настройки

Настройки DitsNews доступны через выпадающий список кнопки меню справа. Доступны базовые параметры:

- Name (email-from)
- Email (email-from)
- Bounce-Email-Adress
- Confirmation page (требуется ID)
- Unsubscribe page (требуется ID)
- Template (используется для рассылок)

### Бэкенд: группы

Для отправки рассылки нужна группа. Создайте базовую группу с публичной настройкой. Если вы не хотите, чтобы пользователи подписывались через форму, создайте группу без публичной настройки.

### Бэкенд: подписчики

Здесь вы можете добавлять подписчиков вручную или выполнять CSV-импорт и CSV-экспорт. Доступны поля:

- First Name
- Last Name
- Company
- E-mail adress (обязательно)
- Status (active / inactive)
- назначение групп

### Бэкенд: создание рассылки

Рассылка полностью создаётся нативными шаблонами и ресурсами MODX. Сначала создайте ресурс (с контентом рассылки) на основе шаблона рассылки. Затем перейдите в components->DitsNews и нажмите «new newsletter». Заполните subject (это тема письма) и выберите документ из выпадающего списка. Показываются только ресурсы с корректным шаблоном (см. Backend-Settings).

### Доступные плейсхолдеры

```php
[[+firstname]]
[[+lastname]]
[[+fullname]]
[[+company]]
[[+email]]
```

## Примеры

### Пример шаблона рассылки

```html
[[!ditsnewsPlaceholders? &firstnameDefault=`Subscriber`]]
<!-- Sets firstname field of email newsletter to "Subscriber" when empty -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>My newsletter</title>
        <base href="[[++site_url]]" />
        <!-- Important! DitsNews needs this to create correct URLs! -->
        <style type="text/css">
            a {
                font-weight: bold;
                color: #ff0000;
            }
        </style>
    </head>
    <body>
        <p>Hello [[!+firstname:default=`Subscriber`]],</p>
        [[*content]]
        <p><a href="[[~10]]">Unsubscribe</a></p>
        <!-- Link to unsubscribe page: user data will be added while sending -->
    </body>
</html>
```
