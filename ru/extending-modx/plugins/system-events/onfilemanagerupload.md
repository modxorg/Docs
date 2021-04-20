---
title: "OnFileManagerUpload"
translation: "extending-modx/plugins/system-events/onfilemanagerupload"
---

## Событие: OnFileManagerUpload

Срабатывает после загрузки любых файлов через менеджер.

Служба: 1 - Parser Service Events
Группа: Нет

## Параметры события

| Имя       | Описание                                                    |
| --------- | ----------------------------------------------------------- |
| files     | Массив файлов из PHP $\_FILES.                              |
| directory | Ссылка на объект modDirectory, в который загружаются файлы. |
| source    | Объект modMediaSource, в который был загружен файл.         |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
