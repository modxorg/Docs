---
title: "OnPropertySetSave"
translation: "extending-modx/plugins/system-events/onpropertysetsave"
description: "Событие запускается сразу после сохранения набора свойств."
---

## Событие: OnPropertySetSave

Событие запускается сразу после сохранения набора свойств.

- Служба: 1 - Parser Service Events
- Group: Property Sets

## Параметры события

| Имя         | Описание                                                     |
| ----------- | ------------------------------------------------------------ |
| mode        | `'new'` или `'upd'` в зависимости от ситуации.               |
| propertySet | Ссылка на объект `modPropertySet`.                           |
| cacheFlag   | Флаг кэша, переданный в операцию сохранения.                 |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
