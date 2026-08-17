---
title: "currentCrumbTpl"
description: "Шаблон currentCrumbTpl для текущей крошки в сниппете BreadCrumb"
translation: "extras/breadcrumb/breadcrumb.currentcrumbtpl"
---

## Чанк currentCrumbTpl в BreadCrumb

Это шаблон для свойства &currentCrumbTpl сниппета [BreadCrumb](extras/breadcrumb "BreadCrumb"). Используется для текущей крошки.

## Значение по умолчанию

С версии BreadCrumb 1.3.0 currentCrumbTpl это не отдельный чанк, а свойство сниппета.
Свойства шаблонов могут быть именем чанка, путём к файлу (@FILE:) или кодом чанка (@CODE:)

``` php
<li>[[+pagetitle]]</li>
```

## Доступные плейсхолдеры

| Name                                             | Description                                                                            |
| ------------------------------------------------ | -------------------------------------------------------------------------------------- |
| link                                             | Ссылка на ресурс крошки.                                                               |
| position                                         | Порядковый номер элемента (для [BreadcrumbList](https://schema.org/BreadcrumbList).     |
| useWebLinkUrl                                    | При _&useWebLinkUrl=`1`_ ссылка ведёт на связанный ресурс и                          |
| id pagetitle longtitle description menutitle ... | Все свойства ресурса доступны в соответствующих плейсхолдерах.                         |

## Примеры

По умолчанию текущая крошка не является ссылкой, но это легко изменить. Замените шаблон на:

``` php
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
```
