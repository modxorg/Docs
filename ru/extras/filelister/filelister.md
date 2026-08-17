---
title: "FileLister"
description: "Сниппет листинга файлов и каталогов FileLister"
translation: "extras/filelister/filelister"
---

## Сниппет FileLister

Сниппет выводит список файлов и/или каталогов по заданному пути.

## Использование

Разместите сниппет где угодно и передайте path:

``` php
[[FileLister? &path=`assets/downloads/`]]
```

## Свойства

| Имя                | Описание                                                                                                                                                                                | Значение по умолчанию                                    |
| ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------ |
| path                | Начальный путь для просмотра.                                                                                                                                                             |                                                  |
| fileTpl             | Чанк для каждого файла.                                                                                                                                                           | feoFile                                          |
| directoryTpl        | Чанк для каждого каталога.                                                                                                                                                      | feoDirectory                                     |
| fileLinkTpl         | Чанк ссылок для каждой записи.                                                                                                                                                  | feoFileLink                                      |
| dateFormat          | Формат даты PHP для поля last modified.                                                                                                                                             | %b %d, %Y                                        |
| outputSeparator     | Разделитель после каждой записи.                                                                                                                                              | \\n                                              |
| skipDirs            | Список имён каталогов через запятую, которые всегда пропускать.                                                                                                                                  | .svn, .git, .metadata, .tmp, .DS\_Store, \_notes |
| placeholderPrefix   | Префикс глобальных плейсхолдеров сниппета.                                                                                                                        | filelister                                       |
| pathSeparator       | Разделитель элементов в плейсхолдере +path.                                                                                                                            | /                                                |
| pathTpl             | Чанк для каждого элемента плейсхолдера +path.                                                                                                                                          | feoPathLink                                      |
| showFiles           | При false файлы скрываются.                                                                                                                                            | 1                                                |
| showDirectories     | При false каталоги скрываются.                                                                                                                                      | 1                                                |
| showExt             | Расширения через запятую (без точки) для ограничения файлов. Пусто — все файлы. Указаны — только с этими расширениями. |                                                  |
| sortBy              | Поле сортировки: extension, lastmod, bytesize или filename.                                                                                              | filename                                         |
| sortDir             | Направление сортировки.                                                                                                                                                    | ASC                                              |
| allowDownload       | При false отключает просмотр и скачивание файлов.                                                                                                                                 | 1                                                |
| requireAuthDownload | При true требует авторизацию для просмотра или скачивания.                                                                                                                       | 0                                                |
| allowDownloadGroups | Список групп через запятую для ограничения просмотра/скачивания.                                                                              |                                                  |
| toPlaceholder       | Имя плейсхолдера вместо прямого вывода.                                                                                   |                                                  |
| navKey              | Ключ навигации REQUEST для просмотра.                                                                                                                                          | fd                                               |
| homePathName        | Пользовательское имя корня при просмотре.                                                                                                               |                                                  |
| limit               | Необязательно. Лимит записей. 0 — все.                                                                                                                    | 0                                                |
| cls                 | CSS-класс обычных строк.                                                                                                                                               | feo-row                                          |
| altCls              | CSS-класс чередующихся строк.                                                                                                                                                   | feo-alt-row                                      |
| firstCls            | CSS-класс первой строки.                                                                                                                                                    | feo-first-row                                    |
| lastCls             | CSS-класс последней строки.                                                                                                                                                     | feo-last-row                                     |
| useGeolocation      | При true использует геолокацию [ipinfodb](http://ipinfodb.com) для скачиваний. Нужен filelister.ipinfodb\_api\_key с вашим API-ключом.     | 1                                                |

## Чанки FileLister

FileLister обрабатывает 4 чанка:

- [fileTpl](extras/filelister/filelister/filetpl "FileLister.FileLister.fileTpl") — чанк для каждого файла.
- [directoryTpl](extras/filelister/filelister/directorytpl "FileLister.FileLister.directoryTpl") — чанк для каждого каталога.
- [fileLinkTpl](extras/filelister/filelister/filelinktpl "FileLister.FileLister.fileLinkTpl") — чанк ссылок для каждой записи.
- [pathTpl](extras/filelister/filelister/pathtpl "FileLister.FileLister.pathTpl") — чанк элементов плейсхолдера path.

## Примеры

Только файлы в assets/downloads/:

``` php
[[!FileLister? &path=`assets/downloads` &showDirectories=`0`]]
```

## См. также

1. [FileLister.FileLister](extras/filelister)
    1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
    2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
    3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
    4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
