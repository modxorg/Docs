---
title: "bx-container-open"
description: "Чанк открытия body и Chrome Frame boilerX"
translation: "extras/boilerx/bx-container-open"
---

## Чанк Container Open

Открывает тег body и выводит предупреждение Chrome Frame для неподдерживаемых браузеров.

``` php
[[++bx.show_comments:if=`[[++bx.show_comments]]`:eq=`1`:then=`
<!-- Use these body classes to target any combination of specific templates, ids, children, and class_keys -->
`]]

<body class="t-[[*template]] id-[[*id]] p-[[*parent]] ck-[[*class_key]]">
<!--[if lt IE [[++bx.chrome_frame_version:add=`1`]]]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
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
