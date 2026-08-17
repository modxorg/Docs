---
title: "PeopleGroup"
description: "Сниппет выводит группу пользователей и пользователей внутри неё"
translation: "extras/peoples/peoples.peoplegroup"
---

## Сниппет PeopleGroup

Этот сниппет выводит группу пользователей и пользователей внутри неё.

## Использование

Покажите группу «HR Department» вместе с её пользователями:

``` php
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

<ul>
[[+users]]
</ul>
```

## Доступные свойства

| Name              | Description                                                                        | Default       |
| ----------------- | ---------------------------------------------------------------------------------- | ------------- |
| userTpl           | Чанк для каждого пользователя.                                                    | pplGroupUser  |
| limit             | Лимит групп пользователей на вызов. По умолчанию 10. 0 выводит все. | 0             |
| start             | Начальный индекс при ограничении выборки.                                       | 0             |
| sortBy            | Поле сортировки.                                                        | username      |
| sortByAlias       | Класс для поля сортировки.                                              | modUser       |
| sortDir           | Направление сортировки.                                                          | ASC           |
| cls               | Добавляет этот CSS-класс к каждому элементу.                                           | ppl-user      |
| altCls            | Необязательно. Добавляет CSS-класс к каждому чётному элементу.                   |               |
| firstCls          | Необязательно. Добавляет CSS-класс к первому элементу.                    |               |
| lastCls           | Необязательно. Добавляет CSS-класс к последнему элементу.                     |               |
| placeholderPrefix | Префикс глобальных placeholder, например total.                 | peoplegroups. |
| outputSeparator   | Разделитель между записями пользователей.                                            |               |
| toPlaceholder     | Необязательно. Записывает вывод в placeholder и возвращает пустую строку.        |               |
| userClass         | Имя класса объекта пользователей.                                                | modUser       |
| getProfile        | При true также загружает поля Profile каждого пользователя.                           | 0             |
| profileAlias      | Алиас класса Profile.                                             | Profile       |

## Чанки PeopleGroup

В сниппете PeopleGroup используется только свойство &userTpl с чанком pplGroupUser по умолчанию.

- [userTpl](extras/peoples/peoples.peoplegroup/usertpl "Peoples.PeopleGroup.userTpl")

## Примеры

Покажите всех пользователей группы «Marketing», отсортировав по authority роли, а не по username:

``` php
[[!PeopleGroup?
  &usergroup=`Marketing`
  &placeholderPrefix=`ug.`
  &toPlaceholder=`ug.users`
  &sortBy=`authority`
  &sortByAlias=`UserGroupRole`
]]

<h2>Users in [[+ug.name]]</h2>

[[+ug.users]]
```

## Смотрите также

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
- [Peoples.Peoples](extras/peoples/peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
