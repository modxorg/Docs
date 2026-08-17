---
title: "Peoples"
description: "Компонент для вывода списков пользователей и групп пользователей на community-сайтах MODX Revolution"
translation: "extras/peoples/index"
---

## Что такое Peoples?

Peoples это простой компонент для вывода списков пользователей и групп пользователей в MODX Revolution. На community-сайтах с его помощью вы показываете зарегистрированных пользователей и группы пользователей сайта.

### Требования

- MODX Revolution 2.0.0 или новее
- PHP5 или новее

### История

Peoples написал [Shaun McCormick](https://github.com/splittingred) как простой компонент списков пользователей и групп. Первый релиз вышел 19 октября 2010 года.

### Загрузка

Пакет устанавливают через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачивают из репозитория MODX Extras: <https://modx.com/extras/package/peoples>

## Сниппеты

Peoples включает три отдельных сниппета:

- [Peoples](extras/peoples/peoples "Peoples.Peoples"): выводит список пользователей.
- [PeopleGroups](extras/peoples/peoples.peoplegroups "Peoples.PeopleGroups"): выводит список групп пользователей.
- [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup"): выводит группу пользователей и всех пользователей в ней.

## Примеры использования

Выведите первых 10 пользователей, отсортированных по username.

``` php
[[Peoples]]
```

Выведите первые 10 групп пользователей, отсортированных по имени.

``` php
[[PeopleGroups]]
```

Покажите группу пользователей «HR Department» и выведите пользователей группы в placeholder `users`:

``` php
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

[[+users]]
```

## Смотрите также

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
- [Peoples.Peoples](extras/peoples/peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
