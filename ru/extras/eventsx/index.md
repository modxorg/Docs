---
title: "EventsX"
description: "Календарь событий для MODX Revolution с jQuery-календарём и списками"
translation: "extras/eventsx/index"
---

Обратите внимание: документация не проверена автором extra. Используйте на свой риск.

## Что такое EventsX?

EventX: календарный extra для MODX Revolution. EventsX показывает предстоящие (и прошлые) события в jQuery-календаре и/или в списке.

## Возможности

-   управление событиями (create/update/remove/(de)activate)
-   у каждого события дата начала и окончания (для однодневных можно совпадение)
-   встроен jQuery-календарь
-   языки:
    -   english
    -   dutch
    -   german (thanks to Anselm Hannemann)
    -   russian

## Требования

-   MODX Revolution (tested with 2.1.3pl)
-   jQuery для календаря (можно свой JSON-календарь)

## История

EventX написал Jeroen Kenters, первый релиз 1 декабря 2011 года.

## Загрузка

Скачайте через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из MODX Extras Repository: <https://modx.com/extras/package/eventsx>

## Разработка и сообщения об ошибках

EventX на GitHub: <https://github.com/jkenters/EventsX>, issues: <https://github.com/jkenters/EventsX/issues>.

## Issues and feature-requests

Issues и feature-requests EventX на GitHub: <https://github.com/jkenters/EventsX/issues>.

## Установка

1. Установите через package manager

## Как использовать

### Календарь на странице

Откройте components -> EventsX и создайте события

(убедитесь, что они active)

1. Подключите jQuery в шаблоне, если нужно (только на страницах с календарём)
2. Скопируйте и подключите /assets/components/calendar.js (только на страницах с календарём)
3. Скопируйте и подключите /assets/components/jquery.calendar-widget.js (только на страницах с календарём)
4. Создайте ресурс для календаря событий (или добавьте в шаблон)
5. Создайте ресурс для списка предстоящих событий (см. пример шаблона ниже)
6. Создайте дочерний ресурс для одного события (см. пример шаблона ниже)
7. Context setting «evxEventsPage»: id страницы «upcoming events»
8. Context setting «evxEventPage»: id страницы одного события
9. Сохраните context и очистите кеш (context settings кешируются)

## Templates

### example _events_ calendar template

```html
<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script
            type="text/javascript"
            src="assets/components/eventsx/js/web/jquery.calendar-widget.js"
        ></script>
        <script
            type="text/javascript"
            src="assets/components/eventsx/js/web/calendar.js"
        ></script>
        <link
            rel="stylesheet"
            type="text/css"
            href="assets/components/eventsx/css/calendar.css"
        />
    </head>
    <body>
        <a href="" id="prevMonth">previous month</a>
        <a href="" id="nextMonth">next month</a>
        <div id="calendar"></div>
        [[*content]]
    </body>
</html>
```

### example _upcoming events_ calendar template

```html
<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
    </head>
    <body>
        [[!EventsX? &tpl=`evxEventTpl` &limit=`10`]] [[*content]]
    </body>
</html>
```

### example _single event_ calendar template

```html
[[!evxEvent?]]
<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
    </head>
    <body>
        <p>Name: [[+event.name]]</p>
        <p>Start date: [[+event.startdate:strtotime:date=`%d-%m-%Y`]]</p>
        <p>End date: [[+event.enddate:strtotime:date=`%d-%m-%Y`]]</p>
        [[+event.description]]<!-- Description is a TinyMCE field by default, so no <p> here -->
        <h2>Location</h2>
        <p>
            [[+event.location]]<br />
            [[+event.street]]<br />
            [[+event.pc]]<br />
            [[+event.city]]<br />
            [[+event.region]]<br />
            [[+event.country]]
        </p>
        <p><a href="[[+event.website]]">Visit website</a></p>
    </body>
</html>
```

## См. также

1. [EventsX.Examples](extras/eventsx/eventsx.examples)
