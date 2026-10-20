---
title: "Источники файлов"
translation: "building-sites/media-sources"
description: "Источники файлов в MODX: что это, три типа источника из ядра и куда идти дальше."
---

## Что такое источники файлов

Источник файлов указывает MODX, где читать и записывать файлы мультимедиа. Он используется в трёх местах:

- в дереве файлов слева;
- в окне MODX.Browser;
- в TV с типом ввода «Изображение» и «Файл».

![](sources-tree2.png)

## Типы источников

У каждого источника есть тип, который решает, где лежат файлы. В ядре MODX поставляется три типа:

| Тип источника | Где лежат файлы |
| --- | --- |
| [Файловая система](building-sites/media-sources/types/media-source-type-file-system "Тип источника файлов - Файловая система") | Каталог на сервере, где работает MODX |
| [FTP](building-sites/media-sources/types/media-source-type-ftp "Тип источника файлов - FTP") | Удалённый сервер, доступный по FTP |
| [Amazon S3](building-sites/media-sources/types/media-source-type-s3 "Тип источника файлов - S3") | Корзина S3 |

Другие типы приходят из пакетов и из вашего собственного кода. Смотрите [Расширение источников файлов](building-sites/media-sources/extending "Расширение источников файлов").

## Смотрите также

1. [Источники файлов](building-sites/media-sources)
2. [Добавление источника файлов](building-sites/media-sources/creating)
3. [Назначение источника файлов для TV](building-sites/media-sources/assigning-to-tvs)
4. [Защита медиа источника](building-sites/media-sources/securing)
   1. [Руководство по созданию источника файлов для клиентов](building-sites/media-sources/securing/clients-tutorial)
5. [Типы источника файлов](building-sites/media-sources/types)
   1. [Тип источника файлов - Файловая система](building-sites/media-sources/types/media-source-type-file-system)
   2. [Тип источника файлов - FTP](building-sites/media-sources/types/media-source-type-ftp)
   3. [Тип источника файлов - S3](building-sites/media-sources/types/media-source-type-s3)
6. [Расширение источников файлов](building-sites/media-sources/extending)
