---
title: "setOption"
description: "Sets an option value for this instance of an xPDOObject."
_old_id: "1210"
_old_uri: "2.x/class-reference/xpdoobject/configuration-accessors/setoption"
---

## xPDOObject::setOption()

Sets an option value for this instance of an `xPDOObject`.

## Syntax

``` php
void setOption(
    string $key,
    mixed $value
)
```

## Example

``` php
$object->setOption(xPDO::OPT_HYDRATE_FIELDS,true);
```

Using **setOption** does not permanently update an option as xPDO options are not persisted, but loaded on each request.
