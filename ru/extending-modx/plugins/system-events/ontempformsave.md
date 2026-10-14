---
title: "OnTempFormSave"
translation: "extending-modx/plugins/system-events/ontempformsave"
description: "Событие запускается после создания или обновления шаблона в менеджере."
---

## Событие: OnTempFormSave

Событие запускается после создания или обновления шаблона в менеджере.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя      | Описание                                                             |
| -------- | -------------------------------------------------------------------- |
| mode     | `'new'` или `'upd'` в зависимости от ситуации.                       |
| id       | ID шаблона.                                                          |
| template | Ссылка на объект `modTemplate`.                                      |
| object   | Ссылка на объект `modTemplate` — тот же экземпляр, что и `template`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
