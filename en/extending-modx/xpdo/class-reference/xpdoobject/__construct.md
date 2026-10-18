---
title: "__construct"
_old_id: "1873"
_old_uri: "2.x/class-reference/xpdoobject/__construct"
---

## xPDOObject::__construct

Initialises the object. The constructor is intended to be called by xPDO when hydrating objects, not directly by application code. Derived classes must call `parent::__construct($xpdo)`.

During construction the object's related-object containers are initialised according to the cardinality of its aggregate and composite relationships.

## Syntax

``` php
__construct (xPDO &$xpdo)
```

## Example

``` php
class MyObject extends \xPDO\Om\xPDOObject
{
    public function __construct(xPDO &$xpdo)
    {
        parent::__construct($xpdo);
    }
}
```

## See Also

- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")