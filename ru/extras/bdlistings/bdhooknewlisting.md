---
title: "bdHookNewListing"
description: "Хук FormIt для создания объявлений bdListings с фронтенда"
translation: "extras/bdlistings/bdhooknewlisting"
---

Сниппет bdHookNewListing подключают как хук в вызов FormIt. С его помощью пользователи сайта создают объявления с фронтенда.

## Поля формы

Покройте все поля, которые нужно записать в базу данных. Ожидаемые имена полей формы (схему также можно посмотреть [на GitHub](https://github.com/Mark-H/bdListings/blob/master/_build/schema/bdlistings.mysql.schema.xml)):

- title
- description
- keywords
- price (сохраняется с двумя знаками после запятой)
- pricegroup (целочисленный ID ценовой группы)
- category (целочисленный ID категории)
- subcategory (целочисленный ID подкатегории)
- target (целочисленный ID целевой группы (возраст))
- publishedon — дата или timestamp, поддерживаются большинство форматов
- companyname
- contactinfo
- address
- neighborhood
- zip
- city
- country
- website
- latitude и longitude. Если оба пусты, координаты подтягиваются автоматически по address/zip/city/country. Если страна не нужна в форме, добавьте её как скрытое поле, чтобы Google Maps API получил достаточно данных для lat/long.
