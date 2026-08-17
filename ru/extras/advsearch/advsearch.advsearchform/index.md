---
title: "AdvSearchForm"
description: "Сниппет AdvSearchForm для вывода формы поиска AdvSearch"
translation: "extras/advsearch/advsearch.advsearchform"
---

## Сниппет AdvSearchForm

Сниппет выводит форму поиска для AdvSearch.

## Использование

Разместите форму там, где она нужна, и укажите свойство `landing`: id ресурса, где вызывается [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch") (там появятся результаты).

``` php
[[!AdvSearchForm? &landing=`82`]]
```

Чтобы результаты были на той же странице, разместите вызов [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch") под AdvSearchForm и не задавайте `landing`.

## Доступные свойства

### Возможности AdvSearch

Включение и отключение функций.

| Name         | Description                                                                               | Default |
| ------------ | ----------------------------------------------------------------------------------------- | ------- |
| clearDefault | Очистка текста по умолчанию. Задайте 0, если не нужна эта функция. | 1       |
| help         | Ссылка на справку рядом с формой. 1: показать, 0: скрыть.                 | 1       |

### Общая настройка AdvSearch

Настройка собственного поиска.

| Name          | Description                                                                                                        | Default    |
| ------------- | ------------------------------------------------------------------------------------------------------------------ | ---------- |
| asId          | Уникальный id экземпляра AdvSearch. Буквы a-z, подчёркивания, цифры 0-9. Регистр важен. | as0        |
| landing       | Ресурс, на котором вызывается AdvSearch и показываются результаты.                 |            |
| method        | Отправка поиска через POST или GET.                                                                       | GET        |
| searchIndex   | Имя параметра REQUEST для поискового запроса.                                                        | search     |
| toPlaceholder | Выводить напрямую или сохранять в плейсхолдер с этим именем.                    |            |
| tpl           | Чанк для формы поиска.                                                            | SearchForm |

### Пользовательская установка

Параметры для нестандартной установки.

| Name         | Description                                                                                                    | Default                                             |
| ------------ | -------------------------------------------------------------------------------------------------------------- | --------------------------------------------------- |
| addJs        | 1: подключать advsearchform.min.js, 0: не подключать                             | 1                                                   |
| addCss       | 1: подключать advsearch.css, 0: не подключать                                    | 1                                                   |
| addJQuery    | 1: автоматически подключать jQuery в заголовке страниц | 1                                                   |
| jsJQuery     | URL библиотеки jquery                                                             | assets/components/advsearch/js/jquery-1.5.1.min.js  |
| jsSearchForm | URL (под assets/) JS для формы (справка, clearDefault и т. д.)               | assets/components/advsearch/js/advsearchform.min.js |

## Чанки AdvSearchForm

AdvSearchForm обрабатывает один чанк. Соответствующий параметр:

- [tpl](extras/advsearch/advsearch.advsearchform/tpl "Advsearch.AdvSearchForm.tpl") - чанк формы поиска.

## Примеры

Форма поиска с отправкой через POST вместо GET:

``` php
[[AdvSearchForm? &method=`POST`]]
```

Форма в плейсхолдер `search.form`, страница результатов на ресурсе 82, свой чанк `MySearchForm`:

``` php
[[AdvSearchForm? &tpl=`MySearchForm` &landing=`82` &toPlaceholder=`search.form`]]

<h2>Search</h2>
[[+search.form]]
```

Две формы: первая (as0) без ссылки на справку, вторая (as1) без clearDefault:

``` php
[[AdvSearchForm? &help=`0`]]
```

``` php
[[AdvSearchForm? &asId=`as1` &clearDefault=`0`]]
```

## Ошибки

Возможные сообщения об ошибках:

- AdvSearch runs only with charset UTF-8.
- AdvSearch runs only with the multibyte extension on. See Lexicon and language system settings.

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
