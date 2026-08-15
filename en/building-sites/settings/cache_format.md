---
title: "cache_format"
_old_id: "42"
_old_uri: "2.x/administering-your-site/settings/system-settings/cache_format"
description: "Cache serialization format. Override only via config_options. Removed from the manager UI in Revolution 3.3.0."
---

**Name**: Caching Format to Use
**Type**: Number
**Default**: 0
**Available In**: Revolution 2.1+
**Removed from manager UI**: Revolution 3.3.0

Values:

- `0`: PHP arrays
- `1`: JSON
- `2`: PHP serialized data

---

**IMPORTANT**: Do not change this value in System Settings. If you edit it in the manager, MODX writes new-format cache while old-format files still sit on disk. The site and the manager then fail to boot.

From Revolution 3.3.0 the setting no longer appears in the manager. To override the default, set it in `$config_options` in `core/config/config.inc.php`, then empty the `core/cache/` directory:

```php
$config_options = [
    'cache_format' => 0, // 0 = PHP, 1 = JSON, 2 = serialize
];
```

See also: [Using Memcache](extending-modx/caching/memcache) for another `$config_options` example.
