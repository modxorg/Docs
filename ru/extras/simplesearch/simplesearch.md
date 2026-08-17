---
title: "SimpleSearch"
description: "Сниппет SimpleSearch для вывода результатов поиска. Все параметры и примеры"
translation: "extras/simplesearch/simplesearch"
---

## Сниппет SimpleSearch

Этот сниппет выводит результаты поиска на основе переданных критериев.

## Использование

Разместите сниппет в ресурсе, на котором вы хотите показывать результаты поиска.

``` php
[[!SimpleSearch]]
```

## Доступные свойства

| Name              | Description                                                                                                                                                                                                                                                                                                                                                                                                                 | Default                                                 |
| ----------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------- |
| tpl               | Чанк для вывода содержимого каждого результата поиска.                                                                                                                                                                                                                                                                                                                                                                      | SearchResult                                            |
| containerTpl      | Чанк, который оборачивает все результаты поиска, пагинацию и сообщение.                                                                                                                                                                                                                                                                                                                                                     | SearchResults                                           |
| useAllWords       | Если true, находит только результаты со всеми указанными словами поиска.                                                                                                                                                                                                                                                                                                                                                    | 0                                                       |
| maxWords          | Максимальное число слов в поисковом запросе. Применимо только если useAllWords выключен.                                                                                                                                                                                                                                                                                                                                    | 7                                                       |
| minChars          | Минимальное число символов для запуска поиска.                                                                                                                                                                                                                                                                                                                                                                              | 3                                                       |
| searchStyle       | Поиск через частичный LIKE или релевантный match.                                                                                                                                                                                                                                                                                                                                                                           | partial                                                 |
| andTerms          | Добавлять ли логическое AND между словами.                                                                                                                                                                                                                                                                                                                                                                                  | 1                                                       |
| matchWildcard     | Включить поиск с подстановочными символами. Установите false для точного поиска по термину.                                                                                                                                                                                                                                                                                                                                 | 1                                                       |
| docFields         | Список полей ресурса через запятую для поиска.                                                                                                                                                                                                                                                                                                                                                                              | pagetitle,longtitle,alias,description,introtext,content |
| fieldPotency      | Оценка и сортировка результатов (см. <https://github.com/splittingred/SimpleSearch/pull/29> для подробностей и использования)                                                                                                                                                                                                                                                                                               |                                                         |
| perPage           | Число результатов поиска на странице.                                                                                                                                                                                                                                                                                                                                                                                       | 10                                                      |
| showExtract       | Показывать ли фрагмент содержимого каждого результата.                                                                                                                                                                                                                                                                                                                                                                      | 1                                                       |
| extractSource     | (новое в версии 1.9) Определяет источник фрагмента. Если значение это имя поля ресурса (включая TV при &includeTVs), фрагмент берётся из этого поля. Иначе параметр трактуется как имя сниппета. Сниппет получает массив ресурса как параметры. Если сниппета с таким именем нет, фрагмент будет пустым.                                                                                                                    | content                                                 |
| extractLength     | Число символов для извлечения содержимого каждого результата.                                                                                                                                                                                                                                                                                                                                                               | 200                                                     |
| extractEllipsis   | Строка для обрамления извлечённых результатов. По умолчанию многоточие.                                                                                                                                                                                                                                                                                                                                                     | ...                                                     |
| includeTVs        | Включать ли значения TemplateVar в свойства, доступные каждому шаблону ресурса. По умолчанию 0. Включение может замедлить поиск при большом числе TV.                                                                                                                                                                                                                                                                       | 0                                                       |
| includeTVList     | Необязательный список имён TemplateVar через запятую для явного включения при includeTVs = 1.                                                                                                                                                                                                                                                                                                                               |                                                         |
| process TVs       | Рендерить ли значения TemplateVar так же, как на самом ресурсе. По умолчанию 0. Заметки: <br>TV доступны по имени `[[+myTV]]`. По умолчанию SimpleSearch не использует префикс, т. е. `[[+tv.myTV]]` НЕ отрендерится. TV обрабатываются при индексации для Solr, здесь это не нужно.                                                                                                                                   | 0                                                       |
| highlightResults  | Подсвечивать ли поисковый термин в результатах.                                                                                                                                                                                                                                                                                                                                                                             | 1                                                       |
| highlightClass    | Имя CSS-класса для подсветки терминов в результатах.                                                                                                                                                                                                                                                                                                                                                                        | simplesearch-highlight                                  |
| highlightTag      | HTML-тег для обёртки подсвеченного термина в результатах.                                                                                                                                                                                                                                                                                                                                                                   | span                                                    |
| pageTpl           | Чанк для ссылки пагинации.                                                                                                                                                                                                                                                                                                                                                                                                  | PageLink                                                |
| currentPageTpl    | Чанк для текущей ссылки пагинации.                                                                                                                                                                                                                                                                                                                                                                                          | CurrentPageLink                                         |
| pagingSeparator   | Разделитель между ссылками пагинации.                                                                                                                                                                                                                                                                                                                                                                                       |                                                         |  |
| ids               | Список ID через запятую для ограничения области поиска.                                                                                                                                                                                                                                                                                                                                                                     |                                                         |
| idType            | Тип ограничения для параметра ids. При parents добавляет всех потомков ID из ids в поиск. При documents использует только указанные ID.                                                                                                                                                                                                                                                                                      | parents                                                 |
| exclude           | Список ID ресурсов через запятую для исключения из поиска, например «10,15,19». Исключает ресурсы с ID «10», «15» или «19».                                                                                                                                                                                                                                                                                                 |                                                         |
| depth             | Если idtype = parents, глубина дерева ресурсов для поиска с указанными ID.                                                                                                                                                                                                                                                                                                                                                  | 10                                                      |
| hideMenu          | Возвращать ли ресурсы с hidemenu. 0: только видимые, 1: только скрытые, 2: оба.                                                                                                                                                                                                                                                                                                                                        | 2                                                       |
| contexts          | Контексты для поиска. По умолчанию текущий контекст, если не указаны явно.                                                                                                                                                                                                                                                                                                                                                 |                                                         |
| searchIndex       | Имя параметра REQUEST для поиска.                                                                                                                                                                                                                                                                                                                                                                                           | search                                                  |
| offsetIndex       | Имя параметра REQUEST для смещения пагинации.                                                                                                                                                                                                                                                                                                                                                                               | simplesearch\_offset                                    |
| placeholderPrefix | Префикс глобальных плейсхолдеров, которые устанавливает этот сниппет.                                                                                                                                                                                                                                                                                                                                                      | simplesearch.                                           |
| toPlaceholder     | Выводить результат напрямую или записать в плейсхолдер с именем этого свойства.                                                                                                                                                                                                                                                                                                                                             |                                                         |
| urlScheme         | Схема URL: http, https, full, abs, relative и т. д. См. документацию $modx->makeUrl(). Используется при генерации ссылок пагинации.                                                                                                                                                                                                                                                                                         |                                                         |
| customPackages    | Поиск по пользовательским таблицам через загрузку их пакета. Подробнее ниже.                                                                                                                                                                                                                                                                                                                                                |                                                         |
| postHooks         | Список хуков через запятую для добавления фасетных наборов к итоговым результатам.                                                                                                                                                                                                                                                                                                                                          |                                                         |
| activeFacet       | Текущая активная фасета. Не меняйте, если не нужен результат из нестандартной фасеты через postHook.                                                                                                                                                                                                                                                                                                                        | default                                                 |
| facetLimit        | Число результатов неактивных фасет на главной странице результатов.                                                                                                                                                                                                                                                                                                                                                         | 5                                                       |
| sortBy            | Список полей ресурса через запятую для сортировки. Оставьте пустым для сортировки по релевантности и score.                                                                                                                                                                                                                                                                                                                 |                                                         |
| sortDir           | Список направлений сортировки через запятую. Должен совпадать по числу элементов с sortBy.                                                                                                                                                                                                                                                                                                                                | DESC                                                    |
| noResultsTpl      | Чанк, когда результаты поиска не найдены.                                                                                                                                                                                                                                                                                                                                                                                   |                                                         |

## Чанки SimpleSearch

SimpleSearch обрабатывает 4 чанка. Соответствующие параметры SimpleSearch:

- [tpl](extras/simplesearch/simplesearch/tpl "SimpleSearch.SimpleSearch.tpl"): чанк для каждого выводимого результата.
- [containerTpl](extras/simplesearch/simplesearch/containertpl "SimpleSearch.SimpleSearch.containerTpl"): чанк, который оборачивает все результаты поиска, пагинацию и сообщение.
- [pageTpl](extras/simplesearch/simplesearch/pagetpl "SimpleSearch.SimpleSearch.pageTpl"): чанк для ссылки пагинации.
- [currentPageTpl](extras/simplesearch/simplesearch/currentpagetpl "SimpleSearch.SimpleSearch.currentPageTpl"): чанк для текущей ссылки пагинации.

## Поиск по пользовательским таблицам

SimpleSearch поддерживает поиск по пользовательским таблицам через свойство &customPackages. Для этого нужен собранный пользовательский пакет. Формат:

``` php
className:fieldName(s):packageName:packagePath:joinCriteria||class2Name:fieldName(s):package2Name:package2Path:join2Criteria
```

Каждый пользовательский пакет разделяется через ||. Части внутри разделяются двоеточием (:). Пример поиска по комментариям [Quip](extras/quip "Quip"):

``` php
&customPackages=`quipComment:body:quip:{core_path}components/quip/model/:quipComment.resource = modResource.id`
```

Разберём каждую часть:

- **className**: имя класса таблицы для поиска. Здесь QuipComment.
- **fieldName(s)**: список имён столбцов через запятую. Мы указали 'body', можно также 'body,email' и т. д.
- **packageName**: имя пакета схемы для добавления. Здесь quip.
- **packagePath**: путь к каталогу model/, где находится пакет.
- **joinCriteria**: SQL для соединения искомой таблицы с modResource. Таблица должна быть связана с ресурсом (иначе SimpleSearch не сможет построить URL).

После добавления SimpleSearch ищет и в этих полях. При совпадении результат выводится как ссылка на ресурс из joinCriteria. В нашем примере это ресурс, на котором находится комментарий Quip.

## Примеры

Эти примеры предполагают, что вы уже отправили поисковый запрос через сниппет [SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm").

Выведите результаты, показывая только заголовки:

``` php
[[!SimpleSearch? &showExtract=`0`]]
```

Выведите все результаты только в ресурсах 1, 3 или 4 (или ниже по дереву) и подсветите теги через 'strong':

``` php
[[!SimpleSearch? &ids=`1,3,4` &highlightTag=`strong`]]
```

Найдите только результаты со всеми словами запроса и запишите вывод в плейсхолдер 'results':

``` php
[[!SimpleSearch? &useAllWords=`1` &toPlaceholder=`results`]]
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
