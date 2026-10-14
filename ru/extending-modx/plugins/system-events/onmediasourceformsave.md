---
title: "OnMediaSourceFormSave"
translation: "extending-modx/plugins/system-events/onmediasourceformsave"
description: "Событие запускается после сохранения медиа-источника в менеджере."
---

## Событие: OnMediaSourceFormSave

Событие запускается после сохранения медиа-источника в менеджере.

- Служба: 1 - Parser Service Events
- Group: Media Sources

## Параметры события

| Имя    | Описание                                                                                                                                |
| ------ | --------------------------------------------------------------------------------------------------------------------------------------- |
| mode   | `'new'` (`modSystemEvent::MODE_NEW`) или `'upd'` (`modSystemEvent::MODE_UPD`) в зависимости от того, новый это объект или существующий. |
| id     | ID медиа-источника.                                                                                                                     |
| source | Ссылка на объект `modMediaSource`.                                                                                                      |
| object | Ссылка на объект `modMediaSource`.                                                                                                      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
