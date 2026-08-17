---
title: "Назначение панели группе пользователей"
translation: "building-sites/client-proofing/dashboards/usergroups"
---

Как назначить Dashboard группе пользователей.

Найдите нужную User Group и откройте её на редактирование: **Меню → Access Controls**, ПКМ по группе в дереве, **Update User Group**.

В выпадающем списке **Dashboard** выберите панель. Все пользователи группы, у которых эта группа основная (Primary Group), будут видеть эту панель вместо Default.

![](dashboard-assign.png)

## Настраиваемые панели и группы

Если у назначенной панели включено **Customizable**, при первом входе MODX создаёт личную копию раскладки виджетов для пользователя. Он может менять, добавлять и убирать виджеты на своей копии. На других членов группы это не влияет.

Когда администратор позже меняет шаблон панели (добавляет или убирает виджеты на странице Dashboards), изменения применяются ко всем личным копиям. Как шаблон распространяется, см. [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing).

## Смотрите также

1. [Управление панелью](building-sites/client-proofing/dashboards/managing)
2. [Назначение панели группе пользователей](building-sites/client-proofing/dashboards/usergroups)
3. [Создание виджета](building-sites/client-proofing/dashboards/creating-a-widget)
4. [Типы виджетов](building-sites/client-proofing/dashboards/widget-types)
   1. [Тип File](building-sites/client-proofing/dashboards/widget-types/file)
   2. [Тип HTML](building-sites/client-proofing/dashboards/widget-types/html)
   3. [Тип Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
   4. [Тип Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
