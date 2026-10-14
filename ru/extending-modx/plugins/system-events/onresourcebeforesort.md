---
title: "OnResourceBeforeSort"
translation: "extending-modx/plugins/system-events/onresourcebeforesort"
description: "Событие запускается непосредственно перед сортировкой дерева ресурсов."
---

## Событие: OnResourceBeforeSort

Событие запускается непосредственно перед сортировкой дерева ресурсов.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя       | Описание                                                                                                 |
| --------- | -------------------------------------------------------------------------------------------------------- |
| nodes     | Массив узлов, которые будут отсортированы; каждый узел содержит ключи `id`, `context`, `parent` и `order`. |
| contexts  | Массив ключей контекстов, затронутых сортировкой.                                                        |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
