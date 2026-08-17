---
title: "tplHead2"
description: "Чанк заголовка календаря eventsCalendar2"
translation: "extras/eventscalendar2/eventscalendar2.tplhead2"
---

- [Использование](#использование)
- [Плейсхолдеры](#плейсхолдеры)
- [См. также](#см-также)

## Использование

Чанк заголовка календаря.

``` html
<tr>
    <td class="[[+ec.class_prev]]"><a href="[[+ec.link_prev]]">&larr;</a></td>
    <td class="[[+ec.class_month]]" colspan="5" style="text-align:center;"><strong>[[+ec.month_name]] [[+ec.year]]</strong></td>
    <td class="[[+ec.class_next]]"><a href="[[+ec.link_next]]">&rarr;</a></td>
</tr>
```

## Плейсхолдеры

| Имя         | Описание                              |
| ------------ | ---------------------------------------- |
| link\_prev   | Ссылка на предыдущий месяц                       |
| link\_next   | Ссылка на следующий месяц                   |
| class\_prev  | CSS-класс кнопки предыдущего месяца. |
| class\_next  | CSS-класс кнопки следующего месяца.     |
| class\_month | CSS-класс месяца и года.        |
| month\_name  | Название текущего месяца/               |
| month\_prev  | Название предыдущего месяца.              |
| month\_next  | Название следующего месяца.                  |
| year         | Текущий год.                            |

## См. также

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
