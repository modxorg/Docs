---
title: "paging0Tpl"
description: "Чанки Paging0, PageLink и CurrentPageLink для пагинации типа 0"
translation: "extras/advsearch/advsearch/paging0tpl"
---

## Чанк paging0Tpl AdvSearch

С AdvSearch поставляется чанк «**Paging0**». Его имя задаётся свойством &paging0Tpl сниппета [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch").

## Значение по умолчанию

``` php
<span class="advsea-result-pages">[[%advsearch.result_pages? &namespace=`advsearch` &topic=`default`]]</span>[[+paging0]]
```

## Доступные плейсхолдеры

| Name    | Description     |
| ------- | --------------- |
| paging0 | Пагинация. |

## Чанки pageTpl и CurrentPageTpl AdvSearch

Для пагинации типа 0 поставляются чанки «**PageLink**» и «**CurrentPageLink**».
Их имена задаются свойствами `&pageTpl` и `&currentPageTpl` сниппета [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch").

## Значение по умолчанию для PageLink

``` html
<span class="advsea-page"><a href="[[+link]]">[[+text]]</a></span>
```

## Значение по умолчанию для CurrentPageLink

``` html
<span class="advsea-page advsea-current-page">[[+text]]</span>
```

## Доступные плейсхолдеры

| Name | Description          |
| ---- | -------------------- |
| link | Ссылка на страницу |
| text | Номер страницы      |

Разделитель между номерами страниц задаётся параметром pagingSeparator.

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
