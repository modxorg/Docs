---
title: "OnPackageInstall"
translation: "extending-modx/plugins/system-events/onpackageinstall"
description: "Срабатывает после успешной установки или обновления пакета через менеджер пакетов."
---

## Событие: OnPackageInstall

Срабатывает после успешной установки или обновления пакета через менеджер пакетов.

- Служба: 2 - Manager Access Events
- Group: Package Manager

## Параметры события

| Имя     | Описание                                                                                                                               |
| ------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| package | Ссылка на экземпляр modTransportPackage, который был установлен. Используйте `$package->get('package_name')`, чтобы получить имя пакета. |
| action  | Одно из `xPDOTransport::ACTION_UPGRADE` или `xPDOTransport::ACTION_INSTALL` — указывает, было ли это обновление или первая установка.   |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
