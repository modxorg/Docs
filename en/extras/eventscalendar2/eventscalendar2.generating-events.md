---
title: "Generating events"
_old_id: "835"
_old_uri: "revo/eventscalendar2/eventscalendar2.generating-events"
---

## Example

It is not built-in snippet, it example of snippet for generating events. Save this code as snippet eventsGenerator and you may used it for debugging.

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

## Usage

``` php
[[!eventsCalendar2?
  &events=`[[!eventsGenerator]]`
]]
```

## See Also

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
