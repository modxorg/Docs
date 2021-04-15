---
title: "modX.makeUrl"
description: "Generates a URL representing a specified resource"
---

## modX::makeUrl

Generates a URL representing a specified resource.

The scheme indicates in what format the URL is generated.

- `-1`: (default value) URL is relative to `site_url`
- `0`: see http
- `1`: see https
- `full`: URL is absolute, prepended with `site_url` from config
- `abs`: URL is absolute, prepended with `base_url` from config
- `http`: URL is absolute, forced to http scheme
- `https`: URL is absolute, forced to https scheme

## Syntax

API Doc: [modX::makeUrl()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::makeUrl())

``` php
string makeUrl (integer $id, [string $context = ''], [string|array $args = ''], [mixed $scheme = -1], [array $options = null])
```

## Examples

Make a URL for the Resource with ID 4.

``` php
$url = $modx->makeUrl(4);
```

Make a URL for the Resource with ID 12, but make sure it's in HTTPS.

``` php
$url = $modx->makeUrl(12,'','','https');
```

Make a URL to Resource with ID 56, but add a `?hello=world` to the URL.

``` php
$url = $modx->makeUrl(25, '', array('hello' => 'world'));
$url = $modx->makeUrl(25, '', 'hello=world');
```

Note that the arguments available to this function can be passed to the `[[~link]]` tags, e.g.

``` php
[[~123? &scheme=`full`]]
```
