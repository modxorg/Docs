---
title: "OnTemplateBeforeSave"
translation: "extending-modx/plugins/system-events/ontemplatebeforesave"
description: "Событие запускается непосредственно перед сохранением шаблона, в modTemplate::save()."
---

## Событие: OnTemplateBeforeSave

Событие запускается непосредственно перед сохранением шаблона, в `modTemplate::save()`.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя       | Описание                                                     |
| --------- | ------------------------------------------------------------ |
| mode      | `'new'` или `'upd'` в зависимости от ситуации.               |
| template  | Ссылка на объект `modTemplate`.                              |
| cacheFlag | Аргумент `cacheFlag`, переданный в метод `save()`.           |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
