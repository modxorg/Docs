---
title: "static_elements_html_extension"
translation: "building-sites/settings/static_elements_html_extension"
description: "Расширение файлов статических шаблонов, чанков и TV."
---

-   **Имя**: Расширение HTML-файлов статических элементов
-   **Тип**: String
-   **По умолчанию**: `.tpl`

Расширение, которое добавляется к имени файла статических элементов с HTML-содержимым. Менеджер строит имена как `<имя>.template<расширение>`, `<имя>.chunk<расширение>` и `<имя>.tv<расширение>`, поэтому по умолчанию получаются файлы вроде `my-chunk.chunk.tpl`.

Сниппеты и плагины всегда используют `.php` независимо от этой настройки. Значение читается в `manager/assets/modext/core/modx.js`.

См. также: [`static_elements_basepath`](building-sites/settings/static_elements_basepath).
