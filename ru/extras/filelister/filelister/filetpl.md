---
title: "fileTpl"
description: "Чанк fileTpl сниппета FileLister"
translation: "extras/filelister/filelister/filetpl"
---

## Чанк fileTpl FileLister

Чанк для свойства &fileTpl сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister").

## Значение по умолчанию

``` html
<tr class="[[+cls]]">
    <td class="feo-filename">[[+link]]</td>
    <td class="feo-filesize">[[+filesize]]</td>
    <td class="feo-lastmod">[[+lastmod:date=`[[+dateFormat]]`]]</td>
</tr>
```

## Доступные плейсхолдеры

| Имя         | Описание                                                                                                                                     |
| ------------ | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| link         | Ссылка для просмотра или скачивания файла.                                                                                                          |
| filename     | Базовое имя файла.                                                                                                                       |
| filesize     | Размер файла, отформатированный.                                                                                                                        |
| bytesize     | Размер файла в байтах.                                                                                                                  |
| extension    | Расширение файла.                                                                                                                 |
| lastmod      | Дата последнего изменения в формате timestamp.                                                                                                    |
| dateFormat   | Строка dateFormat сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister").                    |
| path         | Абсолютный путь к файлу.                                                                                                                  |
| relativePath | Относительный путь к свойству path сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister"). |
| navKey       | navKey для генерации ссылок.                                                                                                      |

## См. также

1. [FileLister.FileLister](extras/filelister)
   1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
   2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
   3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
   4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
