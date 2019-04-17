---
title: "GoogleSiteMapVersion1"
_old_id: "1756"
_old_uri: "revo/googlesitemap/googlesitemapversion1"
---

## GoogleSiteMap Snippet

 This snippet displays a Google Sitemap.

## Usage

 Simply place the snippet in the Resource you want to use, and set the Resource's Template to 'blank':

 ``` php
[[!GoogleSiteMap]]
```

 Don't forget to set the content type to 'xml'.

## Properties

 | Name             | Description                                                                                                                                                                                                                                  | Default Value                               |
 | ---------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------- |
 | allowedtemplates | A comma-separated list of Template IDs to filter by. Will only filter if a value is set.                                                                                                                                                     |                                             |
 | containerTpl     | The Chunk to use for the output container.                                                                                                                                                                                                   | gContainer                                  |
 | context          | Limit to the specified Context(s). If empty, will grab Resources from current Context. Defaults to empty, can support a comma-separated list.                                                                                                |                                             |
 | excludeResources | An optional comma-separated list of Resources to skip.                                                                                                                                                                                       |                                             |
 | googleSchema     | The location of the GoogleSiteMap schema.                                                                                                                                                                                                    | <http://www.google.com/schemas/sitemap/0.9> |
 | hideDeleted      | If true, will show only nondeleted Resources.                                                                                                                                                                                                | 1                                           |
 | itemTpl          | The Chunk to use for each result item.                                                                                                                                                                                                       | gItem                                       |
 | maxDepth         | The depth down the tree to grab Resources. If set to empty or 0, will grab all depths.                                                                                                                                                       | 0                                           |
 | published        | If true, will only show published resources.                                                                                                                                                                                                 | 1                                           |
 | searchable       | If true, will only show searchable resources.                                                                                                                                                                                                | 1                                           |
 | showHidden       | If true, will include hidden Resources.                                                                                                                                                                                                      | false                                       |
 | sortBy           | The field to sort the results by.                                                                                                                                                                                                            | menuindex                                   |
 | sortByAlias      | The class to use as the alias for the sortBy property.                                                                                                                                                                                       | modResource                                 |
 | sortDir          | The direction to sort in.                                                                                                                                                                                                                    | ASC                                         |
 | templateFilter   | The modTemplate column to filter by.                                                                                                                                                                                                         | id                                          |
 | where            | A JSON-style expression or array of criteria to select/filter resources to output. See <http://rtfm.modx.com/display/xPDO20/xPDOQuery.where> for more detail. Somewhere is a bug, that doesn't show up anything for resources in containers. |                                             |

## GoogleSiteMap Chunks

 There are 2 chunks that are processed in GoogleSiteMap. Their corresponding parameters are:

- [itemTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl "GoogleSiteMap.GoogleSiteMap.itemTpl") - The Chunk to use for each result listed.
- [containerTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl "GoogleSiteMap.GoogleSiteMap.containerTpl") - The Chunk to use for wrapping the results.

## Examples

 Display a sitemap for the current context:

 ``` php
[[!GoogleSiteMap]]
```

 Display a sitemap that combines both the web and marketing contexts:

 ``` php
[[!GoogleSiteMap? &context=`web,marketing`]]
```

 Limit the sitemap to only the Resources with Template named 'BlogTemplate', and exclude the Resources with IDs 123 or 78:

 ``` php
[[!GoogleSiteMap?
  &allowedtemplates=`BlogTemplate`
  &templateFilter=`templatename`
  &excludeResources=`123,78`
]]
```

## See Also

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap.googlesitemap)
     1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl)
     2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl)
2. [GoogleSiteMap.Roadmap](extras/googlesitemap/googlesitemap.roadmap)
