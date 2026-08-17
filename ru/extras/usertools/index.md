---
title: "userTools"
description: "Набор сниппетов MODX Revolution для получения пользователей и связанных данных"
translation: "extras/usertools/index"
---

## Что такое userTools?

Extra включает набор сниппетов MODX Revolution для получения пользователей и связанной информации.

## История

userTools написал David Pede (davidpede). Первый релиз: 24 марта 2017 года.

## Загрузка

Скачайте через менеджер MODX Revolution в [Package Management](en/building-sites/extras) или из MODX Extras Repository: <https://modx.com/extras/package/usertools>

Исходный код и build script на GitHub: <https://github.com/tasianmedia/usertools>

## Ошибки и запросы функций

Сообщайте об ошибках, issues и feature requests в GitHub Repository: <https://github.com/tasianmedia/usertools/issues>

## Доступные сниппеты

### getProfile

Сниппет getProfile вызывается так:

``` php
[[getProfile]]
```

### getUsers

Сниппет getUsers вызывается так:

``` php
[[getUsers]]
```

### getGroups

Сниппет getGroups вызывается так:

``` php
[[getGroups]]
```

getProfile, getUsers и getGroups можно вызывать с кешем или без.

### Использование

### getProfile

#### Доступные свойства

| Name | Description                                                                      | Default Value | Added in Version |
| ---- | -------------------------------------------------------------------------------- | ------------- | ---------------- |
| id   | Список числовых User ID через запятую. Если не задан, возвращается текущий пользователь. |               | 1.0.0-pl         |
| tpl  | Имя чанка-шаблона. \[REQUIRED\]                                                  |               | 1.0.0-pl         |

### Доступные плейсхолдеры

| Name             | Description                                                                                                                      | Default Value | Added in Version |
| ---------------- | -------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| internalKey      | ID пользователя.                                                                                                                 |               | 1.0.0-pl         |
| fullname         | Полное имя пользователя.                                                                                                         |               | 1.0.0-pl         |
| email            | Email пользователя.                                                                                                              |               | 1.0.0-pl         |
| phone            | Телефон пользователя.                                                                                                            |               | 1.0.0-pl         |
| mobilephone      | Мобильный телефон пользователя.                                                                                                  |               | 1.0.0-pl         |
| fax              | Факс пользователя.                                                                                                               |               | 1.0.0-pl         |
| blocked          | 1 или 0. При blocked=true пользователь не сможет войти.                                                                          |               | 1.0.0-pl         |
| blockeduntil     | Timestamp. До этой даты вход заблокирован.                                                                                       |               | 1.0.0-pl         |
| blockedafter     | Timestamp. После этой даты вход заблокирован.                                                                                    |               | 1.0.0-pl         |
| logincount       | Число входов пользователя.                                                                                                       |               | 1.0.0-pl         |
| lastlogin        | Время последнего входа.                                                                                                          |               | 1.0.0-pl         |
| thislogin        | Время входа в текущей сессии.                                                                                                    |               | 1.0.0-pl         |
| failedlogincount | Число неудачных попыток входа.                                                                                                   |               | 1.0.0-pl         |
| sessionid        | Session ID пользователя из таблицы сессий.                                                                                       |               | 1.0.0-pl         |
| dob              | Дата рождения.                                                                                                                   |               | 1.0.0-pl         |
| gender           | Пол: 0 ни один, 1 мужской, 2 женский.                                                                                            |               | 1.0.0-pl         |
| address          | Почтовый адрес.                                                                                                                 |               | 1.0.0-pl         |
| country          | Страна.                                                                                                                          |               | 1.0.0-pl         |
| city             | Город.                                                                                                                           |               | 1.0.0-pl         |
| state            | Штат или область.                                                                                                                |               | 1.0.0-pl         |
| zip              | Почтовый индекс.                                                                                                                 |               | 1.0.0-pl         |
| photo            | Фото пользователя.                                                                                                               |               | 1.0.0-pl         |
| comment          | Комментарии к пользователю.                                                                                                      |               | 1.0.0-pl         |
| website          | Сайт пользователя.                                                                                                               |               | 1.0.0-pl         |
| extended         | Расширенные поля. Доступ через префикс extended.: `[[+extended.myField]]`                                                       |               | 1.0.0-pl         |

### getUsers

#### Доступные свойства

| Name | Description                                                                      | Default Value | Added in Version |
| ---- | -------------------------------------------------------------------------------- | ------------- | ---------------- |
| id   | Список числовых User ID через запятую. Если не задан, возвращается текущий пользователь. |               | 1.0.0-pl         |
| tpl  | Имя чанка-шаблона. \[REQUIRED\]                                                  |               | 1.0.0-pl         |
