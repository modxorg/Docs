---
title: "GoogleSiteMap.GoogleSiteMap"
_old_id: "891"
_old_uri: "revo/googlesitemap/googlesitemap.googlesitemap"
---

GoogleSiteMap Snippet
---------------------

 This snippet displays a Google Sitemap. Version 2 is many times faster than Version 1, but with less options. If params are specified that depend on the old version, it will be called. Check [this page](https://rtfm.modx.com/extras/revo/googlesitemap/googlesitemapversion1) for the properties available in the old version.

<div class="info">Note: if you try to view a XML sitemap with tens of thousands of nodes in your browser, it will take a good long while to render it. However the server response should be a few seconds or less. More testing would be welcome. Please file issues here: <https://github.com/modxcms/GoogleSiteMap/issues></div>Usage
-----

 Simply place the snippet in the Resource you want to use, and set the Resource's Template to 'blank':

 ```
<pre class="brush: php">[[!GoogleSiteMap]]

``` Don't forget to set the content type to 'xml'.

Properties
----------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> cachePrefix </td> <td> A string prefix for cache file(s). </td> <td> googlesitemap </td> </tr><tr><td> cachePartition </td> <td> Folder under core/cache/ for cache file(s). </td> <td> googlesitemap </td> </tr><tr><td> cacheExpires </td> <td> Time to expire cache. Default is 1 day. </td> <td> 86400 </td> </tr><tr><td> legacyProps </td> <td> Only modify this if you really know what you are doing. Properties in this comma-separated list will trigger the execution of the legacy GoogleSiteMap Snippet. </td> <td> allowedtemplates, excludeResources, excludeChildrenOf, sortByAlias, templateFilter, itemTpl, startId, where </td> </tr><tr><td> legacySnippet </td> <td> Only modify this if you really know what you are doing. This snippet will be called if a legacy property is passed to the call to GoogleSiteMap. </td> <td> GoogleSiteMapVersion1 </td> </tr><tr><td> containerTpl </td> <td> The Chunk to use for the output container. </td> <td> gContainer </td> </tr><tr><td> context </td> <td> Limit to the specified Context(s). If empty, will grab Resources from current Context. Defaults to empty, can support a comma-separated list. </td> <td> </td> </tr><tr><td> googleSchema </td> <td> The location of the GoogleSiteMap schema. </td> <td> <http://www.google.com/schemas/sitemap/0.9> </td> </tr><tr><td> hideDeleted </td> <td> If true, will show only nondeleted Resources. </td> <td>true</td> </tr><tr><td> published </td> <td> If true, will only show published resources. </td> <td>true</td> </tr><tr><td> searchable </td> <td> If true, will only show searchable resources. </td> <td>true</td> </tr><tr><td> showHidden </td> <td> If true, will include hidden Resources. </td> <td> false </td> </tr><tr><td> sortBy </td> <td> The field to sort the results by. </td> <td> menuindex </td> </tr><tr><td> sortDir </td> <td> The direction to sort in. </td> <td> ASC </td></tr></tbody></table>GoogleSiteMap Chunks
--------------------

 There is 1 chunk processed with GoogleSiteMap:

- [containerTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl "GoogleSiteMap.GoogleSiteMap.containerTpl") - The Chunk to use for wrapping the results.

Examples
--------

 Display a sitemap for the current context:

 ```
<pre class="brush: php">[[!GoogleSiteMap]]

``` Display a sitemap that combines both the web and marketing contexts:

 ```
<pre class="brush: php">[[!GoogleSiteMap? &context=`web,marketing`]]

``` Limit the sitemap to only the Resources with Template named 'BlogTemplate', and exclude the Resources with IDs 123 or 78:

 ```
<pre class="brush: php">[[!GoogleSiteMap?
  &allowedtemplates=`BlogTemplate`
  &templateFilter=`templatename`
  &excludeResources=`123,78`
]]

```<div class="warning">NOTE: the last example would call the legacy Snippet, which will time out if many thousands of nodes need to be generated.</div>See Also
--------

1. [GoogleSiteMap.GoogleSiteMap](/extras/revo/googlesitemap/googlesitemap.googlesitemap)
  1. [GoogleSiteMap.GoogleSiteMap.containerTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl)
  2. [GoogleSiteMap.GoogleSiteMap.itemTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl)
2. [GoogleSiteMap.GoogleSiteMapVersion1](https://rtfm.modx.com/extras/revo/googlesitemap/googlesitemapversion1)
3. [GoogleSiteMap.Roadmap](/extras/revo/googlesitemap/googlesitemap.roadmap)