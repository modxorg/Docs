---
title: "OnTempFormDelete"
translation: "extending-modx/plugins/system-events/ontempformdelete"
description: "Событие запускается после удаления шаблона в менеджере."
---

## Событие: OnTempFormDelete

Событие запускается после удаления шаблона в менеджере.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя      | Описание                                                               |
| -------- | ---------------------------------------------------------------------- |
| id       | ID удалённого шаблона.                                                 |
| template | Ссылка на объект `modTemplate`.                                        |
| object   | Ссылка на объект `modTemplate` — тот же экземпляр, что и `template`.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
