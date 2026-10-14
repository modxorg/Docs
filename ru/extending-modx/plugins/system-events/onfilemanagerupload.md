---
title: "OnFileManagerUpload"
translation: "extending-modx/plugins/system-events/onfilemanagerupload"
description: "Событие запускается после загрузки файлов через менеджер."
---

## Событие: OnFileManagerUpload

Событие запускается после загрузки любых файлов через менеджер.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя       | Описание                                                                                               |
| --------- | ------------------------------------------------------------------------------------------------------ |
| files     | Массив файлов из PHP `$_FILES`.                                                                        |
| directory | Путь к целевому каталогу (относительно корня медиаресурса), в который были загружены файлы.            |
| source    | Объект `modMediaSource`, в который были загружены файлы.                                               |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
