---
title: "tpl"
description: "Чанк AdvSearchResult для вывода одного результата поиска"
translation: "extras/advsearch/advsearch/tpl"
---

## Чанк tpl AdvSearch

С AdvSearch поставляется чанк «**AdvSearchResult**». Его имя задаётся свойством &tpl сниппета [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch").

## Значение по умолчанию

``` php
<div class="advsea-result">
    <h3>[[+idx]]. <a href="[[+link:is=``:then=`[[~[[+id]]]]`:else=`[[+link]]`]]" title="[[+longtitle]]">[[+pagetitle]]</a></h3>
    <div>[[+extracts]]</div>
</div>
```

## Доступные плейсхолдеры

| Name     | Description                                                                         |
| -------- | ----------------------------------------------------------------------------------- |
| idx      | Номер результата. Можно использовать в чанке AdvSearchResult для чередования классов. |
| link     | При задании этого плейсхолдера вы переопределяете id ресурса как цель URL              |
| id       | id ресурса, используемый как цель URL                                                  |
| extracts | Фрагменты                                                                        |

а также

| Name        | Description                                                                        |
| ----------- | ---------------------------------------------------------------------------------- |
| _fieldName_ | Любое значение поля из списка полей параметра field.           |
| _TVName_    | Любое значение TV из списков withTVs и includeTVs. |

## См. также

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
