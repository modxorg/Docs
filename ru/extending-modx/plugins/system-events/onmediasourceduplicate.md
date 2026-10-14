---
title: "OnMediaSourceDuplicate"
translation: "extending-modx/plugins/system-events/onmediasourceduplicate"
description: "Событие запускается после дублирования медиа-источника в менеджере."
---

## Событие: OnMediaSourceDuplicate

Событие запускается после дублирования медиа-источника в менеджере.

- Служба: 1 - Parser Service Events
- Group: Media Sources

## Параметры события

| Имя         | Описание                                                   |
| ----------- | ---------------------------------------------------------- |
| newResource | Ссылка на вновь созданный объект `modMediaSource`.         |
| oldResource | Ссылка на исходный объект `modMediaSource`.                |
| newName     | Имя вновь созданного медиа-источника.                      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
