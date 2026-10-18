---
title: "xPDOCacheManager.generateObject"
_old_id: "1916"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.generateobject"
---

## xPDOCacheManager::generateObject

Generates a cache file for an object, optionally including its object variables and related objects. Used by the cache providers to serialise an object before writing it.

## Syntax

``` php
mixed generateObject (object $obj, string $objName, [boolean $generateObjVars = false], [boolean $generateRelated = false], [string $objRef = 'this->xpdo'], [integer $format = xPDO\Cache\xPDOCacheManager::CACHE_PHP])
```

## Example

``` php
$cacheManager->generateObject($resource, 'resource');
```

## See Also

- [set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "set")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")