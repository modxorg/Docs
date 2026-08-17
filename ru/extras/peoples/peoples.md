---
title: "Peoples"
description: "Сниппет выводит всех пользователей сайта"
translation: "extras/peoples/peoples"
---

## Сниппет Peoples

Этот сниппет выводит всех пользователей сайта.

## Использование

`[[Peoples]]`

## Доступные свойства

| Name              | Description                                                                      | Default  |
| ----------------- | -------------------------------------------------------------------------------- | -------- |
| tpl               | Чанк для каждого пользователя.                                                  | pplUser  |
| active            | 0: только неактивные. 1: только активные. 2: все пользователи. | 1        |
| usergroups        | Необязательно. Список имён групп пользователей через запятую для фильтра.               |          |
| limit             | Лимит пользователей на вызов. По умолчанию 10. 0 выводит всех.     | 10       |
| start             | Начальный индекс при ограничении выборки.                                     | 0        |
| sortBy            | Поле сортировки. Расширенные поля не поддерживаются.                        | username |
| sortByAlias       | Класс для поля сортировки.                                            | User     |
| sortDir           | Направление сортировки.                                                        | ASC      |
| cls               | Добавляет этот CSS-класс к каждому элементу.                                         | ppl-user |
| altCls            | Необязательно. Добавляет CSS-класс к каждому чётному элементу.                 |          |
| firstCls          | Необязательно. Добавляет CSS-класс к первому элементу.                  |          |
| lastCls           | Необязательно. Добавляет CSS-класс к последнему элементу.                   |          |
| placeholderPrefix | Префикс глобальных placeholder, например total.               | peoples. |
| outputSeparator   | Разделитель между записями пользователей.                                          |          |
| toPlaceholder     | Необязательно. Записывает вывод в placeholder и возвращает пустую строку.      |          |
| userClass         | Имя класса объекта пользователей.                                              | modUser  |
| userAlias         | Алиас класса объекта пользователей.                                             | User     |

## Чанки Peoples

В сниппете Peoples используется только свойство &tpl с чанком pplUser по умолчанию.

- [tpl](extras/peoples/peoples/tpl "Peoples.Peoples.tpl")

## Примеры

Покажите всех пользователей сайта.

``` php
[[Peoples? &limit=`0`]]
```

Покажите первых 10 пользователей группы «HR Department»:

``` php
[[Peoples? &limit=`10` &usergroups=`HR Department`]]
```

Покажите всех неактивных пользователей сайта:

``` php
[[Peoples? &limit=`0` &active=`0`]]
```

## Смотрите также

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
- [Peoples.Peoples](extras/peoples/peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
