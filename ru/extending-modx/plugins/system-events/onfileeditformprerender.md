---
title: "OnFileEditFormPrerender"
translation: "extending-modx/plugins/system-events/onfileeditformprerender"
description: "Событие запускается перед рендерингом формы редактора файлов в менеджере."
---

## Событие: OnFileEditFormPrerender

Событие запускается перед рендерингом формы редактора файлов в менеджере.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя | Описание                                                                                         |
| --- | ------------------------------------------------------------------------------------------------ |
| mode| Всегда `'upd'` (`modSystemEvent::MODE_UPD`).                                                      |
| file| Путь к редактируемому файлу.                                                                     |
| fa  | Массив сведений о файле, включая ID медиа-источника, которому принадлежит файл.                  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
