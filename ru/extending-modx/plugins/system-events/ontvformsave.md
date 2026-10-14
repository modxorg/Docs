---
title: "OnTVFormSave"
translation: "extending-modx/plugins/system-events/ontvformsave"
description: "Событие запускается после создания или обновления TV в менеджере."
---

## Событие: OnTVFormSave

Событие запускается после создания или обновления TV в менеджере.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя   | Описание                                                             |
| ----- | -------------------------------------------------------------------- |
| mode  | `'new'` или `'upd'` в зависимости от ситуации.                       |
| id    | ID TV.                                                               |
| tv    | Ссылка на объект `modTemplateVar`.                                   |
| object| Ссылка на объект `modTemplateVar` — тот же экземпляр, что и `tv`.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
