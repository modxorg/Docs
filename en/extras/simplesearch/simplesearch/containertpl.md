---
title: "containerTpl"
_old_id: "998"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl"
---

## SimpleSearch's containerTpl Chunk

This is the Chunk displayed with the &containerTpl property on the [SimpleSearch](/extras/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet. It contains the search results, pagination and count message.

## Default Value

``` php
<p class="sisea-results">[[+resultInfo]]</p>

<div class="sisea-paging"><span class="sisea-result-pages">[[%sisea.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>

<div class="sisea-results-list">
    [[+results]]
</div>

<div class="sisea-paging"><span class="sisea-result-pages">[[%sisea.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>
```

## Available Placeholders

| Name       | Description                                            |
| ---------- | ------------------------------------------------------ |
| resultInfo | The message saying how many search results were found. |
| results    | The search results.                                    |
| paging     | The pagination links                                   |

## See Also

1. [SimpleSearch.Roadmap](/extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](/extras/simplesearch/simplesearch.simplesearch)
     1. [SimpleSearch.SimpleSearch.containerTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
     2. [SimpleSearch.SimpleSearch.currentPageTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
     3. [SimpleSearch.SimpleSearch.pageTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
     4. [SimpleSearch.SimpleSearch.tpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
     5. [SimpleSearch.Faceted Search Through PostHooks](/extras/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](/extras/simplesearch/simplesearch.simplesearchform)
     1. [SimpleSearch.SimpleSearchForm.tpl](/extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](/extras/simplesearch/simplesearch.solr)