---
title: "Примеры"
description: "Пример списка предстоящих событий EventsX"
translation: "extras/eventsx/eventsx.examples"
---

## Примеры EventsX

### Список предстоящих событий

Откройте components -> EventsX и создайте события

(убедитесь, что они active)

### создайте чанк «upcomingEvents»

``` php
<li>[[+location:htmlentities]]: <a href="[[+url]]" title="[[+name:htmlentities]]">[[+name:htmlentities]]</a> <time datetime="[[+startdate:strtotime:date=`%Y-%m-%d`]]" title="event is scheduled on [[+startdate:strtotime:date=`%d.%m.%Y`]]">[[+startdate:strtotime:date=%d.%m.%Y`]]</time></li>
```

### вызов сниппета

Добавьте вызов в шаблон или ресурс, где нужен список событий.

``` php
<h2>next events:</h2>
<ol id="eventcal">
    [[!EventsX? &tpl=`upcomingEvents` &limit=`10`]]
</ol>
```

### screenshot

Скриншот может выглядеть так. Элемент time я стилизовал отдельно.

![](eventsx.png)

## См. также

1. [EventsX.Examples](extras/eventsx/eventsx.examples)
