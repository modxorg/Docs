---
title: "OnMediaSourceBeforeFormSave"
translation: "extending-modx/plugins/system-events/onmediasourcebeforeformsave"
description: "Событие запускается непосредственно перед сохранением медиа-источника."
---

## Событие: OnMediaSourceBeforeFormSave

Событие запускается непосредственно перед сохранением медиа-источника.

- Служба: 1 - Parser Service Events
- Group: Media Sources

## Параметры события

| Имя    | Описание                                                                                                                                |
| ------ | --------------------------------------------------------------------------------------------------------------------------------------- |
| mode   | `'new'` (`modSystemEvent::MODE_NEW`) или `'upd'` (`modSystemEvent::MODE_UPD`) в зависимости от того, новый это объект или существующий. |
| data   | Массив данных объекта медиа-источника.                                                                                                  |
| id     | ID медиа-источника.                                                                                                                     |
| source | Ссылка на объект `modMediaSource`.                                                                                                      |
| object | Ссылка на объект `modMediaSource`.                                                                                                      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
