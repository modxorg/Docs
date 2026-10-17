---
title: "xPDOTransport.getDependencies"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getdependencies"
---

## xPDOTransport::getDependencies

Возвращает список пакетов и версий PHP, которые требуются этому транспорту. Используйте его, чтобы проверить, можно ли установить пакет, до вызова [install()](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.install "xPDOTransport.install").

## Синтаксис

```php
array getDependencies ([array $requires = array()])
```

## Пример

```php
$deps = $transport->getDependencies();
```

## Смотрите также

-   [xPDOTransport.checkDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.checkdependencies "xPDOTransport.checkDependencies")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")