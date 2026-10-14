---
title: "OnUserFormSave"
translation: "extending-modx/plugins/system-events/onuserformsave"
description: "Срабатывает после создания или обновления пользователя через форму менеджера."
---

## Событие: OnUserFormSave

Запускается после того, как Пользователь создан или обновлен через форму менеджера.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя    | Описание                                                                                                                                |
| ------ | --------------------------------------------------------------------------------------------------------------------------------------- |
| user   | Ссылка на объект modUser.                                                                                                               |
| id     | ID пользователя.                                                                                                                        |
| mode   | Либо 'new' (modSystemEvent::MODE\_NEW) либо 'upd' (modSystemEvent::MODE\_UPD) в зависимости от того, новый это объект или существующий. |
| object | Ссылка на сохранённый объект (тот же экземпляр modUser, что и `user`).                                                                  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
