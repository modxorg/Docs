---
title: "xPDOManager.getTransport"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.gettransport"
---

## xPDOManager::getTransport

Возвращает специфичный для драйвера экземпляр [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport") для этого соединения. Объекты транспорта упаковывают модели и связанные файлы в транспортные архивы и устанавливают их.

## Синтаксис

```php
xPDOTransport|null getTransport ()
```

## Пример

```php
$manager = $xpdo->getManager();
$transport = $manager->getTransport('my_package', MODX_CORE_PATH . 'packages/');
```

## Смотрите также

-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")