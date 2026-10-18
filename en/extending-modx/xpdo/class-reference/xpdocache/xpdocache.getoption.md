---
title: "xPDOCache.getOption"
_old_id: "1923"
_old_uri: "2.x/class-reference/xpdocache/xpdocache.getoption"
---

## xPDOCache::getOption

Gets an option value for the cache provider, falling back to a default. Provider options include `cache_ext` and `removeIfEmpty` for file-based providers.

## Syntax

``` php
mixed getOption (string $key, [array $options = array()], [mixed $default = null])
```

## Example

``` php
$ext = $provider->getOption('cache_ext', $options, '.cache.php');
```

## See Also

- [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")