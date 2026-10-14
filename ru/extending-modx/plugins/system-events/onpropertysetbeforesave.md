---
title: "OnPropertySetBeforeSave"
translation: "extending-modx/plugins/system-events/onpropertysetbeforesave"
description: "Событие запускается непосредственно перед сохранением набора свойств."
---

## Событие: OnPropertySetBeforeSave

Событие запускается непосредственно перед сохранением набора свойств.

- Служба: 1 - Parser Service Events
- Group: Property Sets

## Параметры события

| Имя         | Описание                                       |
| ----------- | ---------------------------------------------- |
| mode        | `'new'` или `'upd'` в зависимости от ситуации. |
| propertySet | Ссылка на объект `modPropertySet`.             |
| cacheFlag   | Флаг кэша, переданный в операцию сохранения.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
