---
title: "Модель базы данных"
description: "Основные поля xPDO-модели Discuss: категории, доски, темы, посты, вложения и пользователи"
translation: "extras/discuss/discuss.database-model"
---

Модель xPDO Discuss доступна на Github. На этой странице перечислены важные поля основных объектов для другой документации. Типы указаны как phptype в схеме: так разработчик или пользователь работает с данными, не обязательно как они хранятся в БД.

[Полная (XML xPDO) схема на Github](https://github.com/modxcms/Discuss/blob/develop/_build/schema/discuss.mysql.schema.xml).

## disCategory - Categories

| Field               | Type (length) | Description                                                 |
| ------------------- | ------------- | ----------------------------------------------------------- |
| name                | string (255)  | Имя категории                                        |
| description         | string        | Описание категории                                 |
| collapsible         | bool (10)     | Можно ли сворачивать категорию. |
| rank                | int (10)      | Порядок сортировки категорий                                   |
| default_moderators | string        |                                                             |
| default_usergroups | string        |                                                             |
| integrated_id      | int (10)      | Старый ID при импорте данных.                     |

## disBoard - Boards

| Fieldname            | Type (length) | Description                                                   |
| -------------------- | ------------- | ------------------------------------------------------------- |
| id                   |               |                                                               |
| category             | integer (10)  | ID категории (disCategory) доски        |
| parent               | integer (10)  | ID родительской доски                     |
| name                 | string (255)  | Имя доски                                             |
| description          | text          | Описание доски. Вероятно, может содержать HTML.          |
| last_post           | integer (10)  | ID последнего поста на доске.                            |
| num_topics          | integer (10)  | Число тем на доске.                    |
| num_replies         | integer (10)  | Число ответов на доске.               |
| total_posts         | integer (10)  | Число постов на доске.                     |
| ignorable            | boolean (10)  | Может ли пользователь игнорировать доску.             |
| rank                 | integer (10)  | Порядок сортировки досок.                                        |
| map                  | string (255)  | ??                                                            |
| minimum_post_level | integer (10)  | ?? all, member, moderator or administrator? 0/1/2/3?          |
| status               | integer (4)   | Статус доски (active, inactive or archived)            |
| locked               | boolean (10)  | Заблокирована ли доска для постов.                 |
| integrated_id       | integer (10)  | ??                                                            |
| rtl                  | boolean (10)  | Использовать ли RTL-форматирование для доски. |

## disThread - Threads

| Fieldname      | Type (length)        | Description                                                             |
| -------------- | -------------------- | ----------------------------------------------------------------------- |
| id             |                      |                                                                         |
| class_key     | string (120)         | Тип темы, по умолчанию disThreadDiscussion                     |
| board          | integer (10)         | ID доски темы                                    |
| title          | string (255)         | Название доски                                                       |
| post_first    | integer (10)         | ID первого поста (родитель для threaded posts) |
| post_last     | integer (10)         | ID последнего поста в теме.                                      |
| post_last_on | integer (11)         | UNIX timestamp последнего поста.                         |
| author_first  | integer (10)         | ID автора первого поста.               |
| author_last   | integer (10)         | ID автора последнего поста.                |
| replies        | integer (10)         | Число ответов в теме.                                        |
| views          | integer (10)         | Число просмотров темы.                                          |
| locked         | integer (10)         | ?? Вероятно boolean для заблокированной темы.             |
| answered       | boolean (true/false) | Отмечена ли тема как answered                                          |
| sticky         | integer (10)         | ?? Вероятно boolean для закреплённой темы.           |
| private        | boolean (true/false) | Приватная тема или нет                                     |
| users          | mediumtext           | Список пользователей через запятую.                   |
| last_view_ip | string (120)         | Последний IP просмотра темы                                          |
| integrated_id | integer (10)         | ??                                                                      |
| participants   | text                 | Похоже на users?                                                       |

Класс расширяют:

- disThreadDiscussion
- disThreadQuestion

## disPost - Posts

| Field          | Type (length) | Description                                                                                                                                                                                                           |
| -------------- | ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| board          | int           | ID disBoard поста                                                                                                                                                                                     |
| thread         | int           | ID disThread поста                                                                                                                                                                               |
| parent         | int           | ID родительского disPost. Всегда один root post с parent 0 (первый пост темы), остальные threaded и обычно ссылаются на последний пост темы. |
| title          | string (255)  | Заголовок поста, обычно "Re: `<name of thread>`", может отличаться в формах ответа.                                                                                                                    |
| message        | string        | Содержимое поста.                                                                                                                                                                                                   |
| author         | int           | ID disUser автора поста.                                                                                                                                                                       |
| createdon      | int           | Unix timestamp создания поста                                                                                                                                                                      |
| editedon       | int           | Unix timestamp редактирования (если редактировали)                                                                                                                                          |
| editedby       | int           | ID disUser редактора поста.                                                                                                                                                                         |
| icon           | string (255)  | ?? Unused                                                                                                                                                                                                             |
| allow_replies | bool (1       | 0)                                                                                                                                                                                                                    | Похоже, не используется.                       |
| rank           | string        | Порядок внутри темы.                                                                                                                                                                                          |
| ip             | string (255)  | IP автора                                                                                                                                                                                                      |
| integrated_id | int           | ID при импорте.                                                                                                                                                                                    |
| depth          | int (10)      | Глубина поста в threaded модели.                                                                                                                                                                  |
| answer         | bool (1       | 0)                                                                                                                                                                                                                    | Отмечен ли пост как answer. |

## disPostAttachment - Attachments

| Field            | Type (length) | Description                                 |
| ---------------- | ------------- | ------------------------------------------- |
| post             | int (10)      | ID поста вложения |
| board            | int (10)      | ID доски поста              |
| filename         | string (255)  | Имя и путь к файлу                   |
| createdon        | date          | Когда добавили вложение               |
| filesize         | int (10)      | Размер вложения, вероятно в байтах.    |
| downloads        | int (10)      | Число скачиваний                         |
| integrated_id   | int (10)      | ID вложения при импорте.           |
| integrated_data | string        | Доп. данные импорта вложения          |

## disUser - Users

В режиме sso синхронизируется с пользователями MODX (modUser).

| Field                 | Type (length) | Description                                                                                                                                                                                  |
| --------------------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                  | int           | ID modUser аккаунта.                                                                                                                                              |
| username              | string (120)  | Username пользователя.                                                                                                                                                                        |
| password              | string (120)  | Пароль пользователя.                                                                                                                                                                        |
| email                 | string (200)  | Email пользователя.                                                                                                                                                                           |
| ip                    | string (120)  | IP последнего входа.                                                                                                                                                   |
| createdon             | date string   | Время создания (регистрация / импорт)                                                                                                                                       |
| name_first           | string (100)  | Имя                                                                                                                                                                       |
| name_last            | string (100)  | Фамилия                                                                                                                                                                        |
| gender                | string (10)   | Пол                                                                                                                                                                           |
| birthdate             | date string   | Дата рождения                                                                                                                                                                   |
| website               | string (255)  | Сайт пользователя                                                                                                                                                                          |
| location              | string (255)  | Местоположение                                                                                                                                                                      |
| status                | int (10)      | Статус: 0 (INACTIVE), 1 (ACTIVE), 2 (UNCONFIRMED), 3 (BANNED), 4 (AWAITING_MODERATION). В коде используйте константы Discuss::STATUS_NAME. |
| confirmed             | bool (1       | 0)                                                                                                                                                                                           | Подтверждён ли пользователь.                                                    |
| confirmedon           | date          | Когда подтвердили                                                                                                                                                                  |
| last_login           | date          | Последний вход на форумы                                                                                                                                                   |
| last_active          | date          | Последняя активность на форумах                                                                                                                                                  |
| ignore_boards        | string        | Список игнорируемых досок через запятую.                                                                                                                                     |
| signature             | string        | Подпись пользователя.                                                                                                                                                                       |
| title                 | string (255)  | Title.                                                                                                                                                                                       |
| avatar                | string        | Ссылка на avatar                                                                                                                                                                               |
| avatar_service       | string (255)  | Сервис avatar (gravatar по умолчанию)                                                                                                                              |
| thread_last_visited | int (10)      | ID последней посещённой темы                                                                                                                                                       |
| synced                | bool (1       | 0)                                                                                                                                                                                           | Синхронизирован ли с modUser (или другим источником). |
| syncedat              | date          | Время последней синхронизации                                                                                                                                                                |
| salt                  | string (255)  | Salt пользователя                                                                                                                                                                                    |
| integrated_Id        | int (10)      | Старые ID при импорте                                                                                                                                                             |
| display_name         | string (255)  | Отображаемое имя                                                                                                                                                 |
| use_display_name    | bool (1       | 0)                                                                                                                                                                                           | Использовать display name или username.    |
