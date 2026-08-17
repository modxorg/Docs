---
title: "AdvSearchHelp"
description: "Сниппет AdvSearchHelp для окна справки по синтаксису поисковых запросов"
translation: "extras/advsearch/advsearch.advsearchhelp"
---

## Сниппет AdvSearchHelp

Сниппет настраивает содержимое справки.
Контент по умолчанию на английском описывает минимальный синтаксис запросов для движков mysql и zend в текущем релизе.

## Использование

Справка открывается через ajax-запрос к ресурсу «AdvSearch Help», который вызывает сниппет AdvSearchHelp.

``` plain
[[!AdvSearchHelp]]
```

Ресурс «AdvSearch Help» создаётся при установке пакета.
Вы можете переместить его в дереве ресурсов MODX, но не меняйте имя: ресурс находится по имени.

## Содержимое окна справки

Текст окна справки берётся из файла лексикона help.inc. Добавьте свой язык и настройте содержимое по необходимости.

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
