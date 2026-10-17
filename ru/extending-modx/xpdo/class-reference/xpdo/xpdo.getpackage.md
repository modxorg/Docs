---
title: "xPDO.getPackage"
description: "Возвращает имя пакета, к которому принадлежит класс."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getpackage"
---

## xPDO::getPackage

Возвращает имя пакета, к которому принадлежит класс, на основе его полного имени. Возвращает `null`, если класс не входит в зарегистрированный пакет.

## Синтаксис

```php
string|null getPackage (string $className)
```

## Пример

```php
$package = $xpdo->getPackage('MODX\\Revolution\\modResource');
// 'MODX\\Revolution'
```

## Смотрите также

-   [xPDO.getAlias](extending-modx/xpdo/class-reference/xpdo/xpdo.getalias "xPDO.getAlias")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")