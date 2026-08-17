---
title: "homeCrumbTpl"
description: "Шаблон homeCrumbTpl для крошки главной страницы в сниппете BreadCrumb"
translation: "extras/breadcrumb/breadcrumb.homecrumbtpl"
---

## Чанк homeCrumbTpl в BreadCrumb

Это шаблон для свойства &homeCrumbTpl сниппета [BreadCrumb](http://rtfm.modx.com/extras/revo/breadcrumb). Используется для крошки главной страницы.

## Значение по умолчанию

С версии BreadCrumb 1.3.0 homeCrumbTpl это не отдельный чанк, а свойство сниппета.

Свойства шаблонов могут быть именем чанка, путём к файлу (@FILE) или кодом чанка (@INLINE )

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
