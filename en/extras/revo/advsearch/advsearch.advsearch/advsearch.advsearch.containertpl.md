---
title: "AdvSearch.AdvSearch.containerTpl"
_old_id: "767"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl"
---

AdvSearch's containerTpl Chunk
------------------------------

A Chunk named "**AdvSearchResults**" is provided with AdvSearch. This Chunk name is set as &containerTpl property on the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet.

Default Value
-------------

```
<pre class="brush: php">
<p class="advsea-results">[[+resultInfo]] - Elapsed time: [[+etime]]</p>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>

<div class="advsea-results-list">
    [[+results]]
</div>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>etime</td><td>Server elapsed time of the search.</td></tr><tr><td>paging</td><td>The pagination links</td></tr><tr><td>resultInfo</td><td>The message saying how many search results were found.</td></tr><tr><td>results</td><td>The search results.</td></tr></tbody></table>but also:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>total</td><td>The total number of results</td></tr><tr><td>pagingType</td><td>The paging type used</td></tr><tr><td>page</td><td>The current page number</td></tr><tr><td>totalPage</td><td>The total number of result pages</td></tr><tr><td>perPage</td><td>The maximum number of results per page</td></tr><tr><td>offset</td><td>Offset of the current page</td></tr><tr><td>first</td><td>Number of first result of the current page</td></tr><tr><td>last</td><td>Number of last result of the current page</td></tr><tr><td>separator</td><td>String used as separator between page link number (paging type 0)</td></tr></tbody></table>See Also
--------

1. [AdvSearch.AdvSearch](/extras/revo/advsearch/advsearch.advsearch)
  1. [AdvSearch.AdvSearch.containerTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
  2. [Advsearch.AdvSearch.extractTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
  3. [AdvSearch.Advsearch.paging1Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
  4. [AdvSearch.AdvSearch.paging0Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
  5. [AdvSearch.AdvSearch.tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](/extras/revo/advsearch/advsearch.advsearchform)
  1. [Advsearch.AdvSearchForm.tpl](/extras/revo/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](/extras/revo/advsearch/advsearch.advsearchhelp)
  1. [AdvSearch.AdvSearchHelp.helplinkTpl](/extras/revo/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)