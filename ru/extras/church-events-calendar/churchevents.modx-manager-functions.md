---
title: "Функции менеджера ChurchEvents"
description: "Календари, категории и локации в админке Church Events Calendar"
translation: "extras/church-events-calendar/churchevents.modx-manager-functions"
---

## Функции менеджера Church Events Calendar

После установки через package manager и обновления страницы в меню MODX Manager появится Components -> Calendar Administrator. Здесь управляют календарями, категориями и локациями.

![](menu-2.2.jpg)

### Calendars

Календари это фильтр для всех представлений (day/week/month/year/RSS/List/iCal). Нужен минимум один календарь. По умолчанию загружаются Events, Services и Meetings & Rehearsal.

![](calendar-admin.jpg)

### Categories

Категории это дополнительный фильтр для тех же представлений. Нужна минимум одна категория. По умолчанию: Adults, Children, Youth и General. Выберите цвет фона и шрифта кнопкой справа от полей во всплывающем окне. Используется только в чанке ChurchEvents\_CategoryHeadTpl.

![](category-color.jpg)

### Buildings/Location Types

Опция активна при системной настройке Use Locations = Yes. Нужно минимум одно здание: здание, парковка, парк, город и т.д. Rooms/Locations это дочерние записи.

### Rooms/Locations

Опция активна при Use Locations = Yes. Нужна минимум одна локация, логично связанная с родительским Building/Location Type. При создании или редактировании пройдите все вкладки, отмеченные красным ниже. Опция проверки конфликтов тоже выделена красным. При Yes каждое запрошенное или добавленное событие проверяется на пересечение с другими в этой локации перед сохранением. При No события могут накладываться.

![](location-tabs.jpg)
