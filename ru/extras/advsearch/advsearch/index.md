---
title: "AdvSearch"
description: "Сниппет AdvSearch для вывода результатов поиска по переданным критериям"
translation: "extras/advsearch/advsearch"
---

## Сниппет AdvSearch

Сниппет выводит результаты поиска по переданным критериям.

## Использование

Разместите сниппет в ресурсе, где нужно показать результаты поиска.

``` php
[[!AdvSearch]]
```

## Доступные свойства

### Настройка запроса

Где искать и какие результаты нужны.

| Name           | Description                                                                                                                                  | Default                                                 |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------- |
| contexts       | Контексты для поиска.                                                                                                                      | web                                                     |
| fields         | Список полей через запятую, доступных в результатах поиска.                                                                              | pagetitle,longtitle,alias,description,introtext,content |
| hideContainers | Поиск в контейнерных ресурсах. 0: искать во всех ресурсах. 1: не искать в ресурсах, помеченных как контейнер.                      | 0                                                       |
| hideMenu       | Возвращать ли ресурсы с hidemenu. 0: только видимые, 1: только скрытые, 2: оба. | 2                                                       |
| ids            | Список ID через запятую для ограничения поиска. Используйте дополнение GetIds для сложных списков id.                                        |                                                         |
| parents        | Список ID родителей через запятую: поиск только среди их потомков.                                |                                                         |
| includeTVs     | Список имён TV через запятую для включения значений TV в результаты.                                                                          |                                                         |
| queryHook      | Имя сниппета queryHook для изменения запроса по умолчанию.                                                                                        |                                                         |
| withFields     | Список полей через запятую, где выполнять поиск.                                                                                     | pagetitle,longtitle,alias,description,introtext,content |
| withTVs        | Список имён TV через запятую, где выполнять поиск. Значения TV добавляются в результаты.                                                   |                                                         |

### Организация результатов

Сортировка и ограничение результатов поиска.

| Name         | Description                                                                                                                                                                                                     | Default        |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------- |
| fieldPotency | Оценка и сортировка результатов. Список пар «поле : вес» через запятую.                                                                                                                                  | createdon      |
| perPage      | Число результатов на странице.                                                                                                                                                                  | 10             |
| sortby       | Список пар «поле [ASC]» через запятую для сортировки.                                                                                                                                                      | createdon DESC |
| showExtract  | Подсветка поисковых терминов в одном или нескольких фрагментах. Строка вида «n : список полей через запятую». n: максимум фрагментов на результат. Термин ищется в объединённых полях. | 1:content      |

### Оформление страницы результатов

Внешний вид страницы результатов.

| Name              | Description                                                                                     | Default                 |
| ----------------- | ----------------------------------------------------------------------------------------------- | ----------------------- |
| containerTpl      | Чанк-обёртка для всех результатов, пагинации и сообщения.             | SearchResults           |
| tpl               | Чанк для содержимого каждого результата.                      | AdvSearchResult         |
| pagingType        | Тип пагинации: 0 или 1                                                                 | 1                       |
| pageTpl           | Чанк для ссылки пагинации.                                                         | PageLink                |
| paging1Tpl        | Чанк для пагинации типа 1                                                          | Paging1                 |
| paging0Tpl        | Чанк для пагинации типа 0                                                          | Paging0                 |
| currentPageTpl    | Чанк для ссылки текущей страницы (тип пагинации 0).                               | CurrentPageLink         |
| pagingSeparator   | Разделитель между ссылками пагинации (тип 0).                                  |                         |  |
| extractEllipsis   | Строка-обёртка для фрагментов. По умолчанию многоточие.                          | ...                     |
| extractLength     | Число символов для извлечения контента каждого результата.                      | 200                     |
| extractTpl        | Чанк для обёртки каждого фрагмента.                                               | Extract                 |
| highlightClass    | CSS-класс для подсветки терминов в результатах.                                      | advsea-highlight        |
| highlightResults  | Подсвечивать ли поисковый термин в результатах.                                         | 1                       |
| highlightTag      | HTML-тег для обёртки подсвеченного термина.                               | span                    |
| placeholderPrefix | Префикс глобальных плейсхолдеров.                                                                  | advsearch (since 2.0.0) |
| toPlaceholder     | Выводить напрямую или сохранять в плейсхолдер с этим именем. |                         |

### Общая настройка AdvSearch

Настройка собственного поиска.

| Name        | Description                                                                                                               | Default |
| ----------- | ------------------------------------------------------------------------------------------------------------------------- | ------- |
| asId        | Уникальный id экземпляра AdvSearch. Буквы a-z, подчёркивания, цифры 0-9. Регистр важен.        | as0     |
| engine      | Движок поиска: 'mysql', 'zend' или 'all'. Режимы 'zend' и 'all' требуют репозиторий с проиндексированными ресурсами. | mysql   |
| init        | Показывать все результаты или ничего при первой загрузке страницы: 'all' или 'none'          | none    |
| maxWords    | Максимальное число слов в запросе.                                                                     | 20      |
| method      | Отправка поиска через POST или GET.                                                                              | GET     |
| minChars    | Минимальное число символов в слове для участия в поиске.                                             | 3       |
| offsetIndex | Имя параметра REQUEST для смещения пагинации.                                                       | offset  |
| output      | Тип вывода: 'json' или 'html'. JSON возвращает результаты как объект.                                              | html    |
| searchIndex | Имя параметра REQUEST для поискового запроса.                                                               | search  |
| urlScheme   | Формат генерируемого URL: -1, 0, 1, full, abs, http, https                                           | -1      |

### Пользовательская установка

Параметры для нестандартной установки.

| Name         | Description                                                            | Default    |
| ------------ | ---------------------------------------------------------------------- | ---------- |
| docindexPath | Путь под assets/files/, где лежат индексы документов Lucene | docindex/  |
| libraryPath  | Абсолютный путь или плейсхолдер к внешним библиотекам. AdvSearch добавляет `ZendSearch/vendor/autoload.php` для движка Lucene. | `{core_path}components/advsearch/libraries/` |

## Чанки AdvSearch

AdvSearch обрабатывает несколько чанков. Соответствующие параметры:

- [tpl](extras/advsearch/advsearch/tpl "AdvSearch.AdvSearch.tpl") - **AdvSearchResult** : чанк для каждого результата.
- [containerTpl](extras/advsearch/advsearch/containertpl "AdvSearch.AdvSearch.containerTpl") - **AdvSearchResults** : чанк-обёртка для всех результатов, пагинации и сообщения.

В зависимости от типа пагинации:
Тип пагинации 1:

- [paging1Tpl](extras/advsearch/advsearch/paging1tpl "AdvSearch.Advsearch.paging1Tpl") - **Paging1** : чанк для пагинации типа 1.

Тип пагинации 0:

- [paging0Tpl](extras/advsearch/advsearch/paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **Paging0** : чанк-обёртка для элементов пагинации типа 0.
- [pageTpl](extras/advsearch/advsearch/paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **PageLink** : чанк для ссылки пагинации.
- [currentPageTpl](extras/advsearch/advsearch/paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **CurrentPageLink** : чанк для ссылки текущей страницы.

## Примеры

Примеры предполагают, что запрос уже отправлен сниппетом [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm").

Только заголовки результатов:

``` php
[[!AdvSearch?
    &showExtract=`0`
]]
```

Все результаты только среди потомков ресурса 15, без контейнеров. Подсветка тегом `strong`:

``` php
[[!AdvSearch?
    &ids=`[[!GetIds? &ids=`c15`]]`
    &hideContainers=`1`
    &highlightTag=`strong`
]]
```

Поиск в поле `introtext` и TV `mytv`. В результатах поля `pagetitle`, `longtitle` и `introtext`. Фрагмент из `introtext`, не более 2 на результат. Результаты в плейсхолдер `results`:

``` php
[[!AdvSearch?
    &withFields=`introtext`
    &withTVs=`mytv`
    &fields=`pagetitle,introtext`
    &showExtract=`2:introtext`
    &toPlaceholder=`results`
]]
```

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
