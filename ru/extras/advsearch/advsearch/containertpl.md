---
title: "containerTpl"
description: "Чанк AdvSearchResults для обёртки результатов поиска, пагинации и сообщений"
translation: "extras/advsearch/advsearch/containertpl"
---

## Чанк containerTpl AdvSearch

С AdvSearch поставляется чанк «**AdvSearchResults**». Его имя задаётся свойством &containerTpl сниппета [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch").

## Значение по умолчанию

``` html
<p class="advsea-results">[[+resultInfo]] - Elapsed time: [[+etime]]</p>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>

<div class="advsea-results-list">
    [[+results]]
</div>

<div class="advsea-paging[[+pagingType]]">[[+paging]]</div>
```

## Доступные плейсхолдеры

| Name       | Description                                            |
| ---------- | ------------------------------------------------------ |
| etime      | Время выполнения поиска на сервере.                     |
| paging     | Ссылки пагинации                                   |
| resultInfo | Сообщение о количестве найденных результатов. |
| results    | Результаты поиска.                                    |

а также:

| Name       | Description                                                       |
| ---------- | ----------------------------------------------------------------- |
| total      | Общее число результатов                                       |
| pagingType | Используемый тип пагинации                                              |
| page       | Номер текущей страницы                                           |
| totalPage  | Общее число страниц результатов                                  |
| perPage    | Максимум результатов на странице                            |
| offset     | Смещение текущей страницы                                        |
| first      | Номер первого результата на текущей странице                        |
| last       | Номер последнего результата на текущей странице                         |
| separator  | Разделитель между номерами страниц (тип пагинации 0) |

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
