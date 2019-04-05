---
title: "modval"
_old_id: "1674"
_old_uri: "revo/csssweet/csssweet.modval"
---

 modval is an Output Modifier that accepts a numeric value and modifies it, like the built-in Output Modifers 'add', 'subtract', 'multiply' and 'divide'. However modval adds one more detail in that it removes any characters that aren't numeric, then adds them back in after the value is modified.

 Examples:

``` php
[[modval?input=`4px`&options=`*3`]]
```

 Results: '12px'

``` php
[[+line_height:modval=`/2`]]
```

 Where the value of the placeholder is '1.8em'

 Results: '.9em'

 Note: modval currently doesn't support complex unit combinations like '8lbs 4 oz.' It's really meant for simple CSS unit/value pairs. 'rgba('255','255','255',.75)' is another example of a string that modval canNOT process.