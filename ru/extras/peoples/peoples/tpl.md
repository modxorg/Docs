---
title: "tpl"
description: "Чанк tpl для сниппета Peoples"
translation: "extras/peoples/peoples/tpl"
---

## Чанк tpl Peoples

Это чанк, который выводит свойство &tpl сниппета [Peoples](extras/peoples/peoples "Peoples.Peoples").

## Значение по умолчанию

```php
<li class="[[+cls]]">[[+username]]</li>
```

## Доступные placeholder

| Name     | Description                                  |
| -------- | -------------------------------------------- |
| id       | ID пользователя.                          |
| username | Username пользователя.                    |
| active   | 1 или 0, активен пользователь или нет. |
| cls      | Текущие CSS-классы элемента.      |

Также доступны любые поля профиля пользователя, например email, fullname и т. д.

Расширенные и Remote Data поля доступны так:

```php
[[+extended.nameOfExtendedAttribute]]
[[+remote_data.nameOfRemoteDataAttribute]]
```

## Смотрите также

-   [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    -   [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
-   [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    -   [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
-   [Peoples.Peoples](extras/peoples/peoples)
    -   [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
