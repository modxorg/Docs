---
title: "paging1Tpl"
description: "Чанк Paging1 для пагинации типа 1 с ссылками «Назад» и «Вперёд»"
translation: "extras/advsearch/advsearch/paging1tpl"
---

## Чанк paging1Tpl AdvSearch

С AdvSearch поставляется чанк «**Paging1**». Его имя задаётся свойством &paging1Tpl сниппета [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch").

## Значение по умолчанию

``` php
[[+previouslink:isnot=``:then=`<span class="advsea-previous"><a href="[[+previouslink]]">Previous</a></span>`]]<span class="advsea-current"> [[+first]] - [[+last]] / [[+total]] </span>[[+nextlink:isnot=``:then=`<span class="advsea-next"><a href="[[+nextlink]]">Next</a></span>`]]
```

## Доступные плейсхолдеры

| Name         | Description                                 |
| ------------ | ------------------------------------------- |
| previouslink | Ссылка на предыдущую страницу.                  |
| first        | Номер первого результата на текущей странице. |
| last         | Номер последнего результата на текущей странице.  |
| total        | Общее число результатов.                |
| nextlink     | Ссылка на следующую страницу.                      |

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
