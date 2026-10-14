---
title: "OnTemplateSave"
translation: "extending-modx/plugins/system-events/ontemplatesave"
description: "Событие запускается после сохранения шаблона, в modTemplate::save()."
---

## Событие: OnTemplateSave

Событие запускается после сохранения шаблона, в `modTemplate::save()`.

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
