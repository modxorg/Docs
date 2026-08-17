---
title: "linkCrumbTpl"
description: "Шаблон linkCrumbTpl для ссылочных крошек в сниппете BreadCrumb"
translation: "extras/breadcrumb/breadcrumb.linkcrumbtpl"
---

## Чанк linkCrumbTpl в BreadCrumb

Это шаблон для свойства &linkCrumbTpl сниппета [BreadCrumb](extras/breadcrumb "BreadCrumb"). Используется для крошки (кроме текущей).

## Значение по умолчанию

С версии BreadCrumb 1.3.0 linkCrumbTpl это не отдельный чанк, а свойство сниппета.
Свойства шаблонов могут быть именем чанка, путём к файлу (@FILE:) или кодом чанка (@CODE:)

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
