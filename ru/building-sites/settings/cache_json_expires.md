---
title: "cache_json_expires"
translation: "building-sites/settings/cache_json_expires"
description: "Удалено в MODX 2.1.0. Время жизни кэша теперь задаётся для каждого раздела отдельно."
---

**Удалено в MODX 2.1.0.** Время жизни кэша теперь настраивается для каждого раздела отдельно, например через [`cache_resource_expires`](building-sites/settings/cache_resource_expires) или [`cache_db_expires`](building-sites/settings/cache_db_expires).

---

-   **Имя**: Время истечения срока действия JSON Cache
-   **Тип**: Number
-   **По умолчанию**: 0
-   **Доступен в**: только Revolution 2.0.x

В 2.0.x задавало время жизни кэша в формате JSON в секундах. Значение 0 означало, что кэш не истекает.
