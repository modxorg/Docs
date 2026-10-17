---
title: "xPDO.getAlias"
description: "Возвращает псевдоним класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getalias"
---

## xPDO::getAlias

Возвращает псевдоним класса: последний сегмент его пространства имён без префикса пространства имён. Например, псевдоним `MODX\Revolution\modResource` — это `modResource`.

## Синтаксис

```php
string|null getAlias (string $className)
```

## Пример

```php
$alias = $xpdo->getAlias('MODX\\Revolution\\modResource');
// 'modResource'
```

## Смотрите также

-   [xPDO.getPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.getpackage "xPDO.getPackage")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")