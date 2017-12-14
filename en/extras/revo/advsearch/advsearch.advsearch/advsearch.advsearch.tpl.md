---
title: "AdvSearch.AdvSearch.tpl"
_old_id: "771"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.tpl"
---

AdvSearch's tpl Chunk
---------------------

A Chunk named "**AdvSearchResult**" is provided with AdvSearch. This Chunk name is set as &tpl property on the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet.

Default Value
-------------

```
<pre class="brush: php">
<div class="advsea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div>[[+extracts]]</div>
</div>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>idx</td><td>Number of result. could be use inside the AdvSearchResult chunk to alternate class.</td></tr><tr><td>link</td><td>By setting this placeholder you override the Resource id as url target</td></tr><tr><td>id</td><td>The resource id used as url target</td></tr><tr><td>extracts</td><td>The extracts</td></tr></tbody></table>but also

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>_fieldName_</td><td>Any field value from the list of fields provided by the field parameter.</td></tr><tr><td>_TVName_</td><td>Any TV value from the list of TV provided by the withTVs and includeTVs parameter.</td></tr></tbody></table>See Also
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