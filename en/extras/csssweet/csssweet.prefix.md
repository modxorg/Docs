---
title: "prefix"
_old_id: "1675"
_old_uri: "revo/csssweet/csssweet.prefix"
---

 Output modifier that adds basic browser prefixes to $input strings

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