---
title: "xPDOTransport.manifestVersion"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.manifestversion"
---

## xPDOTransport::manifestVersion

Читает версию, зафиксированную в массиве манифеста транспорта. Возвращает строку версии или `null`, если манифест её не содержит.

## Синтаксис

``` php
string|null manifestVersion (array $manifest)
```

## Пример

``` php
$version = xPDOTransport::manifestVersion($manifest);
```

## Смотрите также

-   [xPDOTransport.writeManifest](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.writemanifest "xPDOTransport.writeManifest")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")