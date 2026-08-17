---
title: "getYoutube"
description: "Сниппет получения видео YouTube через Data API v3 для MODX Revolution"
translation: "extras/getyoutube/index"
---

## Что такое getYoutube?

Простой сниппет получения видео для MODX Revolution.

Сниппет использует YouTube Data API (v3) для поиска каналов или видео и возврата данных.

## История

getYoutube написал David Pede (@davepede), релиз. 14 апреля 2014 года.

## Загрузка

Установите через [Package Management](building-sites/extras), или скачайте: <https://modx.com/extras/package/getYoutube>

Исходный код: <https://github.com/tasianmedia/getYoutube>

## Баги и запросы функций

<https://github.com/tasianmedia/getYoutube/issues>

## Использование

``` php
[[!getYoutube]]
```

Вызовы без кэша. Свойство '&mode' обязательно.

## System Settings

Google требует регистрации приложения для YouTube Data API (v3). Следуйте [this guide](https://developers.google.com/youtube/registering_an_application) для Google Public API Key.

| Key                 | Description                                                             |
| ------------------- | ----------------------------------------------------------------------- |
| getyoutube.api\_key | Google Public API Key для browser или server applications |

Нужен Google Public API Key для getYoutube

## Available Properties

### Selection Properties

| Name       | Description                                                                                                                         | Mode     | Default Value | Added in Version |
| ---------- | ----------------------------------------------------------------------------------------------------------------------------------- | -------- | ------------- | ---------------- |
| mode       | Режим поиска. (OPTIONS: channel, playlist or video)                                                                       | N/A      | video         | 1.0.0-pl         |
| video      | Список video IDs через запятую.                                                                                      | video    |               | 1.0.0-pl         |
| channel    | ID YouTube Channel. Все видео канала.                                              | channel  |               | 1.0.0-pl         |
| playlist   | ID YouTube Playlist. Все видео плейлиста.                                            | playlist |               | 1.1.0-pl         |
| sortby     | Сортировка. (OPTIONS: date, rating, title, viewCount)                                                            | N/A      | date          | 1.0.0-pl         |
| limit      | Лимит видео. (0. 50. См. pagination docs) | N/A      | 50            | 1.0.0-pl         |
| safeSearch | restricted content. (OPTIONS: none, moderate, strict)         | N/A      | none          | 1.0.0-pl         |

### Templating Properties

| Name          | Description                                                                           | Mode | Default Value | Added in Version |
| ------------- | ------------------------------------------------------------------------------------- | ---- | ------------- | ---------------- |
| tpl           | Чанк-шаблон. (REQUIRED)                                     | N/A  | videoTpl      | 1.0.0-pl         |
| tplAlt        | Чанк для каждого второго видео.                          | N/A  |               | 1.0.0-pl         |
| toPlaceholder | Вывод в placeholder. | N/A  |               | 1.0.0-pl         |
| Name | Description | Mode | Default Value | Added in Version |
| totalVar | Ключ placeholder с общим числом видео. | N/A | total | 1.0.0-pl |

## Available Placeholders

### Video Placeholders

| Placeholder               | Description                                                                                     | Mode            | Added in Version |
| ------------------------- | ----------------------------------------------------------------------------------------------- | --------------- | ---------------- |
| `[[+id]]`                 | Video ID                                                                                        | N/A             | 1.0.0-pl         |
| `[[+title]]`              | Video title                                                                                     | N/A             | 1.0.0-pl         |
| `[[+description]]`        | The description for the video                                                                   | N/A             | 1.0.0-pl         |
| `[[+url]]`                | URL to the videos YouTube Page                                                                  | N/A             | 1.0.0-pl         |
| `[[+embed_url]]`          | URL to use when embedding videos                                                                | N/A             | 1.1.0-pl         |
| `[[+publish_date]]`       | The date/time the video was published ( [ISO 8601](https://www.w3.org/TR/NOTE-datetime) format) | N/A             | 1.0.0-pl         |
| `[[+thumbnail_small]]`    | URL to a small version of the thumbnail (120 x 90px)                                            | N/A             | 1.0.0-pl         |
| `[[+thumbnail_medium]]`   | URL to a medium version of the thumbnail (320 x 180px)                                          | N/A             | 1.0.0-pl         |
| `[[+thumbnail_large]]`    | URL to a large version of the thumbnail (480 x 360px)                                           | N/A             | 1.0.0-pl         |
| `[[+thumbnail_standard]]` | URL to a standard version of the thumbnail (640 x 480px)                                        | video, playlist | 1.1.1-pl         |
| `[[+thumbnail_maxres]]`   | URL to a max resolution version of the thumbnail (1280 x 720px)                                 | video, playlist | 1.1.1-pl         |
| `[[+channel_title]]`      | Channel title                                                                                   | N/A             | 1.0.0-pl         |
| `[[+playlist_id]]`        | Playlist ID                                                                                     | playlist        | 1.1.0-pl         |
| `[[+duration]]`           | Duration of the video ( [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601#Durations) format)    | video           | 1.0.0-pl         |
| `[[+viewCount]]`          | # of views                                                                                      | video           | 1.0.0-pl         |
| `[[+likeCount]]`          | # of likes                                                                                      | video           | 1.0.0-pl         |
| `[[+dislikeCount]]`       | # of dislikes                                                                                   | video           | 1.0.0-pl         |
| `[[+favoriteCount]]`      | # of favorites                                                                                  | video           | 1.0.0-pl         |
| `[[+commentCount]]`       | # of comments                                                                                   | video           | 1.0.0-pl         |
| `[[+tags]]`               | Comma separated list of tags                                                                    | video           | 1.2.0-pl         |

Дополнительные плейсхолдеры: <https://github.com/tasianmedia/getYoutube/issues>.

### Other Placeholders

| Placeholder     | Description                                                              | Mode | Added in Version |
| --------------- | ------------------------------------------------------------------------ | ---- | ---------------- |
| `[[+total]]`    | Returns the total number of Videos in the output                         | N/A  | 1.0.0-pl         |
| `[[+nextPage]]` | URL to the next 50 results in the output (See pagination docs below)     | N/A  | 1.0.0-pl         |
| `[[+prevPage]]` | URL to the previous 50 results in the output (See pagination docs below) | N/A  | 1.0.0-pl         |

## Examples

Все видео канала YouTube 'Spotlight', чанк 'videoTpl':

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]
```

Плейлист 'POP Music Playlist 2017 (Songs of All Time)', чанк 'videoTpl':

``` php
[[!getYoutube? &mode=`playlist` &playlist=`PLMC9KNkIncKtPzgY-5rmhvj7fax8fdxoj` &tpl=`videoTpl`]]
```

Указанные видео, чанк 'videoTpl':

``` php
[[!getYoutube? &mode=`video` &video=`_X-jSkrqYzk,FoRRybrFR0c,yXBPbnv1H-U` &tpl=`videoTpl`]]
```

Канал 'Spotlight' в placeholder:

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]
```

## Pagination Examples

YouTube Data API (v3) возвращает блоки по 50. Используйте pagination placeholders при более 50 видео или с &limit.

Канал 'Spotlight', чанк 'videoTpl':

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]
```

Канал 'Spotlight', по 10, чанк 'videoTpl':

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &limit=`10`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]
```
