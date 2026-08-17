---
title: "getFacebookProfile"
description: "Сниппет SocialSuite для получения публичной информации о пользователе или странице Facebook"
translation: "extras/socialsuite/socialsuite.getfacebookprofile"
---

[SocialSuite](extras/socialsuite "SocialSuite") это набор полезных инструментов для интеграции социальных сетей в сайт MODX.

getFacebookProfile это [сниппет](developing-in-modx/basic-development/snippets "Snippets") из SocialSuite. Он возвращает различную информацию о **пользователе или странице** Facebook.

## Свойства сниппета

| Property             | Default | Description                                                                                                                                                       |
| -------------------- | ------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                 |         | Имя пользователя, ID или короткое имя пользователя или страницы для запроса данных.                                                                                       |
| cache                | 1       | Кэшировать или нет. (0 отключает кэш)                                                                                      |
| cacheExpires         | 3600    | Время в секундах, в течение которого кэш считается действительным.                                                                                                                        |
| showAvailableData    | 0       | Установите 1, чтобы увидеть дамп всех доступных данных выбранного пользователя. Помогает выбрать плейсхолдеры.                                |
| toPlaceholders       | 0       | Установите 1, чтобы записать все данные в плейсхолдеры для существующей разметки. Отключает разбор чанка из &tpl. |
| toPlaceholdersPrefix | fb      | Префикс плейсхолдеров при toPlaceholders.                                                                                                      |
| tpl                  |         | Имя чанка для разбора с плейсхолдерами (когда toPlaceholders=0).                                                                                           |

## Пример использования

``` php
[[!getFacebookProfile? &user=`modxcms` &showAvailableData=`1` &toPlaceholders=`1`]]
```

возвращает следующее:

``` php
name = MODX
is_published = 1
website = https://modx.com/
username = modxcms
founded = November 2004
company_overview = MODX is the Content Management System that gives developers, designers and end-users the creative freedom and power to build and maintain websites and online applications with ease. Lose the limitations. There’s no steep learning curve, no cumbersome template language, and no awkward or restrictive structures forced on your site. MODX gives you the freedom to work your way and get things done.
products = MODX Evolution, MODX Revolution
about = MODX CMS is the Content Management System, framework and platform. https://modx.com/ MODX Revolution https://modx.com/download/
talking_about_count = 45
category = Software
id = 19110642979
link = http://www.facebook.com/modxcms
likes = 2348
cover.cover_id = 10150742956652980
cover.source = http://sphotos-d.ak.fbcdn.net/hphotos-ak-prn1/s720x720/559491_10150742956652980_2095164733_n.jpg
cover.offset_y = 0
```

После этого вы можете сделать так:

``` php
Facebook Name: [[!+fb.name]]<br />
Likes: [[!+fb.likes]]
```

и получить, например:

``` php
Facebook Name: MODX
Likes: 2348
```
