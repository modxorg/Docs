---
title: "OnResourceGroupSave"
translation: "extending-modx/plugins/system-events/onresourcegroupsave"
description: "Событие запускается после сохранения группы ресурсов."
---

## Событие: OnResourceGroupSave

Событие запускается после сохранения группы ресурсов.

- Служба: 1 - Parser Service Events
- Group: Security

## Параметры события

| Имя           | Описание                                       |
| ------------- | ---------------------------------------------- |
| mode          | `'new'` или `'upd'` в зависимости от ситуации. |
| resourceGroup | Ссылка на объект `modResourceGroup`.           |
| cacheFlag     | Флаг кэша, переданный в операцию сохранения.   |

Когда группа ресурсов создаётся через процессор `Security\ResourceGroup\Create`, это событие вызывается дважды: один раз из save() модели (с ключами, перечисленными выше) и один раз из процессора (с ключами `mode`, `id`, `resource_group` и `object`). `OnResourceGroupBeforeSave` ведёт себя так же.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
