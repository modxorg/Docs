---
title: "Upload to Users CMP"
description: "CMP для загрузки файлов зарегистрированным пользователям MODX"
translation: "extras/upload-to-users-cmp/index"
---

## Upload to Users CMP

Custom Manager Page (CMP) для загрузки файлов зарегистрированным пользователям в указанную родительскую папку.

Extra: <https://modx.com/extras/package/uploadtouserscmp> .
GitHub: <https://github.com/goldsky/UploadToUsers> .

Полезно для отдельных папок каждого пользователя и вывода через FileLister или FileDownload R (>=1.0.0-rc.4) по ID или username.

## Examples

``` php
[[FileLister? &path=`assets/userfile/[[+modx.user.id]]/`]]
[[FileDownload? &getDir=`assets/userfile/[[+modx.user.username]]/`]]
```

С версии 1.0-pl добавлена таблица с метаданными файлов для замены имени в списке и описания.

![](uploadtousers-1.0-pl.jpg)

## Upload to Users Snippet

Сейчас только с [FileDownload R](extras/filedownload-r "FileDownload R"), у ссылки свой placeholder.

## Examples

Измените шаблон FileDownload с:

``` html
<tr[[+fd.class]]>
    <td style="width:16px;"><img src="[[+fd.image]]" alt="[[+fd.image]]" /></td>
    <td><a href="[[+fd.link]]"[[+fd.linkAttribute]]>[[+fd.filename]]</a>
        <span style="font-size:80%">([[+fd.count]] downloads)</span>
    </td>
    <td>[[+fd.sizeText]]</td>
    <td>[[+fd.date]]</td>
</tr>
[[-- This is the description row if the &chkDesc=`chunkName` is provided --]]
[[+fd.description:notempty=`<tr>
    <td></td>
    <td colspan="3">[[+fd.description]]</td>
</tr>`:default=``]]
```

на, например:

``` html
<tr[[+fd.class]]>
    <td style="width:16px;"><img src="[[+fd.image]]" alt="[[+fd.image]]" /></td>
    <td><a href="[[+fd.link]]"[[+fd.linkAttribute]]>
            [[!uploadtousers:default=`[[+fd.filename]]`? &path=`[[+fd.fullPath]]` &field=`title`]]
        </a>
        <span style="font-size:80%">([[+fd.count]] downloads)</span>
    </td>
    <td>[[+fd.sizeText]]</td>
    <td>[[+fd.date]]</td>
</tr>
<tr>
    <td></td>
    <td colspan="3">[[!uploadtousers? &path=`[[+fd.fullPath]]` &field=`description`]]</td>
</tr>
```

Вывод FileDownload изменится так:

![](fdl-u2u.jpg)

## Properties

| Name          | Description                                                 | Default Value |
| ------------- | ----------------------------------------------------------- | ------------- |
| path          | полный путь к файлу/папке **(mandatory)** |               |
| field         | поле таблицы для чтения                           | title         |
| toArray       | dump вывода как array instead                         |               |
| toPlaceholder | вывод в placeholder instead                |               |

Поля: id, dir\_path, name, title, description.
