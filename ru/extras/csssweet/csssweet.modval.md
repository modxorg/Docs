---
title: "modval"
description: "Output Modifier для арифметики над CSS-значениями с сохранением единиц измерения"
translation: "extras/csssweet/csssweet.modval"
---

modval: Output Modifier, который принимает числовое значение и изменяет его, как встроенные модификаторы add, subtract, multiply и divide. modval дополнительно удаляет нечисловые символы, выполняет операцию и возвращает их обратно.

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

Note: modval пока не поддерживает сложные комбинации единиц вроде «8lbs 4 oz». Модификатор рассчитан на простые пары значение/единица CSS. Строка вроде «rgba('255','255','255',.75)» тоже не обрабатывается.
