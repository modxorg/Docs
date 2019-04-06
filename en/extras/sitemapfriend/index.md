---
title: "sitemapFriend"
_old_id: "713"
_old_uri: "revo/sitemapfriend"
---

## What is sitemapFriend?

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

## Usage

[Google XML sitemap](http://support.google.com/webmasters/bin/answer.py?hl=en&answer=156184):

``` php
[[sitemapFriend? &type=`xml`]]
```

HTML sitemap:

``` php
[[sitemapFriend? &type=`html`]]
```

To generate a sitemap in some custom format, create your own chunks and tell the snippet to use them. Check the list of available templates below.

Hint: use the [getCache](http://modx.com/extras/package/getcache) snippet for custom caching control of your sitemaps.

``` php
[[!getCache? &element=`sitemapFriend` &cacheKey=`sitemap` &cacheExpires=`21600` &type=`html`]]
```

## Properties

The snippet is made such that you can generate almost any kind of sitemap. Control the output using the following lists of properties.
Properties can be set in the snippet call or in property sets.

### Output Properties

| Name                                                                   | Description                                                                                                                                                                                                                                                                   | Default   |
| ---------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------- |
| type                                                                   | The type of sitemap to generate: _xml_ or _html_. Depending on this property, other properties will change their default value.                                                                                                                                               | html      |
| titleField                                                             | The title: _pagetitle_, _longtitle_, _menutitle_. Falls back to _pagetitle_ to prevent empty titles.                                                                                                                                                                          | pagetitle |
| urlScheme                                                              | The URL scheme for non-XML sitemaps: _http_, _https_, _full_, _abs_, etc. See the [$modx->makeUrl()](http://api.modx.com/revolution/2.1/) documentation.                                                                                                                      |
| For XML sitemaps, it's always set to _full_.                           | abs                                                                                                                                                                                                                                                                           |
| startId                                                                | Build the sitemap starting from the given resource ID.                                                                                                                                                                                                                        | 0         |
| contexts                                                               | Limit to the specified context(s). If empty, will grab resources from current Context. Can support a comma-separated list.                                                                                                                                                    |           |
| showDeleted                                                            | Include deleted resources?                                                                                                                                                                                                                                                    | false     |
| showUpublished                                                         | Include unpublished resources?                                                                                                                                                                                                                                                | false     |
| onlySearchable                                                         | Only include searchable resources?                                                                                                                                                                                                                                            | true      |
| showHidden                                                             | Include resources which are not visible in the menus?                                                                                                                                                                                                                         | true      |
| maxDepth                                                               | The maximum depth down the tree to grab resources from. If set to empty or 0, will grab all resources.                                                                                                                                                                        | 0         |
| onlyTemplates                                                          | A comma-separated list of template IDs to filter by.                                                                                                                                                                                                                          |           |
| skipTemplates                                                          | A comma-separated list of template IDs to skip.                                                                                                                                                                                                                               |           |
| includeWebLinks                                                        | Include weblink resources?                                                                                                                                                                                                                                                    | false     |
| excludeResources                                                       | A comma-separated list of resources to exclude entirely from the sitemap. Child resources will also be excluded. The resources pointed at by the Modx options _error\_page_, _site\_unavailable\_page_, _unauthorized\_page_ and the sitemap page itself are always excluded. |           |
| skipResources                                                          | A comma-separated list of resources to hide from the sitemap. Child resources will NOT be excluded.                                                                                                                                                                           |           |
| includeResources                                                       | A comma-separated list of resources to always include in the sitemap, even if the given resource would otherwise be filtered out by the _showDeleted_, _showUnpublished_, _onlySearchable_ and _showHidden_ properties.                                                       |           |
| excludeChildrenOf                                                      | A comma-separated list of resources for which you do not want to have their children included in the sitemap. Note that the resources you list here will be included, only the children will be skipped.                                                                      |           |
| parentTitles                                                           | Include parent resource titles in the sitemap?                                                                                                                                                                                                                                | false     |
| parentTitlesReversed                                                   | If parentTitles is used, should the titles be presented in a reversed order?                                                                                                                                                                                                  | false     |
| titleSeparator                                                         | If parentTitles is used, set the titles separator string.                                                                                                                                                                                                                     | -         |
| sortBy                                                                 | The resource field to sort the results by.                                                                                                                                                                                                                                    | menuindex |
| sortDir                                                                | The direction to sort in.                                                                                                                                                                                                                                                     | ASC       |
| lastmodFormat                                                          | Last modification date format for non-XML sitemaps. See [PHP date() function](http://www.php.net/manual/en/function.date.php).                                                                                                                                                |
| For XML sitemaps, the _c_ value is always used (ISO 8601 date format). | F j, Y, g:i a                                                                                                                                                                                                                                                                 |

### Templating Properties

| Name                                                    | Description                                                                                  | Default                            |
| ------------------------------------------------------- | -------------------------------------------------------------------------------------------- | ---------------------------------- |
| tplOuter                                                | The chunk to use, for non-XML sitemaps, as an outer container for the entire sitemap output. | sitemap\_html\_outer.chunk.tpl     |
| tplItem                                                 | The chunk to use, for non-XML sitemaps, for each result item.                                |
| Children items will be wrapper inside a _tplContainer_. | sitemap\_html\_item.chunk.tpl                                                                |
| tplContainer                                            | The chunk to use, for non-XML sitemaps, as a wrapper for the children of a resource folder.  | sitemap\_html\_container.chunk.tpl |

## Chunks

### sitemap\_html\_outer.chunk.tpl

The default chunk used as an outer container for the entire sitemap output.

#### Default Value

``` php
<ul id="sitemap">
    [[+items]]
</ul>
```

#### Available placeholders

| Name    | Description                       |
| ------- | --------------------------------- |
| startId | The sitemap start resource ID.    |
| items   | The entire sitemap output string. |

### sitemap\_html\_item.chunk.tpl

The default chunk used for each result item.

#### Default Value

``` php
<li>
    <a href="[[+url]]">[[+title]]</a>
    [[+items]]
</li>
```

**Available placeholders**

| Name       | Description                                                                                                                                                                                 |
| ---------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| parent     | Holds the parent resource ID.                                                                                                                                                               |
| id         | The ID of the resource being processed.                                                                                                                                                     |
| url        | The URL of the resource.                                                                                                                                                                    |
| lastmod    | The last modification date for the resource.                                                                                                                                                |
| title      | Resource title. This can include the title of each parent resource as well, if _parentTitles_ is set to _true_.                                                                             |
| items      | Holds the sitemap output for the child resources, if any. This allows you to nest resources in output, like in an HTML sitemap. See how this is used in the _sitemap\_html\_item.chunk.tpl_ |
| changefreq | Resource change frequency, which is computed based on the last modification date. Available only for XML sitemaps.                                                                          |
| priority   | Resource priority, again computed based on last modification date. Available only for XML sitemaps.                                                                                         |

### sitemap\_html\_container.chunk.tpl

The default chunk used as a wrapper for the children of a resource folder.

#### Default Value

``` php
<ul>
    [[+items]]
</ul>
```

#### Available placeholders

| Name  | Description                                              |
| ----- | -------------------------------------------------------- |
| depth | Current resource depth.                                  |
| id    | Current resource ID, for which we have generated output. |
| items | The output string that lists the child resources.        |

### sitemap\_xml\_outer.chunk.tpl

The default chunk used for XML sitemaps as an outer container for the entire sitemap output.

#### Default Value

``` php
<?xml version="1.0" encoding="[[++modx_charset]]"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
[[+items]]
</urlset>
```

### sitemap\_xml\_item.chunk.tpl

The default chunk used for XML sitemaps for each result item.

**Default Value**

``` php
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+lastmod]]</lastmod>
    <changefreq>[[+changefreq]]</changefreq>
    <priority>[[+priority]]</priority>
</url>
[[+items]]
```