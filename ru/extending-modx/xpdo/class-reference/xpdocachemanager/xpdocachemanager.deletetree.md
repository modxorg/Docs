---
title: "xPDOCacheManager.deleteTree"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.deletetree"
---

## xPDOCacheManager::deleteTree

Рекурсивно удаляет дерево каталогов файлов.

В массиве параметров доступны следующие параметры:

-   `deleteTop` - если `true`, удалит указанную верхнюю директорию. По умолчанию `false`.
-   `skipDirs` - если `true`, не удалит каталоги, только файлы. По умолчанию `false`.
-   `extensions` - Массив расширений файлов для фильтрации - удалит только файлы с этими расширениями. Установите в `null` или `false`, чтобы удалить все файлы.
-   `delete_exclude_items` - массив имен файлов, которые нужно пропустить.
-   `delete_exclude_patterns` - массив или строка шаблонов, по которым нужно исключить.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#deleteTree>

```php
boolean deleteTree (string $dirname, [array $options = array(
   'deleteTop' => false,
   'skipDirs' => false,
   'extensions' => array('.cache.php')
)])
```

## Пример

Удаление каталога `/modx/assets/videos/` (при условии, что установлена константа `MODX_ASSETS_PATH`) и все файлы в нем:

```php
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => false,
));
```

Удаление только файлов с форматом .flv в указанном выше каталоге:

```php
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => array('.flv'),
));
```

Удаление всех фильмов в указанном выше каталоге, кроме george.mov, buddies.flv и любого имени файла, содержащего слово «fun».

```php
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => false,
   'delete_exclude_items' => array('george.mov','buddies.flv'),
   'delete_exclude_patterns' => '/fun/i',
));
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
