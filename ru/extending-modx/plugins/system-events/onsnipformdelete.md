---
title: "OnSnipFormDelete"
translation: "extending-modx/plugins/system-events/onsnipformdelete"
description: "Событие запускается после удаления сниппета в менеджере."
---

## Событие: OnSnipFormDelete

Событие запускается после удаления сниппета в менеджере.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя    | Описание                                                             |
| ------ | -------------------------------------------------------------------- |
| id     | ID удалённого сниппета.                                              |
| snippet| Ссылка на объект `modSnippet`.                                       |
| object | Ссылка на объект `modSnippet` — тот же экземпляр, что и `snippet`.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
