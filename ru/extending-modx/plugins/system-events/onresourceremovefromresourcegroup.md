---
title: "OnResourceRemoveFromResourceGroup"
translation: "extending-modx/plugins/system-events/onresourceremovefromresourcegroup"
description: "Событие запускается после удаления ресурса из группы ресурсов."
---

## Событие: OnResourceRemoveFromResourceGroup

Событие запускается после удаления ресурса из группы ресурсов.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя          | Описание                                                                                                        |
| ------------ | --------------------------------------------------------------------------------------------------------------- |
| mode         | Операция, вызвавшая событие: `'resource-create'`, `'resource-update'` или `'resource-group-tree-remove-resource'`. |
| resource     | Ссылка на объект `modResource`.                                                                                 |
| resourceGroup| Ссылка на объект `modResourceGroup`.                                                                            |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
