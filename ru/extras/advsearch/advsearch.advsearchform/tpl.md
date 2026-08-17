---
title: "Advsearch.AdvSearchForm.tpl"
description: "Чанк AdvSearchForm для шаблона формы поиска"
translation: "extras/advsearch/advsearch.advsearchform/tpl"
---

## Чанк tpl AdvSearchForm

С AdvSearch поставляется чанк «**AdvSearchForm**». Его имя задаётся свойством &tpl сниппета [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm").

## Значение по умолчанию

``` html
<form class="advsea-search-form" action="[[~[[+landing]]]]" method="[[+method]]">
  <fieldset>
    <input type="hidden" name="id" value="[[+landing]]" />
    <input type="hidden" name="asId" value="[[+asId]]" />
    [[+helpLink]]<input type="text" id="[[+asId]]_search" name="[[+searchIndex]]" value="[[+searchValue]]" />
    <input type="submit" name="sub" value="[[%advsearch.search? &namespace=`advsearch` &topic=`default`]]" />
  </fieldset>
</form>
[[+resultsWindow]]
```

## Доступные плейсхолдеры

| Name          | Description                                                                                                        |
| ------------- | ------------------------------------------------------------------------------------------------------------------ |
| asId          | Идентификатор AdvSearch. Обязателен в шаблоне формы, чтобы различать экземпляры advSearch. |
| helpLink      | Место вывода ссылки на расширенную справку по поиску                                                   |
| landing       | id ресурса для показа результатов. По умолчанию текущий ресурс.                                |
| method        | Отправка через GET или POST. По умолчанию GET.                                                               |
| searchValue   | Значение по умолчанию или текущий поисковый запрос.                                                                               |
| searchIndex   | Имя переменной REQUEST для параметра поиска.                                                                     |
| resultsWindow | Блок div, куда подключается окно результатов (режим ajax)                                          |

## Настройка формы поиска

Чанк searchForm должен содержать:

- action: `action="[[~[[+landing]]]]"`
- method: `method="[[+method]]"`
- скрытое поле asId: `<input type="hidden" name="asId" value="[[+asId]]">` для экземпляра формы
- скрытое поле id: `<input type="hidden" name="id" value="[[+landing]]">` с id целевой страницы
- кнопку отправки с именем "sub".

и при необходимости:

- текстовое поле: `<input type="text" id="[[+asId]]_search" name="[[+searchIndex]]" value="[[+searchValue]]" />` Для формы без поля поиска удалите эту строку.
- ссылку на справку: `[[+helpLink]]` Чтобы скрыть справку, задайте параметр `&help`, чтобы плейсхолдер не выводился.
