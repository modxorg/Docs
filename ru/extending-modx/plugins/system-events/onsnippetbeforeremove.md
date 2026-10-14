---
title: "OnSnippetBeforeRemove"
translation: "extending-modx/plugins/system-events/onsnippetbeforeremove"
description: "Событие запускается непосредственно перед удалением сниппета, в modSnippet::remove()."
---

## Событие: OnSnippetBeforeRemove

Событие запускается непосредственно перед удалением сниппета, в `modSnippet::remove()`.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя       | Описание                                                 |
| --------- | -------------------------------------------------------- |
| snippet   | Ссылка на объект `modSnippet`.                           |
| ancestors | Массив предков, переданный в метод `remove()`.           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
