---
title: "OnTemplateBeforeRemove"
translation: "extending-modx/plugins/system-events/ontemplatebeforeremove"
description: "Событие запускается непосредственно перед удалением шаблона, в modTemplate::remove()."
---

## Событие: OnTemplateBeforeRemove

Событие запускается непосредственно перед удалением шаблона, в `modTemplate::remove()`.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя       | Описание                                                   |
| --------- | ---------------------------------------------------------- |
| template  | Ссылка на объект `modTemplate`.                            |
| ancestors | Массив предков, переданный в метод `remove()`.             |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
