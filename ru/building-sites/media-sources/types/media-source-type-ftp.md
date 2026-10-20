---
title: "Тип медиа источника - FTP"
translation: "building-sites/media-sources/types/media-source-type-ftp"
---

## Тип медиа источника - FTP

Этот тип источника читает и записывает файлы на удалённом сервере по FTP. Он входит в состав ядра, основан на адаптере Flysystem для FTP и доступен в списке типов без установки чего-либо дополнительно.

## Доступные свойства

| Имя | Описание |
| --- | --- |
| `host` | Имя хоста FTP-сервера. |
| `username` | Учётная запись для входа. **По умолчанию**: `anonymous` |
| `password` | Пароль учётной записи. |
| `root` | Каталог, с которого начинает источник. |
| `url` | Публичный адрес файлов, например `https://files.example.com/`. По нему строятся превью в менеджере. |
| `port` | Порт FTP-сервера. **По умолчанию**: `21` |
| `passive` | Использовать пассивный режим. **По умолчанию**: `true` |
| `ssl` | Использовать FTPS, FTP поверх SSL. **По умолчанию**: `false` |
| `timeout` | Тайм-аут соединения, в секундах. **По умолчанию**: `30` |
| `imageExtensions` | Расширения через запятую, которые считаются изображениями. **По умолчанию**: `jpg,jpeg,png,gif,webp` |
| `skipFiles` | Имена через запятую, которые нужно скрывать. **По умолчанию**: `.svn,.git,_notes,nbproject,.idea,.DS_Store` |
| `skipExtensions` | Расширения через запятую, которые нужно скрывать. **По умолчанию**: пусто |

## Превью и видимость

Превью объекта — это адрес самого объекта, собранный из свойства `url`. Этот тип не создаёт миниатюры, поэтому у него нет свойств `thumbnailType` и `thumbnailQuality`.

У этого типа нет свойства `visibility`, поэтому новые файлы всегда создаются публичными. Видимость уже существующего файла всё же можно сменить в менеджере.

## Использование источника

Создайте источник, как описано в статье [Добавление источника файлов](building-sites/media-sources/creating "Добавление источника файлов"), выберите тип **File Transfer Protocol**, заполните параметры подключения, а затем назначьте источник TV или используйте его в коде.

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
