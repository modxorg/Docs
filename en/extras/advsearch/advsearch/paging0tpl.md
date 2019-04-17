---
title: "paging0Tpl"
_old_id: "769"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl"
---

## AdvSearch's paging0Tpl Chunk

A Chunk named "**Paging0**" is provided with AdvSearch. This Chunk name is set as &paging0Tpl property on the [AdvSearch](extras/advsearch/advsearch.advsearch "AdvSearch.AdvSearch")AdvSearch snippet.

## Default Value

``` php
<span class="advsea-result-pages">[[%advsearch.result_pages? &namespace=`advsearch` &topic=`default`]]</span>[[+paging0]]
```

## Available Placeholders

| Name    | Description     |
| ------- | --------------- |
| paging0 | The pagination. |

## AdvSearch's pageTpl and CurrentPageTpl Chunks

Two Chunks named "**PageLink**" and "**CurrentPageLink**" are provided to set up the paging type 0.
These Chunk names are set as &pageTpl and &currentPageTpl properties on the [AdvSearch](extras/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet.

## Default Value for PageLink

``` html
<span class="advsea-page"><a href="[[+link]]">[[+text]]</a></span>
```

## Default Value for CurrentPageLink

``` html
<span class="advsea-page advsea-current-page">[[+text]]</span>
```

## Available Placeholders

| Name | Description          |
| ---- | -------------------- |
| link | The link to the page |
| text | The page number      |

You could define the separator between page link numbers by using the pagingSeparator parameter.

## See Also

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch.advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
    2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)
