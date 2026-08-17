---
title: "pageTpl"
description: "Чанк pageTpl сниппета SimpleSearch"
translation: "extras/simplesearch/simplesearch/pagetpl"
---

## Чанк pageTpl SimpleSearch

Это чанк, который выводится через свойство &pageTpl сниппета [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch"). Он содержит простую неактивную ссылку пагинации.

## Значение по умолчанию

``` php
<span class="sisea-page"><a href="[[+link]]">[[+text]]</a>[[+separator]]</span>
```

## Доступные плейсхолдеры

| Name      | Description                         |
| --------- | ----------------------------------- |
| text      | Текст или номер страницы.           |
| separator | Разделитель между номерами страниц. |
| link      | URL для ссылки пагинации.           |

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
