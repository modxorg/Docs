---
title: "pageTpl"
_old_id: "1000"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl"
---

## SimpleSearch's pageTpl Chunk

This is the Chunk displayed with the &pageTpl property on the [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch") snippet. It contains a simple, inactive pagination link.

## Default Value

``` php
<span class="sisea-page"><a href="[[+link]]">[[+text]]</a>[[+separator]]</span>
```

## Available Placeholders

| Name      | Description                         |
| --------- | ----------------------------------- |
| text      | The text, or number, of each page.  |
| separator | The separator between page numbers. |
| link      | The URL for pagination linking.     |

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
