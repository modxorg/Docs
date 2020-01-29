---
title: "OnUserFormSave"
translation: "extending-modx/plugins/system-events/onuserformsave"
---

## Событие: OnUserFormSave

Запускается после того, как Пользователь создан или обновлен через форму менеджера.

Служба: 1 - Parser Service Events
Группа: modUser

## Параметры события

| Имя  | Описание                                                                                                                                        |
| ---- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| user | Ссылка на объект modUser.                                                                                                                       |
| id   | ID  пользователя.                                                                                                                               |
| mode | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, является ли новый объект или существующим. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
