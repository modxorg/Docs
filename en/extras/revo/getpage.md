---
title: "getPage"
_old_id: "651"
_old_uri: "revo/getpage"
---

<div>- [What is getPage?](#getPage-WhatisgetPage%3F)
- [Requirements](#getPage-Requirements)
- [History](#getPage-History)
  - [Download](#getPage-Download)
- [Usage](#getPage-Usage)
  - [Available Properties](#getPage-AvailableProperties)
      - [Required Properties](#getPage-RequiredProperties)
      - [Paging Properties](#getPage-PagingProperties)
      - [Page Navigation Properties](#getPage-PageNavigationProperties)
      - [Page Navigation Template Properties](#getPage-PageNavigationTemplateProperties)
      - [Caching Properties](#getPage-CachingProperties)
      - [Other Properties](#getPage-OtherProperties)
- [Examples](#getPage-Examples)

</div>What is getPage?
----------------

A general purpose snippet for presenting, navigating, and optionally caching, multi-page views from any Element that accepts a limit and offset properties for limiting a data set, and sets a placeholder which getPage can use to retrieve the total number of items to page over.

Requirements
------------

- MODx Revolution 2.0.0-beta5 or later
- PHP5 or later

History
-------

getPage was first written by Jason Coward (opengeek) and released on March 19, 2010.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/getpage>

<div class="note">This Snippet does nothing by itself, but rather depends on another Snippet to return the output for a specified page (or range of data within a complete set). For example, the [getResources](/extras/revo/getresources "getResources"), [getFeed](/extras/revo/getfeed "getFeed"), and [Archivist](http://rtfm.modx.com/display/ADDON/archivist) Snippets can both be wrapped by getPage.</div>Usage
-----

The getPage snippet can be called using the tag:

```
<pre class="brush: php">[[!getPage? &elementClass=`modSnippet` &element=`getResources`]]

```<div class="warning">**Do Not Cache**   
 The getPage snippet must never be called cacheable on a Resource that is cacheable. It is best to always call getPage with the non-cacheable token, `!`, while still caching the rest of the Resource output. The same rule applies for the placeholder represented by the `pageNavVar` property (`page.nav` by default) so that its output is not cached into the cacheable page content.</div><div class="warning">**Required Properties**   
 You must specify the element property, plus any additional properties required by the element you are calling via getPage.</div>### Available Properties

#### Required Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>element</td> <td>The name of the modElement to process the output from.</td> <td> </td></tr></tbody></table>#### Paging Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> <th>Added in Version</th> </tr><tr><td>limit</td> <td>The result limit per page; can be overridden in the $\_REQUEST. In 1.2.2+, $\_GET is searched before $\_REQUEST explicitly.</td> <td>10</td> <td> </td> </tr><tr><td>offset</td> <td>The offset, or record position to start at within the collection for rendering results for the current page; should be calculated based on, total, limit and the page variable set in pageVarKey.</td> <td>0</td> <td> </td> </tr><tr><td>page</td> <td>The page to display; this is determined based on the value of the $\_REQUEST variable specified in pageVarKey.</td> <td>_calculated_ </td> <td> </td> </tr><tr><td>pageCount</td> <td>The total number of pages.</td> <td>_calculated_ </td> <td> </td> </tr><tr><td>pageVarKey</td> <td>The key of a property that indicates the current page within the $\_REQUEST, and sets the value of page. In 1.2.2+, $\_GET is searched before $\_REQUEST explicitly.</td> <td>page</td> <td> </td> </tr><tr><td>totalVar</td> <td>The key of a placeholder that must contain the total number of records in the limitable collection being paged.</td> <td>total</td> <td> </td> </tr><tr><td>total</td> <td>The total number of records being paged through (see totalVar).</td> <td>_calculated_ </td> <td> </td> </tr><tr><td>firstItem</td> <td>The 1-based index of the first item being displayed on the current page.</td> <td>_calculated_ </td> <td> </td> </tr><tr><td>lastItem</td> <td>The 1-based index of the last item being displayed on the current page.</td> <td>_calculated_ </td> <td> </td> </tr><tr><td>pageOneLimit</td> <td>An optional result limit for the first page of results which can be different from the main limit</td> <td> </td> <td>1.2.2-pl</td></tr></tbody></table>#### Page Navigation Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>pageLimit</td> <td>The maximum number of page links to display when rendering page navigation controls.</td> <td>5</td> </tr><tr><td>pageNavVar</td> <td>The key of a placeholder to be set with the paging navigation controls.</td> <td>page.nav</td></tr></tbody></table>#### Page Navigation Template Properties

<div class="warning">You can NOT modify these tpl properties from the snippet tag directly, due to the order in which tags are parsed in Revolution. If you do want to change these defaults you will need to use a property set:

- On the Elements tab, open the Snippets tree and find getPage. Open it.
- You will see a tab called "Element Properties". Open it.
- Create a new property set using the Add property set button and in the window that pops up ticking the "Create new property set" checkbox.
- Give your property set a name and click save.
- Now you can modify the values of the properties which will not be overwritten on upgrade.
- Finally, reference your property set name in your snippet call: ```
  <pre class="brush: php">[[!getPage@PropertySetName? &element=`getResources` &parents=`3` ...]]
  
  ```

</div><table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> <th>Added In Version</th> </tr><tr><td>pageNavOuterTpl</td> <td>A content tpl for controlling the layout of the various page navigation controls.</td> <td> ```
<pre class="brush: php">[[+first]][[+prev]][[+pages]][[+next]][[+last]]

``` </td><td>1.2.0-pl</td></tr><tr><td>pageNavTpl</td><td>A content tpl representing a single page navigation control.</td> <td> ```
<pre class="brush: php"><li[[+classes]]><a[[+classes]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>

``` </td><td> </td></tr><tr><td>pageActiveTpl</td><td>A content tpl representing the current page navigation control.</td> <td> ```
<pre class="brush: php"><li[[+activeClasses]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>

``` </td><td> </td></tr><tr><td>pageFirstTpl</td><td>A content tpl representing the first page navigation control.</td> <td> ```
<pre class="brush: php"><li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>

``` </td><td> </td></tr><tr><td>pageLastTpl</td><td>A content tpl representing the last page navigation control.</td> <td> ```
<pre class="brush: php"><li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>

``` </td><td> </td></tr><tr><td>pagePrevTpl</td><td>A content tpl representing the previous page navigation control.</td> <td> ```
<pre class="brush: php"><li class="control"><a[[+classes]][[+title]] href="[[+href]]"><<</a></li>

``` </td><td> </td></tr><tr><td>pageNextTpl</td><td>A content tpl representing the next page navigation control.</td> <td> ```
<pre class="brush: php"><li class="control"><a[[+classes]][[+title]] href="[[+href]]">>></a></li>

``` </td><td></td></tr></tbody></table>#### Caching Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>cache</td> <td>Indicates if the content of each page request should be cached, by a unique request URI (not just the pageVarKey)</td> <td>value of cache\_resource setting, or false</td> </tr><tr><td>cache\_key</td> <td>A key identifying a named xPDOCache instance to use for caching the page content.</td> <td>value of cache\_resource\_key setting</td> </tr><tr><td>cache\_handler</td> <td>Identifies an xPDOCache derivative class to use for the instance.</td> <td>value of cache\_resource\_handler setting, or xPDOFileCache</td> </tr><tr><td>cache\_expires</td> <td>Indicates the number of seconds for each item to live in the cache. Note that 0 indicates it will live in the cache until the cache is manually cleared, unless you have a custom handler caching data outside of the handler identified by the default cache\_resource\_key</td> <td>value of expires setting for specified cache\_key, or 0</td></tr></tbody></table>#### Other Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>elementClass</td> <td>The modElement derivative classname you want getPage to process the output from, e.g. modChunk or the default modSnippet</td> <td>modSnippet</td> </tr><tr><td>namespace</td> <td>An execution namespace that serves as a prefix for placeholders set by a specific instance of the getPage snippet.</td> <td> </td> </tr><tr><td>toPlaceholder</td> <td>Indicates the element will not return the output to getPage, but rather will set a placeholder containing the content getPage should present. This allows getPage to cache the placeholder output as it would any output returned by an element, and set it from the cache.</td> <td> </td></tr></tbody></table>Examples
--------

Page a list of all child Resources of the current Resource, using a chunk called 'myRowTpl':

```
<pre class="brush: php">[[!getPage? &element=`getResources` &parents=`[[*id]]` &tpl=`myRowTpl`]]
<div class="pageNav">[[!+page.nav]]</div>

```Page all resources beneath the Resource with ID '5', with the exception of resource 10, using a chunk called 'myRowTpl':

```
<pre class="brush: php">[[!getPage? &element=`getResources` &parents=`5` &resources=`-10` &tpl=`myRowTpl`]]
<div class="pageNav">[[!+page.nav]]</div>

```If you are making your custom snippet to work with get page there are three things that your snippet needs to do ...

- limit
- offest
- totalVar

Had a couple of issues with getting it all to work ... check out this resources and answer on the forums.

1. [Preparing Custom Snippets for getPage](http://www.markhamstra.com/modx-blog/2011/12/preparing-custom-snippets-for-getpage/)
2. [getPage: pagination returns empty 2nd page](http://forums.modx.com/thread/74678/getpage-pagination-returns-empty-2nd-page#dis-post-424931)
3. [xPDO.getCount & xPDO.limit](http://rtfm.modx.com/display/xPDO20/xPDO.getCount)