---
title: "OnBeforeTempFormSave"
translation: "extending-modx/plugins/system-events/onbeforetempformsave"
---

## Событие: OnBeforeTempFormSave

Запускается после отправки формы, но до сохранения шаблона в менеджере.

Служба: 1 - Parser Service Events
Group: Templates

## Параметры события

| Имя      | Описание                                              |
| -------- | ----------------------------------------------------- |
| mode     | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| template | Ссылка на объект modTemplate.                         |
| id       | Идентификатор шаблона. Будет 0 для новых шаблонов.    |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
