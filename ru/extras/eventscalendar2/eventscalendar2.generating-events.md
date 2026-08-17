---
title: "Генерация событий"
description: "Пример сниппета eventsGenerator для отладки eventsCalendar2"
translation: "extras/eventscalendar2/eventscalendar2.generating-events"
---

## Пример

Встроенного сниппета нет, это пример генерации событий. Сохраните код как сниппет eventsGenerator и используйте для отладки.

``` php
<?php
$year = !empty($_REQUEST['year']) ? $_REQUEST['year'] : date('Y');
$month = !empty($_REQUEST['month']) ? $_REQUEST['month'] : date('n');
$days = date('t', strtotime("$year-$month"));

$start = strtotime("$year-$month-1");
$end = strtotime("$year-$month-$days") + 60*60*23;

$arr = array();
for ($i = 1; $i <= 10; $i++) {
    $arr[] = array(
            'date' => strftime('%Y-%m-%d %H:%M:%S', rand($start, $end))
            ,'pagetitle' => 'Testing news '.$i
            ,'introtext' => 'Lorem ipsum dolar'
    );

}

return json_encode($arr);
```

## Использование

``` php
[[!eventsCalendar2?
  &events=`[[!eventsGenerator]]`
]]
```

## См. также

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
