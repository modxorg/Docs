---
title: "xPDOCacheManager.get"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.get"
---

## xPDOCacheManager::get

Получает значение от поставщика кеша по ключу.

Также позволяет передавать массив опций. Текущие доступные значения:

-   `format` - если равно `XPDO_CACHE_JSON`, просто получит содержимое массива. Это полезно, если вы `set()` кешировали с помощью `XPDO_CACHE_JSON`, чтобы лучше обрабатывать данные JSON.
-   `removeIfEmpty` - если установлено значение `true`, файл кэша будет удален, если он пуст. Это действие по умолчанию.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#get>

```php
mixed get (string $key, [array $options = array()])
```

## Пример

Получить запись кэша 'test' в строку:

```php
$test = $xpdo->cacheManager->get('test');
```

Получите данные нашего JSON-кэша под названием «myjson»:

```php
$myJsonData = $xpdo->cacheManager->get('myjson',array('format' => xPDO::CACHE_JSON));
```

## Смотрите также

1. [xPDOCacheManager.copyFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copyfile)
2. [xPDOCacheManager.copyTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copytree)
3. [xPDOCacheManager.delete](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.delete)
4. [xPDOCacheManager.deleteTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.deletetree)
5. [xPDOCacheManager.endsWith](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.endswith)
6. [xPDOCacheManager.escapeSingleQuotes](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes)
7. [xPDOCacheManager.get](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.get)
8. [xPDOCacheManager.getCachePath](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcachepath)
9. [xPDOCacheManager.getCacheProvider](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider)
10. [xPDOCacheManager.matches](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.matches)
11. [xPDOCacheManager.replace](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.replace)
12. [xPDOCacheManager.writeFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.writefile)
13. [xPDOCacheManager.set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set)
14. [xPDOCacheManager.writeTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.writetree)
15. [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
