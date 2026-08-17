---
title: "MetaX"
description: "Сниппет генерации meta-тегов и других тегов head для MODX"
translation: "extras/metax/index"
---

MetaX это простой [snippet](developing-in-modx/basic-development/snippets) для автоматизации meta-тегов. Также генерирует base, canonical, css, rss и другие теги head.

## Требования

- MODX Revolution 2.0.0 или новее
- PHP5 или новее

## История

MetaX создан в 2010 году для MODX Evolution и позже Revolution на общей кодовой базе. Затем код разделили для возможностей Revolution. Все версии выпускал Sal Sodano (<http://salscode.com>) с участием других авторов.

### Разработка

MetaX активно разрабатывается для MODX Revolution автором. Код на GitHub (<https://github.com/skytoaster/MetaX>).

## Загрузка

### MODX Revolution

Версию Revolution установите через [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте: <https://modx.com/extras/package/metax>

### Использование

MetaX 2.0 использует чанки для HTML4, HTML5 и XHTML4. Можно задать свой чанк через `&tpl`. Чанки поддерживают стандартные плейсхолдеры MODX и специфичные MetaX.

Вызов с шаблоном XHTML4 по умолчанию:

``` php
[[!MetaX]]
```

#### Properties

| Name     | Description                                                                               | Default      |
| -------- | ----------------------------------------------------------------------------------------- | ------------ |
| tpl      | Имя чанка для вывода. Перекрывает &html.  | metax-xhtml4 |
| html     | Выбор стандартного чанка. Options:  `0` (XHTML4), `1` (HTML4), `2` (HTML5)         | 0            |
| favicon  | Путь к favicon (проверка существования файла).                                    | favicon.ico  |
| mobile   | Путь к mobile thumbnail (проверка существования).                           | mobile.png   |
| copyfrom | Год начала copyright (i.e. 2003)                                             | None         |
| copytill | Год окончания copyright.                                                            | Current Year |
| rss      | Список ID документов с RSS через запятую.                               | None         |
| css      | Список URL CSS, поддержка IE conditional statements . | None         |

#### Chunk Placeholders

| Name            | Description                                                                           |
| --------------- | ------------------------------------------------------------------------------------- |
| metax.robots    | Команда robots.                                               |
| metax.canonical | Canonical URL страницы.                                               |
| metax.cache     | Команда cache.                                                |
| metax.createdby | Полное имя автора ресурса.                                      |
| metax.editedby  | Полное имя последнего редактора.                                  |
| metax.copyyears | Годы copyright динамически по текущему году.                    |
| metax.favicon   | Путь к favicon после проверки файла.                  |
| metax.mobile    | Путь к mobile icon после проверки.              |
| metax.css       | HTML для CSS после проверки каждого файла.      |
| metax.rss       | HTML для RSS после проверки каждого ресурса. |

### Свойство &css

Свойство `&css` поддерживает Internet Explorer conditional statements:

Например:

``` php
[[!MetaX? &css=`file1.css,file2.css:lte IE 7,file3.css:lt IE 7`]]
```

В примере:

- file1 первый, без IE conditional.
- file2 с lte IE 7.
- file3 с lt IE 7.

Вывод (фрагмент, управляемый &css):

``` html
<link rel="stylesheet" href="file1.css" type="text/css" />
<!--[if lte IE 7]>
<link rel="stylesheet" href="file2.css" type="text/css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="file3.css" type="text/css" />
<![endif]-->
```
