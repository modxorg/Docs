---
title: "OnContextUpdate"
translation: "extending-modx/plugins/system-events/oncontextupdate"
description: "Событие запускается после сохранения контекста в менеджере."
---

## Событие: OnContextUpdate

Событие запускается после сохранения контекста в менеджере, его invoke-ят процессоры `Context\Update` и `Context\UpdateFromGrid`. Записи о нём нет в системном списке событий (`transport.core.events.php`), поэтому в выпадающем списке событий менеджера оно отсутствует — подписка по имени работает.

- Служба: 1 - Parser Service Events
- Group: Contexts

## Параметры события

| Имя        | Описание                                                 |
| ---------- | -------------------------------------------------------- |
| context    | Ссылка на объект `modContext`.                           |
| properties | Массив отправленных свойств процессора.                  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
