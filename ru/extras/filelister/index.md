---
title: "FileLister"
description: "Динамический листинг файлов и каталогов для MODX Revolution"
translation: "extras/filelister/index"
---

## Что такое FileLister?

FileLister это dynamic extra для листинга файлов в MODX Revolution. Вы выводите файлы в каталоге и безопасно переходите по подкаталогам.

## Требования

-   MODX Revolution 2.0.0-rc-2 или новее
-   PHP5 или новее

## История и сведения

FileLister написал Shaun McCormick (splittingred) как компонент динамического листинга файлов. Первый релиз вышел 30 июня 2010 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/filelister>

### Разработка и сообщения об ошибках

FileLister хранится и развивается на GitHub: <http://github.com/splittingred/FileLister>

## Использование

FileLister вызывают тегом сниппета с аргументом `path`.

### Сниппеты

FileLister поставляется с одним сниппетом:

-   [FileLister](extras/filelister/filelister "FileLister.FileLister")

### Системные настройки

| Имя            | Описание                       |
| --------------- | --------------------------------- |
| filelister.salt | Пользовательская соль для навигации. |

## Примеры

Список всех файлов и каталогов в assets/downloads.

```php
[[!FileLister? &path=`assets/downloads/`]]
```

Только файлы в каталоге assets/pdfs.

```php
[[!FileLister? &path=`assets/pdfs/`]]
```

Все файлы и подкаталоги в /docs/marketing без просмотра и скачивания, кроме пользователей в группах Marketing или CEO.

```php
[[!FileLister? &path=`/docs/marketing/` &allowDownloadGroups=`Marketing,CEO`]]
```

Только PDF в assets/pdfs:

```php
[[!FileLister? &path=`assets/pdfs/` &hideDirectories=`1` &showExt=`pdf`]]
```

## Пример содержимого ресурса

Пример HTML для ресурса. Нужно `toPlaceholder` со значением `files` и некэшированный вызов FileLister **до** этого HTML.

```html
<h2>Files</h2>

<p>Current Path: <span>[[+filelister.path]]</span></p>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Filesize</th>
            <th>Last Modified</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th colspan="3">
                Files: [[+filelister.total.files]] | Directories:
                [[+filelister.total.directories]]
            </th>
        </tr>
    </tfoot>

    <tbody>
        [[+files]]
    </tbody>
</table>
```

## См. также

1. [FileLister.FileLister](extras/filelister)
    1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
    2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
    3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
    4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
