---
title: "SimpleSearch.SimpleSearch.containerTpl"
_old_id: "998"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl"
---

SimpleSearch's containerTpl Chunk
---------------------------------

This is the Chunk displayed with the &containerTpl property on the [SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet. It contains the search results, pagination and count message.

Default Value
-------------

```
<pre class="brush: php">
<p class="sisea-results">[[+resultInfo]]</p>

<div class="sisea-paging"><span class="sisea-result-pages">[[%sisea.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>

<div class="sisea-results-list">
    [[+results]]
</div>

<div class="sisea-paging"><span class="sisea-result-pages">[[%sisea.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>resultInfo</td><td>The message saying how many search results were found.</td></tr><tr><td>results</td><td>The search results.</td></tr><tr><td>paging</td><td>The pagination links</td></tr></tbody></table>See Also
--------

1. [SimpleSearch.Roadmap](/extras/revo/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch)
  1. [SimpleSearch.SimpleSearch.containerTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
  2. [SimpleSearch.SimpleSearch.currentPageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
  3. [SimpleSearch.SimpleSearch.pageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
  4. [SimpleSearch.SimpleSearch.tpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
  5. [SimpleSearch.Faceted Search Through PostHooks](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](/extras/revo/simplesearch/simplesearch.simplesearchform)
  1. [SimpleSearch.SimpleSearchForm.tpl](/extras/revo/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](/extras/revo/simplesearch/simplesearch.solr)