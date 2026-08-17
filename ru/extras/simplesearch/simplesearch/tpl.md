---
title: "tpl"
description: "Чанк tpl сниппета SimpleSearch"
translation: "extras/simplesearch/simplesearch/tpl"
---

## Чанк tpl SimpleSearch

Это чанк, который выводится через свойство &tpl сниппета [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch").

## Значение по умолчанию

``` php
<div class="sisea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div class="extract"><p>[[+extract]]</p></div>
</div>
```

## Доступные плейсхолдеры

Любое поле ресурса доступно как свойство, а также:

| Name    | Description                                                                                                             |
| ------- | ----------------------------------------------------------------------------------------------------------------------- |
| extract | Если &showExtract = 1, это извлечённая часть содержимого ресурса, где найден поисковый термин. |

## Смотрите также

1. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch)
    1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch/containertpl)
    2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch/currentpagetpl)
    3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch/pagetpl)
    4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch/tpl)
    5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch/faceted-search-through-posthooks)
2. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
    1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/tpl)
3. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)
