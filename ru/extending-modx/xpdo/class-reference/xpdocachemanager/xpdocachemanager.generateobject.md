---
title: "xPDOCacheManager.generateObject"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.generateobject"
---

## xPDOCacheManager::generateObject

Генерирует файл кеша для объекта, по желанию включая его объектные переменные и связанные объекты. Используется кеш-провайдерами для сериализации объекта перед записью.

## Синтаксис

```php
mixed generateObject (object $obj, string $objName, [boolean $generateObjVars = false], [boolean $generateRelated = false], [string $objRef = 'this->xpdo'], [integer $format = xPDO\Cache\xPDOCacheManager::CACHE_PHP])
```

## Пример

```php
$cacheManager->generateObject($resource, 'resource');
```

## Смотрите также

-   [set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "set")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")