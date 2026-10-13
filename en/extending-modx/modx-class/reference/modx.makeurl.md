---
title: "modX.makeUrl"
description: "Generates a URL representing a specified resource"
---

## modX::makeUrl

Generates a URL representing a specified resource.

## Syntax

``` php
string makeUrl (integer $id, [string $context = ''], [string|array $args = ''], [mixed $scheme = -1], [array $options = array()])
```

- `$id` _(integer)_ The id of a resource. **required**
- `$context` _(string)_ Specifies a context to limit URL generation to.
- `$args` _(string|array)_ A query string to append to the generated URL.
- `$scheme` _(mixed)_ The scheme indicates in what format the URL is generated — an integer constant or a string:
    - `-1`: (default value) URL is relative to `site_url`
    - `0`: see http
    - `1`: see https
    - `full`: URL is absolute, prepended with `site_url` from config
    - `abs` or `absolute`: URL is absolute, prepended with `base_url` from config
    - `http`: URL is absolute, forced to http scheme
    - `https`: URL is absolute, forced to https scheme
- `$options` _(array)_ An array of options for generating the Resource URL.


## Examples

Make a URL for Resource with ID 4.

``` php
$url = $modx->makeUrl(4);
```

Make a URL for Resource with ID 12 with an explicit HTTPS scheme.

``` php
$url = $modx->makeUrl(12, '', '', 'https', array('xhtml_urls' => false));
```

Make a URL for Resource with ID 25, but add a `?hello=world` to the URL.

``` php
$url = $modx->makeUrl(25, '', array('hello' => 'world'));
$url = $modx->makeUrl(25, '', 'hello=world');
```

The same arguments can be passed to the `[[~link]]` tags:

``` php
[[~123? &scheme=`full`]]
```

## See Also

- [site_start](building-sites/settings/site_start)
