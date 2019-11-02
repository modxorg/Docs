---
title: "modFileHandler"
translation: "extending-modx/services/modfilehandler"
---

## Что такое modFileHandler?

`modFileHandler` - это класс сервиса, используемый в MODX Revolution для обработки файлов. Он абстрагирует основные действия по управлению файлами, предоставляя вспомогательные методы для управления файлами.

`modFileHandler`, `modFile` и `modDirectory` все еще находятся в стадии разработки. Многие другие методы будут добавлены к ним в Revolution 2.2.

## Использование modFileHandler

Основная идея, стоящая за `modFileHandler` заключается в его методе `make`. Когда прошел путь в `modFileHandler->make()`, он вернет либо `modDirectory` или `modFile` объекты, в зависимости от того, что было передано внутри него.

Например, простой сниппет, который делает объект `modDirectory` из переданного свойства "path" (по умолчанию "/www/test/") и затем удаляет каталог:

``` php
if (!isset($path)) $path = '/www/test/';

$modx->getService('fileHandler','modFileHandler');
$directory = $modx->fileHandler->make($path);
if (!is_object($directory) || !($directory instanceof modDirectory)) return 'Not a directory!';

if (!$directory->remove()) {
   return 'Could not remove directory.';
}
```

Вы также можете создавать объекты `modDirectory` или `modFile` из несуществующих путей. Это позволит вам запустить `->create()` для них, что позволит вам создавать новые каталоги или файлы. Например, чтобы создать новый файл с содержанием «Hello!» по пути "/www/test/test.txt":

``` php
$modx->getService('fileHandler','modFileHandler');
$file = $modx->fileHandler->make('/www/test/test.txt');
if (!$file->create('Hello!')) {
   return 'File not written.';
}
return 'File written.';
```
