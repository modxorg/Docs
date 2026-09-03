---
title: "manager_js_document_root"
description: "Removed in MODX 3.0. Formerly set DOCUMENT_ROOT for manager CSS/JS compression."
---

**Removed in MODX 3.0.** Dynamic manager JS/CSS minification and its cache settings are gone. See [System Settings changes in 3.0](getting-started/upgrading-to-3.0/system-settings).

---

**Name**: Manager JS/CSS Compression Document Root  
**Type**: String  
**Default**: (empty)  
**Available In**: Revolution 2.2.0–2.x only

On 2.x: if the server did not provide `DOCUMENT_ROOT`, set it here so manager CSS/JS compression could run.

## See also (2.x)

- PHP [`$_SERVER`](https://www.php.net/manual/en/reserved.variables.server.php)
- [manager_js_cache_file_locking](building-sites/settings/manager_js_cache_file_locking)
- [manager_js_cache_max_age](building-sites/settings/manager_js_cache_max_age)
- [manager_js_zlib_output_compression](building-sites/settings/manager_js_zlib_output_compression)
