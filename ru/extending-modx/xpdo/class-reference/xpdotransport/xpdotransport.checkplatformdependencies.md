---
title: "xPDOTransport.checkPlatformDependencies"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.checkplatformdependencies"
---

## xPDOTransport::checkPlatformDependencies

Проверяет, доступны ли версия PHP и требуемые расширения, перечисленные в зависимостях. Возвращает `true`, если требования платформы выполнены, иначе — массив с описанием того, чего не хватает.

## Синтаксис

```php
boolean|array checkPlatformDependencies (array $dependencies)
```

## Пример

```php
$missing = xPDOTransport::checkPlatformDependencies(array(
    'php' => '>=8.1',
    'extensions' => array('pdo_mysql', 'json'),
));
```

## Смотрите также

-   [xPDOTransport.getDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getdependencies "xPDOTransport.getDependencies")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")