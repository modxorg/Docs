---
title: "tpl"
_old_id: "1001"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl"
---

## SimpleSearch's tpl Chunk

This is the Chunk displayed with the &tpl property on the [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch") snippet.

## Default Value

``` php
<div class="sisea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div class="extract"><p>[[+extract]]</p></div>
</div>
```

## Available Placeholders

Any field on a Resource is available to use as a property, as well as:

| Name    | Description                                                                                                             |
| ------- | ----------------------------------------------------------------------------------------------------------------------- |
| extract | If &showExtract is set to 1, this will be the extracted part of the Resource's content where the search term was found. |

## See Also

1. [SimpleSearch.Roadmap](extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch)
    1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch/containertpl)
    2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch/currentpagetpl)
    3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch/pagetpl)
    4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch/tpl)
    5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch/faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
    1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/tpl)
4. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)
