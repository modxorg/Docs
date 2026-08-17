---
title: "tpl"
description: "Чанк tpl для сниппета PeopleGroups"
translation: "extras/peoples/peoples.peoplegroups/tpl"
---

## Чанк tpl PeopleGroups

Это чанк, который выводит свойство &tpl сниппета [PeopleGroups](extras/peoples/peoples.peoplegroups "Peoples.PeopleGroups").

## Значение по умолчанию

```php
<li class="[[+cls]]">[[+name]] ([[+children]])</li>
```

## Доступные placeholder

| Name     | Description                              |
| -------- | ---------------------------------------- |
| id       | ID группы пользователей.                |
| name     | Имя группы пользователей.              |
| parent   | ID родительской группы, если есть. |
| cls      | Текущие CSS-классы элемента.  |
| children | Число пользователей в группе.   |

## Смотрите также

-   [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    -   [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
-   [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    -   [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
-   [Peoples.Peoples](extras/peoples/peoples)
    -   [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
