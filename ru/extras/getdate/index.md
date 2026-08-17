---
title: "getDate"
description: "Простой сниппет получения timestamp для MODX Revolution"
translation: "extras/getdate/index"
---

## Что такое getDate?

Простой сниппет получения timestamp для MODX Revolution.

## История

getDate написал David Pede (davidpede), релиз. 22 ноября 2013 года.

## Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](building-sites/extras), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/getDate>

Исходный код и build script: <https://github.com/tasianmedia/getDate>

## Баги и запросы функций

Баги, issues и feature requests: <https://github.com/tasianmedia/getDate/issues>

## Использование

Сниппет getDate вызывается тегом:

``` php
[[!getDate]]
```

getDate можно вызывать с кэшем или без.

## Доступные свойства

### Свойства выбора

| Name   | Description                                                                                                                               | Default Value | Added in Version |
| ------ | ----------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| offset | Период для добавления или вычитания от текущего timestamp. Форматы strtotime(). | now           | 1.0.0-pl         |

| Example Offset | Example Snippet Call               |
| -------------- | ---------------------------------- |
| +5 Hours       | `[[!getDate? &offset=`5 hour`]]`   |
| +4 Days        | `[[!getDate? &offset=`4 day`]]`    |
| +3 Weeks       | `[[!getDate? &offset=`3 weeks`]]`  |
| +2 Months      | `[[!getDate? &offset=`2 month`]]`  |
| +1 Year        | `[[!getDate? &offset=`1 year`]]`   |
|                |
| -5 Hours       | `[[!getDate? &offset=`-5 hour`]]`  |
| -4 Days        | `[[!getDate? &offset=`-4 day`]]`   |
| -3 Weeks       | `[[!getDate? &offset=`-3 weeks`]]` |
| -2 Months      | `[[!getDate? &offset=`-2 month`]]` |
| -1 Year        | `[[!getDate? &offset=`-1 year`]]`  |

Все относительные форматы strtotime(): <http://www.php.net/manual/en/datetime.formats.relative.php>

## Формат даты

### Output Filters

getDate выводит unix timestamp. Для человекочитаемого формата используйте [MODX Output Filter 'date'](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)#InputandOutputFilters(OutputModifiers)-Stringoutputmodifiers).

| Example Output            | The Filter Parameters               |
| ------------------------- | ----------------------------------- |
| 22 November 2013          | `[[!getDate:date=`%e %B %Y`]]`      |
| Fri Nov 22, 2013          | `[[!getDate:date=`%a %b %e, %Y`]]`  |
| Friday, November 22, 2013 | `[[!getDate:date=`%A, %B %e, %Y`]]` |
| 2013-11-22                | `[[!getDate:date=`%Y-%m-%d`]]`      |

Все параметры форматирования даты: [revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters](making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters)

## Примеры

Текущий unix timestamp:

``` php
[[!getDate]]
```

Текущая дата (YYYY-MM-DD) через output filters:

``` php
[[!getDate:date=`%Y-%m-%d`]]
```

Дата два месяца назад (YYYY-MM-DD):

``` php
[[getDate:date=`%Y-%m-%d`? &offset=`-2 month`]]
```

## getDate с getResources

С [getResources](extras/getresources "getResources") getDate даёт фильтрацию по дате и времени по полям ресурса и TV.

### Поля ресурса

Примеры с параметром '&where' и полями ресурса.

Только ресурсы, опубликованные за последние три месяца:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`-3 month`]]"}]`
]]
```

Только ресурсы с начала прошлого месяца:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`first day of last month`]]"}]`
]]
```

За последнюю неделю и отредактированные сегодня:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`-1 week`]]","editedon:>=":"[[!getDate? &offset=`today`]]"}]`
]]
```

### Date Template Variable (TV)

Примеры с '&tvFilters' и Date TV.

Необработанные значения Date TV хранятся как 'YYYY-MM-DD HH:SS:MM', не timestamp. '&tvFilters' использует необработанные значения, поэтому форматируйте вывод getDate output filter.

Ресурсы с custom date моложе трёх месяцев:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`-3 month`]]`
]]
```

Ресурсы с custom date моложе начала прошлого месяца:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`first day of last month`]]`
]]
```

Ресурсы, где месяц custom date равен текущему:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate==[[!getDate:date=`%Y-%m-%`]]`
]]
```

Один custom date моложе прошлой недели и второй моложе полночи сегодня:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate01,myCustomDate02`
    &tvFilters=`myCustomDate01>=[[getDate:date=`%Y-%m-%d`? &offset=`-1 week`]],myCustomDate02>=[[getDate:date=`%Y-%m-%d %T`? &offset=`today`]]`
]]
```

Примеры getResources выше без кэша для динамической фильтрации. И getResources, и getDate должны быть без кэша. Для кэширования оба вызова кэшируйте.
