---
title: "getOption"
description: "Get an option value for this instance of an xPDOObject, using xPDO options if no instance specific option exists."
_old_id: "1177"
_old_uri: "2.x/class-reference/xpdoobject/configuration-accessors/getoption"
---

## xPDOObject::getOption()

Get an option value for this instance of an xPDOObject, using xPDO options if no instance specific option exists.

## Syntax

``` php
mixed getOption (string $key [, array|null $options [, mixed $default]] )
```

- `$key`: the key of the setting or option to load.
- `$options`: the source of the setting or option. Either null (which attempts to find the key in the main configuration) or an array of options.
- `$default`: the value to return when the key was not found.


## Examples

### Simple Option Retrieval

Gets the config setting for xPDO::OPT\_HYDRATE\_FIELDS.

``` php
$hydrateFields = $object->getOption(xPDO::OPT_HYDRATE_FIELDS);
```

Gets the config option for 'test', and if not set, returns '123'.

``` php
$test = $object->getOption('test',null,'123');
```

Checks the $props array for the key 'depth', and if doesn't exist, then checks the object's config, and if still doesn't exist, then sets to 10.

``` php
$props = array();
$depth = $object->getOption('depth',$props,10);
echo $depth; // prints 10

$object->setOption('depth',20);
$depth = $object->getOption('depth',$props,10);
echo $depth; // prints 20

$props['depth'] = 30;
$depth = $object->getOption('depth',$props,10);
echo $depth; // prints 30
```
