---
title: "SimpleSearch.SimpleSearch.tpl"
_old_id: "1001"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl"
---

SimpleSearch's tpl Chunk
------------------------

This is the Chunk displayed with the &tpl property on the [SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet.

Default Value
-------------

```
<pre class="brush: php">
<div class="sisea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div class="extract"><p>[[+extract]]</p></div>
</div>

```Available Placeholders
----------------------

Any field on a Resource is available to use as a property, as well as:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>extract</td><td>If &showExtract is set to 1, this will be the extracted part of the Resource's content where the search term was found.</td></tr></tbody></table>See Also
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