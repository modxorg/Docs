---
title: "xPDO.getPlatformClass"
description: "Возвращает класс, специфичный для платформы, по имени класса предметной области."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getplatformclass"
---

## xPDO::getPlatformClass

Возвращает полное имя класса, специфичного для платформы, по имени указанного класса предметной области. Класс платформы хранит статическую карту метаданных (`$metaMap`) для класса на текущей платформе базы данных.

## Синтаксис

```php
string getPlatformClass (string $domainClass)
```

## Пример

```php
$platformClass = $xpdo->getPlatformClass('MODX\\Revolution\\modResource');
```

## Смотрите также

-   [xPDO.getDriverClass](extending-modx/xpdo/class-reference/xpdo/xpdo.getdriverclass "xPDO.getDriverClass")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")