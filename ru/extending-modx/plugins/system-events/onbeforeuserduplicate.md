---
title: "OnBeforeUserDuplicate"
translation: "extending-modx/plugins/system-events/onbeforeuserduplicate"
description: "Событие запускается перед дублированием пользователя в менеджере."
---

## Событие: OnBeforeUserDuplicate

Объявлено как `beforeSaveEvent` процессора дублирования пользователя (`Security\User\Duplicate`), однако базовый `DuplicateProcessor` никогда его не вызывает, поэтому в ядре MODX 3.x это событие не срабатывает.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

Параметры события отсутствуют.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
