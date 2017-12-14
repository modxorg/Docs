---
title: "sitemapFriend"
_old_id: "713"
_old_uri: "revo/sitemapfriend"
---

<div>- [What is sitemapFriend?](#sitemapFriend-WhatissitemapFriend%3F)
  - [Requirements](#sitemapFriend-Requirements)
  - [History](#sitemapFriend-History)
  - [Download](#sitemapFriend-Download)
  - [Development and Bug reporting](#sitemapFriend-DevelopmentandBugreporting)
- [Usage](#sitemapFriend-Usage)
- [Properties](#sitemapFriend-Properties)
  - [Output Properties](#sitemapFriend-OutputProperties)
  - [Templating Properties](#sitemapFriend-TemplatingProperties)
- [Chunks](#sitemapFriend-Chunks)
  - [sitemap\_html\_outer.chunk.tpl](#sitemapFriend-sitemaphtmlouter.chunk.tpl)
  - [sitemap\_html\_item.chunk.tpl](#sitemapFriend-sitemaphtmlitem.chunk.tpl)
  - [sitemap\_html\_container.chunk.tpl](#sitemapFriend-sitemaphtmlcontainer.chunk.tpl)
  - [sitemap\_xml\_outer.chunk.tpl](#sitemapFriend-sitemapxmlouter.chunk.tpl)
  - [sitemap\_xml\_item.chunk.tpl](#sitemapFriend-sitemapxmlitem.chunk.tpl)

</div>What is sitemapFriend?
----------------------

This snippet generates sitemaps such as Google XML sitemap, HTML sitemap and/or any custom format.

### Requirements

- MODx Revolution 2.1.5 or later
- PHP5 or later

### History

sitemapFriend was written by Mihai Sucan and is based on the [GoogleSiteMap](http://modx.com/extras/package/googlesitemap) snippet by Shaun McCormick. It was released on November 16, 2010.   
Mihai retired from developping under Modx and the plugin is currently maintained by Jérôme Perrin.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the [MODx Extras Repository](http://modx.com/extras/package/sitemapfriend).

### Development and Bug reporting

Feature requests and bugs can be filed on [github](https://github.com/yogoo/sitemapFriend/issues).

Usage
-----

[Google XML sitemap](http://support.google.com/webmasters/bin/answer.py?hl=en&answer=156184):

```
<pre class="brush: php">
[[sitemapFriend? &type=`xml`]]

```HTML sitemap:

```
<pre class="brush: php">
[[sitemapFriend? &type=`html`]]

```To generate a sitemap in some custom format, create your own chunks and tell the snippet to use them. Check the list of available templates below.

Hint: use the [getCache](http://modx.com/extras/package/getcache) snippet for custom caching control of your sitemaps.

```
<pre class="brush: php">
[[!getCache? &element=`sitemapFriend` &cacheKey=`sitemap` &cacheExpires=`21600` &type=`html`]]

```Properties
----------

The snippet is made such that you can generate almost any kind of sitemap. Control the output using the following lists of properties.   
Properties can be set in the snippet call or in property sets.

### Output Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>type</td><td>The type of sitemap to generate: _xml_ or _html_. Depending on this property, other properties will change their default value.</td><td>html</td></tr><tr><td>titleField</td><td>The title: _pagetitle_, _longtitle_, _menutitle_. Falls back to _pagetitle_ to prevent empty titles.</td><td>pagetitle</td></tr><tr><td>urlScheme</td><td>The URL scheme for non-XML sitemaps: _http_, _https_, _full_, _abs_, etc. See the [$modx->makeUrl()](http://api.modx.com/revolution/2.1/) documentation.   
For XML sitemaps, it's always set to _full_.</td><td>abs</td></tr><tr><td>startId</td><td>Build the sitemap starting from the given resource ID.</td><td>0</td></tr><tr><td>contexts</td><td>Limit to the specified context(s). If empty, will grab resources from current Context. Can support a comma-separated list.</td><td> </td></tr><tr><td>showDeleted</td><td>Include deleted resources?</td><td>false</td></tr><tr><td>showUpublished</td><td>Include unpublished resources?</td><td>false</td></tr><tr><td>onlySearchable</td><td>Only include searchable resources?</td><td>true</td></tr><tr><td>showHidden</td><td>Include resources which are not visible in the menus?</td><td>true</td></tr><tr><td>maxDepth</td><td>The maximum depth down the tree to grab resources from. If set to empty or 0, will grab all resources.</td><td>0</td></tr><tr><td>onlyTemplates</td><td>A comma-separated list of template IDs to filter by.</td><td> </td></tr><tr><td>skipTemplates</td><td>A comma-separated list of template IDs to skip.</td><td> </td></tr><tr><td>includeWebLinks</td><td>Include weblink resources?</td><td>false</td></tr><tr><td>excludeResources</td><td>A comma-separated list of resources to exclude entirely from the sitemap. Child resources will also be excluded. The resources pointed at by the Modx options _error\_page_, _site\_unavailable\_page_, _unauthorized\_page_ and the sitemap page itself are always excluded.</td><td> </td></tr><tr><td>skipResources</td><td>A comma-separated list of resources to hide from the sitemap. Child resources will NOT be excluded.</td><td> </td></tr><tr><td>includeResources</td><td>A comma-separated list of resources to always include in the sitemap, even if the given resource would otherwise be filtered out by the _showDeleted_, _showUnpublished_, _onlySearchable_ and _showHidden_ properties.</td><td> </td></tr><tr><td>excludeChildrenOf</td><td>A comma-separated list of resources for which you do not want to have their children included in the sitemap. Note that the resources you list here will be included, only the children will be skipped.</td><td> </td></tr><tr><td>parentTitles</td><td>Include parent resource titles in the sitemap?</td><td>false</td></tr><tr><td>parentTitlesReversed</td><td>If parentTitles is used, should the titles be presented in a reversed order?</td><td>false</td></tr><tr><td>titleSeparator</td><td>If parentTitles is used, set the titles separator string.</td><td>-</td></tr><tr><td>sortBy</td><td>The resource field to sort the results by.</td><td>menuindex</td></tr><tr><td>sortDir</td><td>The direction to sort in.</td><td>ASC</td></tr><tr><td>lastmodFormat</td><td>Last modification date format for non-XML sitemaps. See [PHP date() function](http://www.php.net/manual/en/function.date.php).   
For XML sitemaps, the _c_ value is always used (ISO 8601 date format).</td><td>F j, Y, g:i a</td></tr></tbody></table>### Templating Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>tplOuter</td><td>The chunk to use, for non-XML sitemaps, as an outer container for the entire sitemap output.</td><td>sitemap\_html\_outer.chunk.tpl</td></tr><tr><td>tplItem</td><td>The chunk to use, for non-XML sitemaps, for each result item.   
Children items will be wrapper inside a _tplContainer_.</td><td>sitemap\_html\_item.chunk.tpl</td></tr><tr><td>tplContainer</td><td>The chunk to use, for non-XML sitemaps, as a wrapper for the children of a resource folder.</td><td>sitemap\_html\_container.chunk.tpl</td></tr></tbody></table>Chunks
------

### sitemap\_html\_outer.chunk.tpl

The default chunk used as an outer container for the entire sitemap output.

**Default Value**

```
<pre class="brush: php">
<ul id="sitemap">
    [[+items]]
</ul>

```**Available placeholders**

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>startId</td><td>The sitemap start resource ID.</td></tr><tr><td>items</td><td>The entire sitemap output string.</td></tr></tbody></table>### sitemap\_html\_item.chunk.tpl

The default chunk used for each result item.

**Default Value**

```
<pre class="brush: php">
<li>
    <a href="[[+url]]">[[+title]]</a>
    [[+items]]
</li>

```**Available placeholders**

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>parent</td><td>Holds the parent resource ID.</td></tr><tr><td>id</td><td>The ID of the resource being processed.</td></tr><tr><td>url</td><td>The URL of the resource.</td></tr><tr><td>lastmod</td><td>The last modification date for the resource.</td></tr><tr><td>title</td><td>Resource title. This can include the title of each parent resource as well, if _parentTitles_ is set to _true_.</td></tr><tr><td>items</td><td>Holds the sitemap output for the child resources, if any. This allows you to nest resources in output, like in an HTML sitemap. See how this is used in the _sitemap\_html\_item.chunk.tpl_</td></tr><tr><td>changefreq</td><td>Resource change frequency, which is computed based on the last modification date. Available only for XML sitemaps.</td></tr><tr><td>priority</td><td>Resource priority, again computed based on last modification date. Available only for XML sitemaps.</td></tr></tbody></table>### sitemap\_html\_container.chunk.tpl

The default chunk used as a wrapper for the children of a resource folder.

**Default Value**

```
<pre class="brush: php">
<ul>
    [[+items]]
</ul>

```**Available placeholders**

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>depth</td><td>Current resource depth.</td></tr><tr><td>id</td><td>Current resource ID, for which we have generated output.</td></tr><tr><td>items</td><td>The output string that lists the child resources.</td></tr></tbody></table>### sitemap\_xml\_outer.chunk.tpl

The default chunk used for XML sitemaps as an outer container for the entire sitemap output.

**Default Value**

```
<pre class="brush: php">
<?xml version="1.0" encoding="[[++modx_charset]]"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
[[+items]]
</urlset>

```### sitemap\_xml\_item.chunk.tpl

The default chunk used for XML sitemaps for each result item.

**Default Value**

```
<pre class="brush: php">
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+lastmod]]</lastmod>
    <changefreq>[[+changefreq]]</changefreq>
    <priority>[[+priority]]</priority>
</url>
[[+items]]

```