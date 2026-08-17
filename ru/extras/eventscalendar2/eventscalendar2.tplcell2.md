---
title: "tplCell2"
description: "Чанк ячейки таблицы календаря eventsCalendar2"
translation: "extras/eventscalendar2/eventscalendar2.tplcell2"
---

## Использование

Чанк ячейки таблицы календаря.

``` php
<td id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]"><td class="cell [[+ec.class]]" id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]">
    <div class="[[+ec.class_date]]">[[+ec.day]]</div>
    <div class="[[+ec.class_event]]">[[+ec.events]]</div>
</td>
```

## Плейсхолдеры

| Имя            | Описание                                 |
| --------------- | ------------------------------------------- |
| class\_dow      | CSS-класс дня недели.              |
| class\_month    | CSS-класс месяца и года.           |
| class\_workday  | CSS-класс рабочего дня.                  |
| class\_weekend  | CSS-класс выходного.                  |
| class\_today    | CSS-класс сегодняшнего дня.                    |
| class\_event    | CSS-класс div с событием. |
| class\_isevent  | CSS-класс ячейки с событием.          |
| class\_noevent  | CSS-класс ячейки без события.       |
| class\_date     | CSS-класс даты события.            |
| class\_emptyday | CSS-класс пустого дня без даты.  |
| class\_prev     | CSS-класс кнопки предыдущего месяца.    |
| class\_next     | CSS-класс кнопки следующего месяца.        |
| day\_total      | Число событий в дне.                    |

## См. также

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
