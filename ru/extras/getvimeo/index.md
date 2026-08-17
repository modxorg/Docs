---
title: "getVimeo"
description: "Сниппет получения видео из канала Vimeo для MODX Revolution"
translation: "extras/getvimeo/index"
---

## Что такое getVimeo?

Простой сниппет получения видео для MODX Revolution.

Сниппет использует Vimeo Simple API для поиска по каналу и возврата видео с данными.

## История

getVimeo написал David Pede (davidpede), релиз. 12 июня 2013 года.

## Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](/building-sites/extras), или скачайте: <https://modx.com/extras/package/getvimeo>

Исходный код и build script: <https://github.com/tasianmedia/getVimeo>

## Баги и запросы функций

Баги, issues и feature requests: <https://github.com/tasianmedia/getVimeo/issues>

## Использование

Сниппет getVimeo вызывается тегом:

``` php
[[getVimeo]]
```

Без &channel, &id и &tpl вывод пуст.

### Available Properties

### Selection Properties

| Name    | Description                                                                                                           | Default Value | Added in Version |
| ------- | --------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| channel | URL Name или Numeric ID канала Vimeo. (REQUIRED)                                                    |               | 1.0.0-pl         |
| id      | Список Numeric Video IDs через запятую. `all` для всех видео. (REQUIRED) |               | 1.0.0-pl         |
| sortby  | Плейсхолдер для сортировки. (NOTE: Please see placeholder docs for more details)                                   | upload\_date  | 1.0.0-pl         |
| sortdir | Порядок сортировки. (OPTIONS: DESC or ASC)                                                                        | DESC          | 1.0.0-pl         |
| limit   | Лимит видео. `0` для безлимита.                                                  | 0             | 1.1.0-pl         |
| offset  | Смещение видео.                                                                                          | 0             | 1.1.0-pl         |

### Templating Properties

| Name          | Description                                                                                                                                                            | Default Value | Added in Version |
| ------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| tpl           | Чанк-шаблон. (REQUIRED)                                                                                                                      |               | 1.0.0-pl         |
| tplAlt        | Чанк для каждого второго видео.                                                                                                           |               | 1.0.0-pl         |
| tplWrapper    | Wrapper chunk. (NOTE: Does not work with &toPlaceholder. The placeholder where the items are inserted is `[[+output]]`) |               | 1.0.0-pl         |
| toPlaceholder | Записать вывод в placeholder. (NOTE: Does not work with &tplWrapper)                                           |               | 1.0.0-pl         |
| totalVar      | Ключ placeholder с общим числом видео без учёта LIMIT.                         | total         | 1.1.0-pl         |

### Available Placeholders

Плейсхолдеры зависят от Vimeo Simple API.

#### Video Placeholders

| Placeholder                     | Description                              | Added in Version |
| ------------------------------- | ---------------------------------------- | ---------------- |
| `[[+title]]`                    | Video title                              |                  |
| `[[+url]]`                      | URL to the Video Page                    |                  |
| `[[+id]]`                       | Video ID                                 |                  |
| `[[+description]]`              | The description of the video             |                  |
| `[[+thumbnail_small]]`          | URL to a small version of the thumbnail  |                  |
| `[[+thumbnail_medium]]`         | URL to a medium version of the thumbnail |                  |
| `[[+thumbnail_large]]`          | URL to a large version of the thumbnail  |                  |
| `[[+user_name]]`                | The user name of the video’s uploader    |                  |
| `[[+user_url]]`                 | The URL to the user profile              |                  |
| `[[+upload_date]]`              | The date/time the video was uploaded on  |                  |
| `[[+user_portrait_small]]`      | Small user portrait (30px)               |                  |
| `[[+user_portrait_medium]]`     | Medium user portrait (100px)             |                  |
| `[[+user_portrait_large]]`      | Large user portrait (300px)              |                  |
| `[[+stats_number_of_likes]]`    | # of likes                               |                  |
| `[[+stats_number_of_views]]`    | # of views                               |                  |
| `[[+stats_number_of_comments]]` | # of comments                            |                  |
| `[[+duration]]`                 | Duration of the video in seconds         |                  |
| `[[+width]]`                    | Standard definition width of the video   |                  |
| `[[+height]]`                   | Standard definition height of the video  |                  |
| `[[+tags]]`                     | Comma separated list of tags             |                  |

Актуальный список: <http://developer.vimeo.com/apis/simple#video-response>

#### Other Placeholders

| Placeholder  | Description                                                                                               | Added in Version |
| ------------ | --------------------------------------------------------------------------------------------------------- | ---------------- |
| `[[+total]]` | Общее число видео в выводе.                                                         | 1.0.1-pl         |
| `[[+idx]]`   | Позиция видео в выводе, с 1. | 1.1.0-pl         |

## Examples

Все видео канала Vimeo 'Staff Picks', чанк 'vimeoTpl':

``` php
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl`]]
```

Указанные видео канала 'Staff Picks', чанк 'vimeoTpl':

``` php
[[!getVimeo? &channel=`staffpicks` &id=`68688561,69239313,68146128` &tpl=`vimeoTpl`]]
```

Все видео 'Staff Picks' в placeholder:

``` php
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]
```

Нельзя передать &toPlaceholder в wrapper chunk (&tplWrapper).

## getPage для пагинации

С [getPage](extras/getpage "getPage") getVimeo поддерживает гибкую пагинацию.

Все видео 'Staff Picks', чанк 'vimeoTpl':

``` php
[[!getPage?
    &element=`getVimeo`
    &channel=`staffpicks`
    &id=`all`
    &tpl=`vimeoTpl`
    &limit=`5`
]]

<div class="paging">
    <ul class="pageList">
        [[!+page.nav]]
    </ul>
</div>
```
