---
title: "Тип медиа источника - FTP"
---

## FTP

**Имя типа**: File Transfer Protocol

Читает и записывает файлы на удалённом сервере по FTP. Входит в состав ядра (на базе Flysystem FTP-адаптера) и доступен в списке типов медиаисточников без установки чего-либо дополнительно.

### Свойства

| Свойство | Описание |
| --- | --- |
| `host` | Имя хоста FTP-сервера |
| `username` | Имя учётной записи |
| `password` | Пароль учётной записи |
| `port` | Порт FTP |
| `root` | Начальный каталог на сервере |
| `passive` | Использовать пассивный режим |
| `ssl` | Использовать FTPS (SSL/TLS) |
| `timeout` | Тайм-аут соединения в секундах |

### Использование

Создайте медиаисточник, как описано в [Создание медиаисточника](building-sites/media-sources/creating), выберите тип **File Transfer Protocol**, заполните параметры подключения, затем назначьте источник ТВ или используйте в коде. Общее описание — [Медиаисточники](building-sites/media-sources).

## Смотрите также

1. [Типы медиаисточников](building-sites/media-sources/types)
2. [Тип медиа источника - File System](building-sites/media-sources/types/media-source-type-file-system)
3. [Тип медиа источника - S3](building-sites/media-sources/types/media-source-type-s3)
