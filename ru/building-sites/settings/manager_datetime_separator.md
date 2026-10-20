---
title: "manager_datetime_separator"
translation: "building-sites/settings/manager_datetime_separator"
description: "Символы между датой и временем, когда они выводятся вместе."
---

-   **Имя**: Разделитель даты и времени
-   **Тип**: String
-   **По умолчанию**: `, ` (запятая и пробел)

Когда дата и время выводятся вместе, между ними вставляются эти символы. Итоговый формат: `manager_date_format` + разделитель + `manager_time_format`.

Настройка используется в `modManagerDateFormatter::formatDateTime()` и в выводе дат в менеджере (например, в сетке планирования публикации ресурса).

См. также: [`manager_date_format`](building-sites/settings/manager_date_format), [`manager_time_format`](building-sites/settings/manager_time_format).
