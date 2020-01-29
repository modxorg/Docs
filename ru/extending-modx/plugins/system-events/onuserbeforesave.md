---
title: "OnUserBeforeSave"
translation: "extending-modx/plugins/system-events/onuserbeforesave"
---

## Событие: OnUserBeforeSave

Срабатывает прямо перед сохранением пользователя.

Служба: 1 - Parser Service Events
Группа: modUser

## Параметры события

| Имя  | Описание                                                                                                                                        |
| ---- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| user | Ссылка на объект modUser.                                                                                                                       |
| mode | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, является ли новый объект или существующим. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
