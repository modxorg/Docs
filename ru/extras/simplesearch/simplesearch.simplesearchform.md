---
title: "SimpleSearchForm"
description: "Сниппет SimpleSearchForm для формы поиска SimpleSearch"
translation: "extras/simplesearch/simplesearch.simplesearchform"
---

## Сниппет SimpleSearchForm

Этот сниппет выводит форму поиска для SimpleSearch.

## Использование

Разместите его там, где нужна форма поиска, и добавьте свойство 'landing' в вызов, чтобы указать ресурс, на котором вызывается сниппет [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch") (там будут показаны результаты).

``` php
[[!SimpleSearchForm? &landing=`123`]]
```

Если результаты должны быть на той же странице, разместите вызов [SimpleSearch](extras/simplesearch/simplesearch "SimpleSearch.SimpleSearch") под SimpleSearchForm и не указывайте параметр 'landing'.

## Доступные свойства

| Name          | Description                                                                                           | Default    |
| ------------- | ----------------------------------------------------------------------------------------------------- | ---------- |
| tpl           | Чанк для вывода формы поиска.                                                                         | SearchForm |
| landing       | Ресурс, на котором вызывается сниппет SimpleSearch и показываются результаты.                         |            |
| searchIndex   | Имя параметра REQUEST для поиска.                                                                     | search     |
| method        | Отправлять поиск через POST или GET.                                                                  | GET        |
| toPlaceholder | Выводить результат напрямую или записать в плейсхолдер с именем этого свойства.                       |            |

## Чанки SimpleSearchForm

SimpleSearchForm обрабатывает 1 чанк. Соответствующий параметр SimpleSearchForm:

- [tpl](extras/simplesearch/simplesearch/tpl "SimpleSearch.SimpleSearchForm.tpl"): чанк для формы поиска.

## Примеры

Выведите форму поиска с отправкой через POST вместо GET:

``` php
[[SimpleSearchForm? &method=`POST`]]
```

Запишите форму в плейсхолдер 'search.form', укажите landing на ресурсе 123 и используйте пользовательский чанк 'MySearchForm':

``` php
[[SimpleSearchForm? &tpl=`MySearchForm` &landing=`123` &toPlaceholder=`search.form`]]

<h2>Search</h2>
[[+search.form]]
```

В текущей версии (1.0.0) есть баг: если у вас есть чанк с именем «seachForm», его содержимое игнорируется в пользу формы по умолчанию.

## Ошибки

Если после отправки поиска вы видите ошибку:

``` php
There were no search results for the search "". Please try using more general terms to get more results.
```

Скорее всего **SimpleSearch** ищет поисковый термин не в том месте массива $_POST или $\_GET. Если вы создали пользовательский **&tpl** для **SimpleSearchForm**, убедитесь, что имя поля поиска совпадает с **&searchIndex** в вызове **SimpleSearch**. Ниже **my\_custom\_search\_field** используется и в tpl **SimpleSearchForm**, и в параметре **&searchIndex** вызова **SimpleSearch**:

### SimpleSearchForm tpl

``` html
<form id="my_id" action="[[~[[+landing:default=`[[*id]]`]]]]" method="[[+method:default=`get`]]">
    <input id="searchField" class="my_class" type="text" name="my_custom_search_field" value="[[+searchValue:default=`Search the site`]]"/>
    <input id="searchIcon" class="utilityButton" type="image" alt="Search" src="/assets/templates/my/images/searchButton.png">
    <input type="hidden" name="id" value="[[+landing:default=[[*id]]]]" />
</form>
```

### Вызов сниппета SimpleSearch

``` php
[[!SimpleSearch? &searchIndex=`my_custom_search_field`]]
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
