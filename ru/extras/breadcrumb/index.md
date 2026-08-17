---
title: "BreadCrumb"
description: "Extra BreadCrumb для хлебных крошек в MODX Revolution с шаблонами и свойствами ресурсов"
translation: "extras/breadcrumb/index"
---

## Что такое BreadCrumb?

BreadCrumb это сниппет для MODX Revolution, вдохновлённый сниппетом [Breadcrumbs](extras/breadcrumbs "Breadcrumbs").

Как и оригинальный [Breadcrumbs](extras/breadcrumbs "Breadcrumbs"), этот сниппет строит навигацию «хлебные крошки» и добавляет новые возможности: свойства шаблонов и работу с конкретным ID ресурса.

### Требования

- MODX Revolution 2.0.x или новее
- PHP5 или новее

### Публичные релизы

| Version     | Date              | Author              | Product    |
| ----------- | ----------------- | ------------------- | ---------- |
| 1.4.4-pl    | October 1, 2019   | ------------------- | Revolution |
| 1.4.3-pl    | March 7, 2015     | ben\_omycode & Jako | Revolution |
| 1.4.2-pl    | August 12, 2014   | ben\_omycode        | Revolution |
| 1.4.1-pl    | August 7, 2014    | ben\_omycode        | Revolution |
| 1.4.0-pl    | August 6, 2014    | ben\_omycode        | Revolution |
| 1.3.2-beta1 | December 11, 2012 | ben\_omycode        | Revolution |
| 1.3.1-pl    | November 16, 2012 | ben\_omycode        | Revolution |
| 1.3.0-pl    | August 28, 2012   | ben\_omycode        | Revolution |
| 1.2.0-pl    | August 22, 2012   | ben\_omycode        | Revolution |
| 1.1.0-pl    | April 24, 2012    | ben\_omycode        | Revolution |
| 1.0.0-pl    | February 6, 2012  | ben\_omycode        | Revolution |
| 1.0.0-beta3 | November 19, 2011 | ben\_omycode        | Revolution |
| 1.0.0-beta2 | November 18, 2011 | ben\_omycode        | Revolution |

### Загрузка

Пакет можно установить через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачать из репозитория MODX Extras: <https://modx.com/extras/package/breadcrumb>

### Поддержка, комментарии, разработка и сообщения об ошибках

- Github: [BreadCrumb](https://github.com/JoshuaLuckers/BreadCrumb)
- Поддержка: [MODX Community](https://community.modx.com/c/support/extras)

## Использование

Сниппет BreadCrumb вызывают так:

``` php
[[BreadCrumb]]
```

### Свойства BreadCrumb

| Name                 | Description                                                                                                                                                                                                | Default             | Version     |
| -------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------- | ----------- |
| from                 | ID ресурса, с которого строятся крошки                                                                                                                                                                     | 0                   | 1.1.0-pl    |
| to                   | ID ресурса, для которого строятся крошки                                                                                                                                                                   | current resource ID | 1.1.0-pl    |
| exclude              | Список ID ресурсов через запятую, которые исключить из крошек                                                                                                                                              |                     | 1.4.0-pl    |
| maxCrumbs            | Максимум крошек в цепочке. Шаблон разделителя настраивается через maxCrumbTpl                                                                                                                              | 100                 |             |
| showHidden           | Показывать скрытые ресурсы в крошках                                                                                                                                                                       | 1                   |             |
| showContainer        | Показывать контейнеры в крошках                                                                                                                                                                            | 1                   |             |
| showUnPub            | Показывать неопубликованные ресурсы в крошках                                                                                                                                                              | 1                   |             |
| showCurrentCrumb     | Показывать текущий ресурс как крошку                                                                                                                                                                       | 1                   |             |
| showBreadCrumbAtHome | Показывать BreadCrumb на главной странице                                                                                                                                                                  | 1                   |             |
| showHomeCrumb        | Показывать главную как крошку. С версии 1.4.0-pl логика упрощена: &showHomeCrumb=1 добавляет крошку главной в начало, &showHomeCrumb=0 скрывает её, если она уже есть.                                   | 1                   |             |
| useWebLinkUrl        | Использовать URL веб-ссылки вместо URL самой веб-ссылки                                                                                                                                                    | 1                   | 1.0.0-beta3 |
| direction            | Направление крошек: слева направо (ltr) или справа налево (rtl), например для арабского                                                                                                                     | ltr                 |             |
| scheme               | Формат генерации URL. Возможные значения [по modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl"):                                                                               | modx link\_tag\_scheme setting | 1.2.0-pl |

Допустимые значения scheme:

- -1 : (по умолчанию) URL относительно site\_url
- 0 : см. http
- 1 : см. https
- full : абсолютный URL с site\_url из конфигурации
- abs : абсолютный URL с base\_url из конфигурации
- http : абсолютный URL, принудительно http
- https : абсолютный URL, принудительно https

### Свойства шаблонов

@CODE больше не поддерживается с версии 1.4.0-pl. Используйте @INLINE.

| Name             | Description                                                                                                                                | Default                                                                                                    | Version     |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------ | ---------------------------------------------------------------------------------------------------------- | ----------- |
| containerTpl     | Имя чанка с шаблоном контейнера крошек. Также путь к файлу (@FILE ) или код чанка (@INLINE ).                                               | см. [BreadCrumb.containerTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.containertpl)          |             |
| homeCrumbTpl     | Имя чанка с шаблоном крошки главной. Также путь к файлу (@FILE ) или код чанка (@INLINE ).                                                  | см. [BreadCrumb.homeCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.homecrumbtpl)          | 1.4.0-pl    |
| currentCrumbTpl  | Имя чанка с шаблоном текущей крошки. Также путь к файлу (@FILE ) или код чанка (@INLINE ).                                                 | см. [BreadCrumb.currentCrumbTpl](extras/breadcrumb/breadcrumb.currentcrumbtpl "BreadCrumb.currentCrumbTpl") |             |
| linkCrumbTpl     | Имя чанка с шаблоном обычной крошки. Также путь к файлу (@FILE ) или код чанка (@INLINE ).                                                 | см. [BreadCrumb.linkCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.linkcrumbtpl)          |             |
| categoryCrumbTpl | Имя чанка с шаблоном крошек категорий. Может быть файл (@FILE ) или код (@INLINE ).                                                        | см. [BreadCrumb.categoryCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.categorycrumbtpl)  | 1.3.2-beta1 |
| maxCrumbTpl      | Имя чанка с шаблоном разделителя при превышении maxCrumbs. Также путь к файлу (@FILE ) или код чанка (@INLINE ).                           | см. [BreadCrumb.maxCrumbTpl](extras/breadcrumb/breadcrumb.maxcrumbtpl "BreadCrumb.maxCrumbTpl")             |             |

### Примеры

Показать крошки текущего ресурса

``` php
[[BreadCrumb]]

```

Показать крошки ресурса с ID 72

``` php
[[BreadCrumb? &to=`72`]]

```

Показать крошку главной в начале цепочки

``` php
[[BreadCrumb? &showHomeCrumb=`1`]]

```

Показать крошки ресурса с ID 72, начиная с родителя уровня 2

``` php
[[BreadCrumb? &from=`[[UltimateParent? &topLevel=`2`]]` &to=`72`]]

```

Изменить направление крошек: rtl (справа налево) или ltr (слева направо)

``` php
[[BreadCrumb? &direction=`rtl`]]

```

Исключить некоторые ресурсы

``` php
[[BreadCrumb? &exclude=`23,135`]]

```

Использовать пользовательские шаблоны

``` php
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl`]]
[[BreadCrumb? &linkCrumbTpl=`@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>`]]
[[BreadCrumb? &linkCrumbTpl=`@FILE [[++assets_path]]my_link_crumb_tpl.html`]]

```

## Миграция со сниппета Breadcrumbs

BreadCrumb вдохновлён сниппетом [Breadcrumbs](extras/breadcrumbs "Breadcrumbs"). Часть свойств [Breadcrumbs](extras/breadcrumbs "Breadcrumbs") убрали, но те же задачи решаются через BreadCrumb, только иначе.

### crumbSeparator

Раньше:

``` html
[[Breadcrumbs? &crumbSeparator=`>`]]
```

Используйте CSS:

``` css
#breadcrumb li + li:before{
    content:  '>';
    margin:   0 2px;
}
```

### currentAsLink 

Раньше: 

``` html
[[Breadcrumbs? &currentAsLink=`1`]]
```

Новый вариант:

``` html
[[BreadCrumb? &currentCrumbTpl=`myCurrentCrumbTpl`]]
```

Чанк `myCurrentCrumbTpl`:

``` html
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
```


### descField 

Раньше:

``` html
[[Breadcrumbs? &descField=`longtitle`]]
```

Новый вариант: 

``` html
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` &currentCrumbTpl=`myCurrentCrumbTpl`]]
```

Чанки `myLinkCrumbTpl` и `myCurrentCrumbTpl`:

``` html
<li><a href="[[+link]]" title="[[+longtitle]]">[[+pagetitle]]</a></li>
``` 

### homeCrumbDescription 

Раньше:

``` html
[[Breadcrumbs? &homeCrumbDescription=`Home`]]
```

После:

``` html
[[BreadCrumb? &containerTpl=`myContainerTpl`]]
```

Чанк `myContainerTpl`:

``` html
<ul>
    <li><a href="[[++site_url]]">Home</a></li>
    [[+crumbs]]
</ul>
``` 

### homeCrumbTitle

Раньше:

``` html
[[Breadcrumbs? &homeCrumbTitle=`Home`]]
``` 

После:

``` html
[[BreadCrumb? &containerTpl=`myContainerTpl`]]
```

Чанк `myContainerTpl`:

``` html
<ul>
    <li><a href="[[++site_url]]" title="Home">Home</a></li>
    [[+crumbs]]
</ul>
``` 

### maxDelimiter 

Раньше:

``` php
[[Breadcrumbs? &maxDelimiter=`(...)`]]
```

После:

``` php
[[BreadCrumb? &maxCrumbTpl=`myMaxCrumbTpl`]]
```

Чанк `myMaxCrumbTpl`:

``` php
<li>(...)</li>
``` 

### titleField 

Раньше:

``` php
[[Breadcrumbs? &titleField=`menutitle`]]
``` 

После:

``` php
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` &currentCrumbTpl=`myCurrentCrumbTpl`]]
```

Чанки `myLinkCrumbTpl` и `myCurrentCrumbTpl`:

``` php
<li><a href="[[+link]]">[[+menutitle]]</a></li>
```
