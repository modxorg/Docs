---
title: "xPDOCacheManager.copyTree"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copytree"
---

## xPDOCacheManager::copyTree

Рекурсивно копирует дерево каталогов из исходного каталога в целевой каталог. Принимает следующие параметры:

-   `new_dir_permissions` - разрешения для установки любых новых каталогов, которые были созданы в цели. (Также может быть 4-м параметром copyFile.) По умолчанию `0775`.
-   `new_file_permissions` - разрешения для установки нового файла, если`copy_preserve_permissions` ложно. По умолчанию `0664`.
-   `copy_exclude_items` - Массив имен файлов, которые нужно пропустить.
-   `copy_exclude_patterns` - массив или строка шаблонов, которые нужно исключить.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#copyTree>

```php
array|boolean copyTree (string $source, string $target, [array $options = array()])
```

## Пример

Копирование директории:

```php
$xpdo->cacheManager->copyTree('/my/old/dir/','/my/new/dir/');
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
