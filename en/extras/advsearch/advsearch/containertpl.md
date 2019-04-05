---
title: "containerTpl"
_old_id: "767"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl"
---

## AdvSearch's containerTpl Chunk

A Chunk named "**AdvSearchResults**" is provided with AdvSearch. This Chunk name is set as &containerTpl property on the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet.

## Default Value

``` php 
<p class="advsea-results">[[+resultInfo]] - Elapsed time: [[+etime]]</p>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>

<div class="advsea-results-list">
    [[+results]]
</div>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| etime | Server elapsed time of the search. |
| paging | The pagination links |
| resultInfo | The message saying how many search results were found. |
| results | The search results. |

but also:

| Name | Description |
|------|-------------|
| total | The total number of results |
| pagingType | The paging type used |
| page | The current page number |
| totalPage | The total number of result pages |
| perPage | The maximum number of results per page |
| offset | Offset of the current page |
| first | Number of first result of the current page |
| last | Number of last result of the current page |
| separator | String used as separator between page link number (paging type 0) |

## See Also

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