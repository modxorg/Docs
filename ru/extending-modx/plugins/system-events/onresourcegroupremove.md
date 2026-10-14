---
title: "OnResourceGroupRemove"
translation: "extending-modx/plugins/system-events/onresourcegroupremove"
description: "Событие запускается после удаления группы ресурсов."
---

## Событие: OnResourceGroupRemove

Событие запускается после удаления группы ресурсов. Событие вызывается даже в том случае, если само удаление не удалось — результат вызова remove() не проверяется.

- Служба: 1 - Parser Service Events
- Group: Security

## Параметры события

| Имя          | Описание                                             |
| ------------ | ---------------------------------------------------- |
| resourceGroup | Ссылка на объект `modResourceGroup`.                |
| ancestors    | Массив предков для каскадной операции удаления.      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
