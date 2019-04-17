---
title: "getPage"
_old_id: "651"
_old_uri: "revo/getpage"
---

## What is getPage?

A general purpose snippet for presenting, navigating, and optionally caching, multi-page views from any Element that accepts a limit and offset properties for limiting a data set, and sets a placeholder which getPage can use to retrieve the total number of items to page over.

## Requirements

- MODX Revolution 2.0.0-beta5 or later
- PHP5 or later

## History

getPage was first written by Jason Coward (opengeek) and released on March 19, 2010.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/getpage>

This Snippet does nothing by itself, but rather depends on another Snippet to return the output for a specified page (or range of data within a complete set). For example, the [getResources](extras/getresources "getResources"), [getFeed](extras/getfeed "getFeed"), and [Archivist](http://rtfm.modx.com/display/ADDON/archivist) Snippets can both be wrapped by getPage.

## Usage

The getPage snippet can be called using the tag:

 ``` php
[[!getPage?
      &elementClass=`modSnippet`
      &element=`getResources`
]]
```

**Do Not Cache**
 The getPage snippet must never be called cacheable on a Resource that is cacheable. It is best to always call getPage with the non-cacheable token, `!`, while still caching the rest of the Resource output. The same rule applies for the placeholder represented by the `pageNavVar` property (`page.nav` by default) so that its output is not cached into the cacheable page content.

**Required Properties**
 You must specify the element property, plus any additional properties required by the element you are calling via getPage.

### Available Properties

#### Required Properties

| Name    | Description                                            | Default Value |
| ------- | ------------------------------------------------------ | ------------- |
| element | The name of the modElement to process the output from. |               |

#### Paging Properties

| Name         | Description                                                                                                                                                                                       | Default Value | Added in Version |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| limit        | The result limit per page; can be overridden in the $\_REQUEST. In 1.2.2+, $\_GET is searched before $\_REQUEST explicitly.                                                                       | 10            |                  |
| offset       | The offset, or record position to start at within the collection for rendering results for the current page; should be calculated based on, total, limit and the page variable set in pageVarKey. | 0             |                  |
| page         | The page to display; this is determined based on the value of the $\_REQUEST variable specified in pageVarKey.                                                                                    | _calculated_  |                  |
| pageCount    | The total number of pages.                                                                                                                                                                        | _calculated_  |                  |
| pageVarKey   | The key of a property that indicates the current page within the $\_REQUEST, and sets the value of page. In 1.2.2+, $\_GET is searched before $\_REQUEST explicitly.                              | page          |                  |
| totalVar     | The key of a placeholder that must contain the total number of records in the limitable collection being paged.                                                                                   | total         |                  |
| total        | The total number of records being paged through (see totalVar).                                                                                                                                   | _calculated_  |                  |
| firstItem    | The 1-based index of the first item being displayed on the current page.                                                                                                                          | _calculated_  |                  |
| lastItem     | The 1-based index of the last item being displayed on the current page.                                                                                                                           | _calculated_  |                  |
| pageOneLimit | An optional result limit for the first page of results which can be different from the main limit                                                                                                 |               | 1.2.2-pl         |

#### Page Navigation Properties

| Name       | Description                                                                          | Default Value |
| ---------- | ------------------------------------------------------------------------------------ | ------------- |
| pageLimit  | The maximum number of page links to display when rendering page navigation controls. | 5             |
| pageNavVar | The key of a placeholder to be set with the paging navigation controls.              | page.nav      |

#### Page Navigation Template Properties

You can NOT modify these tpl properties from the snippet tag directly, due to the order in which tags are parsed in Revolution. If you do want to change these defaults you will need to use a property set:

- On the Elements tab, open the Snippets tree and find getPage. Open it.
- You will see a tab called "Element Properties". Open it.
- Create a new property set using the Add property set button and in the window that pops up ticking the "Create new property set" checkbox.
- Give your property set a name and click save.
- Now you can modify the values of the properties which will not be overwritten on upgrade.
- Finally, reference your property set name in your snippet call:

``` php
  [[!getPage@PropertySetName? &element=`getResources` &parents=`3` ...]]
  ```

| Name            | Description                                                                       | Default Value                                                                                                          | Added In Version |
| --------------- | --------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------- |
| pageNavOuterTpl | A content tpl for controlling the layout of the various page navigation controls. | `[[+first]][[+prev]][[+pages]][[+next]][[+last]]`                                                                      | 1.2.0-pl         |
| pageNavTpl      | A content tpl representing a single page navigation control.                      | `<li[[+classes]]><a[[+classes]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>`                                       |                  |
| pageActiveTpl   | A content tpl representing the current page navigation control.                   | `<li[[+activeClasses]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>` |                  |
| pageFirstTpl    | A content tpl representing the first page navigation control.                     | `<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`                                         |                  |
| pageLastTpl     | A content tpl representing the last page navigation control.                      | `<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`                                          |                  |
| pagePrevTpl     | A content tpl representing the previous page navigation control.                  | `<li class="control"><a[[+classes]][[+title]] href="[[+href]]"><<</a></li>`                                            |                  |
| pageNextTpl     | A content tpl representing the next page navigation control.                      | `<li class="control"><a[[+classes]][[+title]] href="[[+href]]">>></a></li>`                                            |

#### Caching Properties

| Name           | Description                                                                                                                                                                                                                                                                  | Default Value                                               |
| -------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------- |
| cache          | Indicates if the content of each page request should be cached, by a unique request URI (not just the pageVarKey)                                                                                                                                                            | value of cache\_resource setting, or false                  |
| cache\_key     | A key identifying a named xPDOCache instance to use for caching the page content.                                                                                                                                                                                            | value of cache\_resource\_key setting                       |
| cache\_handler | Identifies an xPDOCache derivative class to use for the instance.                                                                                                                                                                                                            | value of cache\_resource\_handler setting, or xPDOFileCache |
| cache\_expires | Indicates the number of seconds for each item to live in the cache. Note that 0 indicates it will live in the cache until the cache is manually cleared, unless you have a custom handler caching data outside of the handler identified by the default cache\_resource\_key | value of expires setting for specified cache\_key, or 0     |

#### Other Properties

| Name          | Description                                                                                                                                                                                                                                                                 | Default Value |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| elementClass  | The modElement derivative classname you want getPage to process the output from, e.g. modChunk or the default modSnippet                                                                                                                                                    | modSnippet    |
| namespace     | An execution namespace that serves as a prefix for placeholders set by a specific instance of the getPage snippet.                                                                                                                                                          |               |
| toPlaceholder | Indicates the element will not return the output to getPage, but rather will set a placeholder containing the content getPage should present. This allows getPage to cache the placeholder output as it would any output returned by an element, and set it from the cache. |               |

## Examples

Page a list of all child Resources of the current Resource, using a chunk called 'myRowTpl':

 ``` php
[[!getPage? &element=`getResources` &parents=`[[*id]]` &tpl=`myRowTpl`]]
<div class="pageNav">[[!+page.nav]]</div>
```

Page all resources beneath the Resource with ID '5', with the exception of resource 10, using a chunk called 'myRowTpl':

 ``` php
[[!getPage? &element=`getResources` &parents=`5` &resources=`-10` &tpl=`myRowTpl`]]
<div class="pageNav">[[!+page.nav]]</div>
```

If you are making your custom snippet to work with get page there are three things that your snippet needs to do ...

- limit
- offest
- totalVar

Had a couple of issues with getting it all to work ... check out this resources and answer on the forums.

1. [Preparing Custom Snippets for getPage](http://www.markhamstra.com/modx-blog/2011/12/preparing-custom-snippets-for-getpage/)
2. [getPage: pagination returns empty 2nd page](http://forums.modx.com/thread/74678/getpage-pagination-returns-empty-2nd-page#dis-post-424931)
3. [xPDO.getCount & xPDO.limit](http://rtfm.modx.com/display/xPDO20/xPDO.getCount)
