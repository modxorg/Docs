---
title: "OnDocFormPrerender"
translation: "extending-modx/plugins/system-events/ondocformprerender"
---

## Событие: OnDocFormPrerender

Запускается до загрузки формы редактирования ресурса в менеджере.

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                        |
| -------- | --------------------------------------------------------------- |
| mode     | Либо 'new' либо 'upd', в зависимости от обстоятельств.          |
| resource | Ссылка на объект modResource. Будет нулевым для новых ресурсов. |
| id       | Идентификатор ресурса. Будет 0 для новых ресурсов.              |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
