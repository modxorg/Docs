---
title: "getResources. XML-карта сайта Google"
translation: "extras/getresources/getresources.examples/google-xml-sitemap"
description: "Создание XML-карты сайта Google с помощью getResources"
---

Зачем [отдельный сниппет](extras/googlesitemap "GoogleSiteMap"), если getResources может собрать XML-карту сайта для Google.

**Понадобится несколько элементов:**

- набор TV для данных Sitemap: частота изменений, приоритет и другие;
- ресурс для sitemap.xml;
- tpl-чанк для getResources.

## TV

Сначала создайте категорию для TV, назовите её «Search Tools». Так проще организовать их на вкладке [переменных шаблона](making-sites-with-modx/customizing-content/template-variables "Template Variables"). При создании каждой TV разрешите доступ ко всем нужным шаблонам.

**Change Frequency** сообщает Google, как часто вы ожидаете обновление страницы.

1. Имя: change-frequency, категория Search Tools.
2. Тип ввода: DropDown List
3. Значения: always||hourly||daily||weekly||monthly||yearly||never
4. Рекомендуемое значение по умолчанию: monthly

**Google Sitemap Priority** сообщает Google, насколько важна каждая страница. Значение 1 для всех страниц индексацию не улучшит :)

1. Имя: google-site-map-priority, категория Search Tools.
2. Тип ввода: DropDown List
3. Значения: .1||.2|| .3|| .5|| .6|| .7|| .8|| .9|| 1
4. Рекомендуемое значение по умолчанию: .5

## Чанк

Создайте чанк с именем: google-sitemap-tpl

``` php
<url>
  <loc>[[~[[+id]]? &scheme=`full`]]</loc>
  <lastmod>[[+editedon]]</lastmod>
  <priority>[[+tv.google-site-map-priority]]</priority>
  <changefreq>[[+tv.change-frequency]]</changefreq>
</url>?
```

## Страница

Создайте страницу в корне сайта с именем «sitemap.xml». Отметьте «Скрыть из меню». Шаблон: `<empty>`. На вкладке «Настройки страницы» установите тип содержимого xml. Вставьте код ниже. После сохранения проверьте, что псевдоним ресурса равен sitemap.xml, и ресурс опубликован.

``` php
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">
[[getResources?
  &parents=`0`
  &tpl=`google-sitemap-tpl`
  &limit=`500`
  &sortdir=`DESC`
  &includeTVs=`1`
  &processTVs=`1`
  &depth=`10`
  &sortby=`publishedon`
  ]]
</urlset>
```

Если у вас больше 500 ресурсов или глубина больше 10 уровней, измените limit и depth в вызове сниппета.
