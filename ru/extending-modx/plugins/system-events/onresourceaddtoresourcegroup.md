---
title: "OnResourceAddToResourceGroup"
translation: "extending-modx/plugins/system-events/onresourceaddtoresourcegroup"
description: "Событие запускается после добавления ресурса в группу ресурсов."
---

## Событие: OnResourceAddToResourceGroup

Событие запускается после добавления ресурса в группу ресурсов.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя          | Описание                                                                                          |
| ------------ | ------------------------------------------------------------------------------------------------- |
| mode         | Операция, вызвавшая событие: `'resource-create'`, `'resource-update'` или `'resource-group-tree-drag'`. |
| resource     | Ссылка на объект `modResource`.                                                                   |
| resourceGroup| Ссылка на объект `modResourceGroup`.                                                              |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
