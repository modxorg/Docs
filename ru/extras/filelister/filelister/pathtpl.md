---
title: "pathTpl"
description: "Чанк pathTpl сниппета FileLister"
translation: "extras/filelister/filelister/pathtpl"
---

## Чанк pathTpl FileLister

Чанк для свойства &pathTpl сниппета [FileLister](extras/filelister/filelister "FileLister.FileLister").

## Значение по умолчанию

``` html
<a href="[[~[[*id]]]]?[[+navKey]]=[[+key]]">[[+dir]]</a>[[+separator]]
```

## Доступные плейсхолдеры

| Имя      | Описание                                  |
| --------- | -------------------------------------------- |
| dir       | Имя каталога.                          |
| key       | Сгенерированный хеш для навигации.       |
| navKey    | navKey для генерации ссылок.   |
| separator | Разделитель между каталогами. |

## См. также

1. [FileLister.FileLister](extras/filelister)
    1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
    2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
    3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
    4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
