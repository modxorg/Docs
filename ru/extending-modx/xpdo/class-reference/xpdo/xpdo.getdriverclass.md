---
title: "xPDO.getDriverClass"
description: "Возвращает класс, специфичный для драйвера, по имени базового класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getdriverclass"
---

## xPDO::getDriverClass

Возвращает полное имя класса, специфичного для драйвера, по имени указанного базового класса. Например, класс драйвера для `xPDO\Om\xPDOManager` в MySQL — это `xPDO\Om\mysql\xPDOManager`.

## Синтаксис

```php
string getDriverClass (string $class)
```

## Пример

```php
$managerClass = $xpdo->getDriverClass('xPDO\\Om\\xPDOManager');
```

## Смотрите также

-   [xPDO.getPlatformClass](extending-modx/xpdo/class-reference/xpdo/xpdo.getplatformclass "xPDO.getPlatformClass")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")