---
title: "xPDO.getLoader"
description: "Возвращает загрузчик классов, используемый экземпляром xPDO."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getloader"
---

## xPDO::getLoader

Возвращает экземпляр `Composer\Autoload\ClassLoader`, который xPDO использует для загрузки классов модели. С его помощью можно зарегистрировать дополнительные префиксы PSR-4.

## Синтаксис

```php
\Composer\Autoload\ClassLoader getLoader ()
```

## Пример

```php
$loader = $xpdo->getLoader();
$loader->addPsr4('MyVendor\\', MODX_CORE_PATH . 'components/myvendor/src/');
```

## Смотрите также

-   [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass "xPDO.loadClass")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")