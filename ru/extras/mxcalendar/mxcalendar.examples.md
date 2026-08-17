---
title: "Примеры"
description: "Примеры вывода списков событий mxCalendar"
translation: "extras/mxcalendar/mxcalendar.examples"
---

## Revolution

### Вывод событий

#### Общий список предстоящих событий

Выводит список событий из всех календарей и категорий с деталями во всплывающем modal-окне.

- ID ресурса 49 только для примера (замените на ваш ajaxResource).
- Без параметров «&modalView» и «&ajaxResourceId» будет обычный детальный просмотр.
- Дублируйте чанки и добавляйте параметры для своего вывода (больше примеров появится позже).

``` php
[[!mxcalendar?
    &eventListlimit=`8`
    &displayType=`list`
    &ajaxResourceId=`49`
    &modalView=`1`
    &dir=`ASC`
]]
```

- Добавьте параметры, чтобы показывать события дальше вперёд (по умолчанию +4 недели)
- Уберите или измените «&eventListLimit» для большего числа элементов (по умолчанию 5)

``` php
&elStartDate=`now`
&elEndDate=`+16 weeks`
```

#### Общий список прошлых событий

mxCalendar может показывать прошлые события. Обратите внимание на три параметра:

**&elDirectinal=`past`**: mxCalendar выбирает события в прошлом, то есть раньше даты в elStartDate
**&elStartDate=`now`**: как у обычных событий, задаёт начало диапазона фильтрации
**&dir=`DESC`**: события от новых к старым

Пример:

(дублируйте чанки tplListItem и tplListWrap, переименуйте, сохраните и укажите в вызове mxCalendar, как ниже)

``` php
[[!mxcalendar?
    &displayType=`list`
    &elDirectional=`past`
    &isLocked=`1`
    &resourceId=`71`
    &tplListHeading=``
    &tplListItem=`tplListItemNewChunk`
    &calendarFilter=`2`
    &elStartDate=`now`
    &tplListWrap=`tplListWrapNewChunk`
    &dir=`DESC`
]]
```
