---
title: "OnPackageUninstall"
translation: "extending-modx/plugins/system-events/onpackageuninstall"
---

Запускается после успешного удаления пакета через менеджер пакетов. Добавлено в MODX Revolution 2.6.

## Доступные значения

- `$package`: экземпляр modTransportPackage, который был установлен. Например `$package->get('package_name')` чтобы получить название пакета.
