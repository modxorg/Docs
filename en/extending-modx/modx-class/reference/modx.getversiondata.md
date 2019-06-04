---
title: "modX.getVersionData"
_old_id: "1079"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getversiondata"
---

## modX::getVersionData

Gets the modX core version data. The array contains the following keys (examples for version "MODX Revolution 2.0.0-beta-3"):

- **version** - The current version number, eg: 2
- **major\_version** - The current major version number, eg: 0
- **minor\_version** - The current minor version number, eg: 0
- **patch\_level** - The current release level, eg: 'beta-3'
- **code\_name** - The code name for the product, eg: 'Revolution'
- **full\_version** - A compiled full version name, eg: '2.0.0-beta-3'
- **full\_appname** - The entire version name, eg: 'MODX Revolution 2.0.0-beta-3'

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getVersionData()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getVersionData())

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