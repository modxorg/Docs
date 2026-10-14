---
title: "modX.getVersionData"
description: "Gets the modX core version data."
_old_id: "1079"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getversiondata"
---

## modX::getVersionData

Gets the modX core version data. The array contains the following keys (examples for version "MODX Revolution 3.3.0-dev"):


| Key | Example | Meaning |
|---|---|---|
| `version` | `'3'` | The current version number |
| `major_version` | `'3'` | The current major version number |
| `minor_version` | `'0'` | The current minor version number |
| `patch_level` | `'dev'` | The current release level |
| `code_name` | `'Revolution'` | The code name for the product |
| `distro` | `'@git@'` | The distribution marker of the build; for a released package this is the distribution name |
| `full_version` | `'3.3.0-dev'` | A compiled full version name |
| `full_appname` | `'MODX Revolution 3.3.0-dev (git)'` | The entire version name |

## Syntax

``` php
array getVersionData ()
```

## Example

Print out the current full version:

``` php
$vers = $modx->getVersionData();
echo $vers['full_version'];
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
