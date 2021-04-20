---
title: "xPDO.getOption"
_old_id: "1247"
_old_uri: "2.x/class-reference/xpdo/xpdo.getoption"
---

## xPDO::getOption

Get an xPDO configuration option value by key.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getOption()>

``` php
mixed getOption (string $key [, array|null $options [, mixed $default [, boolean $skipEmpty]]] )
```

$key: the key of the setting or option to load.

$options: the source of the setting or option. Either null (which attempts to find the key in the main configuration) or an array of options.

$default: the value to return when the key was not found.

$skipEmpty: when set to true, the $default will also be returned if the $key's value is an empty string. Added in xPDO 2.2.1 / MODX 2.2.0-rc2.

## Examples

Get the table prefix:

``` php
$tablePrefix = $xpdo->getOption(xPDO::OPT_TABLE_PREFIX);
```

Get an option from a user-specified array, and if not set, check for it in $xpdo->config. If it's not set there, return false as its default value:

``` php
$mySetting = $xpdo->getOption('my_setting',$myConfig,false);
```

## See Also

- [xPDO.setOption](extending-modx/xpdo/class-reference/xpdo/xpdo.setoption "xPDO.setOption")
- [xPDO](extending-modx/xpdo "xPDO")
