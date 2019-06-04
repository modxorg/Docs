---
title: "OnBeforeDocFormDelete"
translation: "extending-modx/plugins/system-events/onbeforedocformdelete"
---

## Событие: OnBeforeDocFormDelete

Запускается до того, как ресурс удаляется через панель упрвления.

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                                |
| -------- | ----------------------------------------------------------------------- |
| resource | Ссылка на объект modResource.                                           |
| id       | Идентификатор ресурса.                                                  |
| children | Массив ID дочерних элементов этого ресурса, который также будет удален. |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
