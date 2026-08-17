---
title: "getTwitterProfile"
description: "Сниппет SocialSuite для получения публичной информации о пользователе Twitter"
translation: "extras/socialsuite/socialsuite.gettwitterprofile"
---

[SocialSuite](extras/socialsuite "SocialSuite") это набор полезных инструментов для интеграции социальных сетей в сайт MODX.

getTwitterProfile это [сниппет](developing-in-modx/basic-development/snippets "Snippets") из SocialSuite. Он возвращает различную информацию о **пользователе** Twitter.

getTwitterProfile сейчас, похоже, не работает. Обновим страницу после исправления.

## Свойства сниппета

| Property             | Default | Description                                                                                                                                                       |
| -------------------- | ------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                 |         | Имя пользователя, ID или короткое имя пользователя или страницы для запроса данных.                                                                                       |
| cache                | 1       | Кэшировать или нет. (0 отключает кэш)                                                                                      |
| cacheExpires         | 3600    | Время в секундах, в течение которого кэш считается действительным.                                                                                                                        |
| showAvailableData    | 0       | Установите 1, чтобы увидеть дамп всех доступных данных выбранного пользователя. Помогает выбрать плейсхолдеры.                                |
| toPlaceholders       | 0       | Установите 1, чтобы записать все данные в плейсхолдеры для существующей разметки. Отключает разбор чанка из &tpl. |
| toPlaceholdersPrefix | tw      | Префикс плейсхолдеров при toPlaceholders.                                                                                                      |
| tpl                  |         | Имя чанка для разбора с плейсхолдерами (когда toPlaceholders=0).                                                                                           |

## Пример использования

``` php
[[!getTwitterProfile? &user=`modx` &showAvailableData=`1` &toPlaceholders=`1`]]
```

возвращает следующее:

``` php
<currently erroring>
```

После этого вы можете сделать так:

``` php
Twitter Name: [[!+tw.name]]<br />
Likes: [[!+tw.likes]]
```

и получить, например:

``` php
Twitter Name: MODX
Likes: 2348
```
