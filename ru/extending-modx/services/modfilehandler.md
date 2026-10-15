---
title: "modFileHandler"
translation: "extending-modx/services/modfilehandler"
---

## Что такое modFileHandler?

`modFileHandler` - это класс сервиса, используемый в MODX Revolution для обработки файлов. Он абстрагирует основные действия по управлению файлами, предоставляя вспомогательные методы для управления файлами.

## Использование modFileHandler

Основная идея, стоящая за `modFileHandler`, заключается в его методе `make`:

``` php
modFile make (string $path, array $options = array(), string $overrideClass = '')
```

Переданный в `make()` путь проверяется на файловой системе: если путь является существующим каталогом, возвращается объект `modDirectory`, иначе — объект `modFile`, в том числе для еще не существующих путей. Необязательный параметр `$overrideClass` принудительно задает возвращаемый класс независимо от пути — именно так создается объект `modDirectory` для еще не существующего каталога.

В MODX 3 класс живет в неймспейсе `MODX\Revolution\File` и глобального алиаса у него нет, поэтому загружайте его по FQCN:

``` php
$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);
```

Например, простой сниппет, который делает объект `modDirectory` из переданного свойства "path" (по умолчанию "/www/test/") и затем удаляет каталог:

``` php
if (!isset($path)) $path = '/www/test/';

$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);
$directory = $modx->fileHandler->make($path);
if (!is_object($directory) || !($directory instanceof \MODX\Revolution\File\modDirectory)) return 'Not a directory!';

if (!$directory->remove()) {
   return 'Could not remove directory.';
}
```

Вы также можете готовить объекты `modDirectory` или `modFile` из несуществующих путей. Это позволит вам запустить `->create()` для них, что позволит вам создавать новые каталоги или файлы. Для нового **файла** просто передайте путь — несуществующий путь по умолчанию дает `modFile`. Для нового **каталога** передайте класс явно через `$overrideClass`, иначе несуществующий путь даст `modFile`:

``` php
$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);

// create a new file with the content of 'Hello!'
$file = $modx->fileHandler->make('/www/test/test.txt');
if (!$file->create('Hello!')) {
   return 'File not written.';
}

// create a new directory
$directory = $modx->fileHandler->make('/www/test/subdir', array(), \MODX\Revolution\File\modDirectory::class);
if (!$directory->create()) {
   return 'Directory not created.';
}
return 'File and directory written.';
```

Массив `$options` передается в конструктор `modFile`/`modDirectory`. Два его ключа управляют правами доступа для создаваемых ресурсов: `new_file_permissions` (по умолчанию `0644`) и `new_folder_permissions` (по умолчанию `0755`, либо `0775` в Windows).

## Обзор API

Помимо `make()`, обработчик предлагает вспомогательные методы для работы с путями, а сами операции с файловой системой выполняют объекты файлов и каталогов. И `modFile`, и `modDirectory` наследуют `modFileSystemResource`, который добавляет общие файловые помощники.

- **modFileHandler**: `getBasePath()`, `getBaseUrl()`, `sanitizePath($path)`, `postfixSlash($path)`, `getDirectoryFromFile($fileName)`, `isBinary($file)`.
- **modFile**: `create($content = '', $mode = 'w+')`, `write($content, $mode)`, `save($content, $mode)`, `setContent($content)`, `getContents()`, `remove()`, `unpack($to, $options)`, `download($options)`, `getSize()`, `getExtension()`, `getBaseName()`, `getLastAccessed()`, `getLastModified()`.
- **modDirectory**: `create($mode = '')`, `remove($options = array())`, `getList($options = array())` — `getList()` возвращает содержимое каталога в виде массивов (файлы и подкаталоги).
- **modFileSystemResource** (общий базовый класс): `getPath()`, `exists()`, `isReadable()`, `isWritable()`, `isLink()`, `chmod($mode)`, `chown($owner)`, `chgrp($grp)`, `rename($newPath)`, `move($newPath)`, `getParentDirectory()`, `getGroup()`, `setGroup($grp)`.
