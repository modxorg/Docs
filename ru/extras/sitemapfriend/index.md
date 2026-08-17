---
title: "sitemapFriend"
description: "Сниппет MODX для генерации XML, HTML и пользовательских sitemap"
translation: "extras/sitemapfriend/index"
---

## What is sitemapFriend?

Этот сниппет генерирует sitemap: Google XML sitemap, HTML sitemap и/или любой пользовательский формат.

### Requirements

- MODX Revolution 2.1.5 или новее
- PHP5 или новее

### History

sitemapFriend написал Mihai Sucan на основе сниппета [GoogleSiteMap](https://modx.com/extras/package/googlesitemap) Shaun McCormick. Релиз 16 ноября 2010 года.
Mihai прекратил разработку под Modx, плагин поддерживает Jérôme Perrin.

### Download

Скачайте через менеджер MODX Revolution в [Package Management](extending-modx/transport-packages "Package Management") или из [MODX Extras Repository](https://modx.com/extras/package/sitemapfriend).

### Development and Bug reporting

Feature requests и баги на [github](https://github.com/yogoo/sitemapFriend/issues).

## Usage

[Google XML sitemap](http://support.google.com/webmasters/bin/answer.py?hl=en&answer=156184):

``` php
[[sitemapFriend? &type=`xml`]]
```

HTML sitemap:

``` php
[[sitemapFriend? &type=`html`]]
```

Для пользовательского формата создайте чанки и укажите их сниппету. Список шаблонов ниже.

Подсказка: используйте сниппет [getCache](https://modx.com/extras/package/getcache) для управления кэшем sitemap.

``` php
[[!getCache? &element=`sitemapFriend` &cacheKey=`sitemap` &cacheExpires=`21600` &type=`html`]]
```

## Properties

Сниппет генерирует почти любой sitemap. Вывод настраивают свойства ниже.
Свойства задают в вызове или в property sets.

### Output Properties

| Name                                                                   | Description                                                                                                                                                                                                                                                                   | Default   |
| ---------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------- |
| type                                                                   | Тип sitemap: _xml_ или _html_. От type зависят значения по умолчанию других свойств.                                                                                                                                               | html      |
| titleField                                                             | Поле заголовка: _pagetitle_, _longtitle_, _menutitle_. Fallback на _pagetitle_, чтобы заголовок не был пустым.                                                                                                                                                                          | pagetitle |
| urlScheme                                                              | URL scheme для не-XML sitemap: _http_, _https_, _full_, _abs_ и т.д. См. [$modx->makeUrl()](http://api.modx.com/revolution/2.1/).                                                                                                                      |
| Для XML sitemap всегда _full_.                           | abs                                                                                                                                                                                                                                                                           |
| startId                                                                | Строить sitemap от указанного ID ресурса.                                                                                                                                                                                                                        | 0         |
| contexts                                                               | Ограничить указанными контекстами. Пусто: ресурсы текущего Context. Список через запятую.                                                                                                                                                    |           |
| showDeleted                                                            | Включать удалённые ресурсы?                                                                                                                                                                                                                                                    | false     |
| showUpublished                                                         | Включать неопубликованные ресурсы?                                                                                                                                                                                                                                                | false     |
| onlySearchable                                                         | Только searchable ресурсы?                                                                                                                                                                                                                                            | true      |
| showHidden                                                             | Включать ресурсы, скрытые в меню?                                                                                                                                                                                                                         | true      |
| maxDepth                                                               | Максимальная глубина дерева. Пусто или 0: все ресурсы.                                                                                                                                                                        | 0         |
| onlyTemplates                                                          | Список ID шаблонов через запятую.                                                                                                                                                                                                                          |           |
| skipTemplates                                                          | Список ID шаблонов для пропуска.                                                                                                                                                                                                                               |           |
| includeWebLinks                                                        | Включать weblink ресурсы?                                                                                                                                                                                                                                                    | false     |
| excludeResources                                                       | Список ID для полного исключения из sitemap. Дочерние тоже исключаются. Ресурсы из опций Modx _error\_page_, _site\_unavailable\_page_, _unauthorized\_page_ и сама страница sitemap исключаются всегда. |           |
| skipResources                                                          | Список ID для скрытия из sitemap. Дочерние НЕ исключаются.                                                                                                                                                                           |           |
| includeResources                                                       | Список ID для принудительного включения, даже если _showDeleted_, _showUnpublished_, _onlySearchable_ и _showHidden_ отфильтровали бы ресурс.                                                       |           |
| excludeChildrenOf                                                      | Список ID, чьи дочерние не включаются в sitemap. Сами ресурсы включаются, пропускаются только дети.                                                                      |           |
| parentTitles                                                           | Включать заголовки родительских ресурсов?                                                                                                                                                                                                                                | false     |
| parentTitlesReversed                                                   | Если parentTitles включён, показывать заголовки в обратном порядке?                                                                                                                                                                                                  | false     |
| titleSeparator                                                         | Разделитель заголовков при parentTitles.                                                                                                                                                                                                                     | -         |
| sortBy                                                                 | Поле ресурса для сортировки.                                                                                                                                                                                                                                    | menuindex |
| sortDir                                                                | Направление сортировки.                                                                                                                                                                                                                                                     | ASC       |
| lastmodFormat                                                          | Формат lastmod для не-XML sitemap. См. [PHP date() function](http://www.php.net/manual/en/function.date.php).                                                                                                                                                |
| Для XML sitemap всегда _c_ (ISO 8601). | F j, Y, g:i a                                                                                                                                                                                                                                                                 |

### Templating Properties

| Name                                                    | Description                                                                                  | Default                            |
| ------------------------------------------------------- | -------------------------------------------------------------------------------------------- | ---------------------------------- |
| tplOuter                                                | Чанк для не-XML sitemap, внешний контейнер всего вывода. | sitemap\_html\_outer.chunk.tpl     |
| tplItem                                                 | Чанк для не-XML sitemap, каждый элемент.                                |
| Дочерние элементы оборачиваются в _tplContainer_. | sitemap\_html\_item.chunk.tpl                                                                |
| tplContainer                                            | Чанк для не-XML sitemap, обёртка дочерних ресурсов папки.  | sitemap\_html\_container.chunk.tpl |

## Chunks

### sitemap\_html\_outer.chunk.tpl

Чанк по умолчанию, внешний контейнер всего вывода sitemap.

#### Default Value

``` php
<ul id="sitemap">
    [[+items]]
</ul>
```

#### Available placeholders

| Name    | Description                       |
| ------- | --------------------------------- |
| startId | ID стартового ресурса sitemap.    |
| items   | Вся строка вывода sitemap. |

### sitemap\_html\_item.chunk.tpl

Чанк по умолчанию для каждого элемента.

#### Default Value

``` php
<li>
    <a href="[[+url]]">[[+title]]</a>
    [[+items]]
</li>
```

##### Available placeholders

| Name       | Description                                                                                                                                                                                 |
| ---------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| parent     | ID родительского ресурса.                                                                                                                                                               |
| id         | ID обрабатываемого ресурса.                                                                                                                                                     |
| url        | URL ресурса.                                                                                                                                                                    |
| lastmod    | Дата последнего изменения ресурса.                                                                                                                                                |
| title      | Заголовок ресурса. Может включать заголовки родителей, если _parentTitles_ = _true_.                                                                             |
| items      | Вывод sitemap для дочерних ресурсов. Позволяет вкладывать ресурсы, как в HTML sitemap. См. _sitemap\_html\_item.chunk.tpl_ |
| changefreq | Частота изменений по lastmod. Только для XML sitemap.                                                                          |
| priority   | Приоритет по lastmod. Только для XML sitemap.                                                                                         |

### sitemap\_html\_container.chunk.tpl

Чанк по умолчанию, обёртка дочерних ресурсов папки.

#### Default Value

``` php
<ul>
    [[+items]]
</ul>
```

#### Available placeholders

| Name  | Description                                              |
| ----- | -------------------------------------------------------- |
| depth | Текущая глубина ресурса.                                  |
| id    | Текущий ID ресурса, для которого сгенерирован вывод. |
| items | Строка вывода со списком дочерних ресурсов.        |

### sitemap\_xml\_outer.chunk.tpl

Чанк по умолчанию для XML sitemap, внешний контейнер.

#### Default Value

``` xml
<?xml version="1.0" encoding="[[++modx_charset]]"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
[[+items]]
</urlset>
```

### sitemap\_xml\_item.chunk.tpl

Чанк по умолчанию для XML sitemap, каждый элемент.

#### Default Value

``` xml
<url>
    <loc>[[+url]]</loc>
    <lastmod>[[+lastmod]]</lastmod>
    <changefreq>[[+changefreq]]</changefreq>
    <priority>[[+priority]]</priority>
</url>
[[+items]]
```
