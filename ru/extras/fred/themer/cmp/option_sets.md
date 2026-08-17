---
title: "Option Sets"
description: "Создание Option Set в Manager: Name, Complete, Data"
translation: "extras/fred/themer/cmp/option_sets"
---

[Option Sets](extras/fred/themer/options) задают общие конфигурации и часто используемые sub-configs, например палитры цветов или списки шрифтов, для нескольких Elements.

![Option Sets Grid](img/option_sets_grid.png)

## Создание Option Set

Свойства Option Set:

-   **Name** - обязательно, уникально
-   **Description** - необязательно
-   **Complete** - флаг Yes/No, при Yes Option Set появляется в select при создании или обновлении Element. No удобно для partial Option Sets только для импорта.
-   **Data** - JSON с [options Element](extras/fred/themer/options)

![Option Sets Edit Panel](img/option_sets_edit_panel.png)
