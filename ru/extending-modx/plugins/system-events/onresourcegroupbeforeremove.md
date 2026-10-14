---
title: "OnResourceGroupBeforeRemove"
translation: "extending-modx/plugins/system-events/onresourcegroupbeforeremove"
description: "Зарегистрировано как системное событие ядра, но нигде не вызывается в MODX 3.x."
---

## Событие: OnResourceGroupBeforeRemove

Это событие зарегистрировано в списке системных событий ядра, но нигде не вызывается в кодовой базе MODX 3.x. Событие, которое действительно запускается непосредственно перед удалением группы ресурсов, — [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onbeforeresourcegroupremove); оно вызывается из `modResourceGroup::remove()` с параметрами `resourceGroup` и `ancestors`. Регистрируйте свой плагин на это событие — `OnResourceGroupBeforeRemove` не выполнится.

- Служба: 1 - Parser Service Events
- Group: Security

## Смотри также

- [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onbeforeresourcegroupremove)
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
