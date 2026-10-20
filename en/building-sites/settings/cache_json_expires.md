---
title: "cache_json_expires"
description: "Removed in MODX 2.1.0. Cache lifetimes are now configured per cache partition."
_old_id: "45"
_old_uri: "2.x/administering-your-site/settings/system-settings/cache_json_expires"
---

**Removed in MODX 2.1.0.** Cache lifetimes are now configured per cache partition, for example with [`cache_resource_expires`](building-sites/settings/cache_resource_expires) or [`cache_db_expires`](building-sites/settings/cache_db_expires).

---

**Name**: Expiration Time for JSON Cache
**Type**: Number
**Default**: 0
**Available In**: Revolution 2.0.x only

On 2.0.x, this was the lifetime in seconds of JSON-formatted cache entries. A value of zero meant the cache never expired.
