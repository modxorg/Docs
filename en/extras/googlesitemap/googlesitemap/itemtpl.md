---
title: "itemTpl"
_old_id: "893"
_old_uri: "revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl"
---

## GoogleSiteMap's itemTpl Chunk

This is the Chunk displayed with the &itemTpl property on the [GoogleSiteMap](extras/googlesitemap/googlesitemap.googlesitemap "GoogleSiteMap.GoogleSiteMap") snippet. Used for each result item that is listed.

## Default Value

 ``` php
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+date]]</lastmod>
    <changefreq>[[+update]]</changefreq>
    <priority>[[+priority]]</priority>
</url>
```

## Available Placeholders

| Name     | Description                          |
| -------- | ------------------------------------ |
| url      | The full URL of the resource         |
| date     | The last updated (edited) date       |
| update   | The frequency updated                |
| priority | The priority to assign this Resource |

## See Also

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap.googlesitemap)
     1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl)
     2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl)
2. [GoogleSiteMap.Roadmap](extras/googlesitemap/googlesitemap.roadmap)
