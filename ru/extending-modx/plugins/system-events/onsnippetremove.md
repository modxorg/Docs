---
title: "OnSnippetRemove"
translation: "extending-modx/plugins/system-events/onsnippetremove"
description: "Событие запускается после удаления сниппета, в modSnippet::remove()."
---

## Событие: OnSnippetRemove

Событие запускается после удаления сниппета, в `modSnippet::remove()`.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя       | Описание                                       |
| --------- | ---------------------------------------------- |
| snippet   | Ссылка на объект `modSnippet`.                 |
| ancestors | Массив предков, переданный в метод `remove()`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
