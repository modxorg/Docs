---
title: "containerTpl"
description: "Шаблон containerTpl для контейнера хлебных крошек в сниппете BreadCrumb"
translation: "extras/breadcrumb/breadcrumb.containertpl"
---

## containerTpl в BreadCrumb

Это шаблон для свойства &containerTpl сниппета [BreadCrumb](extras/breadcrumb "BreadCrumb"). Содержит список крошек.

## Значение по умолчанию

С версии BreadCrumb 1.3.0 containerTpl это не отдельный чанк, а свойство сниппета.
Свойства шаблонов могут быть именем чанка, путём к файлу (@FILE:) или кодом чанка (@CODE:)

``` php
@CODE:
<ul id="breadcrumb" itemprop="breadcrumb">
    <li><a href="[[++site_url]]">[[++site_name]]</a></li>
    [[+crumbs]]
</ul>
```

## Доступные плейсхолдеры

| Name   | Description        |
| ------ | ------------------ |
| crumbs | Список крошек |
