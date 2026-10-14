---
title: "OnResourceSort"
translation: "extending-modx/plugins/system-events/onresourcesort"
description: "Событие запускается сразу после сортировки дерева ресурсов."
---

## Событие: OnResourceSort

Событие запускается сразу после сортировки дерева ресурсов.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя              | Описание                                                                                      |
| ---------------- | --------------------------------------------------------------------------------------------- |
| nodes            | Массив отсортированных узлов; каждый узел содержит ключи `id`, `context`, `parent` и `order`. |
| nodesAffected    | Массив объектов `modResource`, которые были перемещены.                                       |
| contexts         | Массив ключей контекстов, затронутых сортировкой.                                             |
| contextsAffected | Массив затронутых ключей контекстов в виде: ключ контекста => true.                           |
| modifiedNodes    | Алиас `nodesAffected`, сохранённый для обратной совместимости.                                |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
