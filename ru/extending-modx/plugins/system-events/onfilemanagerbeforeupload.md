---
title: "OnFileManagerBeforeUpload"
translation: "extending-modx/plugins/system-events/onfilemanagerbeforeupload"
---

## Событие: OnFileManagerBeforeUpload

 Запускается до загрузки любых файлов через менеджер и запускается в цикле foreach, который проходит через массив $\_FILES.

 Служба: 1 - Parser Service Events
 Группа: Нет

## Параметры события

 | Имя       | Описание                                                    |
 | --------- | ----------------------------------------------------------- |
 | files     | Массив файлов из PHP $\_FILES.                              |
 | file      | Массив текущего файла, проходящий через массив $\_FILES.    |
 | directory | Ссылка на объект modDirectory, в который загружаются файлы. |
 | source    | Содержит объект медиаресурса.                               |

## Смотри также

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
