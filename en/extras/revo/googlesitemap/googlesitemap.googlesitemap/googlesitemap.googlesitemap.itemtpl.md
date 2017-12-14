---
title: "GoogleSiteMap.GoogleSiteMap.itemTpl"
_old_id: "893"
_old_uri: "revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl"
---

GoogleSiteMap's itemTpl Chunk
-----------------------------

This is the Chunk displayed with the &itemTpl property on the [GoogleSiteMap](/extras/revo/googlesitemap/googlesitemap.googlesitemap "GoogleSiteMap.GoogleSiteMap") snippet. Used for each result item that is listed.

Default Value
-------------

```
<pre class="brush: php">
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+date]]</lastmod>
    <changefreq>[[+update]]</changefreq>
    <priority>[[+priority]]</priority>
</url>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>url</td><td>The full URL of the resource</td></tr><tr><td>date</td><td>The last updated (edited) date</td></tr><tr><td>update</td><td>The frequency updated</td></tr><tr><td>priority</td><td>The priority to assign this Resource</td></tr></tbody></table>See Also
--------

1. [GoogleSiteMap.GoogleSiteMap](/extras/revo/googlesitemap/googlesitemap.googlesitemap)
  1. [GoogleSiteMap.GoogleSiteMap.containerTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.containertpl)
  2. [GoogleSiteMap.GoogleSiteMap.itemTpl](/extras/revo/googlesitemap/googlesitemap.googlesitemap/googlesitemap.googlesitemap.itemtpl)
2. [GoogleSiteMap.Roadmap](/extras/revo/googlesitemap/googlesitemap.roadmap)