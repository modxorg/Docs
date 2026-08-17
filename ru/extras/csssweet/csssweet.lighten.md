---
title: "lighten"
description: "Output Modifier для осветления и затемнения hex-цветов"
translation: "extras/csssweet/csssweet.lighten"
---

lighten: Output Modifier для hex-значения и процента (+ или -). Также можно задать опцию max или rev, с процентом или без.

Examples:

``` php
[[+color:lighten=`20`]]
```

Result: осветляет hex-цвет $input на 20%

``` php
[[+color:lighten=`-30`]]
```

Result: затемняет цвет $input на 30%

``` php
[[+color:lighten=`max`]]
```

Result: если $input выше $threshold, вернётся «ffffff», иначе «000000». $threshold задаётся в свойствах сниппета.

``` php
[[+color:lighten=`rev60`]]
```

Result: инверсия hex $input (белый или чёрный) на 60% (получится оттенок серого)
