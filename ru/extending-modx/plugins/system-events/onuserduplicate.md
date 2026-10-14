---
title: "OnUserDuplicate"
translation: "extending-modx/plugins/system-events/onuserduplicate"
description: "Событие запускается после дублирования пользователя в менеджере."
---

## Событие: OnUserDuplicate

Объявлено как `afterSaveEvent` процессора дублирования пользователя (`Security\User\Duplicate`), однако базовый `DuplicateProcessor` никогда его не вызывает, поэтому в ядре MODX 3.x это событие не срабатывает.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

Параметры события отсутствуют.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
