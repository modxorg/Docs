---
title: "EventManager"
description: "Управление событиями и онлайн-бронированием в MODX Revolution"
translation: "extras/eventmanager/index"
---

Из-за нехватки времени и появления лучших альтернатив разработка EventManager вряд ли продолжится. Для событий используйте другие extras: EventsX, mxCalendar или Church Events.

Исходный код EventManager останется на GitHub, но новая разработка не планируется.

## Что такое EventManager?

EventManager: addon для MODX Revolution для списка событий и онлайн-бронирования посетителями. Бронирования отображаются на странице Components -> EventManager.

**EventManager сейчас в разработке.**

## Требования

- MODX Revolution 2.0.0-beta5 или новее
- PHP5 или новее

## История

Разработку начал Mark Hamstra в феврале 2011 года. Pre-release [могут быть на Github](https://github.com/Mark-H/EventManager/downloads) и не появятся в MODX Extras Repository до стабильного релиза.

### Публичные релизы

| Version    | Date      | Author       | Download                                                                                              |
| ---------- | --------- | ------------ | ----------------------------------------------------------------------------------------------------- |
| 0.1-alpha1 | 23/3/2011 | Mark Hamstra | [From Github](https://github.com/downloads/Mark-H/EventManager/eventmanager-0.1-alpha1.transport.zip) |

## Использование

События управляются в меню Components > EventManager. Две вкладки: предстоящие и текущие события, а также архив старых. По правому клику на событии доступны просмотр бронирований (_не в 0.1-alpha_), обновление, удаление (_не в 0.1-alpha_) и дублирование (_не в 0.1-alpha_).

Для вывода событий и бронирования посетителями есть два сниппета:

- emListEvents: список событий с вашим шаблоном.
- emNewReservationHook: hook для FormIt, регистрирует бронирование в базе EventManager.
