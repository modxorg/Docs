---
title: "xPDO.getDebugBacktrace"
description: "Возвращает трассировку текущего стека вызовов."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getdebugbacktrace"
---

## xPDO::getDebugBacktrace

Возвращает трассировку текущего стека вызовов, которую xPDO использует при ведении журнала на уровне отладки. Формат и глубина трассировки зависят от настроек отладки экземпляра.

## Синтаксис

```php
array getDebugBacktrace ()
```

## Пример

```php
$trace = $xpdo->getDebugBacktrace();
```

## Смотрите также

-   [xPDO.getDebug](extending-modx/xpdo/class-reference/xpdo/xpdo.getdebug "xPDO.getDebug")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")