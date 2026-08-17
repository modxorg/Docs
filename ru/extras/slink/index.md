---
title: "sLink"
description: "Сниппет для генерации xhtml разметки ссылок и якорей в MODX Revolution"
translation: "extras/slink/index"
---

## Что такое sLink?

sLink (произносится: es-link). простой сниппет MODX Revolution для xhtml разметки ссылок и якорей из параметров. Первый релиз. 21 октября 2010 года, автор Mark Hamstra.

## Требования

sLink создан для Revolution и должен работать со всех версий 2.0.0. О несовместимостях сообщайте на форуме.

## История

| Version       | Release date       | Author       | Changes                                                                    |
| ------------- | ------------------ | ------------ | -------------------------------------------------------------------------- |
| 1.0.0-RC      | October 21st, 2010 | Mark Hamstra | Initial release.                                                           |
| **1.0.0-RC2** | October 21st, 2010 | Mark Hamstra | Fixes resource->get() error when using regular links instead of a resource |

## Загрузка и установка

System -> Package Manager -> Add new extra -> provider: modxcms.com -> MODX add-ons -> Content, найдите sLink. Скачайте и установите.

Или скачайте transport package из [репозитория](https://modx.com/extras/package/slink), загрузите в core/packages и установите через workspace.

## Использование sLink

sLink вызывается с разными параметрами.

| ?Parameter | Description                                                                                                                       | Possible values                                                 | Default value       |
| ---------- | --------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------- | ------------------- |
| &to        | Required. Куда ведёт ссылка: ID ресурса или обычный url.                                 | (int) doc id                                                    | (string) url/anchor |  |
| &title     | Optional.                                                                                                                         | See below                                                       | longtitle           |
| &link      | Optional. Как &title, но текст ссылки.                                                           | See below                                                       | menutitle           |
| &name      | Optional. Якорь на странице.                                                                                | (string) the anchor                                             | (none)              |
| &class     | Optional. CSS class ссылки.                                                                             | (string) the css class(es)                                      | (none)              |
| &debug     | Optional. Отладка вызова. Уровни: 0, 1 или 2. See below                                           | 0: off (if there's an error, nothing will be shown on the page) |
|            | 1: on, will only show the amount of errors encountered                                                                            |                                                                 |
|            | 2: advanced, shows the errors as well as the parameter values that were calculated. If no errors are found, this outputs nothing. | (int) 0, 1 or 2                                                 | 1                   |

### Использование &title и &link

`&title` и `&link` задают текст атрибута `title` и текст ссылки.

Когда `&to`. ресурс, можно использовать поля: `pagetitle`, `menutitle`, `longtitle`, `introtext`, `description`

Можно задать обычную строку.

## Примеры

Минимальный вызов: menutitle ресурса 5 для текста ссылки, longtitle для title.

``` php
[[sLink? &to=`5`]]
```

Внешняя ссылка с текстом link и title в вызове.

``` php
[[sLink? &to=`https://rtfm.modx.com` &title=`Please, read that manual!` &link=`RTFM`]]
```

Якорь на странице.

``` php
[[sLink? &to=`#myAnchor` &name=`myAnchor` &link=`This is an anchor` &title=`Clicking me focuses your screen`]]
```

## Разработка

sLink сейчас не развивается активно. Код можно использовать в своих проектах или продолжить разработку addon.

## Внешние источники

Repository page: <https://extras.modx.com/package/slink>
