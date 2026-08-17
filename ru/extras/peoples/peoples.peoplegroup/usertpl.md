---
title: "userTpl"
description: "Чанк userTpl для сниппета PeopleGroup"
translation: "extras/peoples/peoples.peoplegroup/usertpl"
---

## Чанк userTpl PeopleGroup

Это чанк, который выводит свойство &userTpl сниппета [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup").

## Значение по умолчанию

```php
<li class="[[+cls]]">[[+username]] - <em>[[+role]]</em></li>
```

## Доступные placeholder

| Name     | Description                                               |
| -------- | --------------------------------------------------------- |
| id       | ID пользователя.                                       |
| username | Username пользователя.                                 |
| active   | 1 или 0, активен пользователь или нет. |
| role     | Имя роли пользователя в группе.            |
| role_id  | ID роли пользователя в группе.              |

Если в сниппете [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup") &getProfile равен 1, также доступны любые поля Profile пользователя.

## Смотрите также

-   [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    -   [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
-   [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    -   [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
-   [Peoples.Peoples](extras/peoples/peoples)
    -   [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
