---
title: "bdListings"
description: "Сниппет вывода объявлений, результатов поиска и списков bdListings"
translation: "extras/bdlistings/bdlistings"
---

Сниппет bdListings выводит результаты поиска, общий список объявлений и другие представления.

## Свойства сниппета

### Общие свойства

| Имя свойства     | Описание                                                                                                                                                                                                     | Значение по умолчанию                                                                   |
| ----------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- |
| limit             | Максимум результатов или 0 для всех объявлений.                                                                                                                                                               | 0                                                                               |
| offset            | Необязательное смещение (для пагинации можно использовать getPage).                                                                                                                                        | 0                                                                               |
| sort              | JSON-строка для сортировки по нескольким полям с разным направлением. Поля для &sort и &sortby:                                                                                | - id                                                                            |
|                   |                                                                                                                                                                                                                 | - title                                                                         |
|                   |                                                                                                                                                                                                                 | - description                                                                   |
|                   |                                                                                                                                                                                                                 | - keywords                                                                      |
|                   |                                                                                                                                                                                                                 | - price                                                                         |
|                   |                                                                                                                                                                                                                 | - createdon                                                                     |
|                   |                                                                                                                                                                                                                 | - publisheduntil                                                                |
|                   |                                                                                                                                                                                                                 | - featured                                                                      |
|                   |                                                                                                                                                                                                                 | - companyname                                                                   |
|                   |                                                                                                                                                                                                                 | - contactinfo                                                                   |
|                   |                                                                                                                                                                                                                 | - address                                                                       |
|                   |                                                                                                                                                                                                                 | - phone                                                                         |
|                   |                                                                                                                                                                                                                 | - email                                                                         |
|                   |                                                                                                                                                                                                                 | - neighborhood                                                                  |
|                   |                                                                                                                                                                                                                 | - zip                                                                           |
|                   |                                                                                                                                                                                                                 | - city                                                                          |
|                   |                                                                                                                                                                                                                 | - country                                                                       |
|                   |                                                                                                                                                                                                                 | - website                                                                       |
|                   |                                                                                                                                                                                                                 | - latitude                                                                      |
|                   |                                                                                                                                                                                                                 | - longitude                                                                     |
|                   |                                                                                                                                                                                                                 | - category\_name                                                                |
|                   |                                                                                                                                                                                                                 | - category\_description                                                         |
|                   |                                                                                                                                                                                                                 | - subcategory\_name (может отсутствовать)                                             |
|                   |                                                                                                                                                                                                                 | - subcategory\_description (может отсутствовать)                                      |
|                   |                                                                                                                                                                                                                 | - target\_name (может отсутствовать)                                                  |
|                   |                                                                                                                                                                                                                 | - pricegroup\_display (может отсутствовать)                                           | ``` |
|                   |                                                                                                                                                                                                                 | `{"city": "ASC", "neighborhood": "ASC", "companyname": "ASC" }`                 |
| sortby            | Если &sort пуст или не валидный JSON (подсказка: используйте &sort=`` для сброса значения по умолчанию), здесь задаётся поле сортировки.                                                                    | title                                                                           |
| sortdir           | `[ASC | DESC]` Если &sort пуст или не валидный JSON, здесь задаётся направление сортировки.                                                                             | ASC                                                                             |
| activeOnly        | `[1 | 0]` При 1 (true) показываются только активные записи.                                                                                                                                                              | 1                                                                               |
| featuredOnly      | `[1 | 0]` При 1 (true) показываются только избранные записи.                                                                                                                                                            | 0                                                                               |
| where             | Необязательные ограничения в JSON.                                                                                                                                                                                   |                                                                                 |
| acceptUrlParams   | `[1 | 0]` Разрешает URL-параметры (см. acceptedUrlParams) переопределять свойства вызова и значения по умолчанию.                                                                                | 1                                                                               |
| acceptedUrlParams | Список через запятую свойств, которые могут переопределять вызов сниппета или значения по умолчанию.                                                                                               | query, keyword, target, pricegroup, city, category, subcategory, sort, listings |
| redirectResource  | **Обязательно при отслеживании кликов.** ID ресурса для перенаправления. См. также [bdRedirect](extras/bdlistings/bdredirect "bdListings.bdRedirect").                                   | 39                                                                              |
| rowSeparator      | Разделитель между объявлениями.                                                                                                                                                                              | перевод строки (\\n)                                                              |
| imageSeparator    | Разделитель между изображениями объявления.                                                                                                                                                                   | перевод строки (\\n)                                                              |
| emptyValue        | Значение (можно тег чанка) при отсутствии результатов.                                                                                                                                      | <p>No listings found :(</p> (ключ лексикона bdlistings.noresults)                  |
| trackViews        | `[1 | 0]` При 1 сниппет увеличивает поле «views» у объявлений в выборке. Полезно, если для некоторых списков счётчик просмотров не нужен. Добавлено в 1.1.1-pl. | 1                                                                               |

## Свойства фильтрации

| Имя свойства | Описание                                                                                                              |
| ------------- | ------------------------------------------------------------------------------------------------------------------------ |
| query         | Полнотекстовый поиск с нестрогим совпадением по title и description объявления.                                 |
| keyword       | Полнотекстовый поиск с нестрогим совпадением по полю keyword.                                                      |
| target        | ID целевой группы из компонента.                                                             |
| pricegroup    | ID ценовой группы из компонента.                                                        |
| city          | Нестрогое совпадение по полю city.                                                                                      |
| category      | Имя категории (точное совпадение) или ID для фильтра. С 1.1.2 также ищет подкатегории (имя или ID). |
| subcategory   | Имя подкатегории (точное совпадение) или ID для фильтра.                                                            |
| listings      | Через запятую ID объявлений, если нужно показать только конкретный набор.                    |

Подсказка: по умолчанию каждый из этих параметров принимается из URL (или POST), поэтому их удобно отдавать посетителю как фильтры.

## Чанки шаблонов

### tplOuter

Оборачивает все отдельные элементы.

По умолчанию:

``` php
[[+wrapper]]
```

Доступные плейсхолдеры:

- wrapper: все элементы в чанке tplRow, разделённые rowSeparator.
- total: общее число элементов в выборке.

### tplRow

Вывод одного объявления.

По умолчанию:

``` php
<div>
    <h2>
        [[+redirect_url:notempty=`<a href="[[+redirect_url]]">[[+title]]</a>`:default=`[[+title]]`]]
    </h2>
    [[+images:notempty=`<p>[[+primaryimage:notempty=`<img src="[[+primaryimage:phpthumbof=`w=300&h=200`]]" alt="[[+title]]" /><br />`]] [[+images]]</p>`]]
    <p>In [[+city]] - [[+neighborhood]] - [[+companyname]] - <a href="[[+redirect_url]]">[[+companyname]]</a></p>
    [[+description:notempty=`<p>[[+description:nl2br]]</p>`]]
    [[+googlemap_url:notempty=`<a href="[[+googlemap_url]]" title="View on Google Maps"><img src="[[+googlemap_static]]" alt="Google Maps"></a>`]]
</div>
```

Доступно много плейсхолдеров. Некоторые свойства напрямую влияют на их значения. Особенно redirect\_url (зависит от &redirectResource) и googlemap\_static (ссылка по свойствам staticMap*, см. ниже).

Плейсхолдеры:

- title
- description
- keywords
- price
- pricegroup / pricegroup\_id (id)
- pricegroup\_display
- category / category\_id (id)
- category\_name
- category\_description
- subcategory / subcategory\_id (id)
- subcategory\_name
- subcategory\_description
- target / target\_id (id)
- target\_name
- createdon (с модификаторами strtotime и date)
- publisheduntil (с модификаторами strtotime и date)
- active (1/0)
- featured (1/0)
- extended (1/0)
- companyname
- contactinfo
- address
- phone
- email
- neighborhood
- zip
- city
- country
- website
- latitude
- longitude
- clicks
- views
- googlemap\_static: URL статичной карты Google (по свойствам staticMap ниже). Пусто, если lat/long не заданы.
- googlemap\_url: URL maps.google.com/maps?q=LATITUDE,LONGITUDE. Пусто, если lat/long не заданы.
- redirect\_url: URL ресурса &redirectResource с параметром «lid» и ID объявления для перехода на website объявления с учётом кликов. Пусто, если website не задан.
- images: отдельные изображения через чанк tplImage, разделённые imageSeparator.
- primaryimage: если есть основное изображение, здесь ссылка (не tplImage tpl). Без основного берётся первое изображение.
- primaryimagepath: путь к изображению из primaryimage.

### tplImage (lower L then upper i)

Обёртка изображений внутри объявления (не для primaryimage в tplRow).

По умолчанию:

``` php
<img src="[[+image:phpthumbof=`w=150&h=150&zc=1`]]" alt="[[+caption]]" />
```

Плейсхолдеры:

- image
- imagepath
- caption
- sortorder
- listing (id)
- primary (1|0)

## Свойства статичной карты

В tplRow есть плейсхолдер googlemap\_static: изображение карты с маркером по центру объявления. Свойства ниже управляют поведением. Подробнее см. Google Maps Static API.

| Имя свойства             | Описание                                                                                                                                                     | Значение по умолчанию                                                               |
| ------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| staticMapWidth            | Ширина генерируемого изображения.                                                                                                                                 | 150                                                                         |
| staticMapHeight           | Высота генерируемого изображения.                                                                                                                                | 150                                                                         |
| staticMapZoom             | Уровень масштаба (1-23, зависит от места)                                                                                                                        | 12                                                                          |
| staticMapType             | Тип карты.                                                                                                                                            | hybrid                                                                      |
| staticMapMarkerColor      | Цвет маркера (текстовый или hex).                                                                                                             | red                                                                         |
| staticMapMarkerLabel      | Текст на маркере. Один символ верхнего регистра или цифра.                                                                                                     | A                                                                           |
| staticMapMarkerSize       | `[tiny | small | medium]` Размер маркера.                                                                                                                   | medium                                                                      |
| staticMapMarkerIcon       | Необязательная иконка вместо маркера. См. Google Maps Static API по кодированию. Пример: | `http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=cafe%7C996600` |  |
| staticMapMarkerIconShadow | \["true" or "false", текст, не 1 или 0\] Тень при пользовательской иконке.                                                                 | true                                                                        |

## Примеры

Последние 5 объявлений, простой список:

``` php
<h3>Lastest 5 Ads</h3>
<ul id="latest_ads">
[[!bdListings? &sort=`{"createdon":"DESC"}`  &tplRow=`bdl.listings.list` &limit=`5`]]
</ul>
```

Чанк bdl.listings.list, ссылка на ресурс 14 (страница поиска с некэшированным bdListings и URL-параметрами) с ID объявления как фильтр, то есть показывается одно объявление.

``` php
<li>
  <a href="[[~14? &listings=`[[+id]]`]]" title="[[+title]]">[[+title]]</a>
</li>
```
