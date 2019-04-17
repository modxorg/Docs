---
title: "OnPackageInstall"
translation: "extending-modx/plugins/system-events/onpackageinstall"
---

Запускается после успешной установки пакета через менеджер пакетов. Добавлено в MODX Revolution 2.6.

## Available Variables

- `$package`: экземпляр modTransportPackage, который был установлен. Например, `$package->get('package_name')`, чтобы получить имя пакета.
- `$action`: один из `xPDOTransport::ACTION_UPGRADE` или `xPDOTransport::ACTION_INSTALL`, чтобы указать, была ли это первая установка или обновление.
