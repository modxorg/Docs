---
title: "xPDOCacheManager.copyFile"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copyfile"
---

## xPDOCacheManager::copyFile

Копирует файл из исходного файла в целевой каталог. Принимает следующие параметры в качестве необязательного третьего параметра:

-   `copy_newer_only` - Если исходный файл старше целевого, он не будет копировать файл.
-   `copy_preserve_permissions` - xPDO попытается скопировать структуру разрешений из исходного файла в целевой объект. По умолчанию `false`.
-   `copy_preserve_filemtime` - xPDO попытается скопировать измененное время из исходного файла в целевой файл. По умолчанию true.
-   `copy_return_file_stat` - Значение `true` вернет информацию php [stat()](http://www.php.net/stat) в возвращаемом массиве. По умолчанию `false`.
-   `new_dir_permissions` - Разрешения для установки любых новых каталогов, которые были созданы в цели. (Также может быть 4-м параметром copyFile.) По умолчанию `0775`.
-   `new_file_permissions` - Разрешения для установки нового файла, если `copy_preserve_permissions` равно `false`. По умолчанию `0664`.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#copyFile>

```php
boolean|array copyFile (string $source, string $target, [array $options = array()])
```

## Пример

Копирование файла:

```php
$xpdo->cacheManager->copyFile('/my/path/to/file.txt','/my/new/path/dir/');
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
