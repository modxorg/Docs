---
title: "OnBeforeTempFormSave"
translation: "extending-modx/plugins/system-events/onbeforetempformsave"
description: "Событие запускается после отправки формы, но перед сохранением шаблона в менеджере."
---

## Событие: OnBeforeTempFormSave

Событие запускается после отправки формы, но перед тем, как шаблон будет сохранён в менеджере.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя      | Описание                                              |
| -------- | ----------------------------------------------------- |
| mode     | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| template | Ссылка на объект modTemplate.                         |
| id       | Идентификатор шаблона. Будет 0 для новых шаблонов.    |
| data     | Текущие поля шаблона в виде массива.                  |
| object   | Псевдоним `template` — ссылка на тот же объект.      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
