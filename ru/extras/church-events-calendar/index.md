---
title: "Church Events Calendar"
description: "Календарь событий MODX с сниппетами Calendar, List и RSS"
translation: "extras/church-events-calendar/index"
---

## Что такое Church Events Calendar?

ChurchEvents это календарное дополнение для MODX Revolution, изначально для церквей, но подходит и в других сценариях. Churchevents поддерживает шаблоны и переводы. В комплекте три сниппета: ChurchEventsCalendar, ChurchEventsList и ChurchEventsRss.

## Необходимые пакеты

Перед установкой ChurchEvents установите:

- FormIt
- ColorPicker

## История

ChurchEvents написал Josh Gulledge как полноценный календарь для MODX, первый релиз в начале 2011 года. В ноябре 2011 года код переписали под стандарты MODX.

### Демо

[Живое демо](http://www.joshua19media.com/modx-development/church-events.html).

### Загрузка

Установите через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте: <https://modx.com/extras/package/churchevents>

### Разработка и сообщения об ошибках

ChurchEvents на GitHub: <https://github.com/jgulledge19/Church-Events-Calendar>, issues: <https://github.com/jgulledge19/Church-Events-Calendar/issues>.

## Установка

1. Установите через package manager

### Как использовать

Календарь на странице:

``` php
[[!ChurchEventsCalendar?]]
```

Список из 10 prominent-событий:

``` php
[[!ChurchEventsList?  &prominent=`Yes`  &limit=`10`]]
```

### [System Settings](building-sites/settings "System Settings")

Создайте, если их ещё нет.

| Имя                 | Key                        | Field Type | Namespace    | Area Lexicon | Значение по умолчанию | Описание                                                                                                                                                                                                 |
| -------------------- | -------------------------- | ---------- | ------------ | ------------ | ------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Allow Requests       | churchevents.allowRequests | Yes/No     | churchevents | ChurchEvents | Yes           | Разрешить гостям запрашивать события.                                                                                                                                                                             |
| Date Format          | churchevents.dateFormat    | Textfield  | churchevents | ChurchEvents | %m/%d/%Y      | Формат даты в формах и при выводе. По умолчанию %m/%d/%Y, все опции: php.net/strftime.                                                                        |
| Extended Fields      | churchevents.extended      | Textarea   | churchevents | ChurchEvents |               | Список полей формы через запятую. Пример: extend\_numberOfPeople,extend\_needCatering.                                                                                          |
| Page/Resource ID     | churchevents.pageID        | Textfield  | churchevents | ChurchEvents |               | ID страницы с календарём. База для всех генерируемых URL.                                                                                              |
| Use Locations        | churchevents.useLocations  | Yes/No     | churchevents | ChurchEvents | Yes           | Менеджер локаций. Yes: события выбирают локацию из списка и проверяют конфликты. No: локация вводится текстом, конфликты не проверяются. |
| RSS Page/Resource ID | churchevents.rssPageID     | Textfield  | churchevents | ChurchEvents |               | ID страницы со сниппетом RSSEvents, сюда идут RSS URL.                                                                                                  |

## См. также

1. [ChurchEvents.MODX Manager functions](extras/church-events-calendar/churchevents.modx-manager-functions)
2. [ChurchEventsCalendar Snippet](extras/church-events-calendar/churcheventscalendar-snippet)
    1. [ChurchEvents.Managing events](extras/church-events-calendar/churcheventscalendar-snippet/churchevents.managing-events)
3. [ChurchEventsList Snippet](extras/church-events-calendar/churcheventslist-snippet)
4. [ChurchEventsRss Snippet](extras/church-events-calendar/churcheventsrss-snippet)
