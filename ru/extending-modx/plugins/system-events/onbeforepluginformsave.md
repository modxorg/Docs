---
title: "OnBeforePluginFormSave"
translation: "extending-modx/plugins/system-events/onbeforepluginformsave"
---

## Событие: OnBeforePluginFormSave

Запускается после отправки формы, но до сохранения плагина в менеджере.

Служба: 1 - Parser Service Events
Group: Plugin

## Параметры события

| Имя    | Описание                                              |
| ------ | ----------------------------------------------------- |
| mode   | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| plugin | Ссылка на объект modPlugin.                           |
| id     | Идентификатор плагина. Будет 0 для новых плагинов.    |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
