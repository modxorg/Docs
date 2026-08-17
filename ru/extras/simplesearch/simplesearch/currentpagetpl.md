---
title: "currentPageTpl"
description: "Чанк currentPageTpl сниппета SimpleSearch"
translation: "extras/simplesearch/simplesearch/currentpagetpl"
---

## Чанк currentPageTpl SimpleSearch

Это чанк, который выводится через свойство &currentPageTpl сниппета [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch"). Он содержит простую активную некликабельную ссылку пагинации.

## Значение по умолчанию

``` php
<span class="sisea-page sisea-current-page">[[+text]]</span>
```

## Доступные плейсхолдеры

| Name      | Description                         |
| --------- | ----------------------------------- |
| text      | Текст или номер страницы.           |
| separator | Разделитель между номерами страниц. |
| link      | То же, что свойство text.           |

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
