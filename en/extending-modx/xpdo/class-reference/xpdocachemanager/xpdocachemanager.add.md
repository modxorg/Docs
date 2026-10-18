---
title: "xPDOCacheManager.add"
_old_id: "1917"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.add"
---

## xPDOCacheManager::add

Adds a value to the cache only when no entry already exists under the key. Use this instead of [set()](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "xPDOCacheManager.set") when you want to avoid overwriting an existing entry.

> [!NOTE]
> The `$var` parameter is passed by reference.

## Syntax

``` php
boolean add (string $key, mixed &$var, [integer $lifetime = 0], [array $options = array()])
```

## Example

``` php
$value = 'first write';
$cacheManager->add('mykey', $value);
```

## See Also

- [set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "set")
- [replace](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.replace "replace")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")