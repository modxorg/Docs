---
title: "manager_tooltip_delay"
translation: "building-sites/settings/manager_tooltip_delay"
description: "Миллисекунды до скрытия подсказки поля в системе управления"
---

-   **Имя**: Время задержки для подсказок в системе управления
-   **Тип**: Число
-   **По умолчанию**: 2300
-   **Доступен в**: Revolution 3.0+

Через столько миллисекунд скрывается включённая подсказка поля. Система управления передаёт это значение в ExtJS QuickTips как `dismissDelay`.

Не действует, если [manager_tooltip_enable](building-sites/settings/manager_tooltip_enable) равен Нет.
