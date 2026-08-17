---
title: "GoogleSiteMap"
description: "Сниппет Google SiteMap для MODX Revolution"
translation: "extras/googlesitemap/index"
---

## Что такое GoogleSiteMap?

GoogleSiteMap это сниппет для вывода SiteMap в формате Google.

## Требования

-   MODX Revolution 2.2.x или новее
-   PHP5.4 или новее

## История и сведения

В 2016 GoogleSiteMap полностью переписал YJ Tso (@sepiariver) на основе быстрого кода карты сайта Garry Nutting (@garryn). Старый сниппет не успевал при нескольких тысячах узлов.

Часть возможностей legacy не поддерживается. Для обратной совместимости при необходимости legacy-функции вызывается старый сниппет.

Legacy GoogleSiteMap написал Shaun McCormick (splittingred). Первый релиз вышел 23 июня 2009 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/googlesitemap>

### Разработка и сообщения об ошибках

Исходный код GoogleSiteMap на GitHub: <http://github.com/modxcms/GoogleSiteMap>

## Использование

GoogleSiteMap вызывают тегом сниппета.

### Сниппеты

GoogleSiteMap поставляется с двумя сниппетами:

-   [GoogleSiteMap](extras/googlesitemap/googlesitemap "GoogleSiteMap")
-   [GoogleSiteMapVersion1](extras/googlesitemap/googlesitemapversion1)

## Примеры

Google SiteMap для десятков тысяч ресурсов.

```php
[[!GoogleSiteMap]]
```

Google SiteMap для меньшего числа ресурсов с пользовательским чанком itemTpl.

```php
[[!GoogleSiteMap? &itemTpl=`myCustomTpl`]]
```

Примечание: последний пример вызовет legacy-сниппет и зависнет при очень большом числе узлов.

## См. также

1. [GoogleSiteMap.GoogleSiteMap](extras/googlesitemap/googlesitemap)
    1. [GoogleSiteMap.GoogleSiteMap.containerTpl](extras/googlesitemap/googlesitemap/containertpl)
    2. [GoogleSiteMap.GoogleSiteMap.itemTpl](extras/googlesitemap/googlesitemap/itemtpl)
2. [GoogleSiteMapVersion1](extras/googlesitemap/googlesitemapversion1)
