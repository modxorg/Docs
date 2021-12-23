---
title: "OnBeforeTVFormSave"
translation: "extending-modx/plugins/system-events/onbeforetvformsave"
---

## Событие: OnBeforeTVFormSave

Запускается после отправки формы, но перед сохранением чанка в менеджере.

Служба: 1 - Parser Service Events
Group: Template Variables

## Параметры события

| Имя  | Описание                                              |
| ---- | ----------------------------------------------------- |
| mode | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| tv   | Ссылка на объект modTemplateVar.                      |
| id   | Идентификатор TV. Будет 0 для новых TV.               |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
