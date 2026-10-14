---
title: "OnFileCreateFormPrerender"
translation: "extending-modx/plugins/system-events/onfilecreateformprerender"
description: "Событие запускается перед рендерингом формы создания файла в менеджере."
---

## Событие: OnFileCreateFormPrerender

Событие запускается перед рендерингом формы создания файла в менеджере.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя       | Описание                                     |
| --------- | -------------------------------------------- |
| mode      | Всегда `'new'` (`modSystemEvent::MODE_NEW`). |
| directory | Каталог, в котором будет создан новый файл.  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
