---
title: "directoryTpl"
description: "Чанк directoryTpl сниппета FileLister"
translation: "extras/filelister/filelister/directorytpl"
---

## Чанк directoryTpl FileLister

Чанк для свойства &directoryTpl сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister"). Используется для выводимых каталогов.

## Значение по умолчанию

``` php
<tr class="[[+cls]]">
    <td colspan="3" class="feo-dirname">[[+link]]</td>
</tr>
```

## Доступные плейсхолдеры

| Имя         | Описание                                                                                                                                     |
| ------------ | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| link         | Ссылка для перехода в каталог.                                                                                                               |
| filename     | Базовое имя каталога.                                                                                                                  |
| path         | Абсолютный путь к каталогу.                                                                                                             |
| relativePath | Относительный путь к свойству path сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister"). |
| navKey       | navKey для генерации ссылок.                                                                                                      |

## См. также

1. [FileLister.FileLister](extras/filelister)
    1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
    2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
    3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
    4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
