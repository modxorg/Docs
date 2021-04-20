---
title: "debug"
translation: "building-sites/settings/debug"
description: "Управляет включением и выключением отладки в MODX и устанавливает уровень PHP отладки error_reporting"
---

-   **Имя**: Отладка   
-   **Тип**: String  
-   **По умолчанию**:   
-   **Доступен в**: Revolution 2.2.0+

Управляет включением/выключением отладки в MODX и/или устанавливает уровень PHP отладки `error_reporting`.
Возможные варианты: \'\' = использовать текущий уровень `error_reporting`, \'0\' = выключена отладка (`error_reporting = 0`), \'1\' = включена отладка (`error_reporting = -1`), или любой другой корректный уровень `error_reporting`(целое число). 

## Посмотрите также

-   PHP [error-reporting](https://www.php.net/manual/ru/function.error-reporting.php) 