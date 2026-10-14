---
title: "OnResourceGroupBeforeSave"
translation: "extending-modx/plugins/system-events/onresourcegroupbeforesave"
description: "Событие запускается непосредственно перед сохранением группы ресурсов."
---

## Событие: OnResourceGroupBeforeSave

Событие запускается непосредственно перед сохранением группы ресурсов.

- Служба: 1 - Parser Service Events
- Group: Security

## Параметры события

| Имя          | Описание                                                     |
| ------------ | ------------------------------------------------------------ |
| mode         | `'new'` или `'upd'` в зависимости от ситуации.               |
| resourceGroup | Ссылка на объект `modResourceGroup`.                         |
| cacheFlag    | Флаг кэша, переданный в операцию сохранения.                 |

Когда группа ресурсов создаётся через процессор `Security\ResourceGroup\Create`, это событие вызывается дважды: один раз из процессора (с ключами `mode`, `data`, `id`, `resource_group` и `object`) и один раз из save() модели (с ключами, перечисленными выше). `OnResourceGroupSave` ведёт себя так же.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
