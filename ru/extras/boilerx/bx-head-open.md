---
title: "bx-head-open"
description: "Чанк открытия head с CSS и meta-тегами boilerX"
translation: "extras/boilerx/bx-head-open"
---

## Чанк Head Open

Основная часть header: CSS, modernizr и meta-теги.

``` html
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="[[++bx.x-ua-compatible]]">
  <title>[[++site_name]] - [[*pagetitle]]</title>
  <meta name="description" content="[[++bx.meta_desc]]">
  <meta name="viewport" content="[[++bx.meta_viewport]]">

  [[++bx.show_comments:if=`[[++bx.show_comments]]`:eq=`1`:then=`
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  `]]
  <link rel="stylesheet" href="[[++bx.css_normalize_path]]">
  <link rel="stylesheet" href="[[++bx.css_path]]">
  <script src="[[++bx.modernizr_js_path]]"></script>
```

## См. также

``` php
[[getResources@section?
    &parents=`1316`
    &context=`extras`
    &limit=`0`
    &resources=`1316,[[*id]]`
]]
```
