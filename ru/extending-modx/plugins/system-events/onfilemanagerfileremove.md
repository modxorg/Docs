---
title: "OnFileManagerFileRemove"
translation: "extending-modx/plugins/system-events/onfilemanagerfileremove"
description: "Событие запускается после удаления файла через менеджер."
---

## Событие: OnFileManagerFileRemove

Событие запускается после удаления файла через менеджер.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя       | Описание                                 |
| --------- | ---------------------------------------- |
| directory | Содержит полный путь к удалённому файлу. |
| source    | Содержит объект `modMediaSource`.        |

> [!TIP]
> В отличие от других событий семейства OnFileManager\*, в этом событии параметр с путём называется `directory`, а не `path`.

## Смотри также

- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
