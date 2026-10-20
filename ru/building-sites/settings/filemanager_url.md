---
title: "filemanager_url"
translation: "building-sites/settings/filemanager_url"
description: "Удалено в MODX 3.0. Используйте источники медиа."
---

**Удалено в MODX 3.0.** Файловый менеджер настраивается через [источники медиа](building-sites/media-sources).

---

-   **Имя**: URL файлового менеджера
-   **Тип**: String
-   **По умолчанию**:
-   **Доступен в**: только Revolution 2.0.6–2.x

В 2.x использовалась вместе с [filemanager_path](building-sites/settings/filemanager_path): задавала URL, по которому доступен каталог файлового менеджера. Это было нужно, если каталог находился вне корня сайта или был отображён на другой URL. При указании абсолютного URL требовалось выставить [filemanager_url_relative](building-sites/settings/filemanager_url_relative) в «Нет».
