---
title: "itemTpl"
description: "Чанк itemTpl сниппета GoogleSiteMap"
translation: "extras/googlesitemap/googlesitemap/itemtpl"
---

## Чанк itemTpl GoogleSiteMap

Чанк для свойства &itemTpl сниппета [GoogleSiteMap](en/extras/googlesitemap/googlesitemap "GoogleSiteMap.GoogleSiteMap"). Используется для каждого элемента результата.

## Значение по умолчанию

``` xml
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+date]]</lastmod>
    <changefreq>[[+update]]</changefreq>
    <priority>[[+priority]]</priority>
</url>
```

## Доступные плейсхолдеры

| Имя     | Описание                          |
| -------- | ------------------------------------ |
| url      | Полный URL ресурса         |
| date     | Дата последнего изменения       |
| update   | Частота обновления                |
| priority | Приоритет ресурса |

## См. также

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
