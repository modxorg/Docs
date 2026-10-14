---
title: "OnSnippetBeforeSave"
translation: "extending-modx/plugins/system-events/onsnippetbeforesave"
description: "Событие запускается непосредственно перед сохранением сниппета, в modSnippet::save()."
---

## Событие: OnSnippetBeforeSave

Событие запускается непосредственно перед сохранением сниппета, в `modSnippet::save()`.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя       | Описание                                                   |
| --------- | ---------------------------------------------------------- |
| mode      | `'new'` или `'upd'` в зависимости от ситуации.             |
| snippet   | Ссылка на объект `modSnippet`.                             |
| cacheFlag | Аргумент `cacheFlag`, переданный в метод `save()`.         |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
