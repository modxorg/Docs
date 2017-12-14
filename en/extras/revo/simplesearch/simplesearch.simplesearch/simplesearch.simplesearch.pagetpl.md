---
title: "SimpleSearch.SimpleSearch.pageTpl"
_old_id: "1000"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl"
---

SimpleSearch's pageTpl Chunk
----------------------------

This is the Chunk displayed with the &pageTpl property on the [SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet. It contains a simple, inactive pagination link.

Default Value
-------------

```
<pre class="brush: php">
<span class="sisea-page"><a href="[[+link]]">[[+text]]</a>[[+separator]]</span>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>text</td><td>The text, or number, of each page.</td></tr><tr><td>separator</td><td>The separator between page numbers.</td></tr><tr><td>link</td><td>The URL for pagination linking.</td></tr></tbody></table>See Also
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