---
title: "fileLinkTpl"
description: "Чанк fileLinkTpl сниппета FileLister"
translation: "extras/filelister/filelister/filelinktpl"
---

## Чанк fileLinkTpl FileLister

Чанк для свойства &fileLinkTpl сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister"). Используется для ссылок каждой записи.

## Значение по умолчанию

``` php
<a href="[[+url]]">[[+filename]]</a>
```

## Доступные плейсхолдеры

| Имя     | Описание                             |
| -------- | --------------------------------------- |
| url      | URL для просмотра. |
| filename | Базовое имя файла или каталога. |

## См. также

1. [FileLister.FileLister](extras/filelister)
   1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
   2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
   3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
2. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
