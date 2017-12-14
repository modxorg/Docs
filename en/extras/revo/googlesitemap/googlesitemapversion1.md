---
title: "GoogleSiteMapVersion1"
_old_id: "1756"
_old_uri: "revo/googlesitemap/googlesitemapversion1"
---

GoogleSiteMap Snippet
---------------------

 This snippet displays a Google Sitemap.

Usage
-----

 Simply place the snippet in the Resource you want to use, and set the Resource's Template to 'blank':

 ```
<pre class="brush: php">
[[!GoogleSiteMap]]

``` Don't forget to set the content type to 'xml'.

Properties
----------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> allowedtemplates </td> <td> A comma-separated list of Template IDs to filter by. Will only filter if a value is set. </td> <td> </td> </tr><tr><td> containerTpl </td> <td> The Chunk to use for the output container. </td> <td> gContainer </td> </tr><tr><td> context </td> <td> Limit to the specified Context(s). If empty, will grab Resources from current Context. Defaults to empty, can support a comma-separated list. </td> <td> </td> </tr><tr><td> excludeResources </td> <td> An optional comma-separated list of Resources to skip. </td> <td> </td> </tr><tr><td> googleSchema </td> <td> The location of the GoogleSiteMap schema. </td> <td> <http://www.google.com/schemas/sitemap/0.9> </td> </tr><tr><td> hideDeleted </td> <td> If true, will show only nondeleted Resources. </td> <td> 1 </td> </tr><tr><td> itemTpl </td> <td> The Chunk to use for each result item. </td> <td> gItem </td> </tr><tr><td> maxDepth </td> <td> The depth down the tree to grab Resources. If set to empty or 0, will grab all depths. </td> <td> 0 </td> </tr><tr><td> published </td> <td> If true, will only show published resources. </td> <td> 1 </td> </tr><tr><td> searchable </td> <td> If true, will only show searchable resources. </td> <td> 1 </td> </tr><tr><td> showHidden </td> <td> If true, will include hidden Resources. </td> <td> false </td> </tr><tr><td> sortBy </td> <td> The field to sort the results by. </td> <td> menuindex </td> </tr><tr><td> sortByAlias </td> <td> The class to use as the alias for the sortBy property. </td> <td> modResource </td> </tr><tr><td> sortDir </td> <td> The direction to sort in. </td> <td> ASC </td> </tr><tr><td> templateFilter </td> <td> The modTemplate column to filter by. </td> <td> id </td> </tr><tr><td> where   
</td> <td> A JSON-style expression or array of criteria to select/filter resources to output. See <http://rtfm.modx.com/display/xPDO20/xPDOQuery.where> for more detail. Somewhere is a bug, that doesn't show up anything for resources in containers.   
</td> <td> </td></tr></tbody></table>GoogleSiteMap Chunks
--------------------

 There are 2 chunks that are processed in GoogleSiteMap. Their corresponding parameters are:

- [itemTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl "GoogleSiteMap.GoogleSiteMap.itemTpl") - The Chunk to use for each result listed.
- [containerTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl "GoogleSiteMap.GoogleSiteMap.containerTpl") - The Chunk to use for wrapping the results.

Examples
--------

 Display a sitemap for the current context:

 ```
<pre class="brush: php">
[[!GoogleSiteMap]]

``` Display a sitemap that combines both the web and marketing contexts:

 ```
<pre class="brush: php">
[[!GoogleSiteMap? &context=`web,marketing`]]

``` Limit the sitemap to only the Resources with Template named 'BlogTemplate', and exclude the Resources with IDs 123 or 78:

 ```
<pre class="brush: php">
[[!GoogleSiteMap?
  &allowedtemplates=`BlogTemplate`
  &templateFilter=`templatename`
  &excludeResources=`123,78`
]]

```See Also
--------

1. [GoogleSiteMap.GoogleSiteMap](/extras/revo/googlesitemap/googlesitemap.googlesitemap)
  1. [GoogleSiteMap.GoogleSiteMap.containerTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl)
  2. [GoogleSiteMap.GoogleSiteMap.itemTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl)
2. [GoogleSiteMap.Roadmap](/extras/revo/googlesitemap/googlesitemap.roadmap)