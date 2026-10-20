---
title: "cache_format"
_old_id: "42"
_old_uri: "2.x/administering-your-site/settings/system-settings/cache_format"
description: "Cache serialization format. Change it only through config_options."
---

**Name**: Caching Format to Use
**Type**: Number
**Default**: 0
**Available In**: Revolution 2.1+

Values:

- `0`: PHP arrays
- `1`: JSON
- `2`: PHP serialized data

---

**IMPORTANT**: Do not change this value in System Settings. If you edit it in the manager, MODX writes cache in the new format while old-format files still sit on disk. The site and the manager can then fail to boot.

To override the default, set it in `$config_options` in `core/config/config.inc.php`, then empty the `core/cache/` directory:

```php
$config_options = [
    'cache_format' => 0, // 0 = PHP, 1 = JSON, 2 = serialize
];
```

See also: [Using Memcache](extending-modx/caching/memcache) for another `$config_options` example.
