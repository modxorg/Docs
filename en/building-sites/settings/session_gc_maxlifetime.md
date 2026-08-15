---
title: "session_gc_maxlifetime"
description: "Max age of database sessions before modSessionHandler garbage collection deletes them"
---

**Name**: Session Garbage Collector Max Lifetime  
**Type**: String  
**Default**: 604800  
**Available In**: Revolution 2.1.1+

Age in seconds after which [`modSessionHandler`](building-sites/settings/session_handler_class) may delete a session row during PHP session garbage collection. Default `604800` is seven days. MODX also applies this value to the PHP `session.gc_maxlifetime` ini setting when it starts the session.

GC only runs when PHP’s `session.gc_probability` / `session.gc_divisor` allow it. On many Debian/Ubuntu hosts probability is `0`, so this setting never takes effect until you fix the server or add a cron. See [Session Garbage Collection](getting-started/maintenance/session-garbage-collection).
