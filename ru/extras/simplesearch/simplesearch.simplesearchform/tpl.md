---
title: "tpl"
description: "Чанк tpl сниппета SimpleSearchForm"
translation: "extras/simplesearch/simplesearch.simplesearchform/tpl"
---

## Чанк tpl SimpleSearchForm

Это чанк, который выводится через свойство &tpl сниппета [SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm").

## Значение по умолчанию

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

## Доступные плейсхолдеры

| Name        | Description                                                                         |
| ----------- | ----------------------------------------------------------------------------------- |
| landing     | ID ресурса для показа результатов поиска. По умолчанию текущий ресурс.              |
| method      | Отправка через GET или POST. По умолчанию GET.                                      |
| searchValue | Текущее значение поиска. Пусто, если поиск ещё не выполнялся.                       |
| searchIndex | Переменная REQUEST для параметра поиска.                                            |

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
