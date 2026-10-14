---
title: "OnFileManagerFileRename"
translation: "extending-modx/plugins/system-events/onfilemanagerfilerename"
description: "Событие запускается после переименования файла через медиаменеджер."
---

## Событие: OnFileManagerFileRename

Событие запускается после переименования файла через менеджер. Старое имя файла можно получить из переменной `$_POST`.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя    | Описание                                       |
| ------ | ---------------------------------------------- |
| path   | Содержит полный путь к переименованному файлу. |
| source | Содержит объект `modMediaSource`.              |

## Смотри также

- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
