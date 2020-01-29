---
title: "OnDocFormDelete"
translation: "extending-modx/plugins/system-events/ondocformdelete"
---

## Событие: OnDocFormDelete

Запускается после удаления ресурса через менеджера.

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                                       |
| -------- | ------------------------------------------------------------------------------ |
| resource | Ссылка на объект modResource.                                                  |
| id       | Идентификатор ресурса.                                                         |
| children | Массив идентификаторов дочерних элементов этого ресурса, которые были удалены. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
