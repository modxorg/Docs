---
title: "GoogleSiteMapVersion1"
description: "Legacy-сниппет GoogleSiteMap версии 1"
translation: "extras/googlesitemap/googlesitemapversion1"
---

## Сниппет GoogleSiteMap

Сниппет выводит Google Sitemap.

## Использование

Разместите сниппет в нужном ресурсе и задайте шаблон «blank»:

``` php
[[!GoogleSiteMap]]
```

Не забудьте тип содержимого xml.

## Свойства

| Имя             | Описание                                                                                                                                                                                                                                  | Значение по умолчанию                               |
| ---------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------- |
| allowedtemplates | Список ID шаблонов через запятую. Фильтрует только при заданном значении.                                                                                                                                                     |                                             |
| containerTpl     | Чанк контейнера вывода.                                                                                                                                                                                                   | gContainer                                  |
| context          | Ограничение контекстами. Пусто. ресурсы текущего контекста. Список через запятую.                                                                                                |                                             |
| excludeResources | Необязательный список ID ресурсов для пропуска.                                                                                                                                                                                       |                                             |
| googleSchema     | Расположение схемы GoogleSiteMap.                                                                                                                                                                                                    | <http://www.google.com/schemas/sitemap/0.9> |
| hideDeleted      | При true только неудалённые ресурсы.                                                                                                                                                                                                | 1                                           |
| itemTpl          | Чанк для каждого элемента результата.                                                                                                                                                                                                       | gItem                                       |
| maxDepth         | Глубина дерева ресурсов. Пусто или 0. вся глубина.                                                                                                                                                       | 0                                           |
| published        | При true только опубликованные ресурсы.                                                                                                                                                                                                 | 1                                           |
| searchable       | При true только searchable ресурсы.                                                                                                                                                                                                | 1                                           |
| showHidden       | При true включаются скрытые ресурсы.                                                                                                                                                                                                      | false                                       |
| sortBy           | Поле сортировки результатов.                                                                                                                                                                                                            | menuindex                                   |
| sortByAlias      | Класс-алиас для sortBy.                                                                                                                                                                                       | modResource                                 |
| sortDir          | Направление сортировки.                                                                                                                                                                                                                    | ASC                                         |
| templateFilter   | Колонка modTemplate для фильтра.                                                                                                                                                                                                         | id                                          |
| where            | JSON-выражение или массив критериев выбора ресурсов. См. [xpdoquery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where). Есть баг: ресурсы в контейнерах могут не показываться. |                                             |

## Чанки GoogleSiteMap

GoogleSiteMap обрабатывает 2 чанка:

- [itemTpl](extras/googlesitemap/googlesitemap/itemtpl "GoogleSiteMap.GoogleSiteMap.itemTpl"). чанк каждого элемента.
- [containerTpl](extras/googlesitemap/googlesitemap/containertpl). чанк обёртки результатов.

## Примеры

Карта сайта для текущего контекста:

``` php
[[!GoogleSiteMap]]
```

Карта с контекстами web и marketing:

``` php
[[!GoogleSiteMap? &context=`web,marketing`]]
```

Только ресурсы с шаблоном BlogTemplate, исключить ID 123 и 78:

``` php
[[!GoogleSiteMap?
    &allowedtemplates=`BlogTemplate`
    &templateFilter=`templatename`
    &excludeResources=`123,78`
]]
```

## См. также

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
