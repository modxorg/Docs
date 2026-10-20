---
title: "compress_js_groups"
translation: "building-sites/settings/compress_js_groups"
description: "Удалено в MODX 2.5.0. Менеджер больше не группирует основные JavaScript-файлы через groupsConfig."
---

**Удалено в MODX 2.5.0.** JavaScript менеджера теперь поставляется в виде готовых сгруппированных файлов; настройка не устанавливается и ни на что не влияет.

---

-   **Имя**: Использовать группировку при сжатии JavaScript файлов
-   **Тип**: Да/Нет
-   **По умолчанию**: Нет
-   **Доступен в**: только Revolution 2.2.0–2.4.x

В 2.2–2.4 настройка группировала основной JavaScript менеджера MODX через `groupsConfig` minify. Предназначалась для установок с Suhosin и другими ограничениями на размер запроса.

## Посмотрите также

-   [Suhosin](https://suhosin.org/)
-   [Minify](https://github.com/mrclay/minify)
