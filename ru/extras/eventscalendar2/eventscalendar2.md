---
title: "eventsCalendar2"
description: "Сниппет календаря событий: свойства и примеры вызова"
translation: "extras/eventscalendar2/eventscalendar2"
---

## Использование

Выводит календарь с событиями, дочерними ресурсами текущей страницы.

``` php
[[!eventsCalendar2]]
```

События из ресурсов 5 и 11. Дата в TV «date\_of\_event».

``` php
[[!eventsCalendar2
  &parents=`4,11`
  &dateSource=`date_of_event`
]]
```

[Произвольные события](extras/eventscalendar2/eventscalendar2.generating-events "eventsCalendar2.Generating events"), не привязанные к ресурсам.

``` php
[[!eventsCalendar2
  &events=`[{"id": "1","date": "2012-01-01 00:00:00","pagetitle": "Test page"},{"id": "2","date": "2012-01-02 12:05:00","pagetitle": "Test page 2"}]`
]]
```

Сниппет всегда вызывайте некешированным.

## Доступные свойства

| Имя                                                                                                                             | Описание                                                                                                                                                                            | Значение по умолчанию    |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
| parents                                                                                                                          | ID контейнеров через запятую.                                                                                                                              | current resource |
| events                                                                                                                           | JSON-массив событий. Перекрывает остальные настройки. Произвольный источник. В каждом событии обязателен date в формате «Ymd H:i:s». | none             |
| month                                                                                                                            | Месяц для отображения.                                                                                                                                                             | date('m')        |
| year                                                                                                                             | Год для отображения.                                                                                                                                                              | date('Y')        |
| dateSource                                                                                                                       | Поле с датой события. Может быть TV.                                                                                                                                      | createdon        |
| dateFormat                                                                                                                       | Формат даты. Используется [strftime()](http://docs.php.net/manual/en/function.strftime.php).                                                                                                   | %d %b %Y %H:%M   |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| hideContainers                                                                                                                   | Скрыть контейнеры?                                                                                                                                                                       | 0                |
| showHidden                                                                                                                       | Показывать скрытые в меню ресурсы?                                                                                                                                                         | 1                |
| includeContent                                                                                                                   | Включать поле content? Отключение может ускорить вывод.                                                                                                                              | 1                |
| includeTVs                                                                                                                       | Включать TV?                                                                                                                                                            | 0                |
| includeTVList                                                                                                                    | Список TV через запятую для включения.                                                                                                                              | none             |
| processTVs                                                                                                                       | Обрабатывать TV по типу?                                                                                                                                      | 0                |
| processTVList                                                                                                                    | Список TV через запятую для обработки событий.                                                                                                                   | none             |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| tplMain                                                                                                                          | Имя чанка контейнера календаря.                                                                                                                              | tplCalendar2     |
| tplEvent                                                                                                                         | Имя чанка события.                                                                                                                                            | tplEvent2        |
| tplHead                                                                                                                          | Имя чанка заголовка.                                                                                                                                            | tplHead2         |
| tplCell                                                                                                                          | Имя чанка ячейки.                                                                                                                                            | tplCell2         |
| theme                                                                                                                            | CSS-тема. Файл в /core/assets/components/eventscalendar2/css/**%themename%**/theme.css.                                                                         |
| _Например theme bootstrap из пакета: /core/assets/components/eventscalendar2/css/_**_bootstrap_**_/theme.css_ | default                                                                                                                                                                                |
| regCss                                                                                                                           | Подключать встроенный CSS (или theme)?                                                                                                                                             | 1                |
| regJs                                                                                                                            | Подключать встроенный JavaScript?                                                                                                                                                 | 1                |
| plPrefix                                                                                                                         | Префикс плейсхолдеров.                                                                                                                                                                   | ec.              |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| calendar\_id                                                                                                                     | Уникальный id таблицы календаря на странице.                                                                                                                                                   | Calendar         |
| class\_calendar                                                                                                                  | CSS-класс таблицы календаря.                                                                                                                                                      | calendar         |
| class\_dow                                                                                                                       | CSS-класс дня недели.                                                                                                                                                         | dow              |
| class\_month                                                                                                                     | CSS-класс месяца и года.                                                                                                                                                      | month            |
| class\_workday                                                                                                                   | CSS-класс рабочего дня.                                                                                                                                                             | workday          |
| class\_weekend                                                                                                                   | CSS-класс выходного.                                                                                                                                                             | weekend          |
| class\_today                                                                                                                     | CSS-класс сегодняшнего дня.                                                                                                                                                               | today            |
| class\_event                                                                                                                     | CSS-класс div с событием.                                                                                                                                            | event            |
| class\_isevent                                                                                                                   | CSS-класс ячейки с событием.                                                                                                                                                     | isevent          |
| class\_noevent                                                                                                                   | CSS-класс ячейки без события.                                                                                                                                                  | noevent          |
| class\_date                                                                                                                      | CSS-класс даты события.                                                                                                                                                       | date             |
| class\_emptyday                                                                                                                  | CSS-класс пустого дня без даты.                                                                                                                                             | emptyday         |
| class\_prev                                                                                                                      | CSS-класс кнопки предыдущего месяца.                                                                                                                                               | prev             |
| class\_next                                                                                                                      | CSS-класс кнопки следующего месяца.                                                                                                                                                   | next             |
| btn\_prev                                                                                                                        | Текст кнопки предыдущего месяца.                                                                                                                                                 | «                |
| btn\_next                                                                                                                        | Текст кнопки следующего месяца.                                                                                                                                                     | »                |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| show\_errors                                                                                                                     | Показывать ошибки календаря на странице.                                                                                                                                                   | 1                |
| first\_day                                                                                                                       | 0: неделя с воскресенья. 1: с понедельника.                                                                                                                  | 1                |
| time\_shift                                                                                                                      | Смещение времени от сервера в секундах. Может быть положительным или отрицательным.                                                                                                                     | 0                |

## Исходный код

[Сниппет на GitHub](https://github.com/bezumkin/eventsCalendar2/blob/master/core/components/eventscalendar2/elements/snippets/snippet.eventscalendar2.php).

## См. также

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
