---
title: "PeopleGroups"
description: "Сниппет выводит все группы пользователей сайта"
translation: "extras/peoples/peoples.peoplegroups"
---

## Сниппет PeopleGroups

Этот сниппет выводит все группы пользователей сайта.

## Использование

Выведите первые 10 групп пользователей, отсортированных по имени:

``` php
[[!PeopleGroups]]
```

## Доступные свойства

| Name              | Description                                                                          | Default       |
| ----------------- | ------------------------------------------------------------------------------------ | ------------- |
| tpl               | Чанк для каждой группы пользователей.                                                | pplUserGroup  |
| user              | Необязательно. При указании ID пользователя выводятся только его группы. |               |
| limit             | Лимит групп пользователей на вызов. По умолчанию 10. 0 выводит все.   | 10            |
| start             | Начальный индекс при ограничении выборки.                                         | 0             |
| sortBy            | Поле сортировки.                                                          | name          |
| sortByAlias       | Класс для поля сортировки.                                                | modUserGroup  |
| sortDir           | Направление сортировки.                                                            | ASC           |
| cls               | Добавляет этот CSS-класс к каждому элементу.                                             | ppl-usergroup |
| altCls            | Необязательно. Добавляет CSS-класс к каждому чётному элементу.                     |               |
| firstCls          | Необязательно. Добавляет CSS-класс к первому элементу.                      |               |
| lastCls           | Необязательно. Добавляет CSS-класс к последнему элементу.                       |               |
| placeholderPrefix | Префикс глобальных placeholder, например total.                   | peoplegroups. |
| outputSeparator   | Разделитель между записями пользователей.                                              |               |
| toPlaceholder     | Необязательно. Записывает вывод в placeholder и возвращает пустую строку.          |               |
| userClass         | Имя класса объекта пользователей.                                                  | modUser       |

## Чанки PeopleGroups

В сниппете PeopleGroups используется только свойство &tpl с чанком pplUserGroup по умолчанию.

- [tpl](extras/peoples/peoples.peoplegroups/tpl "Peoples.PeopleGroups.tpl")

## Примеры

Покажите все группы пользователей сайта.

``` php
[[PeopleGroups? &limit=`0`]]
```

Покажите все группы пользователя с ID 23:

``` php
[[PeopleGroups? &user=`23` &limit=`0`]]
```

Покажите первые 10 групп пользователя с ID 15:

``` php
[[!PeopleGroups? &user=`15`]]
```

## Смотрите также

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
- [Peoples.Peoples](extras/peoples/peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
