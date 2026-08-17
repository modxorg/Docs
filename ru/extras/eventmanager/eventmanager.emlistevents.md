---
title: "emListEvents"
description: "Сниппет EventManager для вывода списка событий"
translation: "extras/eventmanager/eventmanager.emlistevents"
---

emListEvents: сниппет EventManager для списка событий из кастомной базы данных.

Документация к этому разделу будет дополнена позже.

## Свойства

### Selection Properties

| Property         | Description                                                                                                                                                                                                                                                               | Default value |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| &limit           | Лимит числа событий в выводе.                                                                                                                                                                                                                                    | 3             |
| &reserveResource | ID ресурса со формой бронирования. Скрипт сформирует ссылку с «eid=5», где 5: ID события, доступный в плейсхолдере reservationlink.                                                                               |               |
| &default         | ID события по умолчанию. Можно использовать @GET для параметра REQUEST. Плейсхолдер «default» в строке вывода сравнивается с текущим. См. emRowSelectBoxTpl. | @GET eid      |

### Template Properties

| Property                        | Description                                                                                               | Default value                                                             |
| ------------------------------- | --------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| &rowTpl                         | Имя чанка для итерации по событиям. Плейсхолдеры: - eventid (int, primary key) | - date (time, formatted with strftime('%A %e/%m, %H:%M'))                 |
|                                 |                                                                                                           | - title (string)                                                          |
|                                 |                                                                                                           | - description (string)                                                    |
|                                 |                                                                                                           | - reservationlink (link to &reservationResource with &eid=5 passed to it) |
|                                 |                                                                                                           | - default (string, see &default property above)                           |
|                                 |                                                                                                           | - capacity (int)                                                          |
|                                 |                                                                                                           | - last\_signup `(i|nt)`                                                   |
| &emRowTpl (included in package) | `<p>[[+date]]</p> <p></p>[[+title]]</p> <p>[[+description]]<br />[[+reservationlink]]</p>`                |                                                                           |
