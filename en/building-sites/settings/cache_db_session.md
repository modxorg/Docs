---
title: "cache_db_session"
_old_id: "39"
_old_uri: "2.x/administering-your-site/settings/system-settings/cache_db_session"
---

## cache\_db\_session

**Name**: Enable Database Session Cache
**Type**: Yes/No
**Default**: No

When enabled, and [cache\_db](building-sites/settings/cache_db "cache_db") is enabled, database sessions will be cached in the database result-set cache. This means data written to the **$\_SESSION** (e.g. by plugins or snippets) will get cached.

**Warning!**
If you visit a 3rd party site (e.g. while making an online payment), and it redirects back to your site without the same page headers (i.e. without the session ID), then this could cause MODX to regenerate a session ID and you could thus lose access to your session data.

## See Also

- \[cache\_db\_session\_lifetime\]
- [cache\_db](building-sites/settings/cache_db "cache_db")