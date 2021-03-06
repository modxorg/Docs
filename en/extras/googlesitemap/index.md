---
title: "GoogleSiteMap"
_old_id: "656"
_old_uri: "revo/googlesitemap/"
---

## What is GoogleSiteMap?

GoogleSiteMap is a snippet that will display a Google-customized SiteMap for your site.

## Requirements

- MODX Revolution 2.2.x or later
- PHP5.4 or later

## Historyand Info

In 2016 GoogleSiteMap was completely re-written by YJ Tso (@sepiariver) based on blazing-fast sitemap code by Garry Nutting (@garryn), after it was found that the legacy Snippet would time-out when more than several thousand nodes needed to be generated.

The trade-off was that some of the legacy features could not be supported. An attempt was made to maintain backwards compatibility, by calling the legacy Snippet if a legacy feature is required.

The legacy GoogleSiteMap Snippet was originally written by Shaun McCormick (splittingred) as a Snippet to display a Google SiteMap, and first released on June 23rd, 2009.

You can view the [roadmap here](extras/googlesitemap/googlesitemap.roadmap "GoogleSiteMap.Roadmap").

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, available here: <https://modx.com/extras/package/googlesitemap>

### Development and Bug Reporting

GoogleSiteMap source code is managed in GitHub, and can be found here: <http://github.com/modxcms/GoogleSiteMap>

## Usage

GoogleSiteMap can be called via the Snippet tags.

### Snippets

GoogleSiteMap comes with two snippets:

- [GoogleSiteMap](extras/googlesitemap/googlesitemap "GoogleSiteMap")
- [GoogleSiteMapVersion1](extras/googlesitemap/googlesitemapversion1)

## Examples

Display a Google SiteMap for tens of thousands of Resources.

``` php
[[!GoogleSiteMap]]
```

Display a Google SiteMap for a more modest number of Resources, using a custom item template Chunk.

``` php
[[!GoogleSiteMap? &itemTpl=`myCustomTpl`]]
```

Note: the latter example would result in the legacy Snippet being called and will time-out if a huge number of nodes need to be generated.

## See Also

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
2. [GoogleSiteMapVersion1](extras/googlesitemap/googlesitemap/googlesitemapversion1)
