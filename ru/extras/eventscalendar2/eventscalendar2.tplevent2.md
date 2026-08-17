---
title: "tplEvent2"
description: "Чанк одного события в дне календаря eventsCalendar2"
translation: "extras/eventscalendar2/eventscalendar2.tplevent2"
---

## Использование

Шаблон одного события в дне.

``` html
<div>
    <span class="num"><b>[[+ec.num]].</b></span>
    <span class="eventdate">[[+ec.date]]</span>
    <span class="link"><a href="[[+ec.url]]">[[+ec.longtitle:default=`[[+ec.pagetitle]]`]]</a></span>
    <span class="notice">[[+ec.introtext]]</span>
</div>
```

## Плейсхолдеры

| Имя | Описание                     |
| ---- | ------------------------------- |
| num  | Номер события в дне.         |
| url  | Ссылка на ресурс события. |
| date | Дата события.                  |

Доступны все плейсхолдеры ресурсов MODX. См. [там](building-sites/resources).

При выводе из произвольного источня (&events=``) все поля массива событий становятся плейсхолдерами.

## См. также

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
