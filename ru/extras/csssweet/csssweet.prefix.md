---
title: "prefix"
description: "Output Modifier для базовых vendor-префиксов в CSS"
translation: "extras/csssweet/csssweet.prefix"
---

Output modifier, который добавляет базовые браузерные префиксы к строкам $input

Examples:

``` php
[[+my_radius_css:prefix]]
```

Where the value of the placeholder is 'border-radius: 3px;'

Results:

``` css
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
```

``` php
[[prefix?to=`transition: all 300ms ease;` &options=`all`]]
```

Results:

``` css
-webkit-transition: all 300ms ease;
-moz-transition: all 300ms ease;
-ms-transition: all 300ms ease;
-o-transition: all 300ms ease;
transition: all 300ms ease;
```
