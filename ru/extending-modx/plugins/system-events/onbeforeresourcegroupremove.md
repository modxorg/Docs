---
title: "OnBeforeResourceGroupRemove"
translation: "extending-modx/plugins/system-events/onbeforeresourcegroupremove"
description: "Событие запускается непосредственно перед удалением группы ресурсов."
---

## Событие: OnBeforeResourceGroupRemove

Событие запускается непосредственно перед удалением группы ресурсов. Его вызывает `modResourceGroup::remove()`, но записи о нём нет в системном списке событий (`transport.core.events.php`) — в выпадающем списке менеджера оно отсутствует, подписка по имени работает. Service и Group ниже совпадают с таковыми у зарегистрированного, но не вызываемого события `OnResourceGroupBeforeRemove`.

- Служба: 1 - Parser Service Events
- Group: Security

## Параметры события

| Имя           | Описание                                        |
| ------------- | ----------------------------------------------- |
| resourceGroup | Ссылка на объект `modResourceGroup`.            |
| ancestors     | Массив предков для каскадной операции удаления. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
