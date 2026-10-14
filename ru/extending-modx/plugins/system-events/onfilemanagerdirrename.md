---
title: "OnFileManagerDirRename"
translation: "extending-modx/plugins/system-events/onfilemanagerdirrename"
description: "Событие запускается после переименования каталога через медиаменеджер."
---

## Событие: OnFileManagerDirRename

Событие запускается после переименования каталога через менеджер. Старое имя каталога можно получить из переменной `$_POST`.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя       | Описание                                          |
| --------- | ------------------------------------------------- |
| directory | Содержит полный путь к переименованному каталогу. |
| source    | Содержит объект `modMediaSource`.                 |

## Смотри также

- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
