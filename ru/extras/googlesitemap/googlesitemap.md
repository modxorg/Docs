---
title: "GoogleSiteMap"
description: "Сниппет GoogleSiteMap версии 2 для MODX"
translation: "extras/googlesitemap/googlesitemap"
---

## Сниппет GoogleSiteMap

Сниппет выводит Google Sitemap. Версия 2 намного быстрее версии 1, но с меньшим числом опций. При параметрах, зависящих от старой версии, вызывается legacy-сниппет. Свойства старой версии на [этой странице](extras/googlesitemap/googlesitemapversion1).

Примечание: XML-карту с десятками тысяч узлов браузер рендерит долго. Ответ сервера обычно занимает несколько секунд. Тестирование приветствуется. Issues: <https://github.com/modxcms/GoogleSiteMap/issues>

## Использование

Разместите сниппет в нужном ресурсе и задайте шаблон «blank»:

``` php
[[!GoogleSiteMap]]
```

Не забудьте тип содержимого xml.

## Свойства

| Имя           | Описание                                                                                                                                                     | Значение по умолчанию                                                                                               |
| -------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------- |
| cachePrefix    | Префикс строки для файлов кэша.                                                                                                                              | googlesitemap                                                                                               |
| cachePartition | Папка под core/cache/ для файлов кэша.                                                                                                                     | googlesitemap                                                                                               |
| cacheExpires   | Время жизни кэша. По умолчанию 1 день.                                                                                                                         | 86400                                                                                                       |
| legacyProps    | Меняйте только если точно понимаете зачем. Свойства через запятую запускают legacy GoogleSiteMap. | allowedtemplates, excludeResources, excludeChildrenOf, sortByAlias, templateFilter, itemTpl, startId, where |
| legacySnippet  | Меняйте только если точно понимаете зачем. Этот сниппет вызывается при legacy-свойстве.                | GoogleSiteMapVersion1                                                                                       |
| containerTpl   | Чанк контейнера вывода.                                                                                                                      | gContainer                                                                                                  |
| context        | Ограничение контекстами. Пусто. ресурсы текущего контекста. Список через запятую.                   |                                                                                                             |
| googleSchema   | Расположение схемы GoogleSiteMap.                                                                                                                       | <http://www.google.com/schemas/sitemap/0.9>                                                                 |
| hideDeleted    | При true только неудалённые ресурсы.                                                                                                                   | true                                                                                                        |
| published      | При true только опубликованные ресурсы.                                                                                                                    | true                                                                                                        |
| searchable     | При true только searchable ресурсы.                                                                                                                   | true                                                                                                        |
| showHidden     | При true включаются скрытые ресурсы.                                                                                                                         | false                                                                                                       |
| sortBy         | Поле сортировки результатов.                                                                                                                               | menuindex                                                                                                   |
| sortDir        | Направление сортировки.                                                                                                                                       | ASC                                                                                                         |

## Чанки GoogleSiteMap

GoogleSiteMap обрабатывает 1 чанк:

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

ПРИМЕЧАНИЕ: последний пример вызовет legacy-сниппет, который зависнет при генерации многих тысяч узлов.

## См. также

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
2. [GoogleSiteMap.GoogleSiteMapVersion1](extras/googlesitemap/googlesitemapversion1)
