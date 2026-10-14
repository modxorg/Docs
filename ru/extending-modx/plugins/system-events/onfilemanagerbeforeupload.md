---
title: "OnFileManagerBeforeUpload"
translation: "extending-modx/plugins/system-events/onfilemanagerbeforeupload"
description: "Событие запускается перед загрузкой файла через менеджер, внутри цикла обработки файлов."
---

## Событие: OnFileManagerBeforeUpload

Событие запускается до загрузки любых файлов через менеджер и вызывается внутри цикла foreach, который проходит по массиву `$_FILES`.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя       | Описание                                                                                    |
| --------- | ------------------------------------------------------------------------------------------- |
| files     | Массив файлов из PHP `$_FILES`.                                                             |
| file      | Массив текущего файла, проходящего через массив `$_FILES`.                                  |
| directory | Путь к целевому каталогу (относительно корня медиаресурса), в который выполняется загрузка. |
| source    | Содержит объект `modMediaSource`.                                                           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
