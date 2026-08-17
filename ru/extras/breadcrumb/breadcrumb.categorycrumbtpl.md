---
title: "categoryCrumbTpl"
description: "Шаблон categoryCrumbTpl для крошек категорий в сниппете BreadCrumb"
translation: "extras/breadcrumb/breadcrumb.categorycrumbtpl"
---

## Чанк categoryCrumbTpl в BreadCrumb

Это шаблон для свойства &categoryCrumbTpl сниппета [BreadCrumb](http://rtfm.modx.com/extras/revo/breadcrumb). Используется для крошки (кроме текущей), когда ресурс является «категорией».

Ресурс считается «категорией», если это папка без шаблона или с атрибутом ссылки _rel="category"_.

## Значение по умолчанию

Свойства шаблонов могут быть именем чанка, путём к файлу (@FILE ) или кодом чанка (@INLINE )

``` php
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
```

## Доступные плейсхолдеры

| Name                                             | Description                                                                            |
| ------------------------------------------------ | -------------------------------------------------------------------------------------- |
| link                                             | Ссылка на ресурс крошки.                                                               |
| position                                         | Порядковый номер элемента (для [BreadcrumbList](https://schema.org/BreadcrumbList).     |
| useWebLinkUrl                                    | При _&useWebLinkUrl=`1`_ ссылка ведёт на связанный ресурс и                          |
| id pagetitle longtitle description menutitle ... | Все свойства ресурса доступны в соответствующих плейсхолдерах.                         |
