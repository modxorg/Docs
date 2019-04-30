---
title: "tpl"
_old_id: "771"
_old_uri: "revo/advsearch/advsearch.advsearch/advsearch.advsearch.tpl"
---

## AdvSearch's tpl Chunk

A Chunk named "**AdvSearchResult**" is provided with AdvSearch. This Chunk name is set as &tpl property on the [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch") snippet.

## Default Value

``` php
<div class="advsea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div>[[+extracts]]</div>
</div>
```

## Available Placeholders

| Name     | Description                                                                         |
| -------- | ----------------------------------------------------------------------------------- |
| idx      | Number of result. could be use inside the AdvSearchResult chunk to alternate class. |
| link     | By setting this placeholder you override the Resource id as url target              |
| id       | The resource id used as url target                                                  |
| extracts | The extracts                                                                        |

but also

| Name        | Description                                                                        |
| ----------- | ---------------------------------------------------------------------------------- |
| _fieldName_ | Any field value from the list of fields provided by the field parameter.           |
| _TVName_    | Any TV value from the list of TV provided by the withTVs and includeTVs parameter. |

## See Also

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch/containertpl)
    2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch/extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch/paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch/paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch/tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/helplinktpl)
