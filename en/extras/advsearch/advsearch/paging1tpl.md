---
title: "AdvSearch.Advsearch.paging1Tpl"
_old_id: "770"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl"
---

## AdvSearch's paging1Tpl Chunk

A Chunk named "**Paging1**" is provided with AdvSearch. This Chunk name is set as &paging1Tpl property on the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet.

## Default Value

``` php 
[[+previouslink:isnot=``:then=`<span class="advsea-previous"><a href="[[+previouslink]]">Previous</a></span>`]]<span class="advsea-current"> [[+first]] - [[+last]] / [[+total]] </span>[[+nextlink:isnot=``:then=`<span class="advsea-next"><a href="[[+nextlink]]">Next</a></span>`]]
```

## Available Placeholders

| Name | Description |
|------|-------------|
| previouslink | Link to the previous page. |
| first | Number of first result of the current page. |
| last | Number of last result of the current page. |
| total | The total number of results. |
| nextlink | Link to the next page. |

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