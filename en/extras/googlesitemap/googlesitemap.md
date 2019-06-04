---
title: "GoogleSiteMap"
_old_id: "891"
_old_uri: "revo/googlesitemap/googlesitemap.googlesitemap"
---

## GoogleSiteMap Snippet

This snippet displays a Google Sitemap. Version 2 is many times faster than Version 1, but with less options. If params are specified that depend on the old version, it will be called. Check [this page](extras/googlesitemap/googlesitemap/googlesitemapversion1) for the properties available in the old version.

Note: if you try to view a XML sitemap with tens of thousands of nodes in your browser, it will take a good long while to render it. However the server response should be a few seconds or less. More testing would be welcome. Please file issues here: <https://github.com/modxcms/GoogleSiteMap/issues>

## Usage

Simply place the snippet in the Resource you want to use, and set the Resource's Template to 'blank':

``` php
[[!GoogleSiteMap]]
```

Don't forget to set the content type to 'xml'.

## Properties

| Name           | Description                                                                                                                                                     | Default Value                                                                                               |
| -------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------- |
| cachePrefix    | A string prefix for cache file(s).                                                                                                                              | googlesitemap                                                                                               |
| cachePartition | Folder under core/cache/ for cache file(s).                                                                                                                     | googlesitemap                                                                                               |
| cacheExpires   | Time to expire cache. Default is 1 day.                                                                                                                         | 86400                                                                                                       |
| legacyProps    | Only modify this if you really know what you are doing. Properties in this comma-separated list will trigger the execution of the legacy GoogleSiteMap Snippet. | allowedtemplates, excludeResources, excludeChildrenOf, sortByAlias, templateFilter, itemTpl, startId, where |
| legacySnippet  | Only modify this if you really know what you are doing. This snippet will be called if a legacy property is passed to the call to GoogleSiteMap.                | GoogleSiteMapVersion1                                                                                       |
| containerTpl   | The Chunk to use for the output container.                                                                                                                      | gContainer                                                                                                  |
| context        | Limit to the specified Context(s). If empty, will grab Resources from current Context. Defaults to empty, can support a comma-separated list.                   |                                                                                                             |
| googleSchema   | The location of the GoogleSiteMap schema.                                                                                                                       | <http://www.google.com/schemas/sitemap/0.9>                                                                 |
| hideDeleted    | If true, will show only nondeleted Resources.                                                                                                                   | true                                                                                                        |
| published      | If true, will only show published resources.                                                                                                                    | true                                                                                                        |
| searchable     | If true, will only show searchable resources.                                                                                                                   | true                                                                                                        |
| showHidden     | If true, will include hidden Resources.                                                                                                                         | false                                                                                                       |
| sortBy         | The field to sort the results by.                                                                                                                               | menuindex                                                                                                   |
| sortDir        | The direction to sort in.                                                                                                                                       | ASC                                                                                                         |

## GoogleSiteMap Chunks

There is 1 chunk processed with GoogleSiteMap:

- [containerTpl]((extras/googlesitemap/googlesitemap/containertpl) "GoogleSiteMap.GoogleSiteMap.containerTpl") - The Chunk to use for wrapping the results.

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

NOTE: the last example would call the legacy Snippet, which will time out if many thousands of nodes need to be generated.

## See Also

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
2. [GoogleSiteMap.GoogleSiteMapVersion1](extras/googlesitemap/googlesitemap/googlesitemapversion1)
3. [GoogleSiteMap.Roadmap](extras/googlesitemap/googlesitemap.roadmap)
