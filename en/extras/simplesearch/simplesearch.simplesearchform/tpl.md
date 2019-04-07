---
title: "tpl"
_old_id: "1003"
_old_uri: "revo/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl"
---

## SimpleSearchForm's tpl Chunk

This is the Chunk displayed with the &tpl property on the [SimpleSearch](extras/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm") snippet.

## Default Value

``` html
<form class="sisea-search-form" action="[[~[[+landing:default=`[[*id]]`]]]]" method="[[+method:default=`get`]]">
  <fieldset>
    <label for="[[+searchIndex]]">[[%sisea.search? &namespace=`sisea` &topic=`default`]]</label>
    <input type="text" name="[[+searchIndex]]" id="[[+searchIndex]]" value="[[+searchValue]]" />
    <input type="hidden" name="id" value="[[+landing:default=[[*id]]]]" /> 
    <input type="submit" value="[[%sisea.search? &namespace=`sisea` &topic=`default`]]" />
  </fieldset>
</form>
```

## Available Placeholders

| Name        | Description                                                                         |
| ----------- | ----------------------------------------------------------------------------------- |
| landing     | The ID of the Resource to show search results on. Defaults to the current Resource. |
| method      | Whether to submit over GET or POST. Defaults to GET.                                |
| searchValue | The current search value. Defaults blank unless a prior search has been performed.  |
| searchIndex | The REQUEST var used for the search parameter.                                      |

## See Also

1. [SimpleSearch.Roadmap](extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch.simplesearch)
     1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
     2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
     3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
     4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
     5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
     1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)