---
title: "containerTpl"
description: "Чанк containerTpl сниппета SimpleSearch"
translation: "extras/simplesearch/simplesearch/containertpl"
---

## Чанк containerTpl SimpleSearch

Это чанк, который выводится через свойство &containerTpl сниппета [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch"). Он содержит результаты поиска, пагинацию и сообщение с количеством.

## Значение по умолчанию

``` php
<p class="sisea-results">[[+resultInfo]]</p>

<div class="sisea-paging"><span class="sisea-result-pages">[[%simplesearch.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>

<div class="sisea-results-list">
    [[+results]]
</div>

<div class="sisea-paging"><span class="sisea-result-pages">[[%simplesearch.result_pages? &namespace=`sisea` &topic=`default`]]</span>[[+paging]]</div>
```

## Доступные плейсхолдеры

| Name       | Description                                            |
| ---------- | ------------------------------------------------------ |
| resultInfo | Сообщение о количестве найденных результатов.          |
| results    | Результаты поиска.                                     |
| paging     | Ссылки пагинации.                                      |

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
