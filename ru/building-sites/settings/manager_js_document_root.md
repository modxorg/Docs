---
title: "manager_js_document_root"
translation: "building-sites/settings/manager_js_document_root"
description: "Удалено в MODX 3.0. Раньше задавало DOCUMENT_ROOT для сжатия CSS/JS менеджера."
---

**Удалено в MODX 3.0.** Динамическая минификация JS/CSS менеджера и связанные настройки кеша больше не существуют. См. [Изменения системных настроек в 3.0](getting-started/upgrading-to-3.0/system-settings).

---

**Имя**: Document Root для сжатия JS/CSS менеджера  
**Тип**: String  
**По умолчанию**: (пусто)  
**Доступен в**: только Revolution 2.2.0–2.x

В 2.x: если сервер не отдавал `DOCUMENT_ROOT`, его задавали здесь, чтобы сжатие CSS/JS менеджера работало.

## См. также (2.x)

- PHP [`$_SERVER`](https://www.php.net/manual/ru/reserved.variables.server.php)
- [manager_js_cache_file_locking](building-sites/settings/manager_js_cache_file_locking)
- [manager_js_cache_max_age](building-sites/settings/manager_js_cache_max_age)
- [manager_js_zlib_output_compression](building-sites/settings/manager_js_zlib_output_compression)
