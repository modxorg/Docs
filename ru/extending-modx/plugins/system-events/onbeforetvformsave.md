---
title: "OnBeforeTVFormSave"
translation: "extending-modx/plugins/system-events/onbeforetvformsave"
description: "Событие запускается перед сохранением TV в менеджере."
---

## Событие: OnBeforeTVFormSave

Событие запускается после отправки формы, но перед сохранением TV (шаблонной переменной) в менеджере.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя  | Описание                                              |
| ---- | ----------------------------------------------------- |
| mode | Либо 'upd' или 'new', в зависимости от обстоятельств. |
| tv   | Ссылка на объект modTemplateVar.                      |
| id   | Идентификатор TV. Будет 0 для новых TV.               |
| data | Текущие поля TV в виде массива.                       |
| object | Псевдоним `tv` — ссылка на тот же объект.           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
