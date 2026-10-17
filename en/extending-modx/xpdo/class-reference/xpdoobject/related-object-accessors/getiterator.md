---
title: "getIterator"
_old_id: "1867"
_old_uri: "2.x/class-reference/xpdoobject/related-object-accessors/getiterator"
---

## xPDOObject::getIterator

Returns an `xPDO\xPDOIterator` over the objects related to this one through the given relation alias. This is the memory-efficient way to walk a large related set, because only one object is loaded at a time.

## Syntax

``` php
xPDO\xPDOIterator|false getIterator (string $alias, [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

## Example

``` php
$wheels = $box->getIterator('Wheels');
foreach ($wheels as $wheel) {
    echo $wheel->get('position');
}
```

## See Also

- [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
- [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")