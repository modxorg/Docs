---
title: "xPDOCacheManager.set"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set"
---

## xPDOCacheManager::set

Устанавливает пару ключ-значение в поставщике кэша.

Также позволяет передавать массив опций. Текущие доступные значения:

-   `format` - если равно `XPDO_CACHE_JSON`, будет указывать строку как единственные данные в файле (а не как возвращение строки). Это полезно, если вы хотите более правильный синтаксический анализ данных JSON.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#set>

```php
boolean set (string $key, mixed &$var, [integer $lifetime = 0], [array $options = array()])
```

## Пример

Задайте для файла кэша указанную строку, срок действия которой истекает через 2 часа.

```php
$str = 'This will be cached.';
$xpdo->cacheManager->set('mycachefile',$str,7200);
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
