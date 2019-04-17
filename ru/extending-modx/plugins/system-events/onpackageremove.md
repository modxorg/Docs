---
title: "OnPackageRemove"
translation: "extending-modx/plugins/system-events/onpackageremove"
---

Запускается после успешного удаления пакета через менеджер пакетов. Добавлено в MODX Revolution 2.6.

## Available Variables

- `$package`: экземпляр modTransportPackage, который был удален. Например, `$package->get('package_name')`, чтобы получить имя пакета. Обратите внимание, что на этом этапе объект пакета будет удален из базы данных. Пока данные доступны, вы не должны полагаться на то, что они находятся в базе данных.
