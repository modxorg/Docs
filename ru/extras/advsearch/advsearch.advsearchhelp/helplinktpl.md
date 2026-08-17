---
title: "helplinkTpl"
description: "Чанк helpLink для ссылки на справку AdvSearch"
translation: "extras/advsearch/advsearch.advsearchhelp/helplinktpl"
---

## Чанк helplinkTpl AdvSearch

С AdvSearch поставляется чанк «**helpLink**». Его имя используется для настройки ссылки на справку.

## Значение по умолчанию

``` php
<a id="[[+asId]]_helplink" title="[[%advsearch.help_title? &namespace=`advsearch` &topic=`default`]]" href="[[+helpId]]" class="advsea-helplink"><span>help</span></a>
```

## Доступные плейсхолдеры

| Name   | Description                      |
| ------ | -------------------------------- |
| helpId | URL цели ссылки на справку |

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
