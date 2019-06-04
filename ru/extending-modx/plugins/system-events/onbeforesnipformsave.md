---
title: "OnBeforeSnipFormSave"
_old_id: "390"
translation: "extending-modx/plugins/system-events/onbeforesnipformsave"
---

## Событие: OnBeforeSnipFormSave

Запускается после отправки формы, но до сохранения сниппета в менеджере.

Служба: 1 - Parser Service Events
Group: Snippets

## Параметры события

| Имя     | Описание                                              |
| ------- | ----------------------------------------------------- |
| mode    | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| snippet | Ссылка на объект modSnippet.                          |
| id      | Идентификатор сниппета. Будет 0 для новых сниппетов.  |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
