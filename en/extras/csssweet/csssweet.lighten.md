---
title: "lighten"
_old_id: "1673"
_old_uri: "revo/csssweet/csssweet.lighten"
---

 lighten is an Output Modifier that accepts a hex value and percentage (+ or -) option. Additionally, 'max' or 'rev' can be set as an option, with or without a percentage.

 Examples:

``` php
[[+color:lighten=`20`]]
```

 Result: lightens the $input hex color by 20%

``` php
[[+color:lighten=`-30`]]
```

 Result: darkens the $input color by 30%

``` php
[[+color:lighten=`max`]]
```

 Result: if the $input value is above the $threshold value, 'ffffff' will be returned, else '000000' will be returned. The $threshold value can be defined in the Snippet properties.

``` php
[[+color:lighten=`rev60`]]
```

 Result: this would output the reverse of the $input hex (white or black) at 60% (so it'd be more of a medium grey in this case)