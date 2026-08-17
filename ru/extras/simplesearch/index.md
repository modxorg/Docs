---
title: "SimpleSearch"
description: "SimpleSearch, простой компонент поиска для MODX Revolution"
translation: "extras/simplesearch"
---

## Что такое SimpleSearch?

SimpleSearch это простой компонент поиска для MODX Revolution. Он поддерживает поиск по содержимому ресурсов и TV.

## Требования

- MODX Revolution 2.0.0-RC-2 или новее
- PHP5 или новее

## История

SimpleSearch написал [Shaun McCormick](https://github.com/splittingred) как простой компонент поиска. Первый релиз вышел 2 июня 2010 года. Компонент частично основан на AjaxSearch для MODX Evolution от KyleJ/coroico, но без Ajax-функциональности.

## Риски при обновлении

Прежде всего: ВСЕГДА ДЕЛАЙТЕ РЕЗЕРВНУЮ КОПИЮ ПЕРЕД ОБНОВЛЕНИЕМ!

Обновление с 1.* до 2.0.0 настоятельно рекомендуется, но оно связано с определёнными рисками.

Важные изменения с 1.* до 2.0.0:

- Пространство имён изменено с sisea на simplesearch. Если вы используете пользовательские системные настройки, перенесите их.
- Драйверы ElasticSearch и SOLR удалены, потому что требовали доработки. Будущие драйверы должны быть отдельными дополнениями. Обращайтесь к нам за помощью.

### Скачать

Пакет можно загрузить из менеджера MODX Revolution через [Управление пакетами](developing-in-modx/advanced-development/package-management "Package Management") или из репозитория MODX Extras: <https://modx.com/extras/package/simplesearch>

### Разработка и отчёты об ошибках

SimpleSearch хранится и разрабатывается на GitHub: <https://github.com/Sterc/SimpleSearch>

Сообщения об ошибках можно отправлять сюда: <https://github.com/Sterc/SimpleSearch/issues>

## Использование

У SimpleSearch есть 2 сниппета: один выводит форму («SimpleSearchForm»), другой выводит результаты поиска («SimpleSearch»).

- [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch")
- [SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm")

## Примеры

Выведите форму поиска, а под ней результаты:

``` php
[[!SimpleSearchForm]]

<h2>Results</h2>
[[!SimpleSearch]]
```

Выведите форму поиска, которая отправляет на страницу результатов в ресурсе 123 (на ней вызывается SimpleSearch):

``` php
[[!SimpleSearchForm? &landing=`123`]]
```

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
