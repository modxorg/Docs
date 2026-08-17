---
title: "Databackup"
description: "Сниппет резервного копирования MySQL базы MODX и других баз данных"
translation: "extras/databackup/index"
---

## Что такое Databackup?

Databackup. [Snippet](developing-in-modx/basic-development/snippets "Snippets") для MODX Revolution, который создаёт резервную копию MySQL базы MODX одним sql dump и/или отдельным dump для каждой таблицы, а также других MySQL баз. Extra использует PDO и теоретически может работать с другими СУБД, например MSSQL, но это не тестировалось.

## История

Databackup написал Josh Gulledge для простого резервного копирования данных, первый релиз. 12 августа 2011 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/databackup>

### Разработка и сообщения об ошибках

Databackup хранится и разрабатывается на GitHub: <https://github.com/jgulledge19/DataBackup>

Баги: <https://github.com/jgulledge19/DataBackup/issues>

## Как использовать

1. Установите через package manager
2. Установите настройку databackup.folder выше web root. По умолчанию: core/components/databackup/dumps/
3. При необходимости задайте purge time (databackup.pruge), по умолчанию 1814400 (21 день).
4. Настройте Cron Manager: [CronManager](extras/cronmanager) и создайте задачу.
5. Выберите сниппет backup и интервал в минутах. 24 часа = 1440 минут.

### Использование с getCache

См.: [getcache](http://www.jasoncoward.com/technology/2010/10/simple-content-caching-with-getcache.html) для примеров getCache.

Простое резервное копирование каждые 24 часа (если страницу посещают) или чаще при сбросе кэша. Старые копии старше 21 дня удаляются.

``` php
[[!getCache?
&element=`backup`
&excludeTables=`my_custom_table,my_other_custom_table`
&cacheExpires=`86400`
]]
```

### [System Settings](building-sites/settings "System Settings")

Создайте их, если их нет.

| Name        | Key               | Field Type | Namespace  | Description                                                                                               | Default Value                            |
| ----------- | ----------------- | ---------- | ---------- | --------------------------------------------------------------------------------------------------------- | ---------------------------------------- |
| Folder      | databackup.folder | Textfield  | databackup | Путь к папке для .sql файлов. PHP должен иметь права записи. | {core\_path}components/databackup/dumps/ |
| Purge Files | databackup.purge  | Textfield  | databackup | Удалять файлы старше указанного времени в секундах. По умолчанию 1814400 (21 день).             | 1814400                                  |

#### WARNING

Будьте осторожны с путём databackup.folder. Если указать существующую папку, все файлы старше purge date будут удалены. Рекомендуется отдельная папка для бэкапов выше public WWW.

### Доступные свойства

Есть пример сниппета backupMany. Его можно изменить для бэкапа других баз.

Version 1.1

| Name            | Description                                                                                          | Default Value |
| --------------- | ---------------------------------------------------------------------------------------------------- | ------------- |
| database        | База для бэкапа.                                                                     | modx          |
| includeTables   | Список таблиц через запятую для включения. Остальные исключаются. | NULL          |
| excludeTables   | Список таблиц через запятую для исключения. Остальные включаются.                        | NULL          |
| writeFile       | Boolean. Один большой SQL dump. options: true/false                                 | true          |
| writeTableFiles | Boolean. Отдельный SQL dump на таблицу. options: true/false               | true          |
| commentPrefix   | Префикс SQL-комментария.                                                                     |. |
| commentSuffix   | Суффикс комментария SQL. По умолчанию пусто                                                       |               |
| newLine         | Символ новой строки в SQL файлах.                                                          | \\n           |
| useDrop         | Boolean true/false для DROP TABLE в SQL файлах                                        | true          |
| createDatabase  | Boolean true/false для CREATE DATABASE в SQL файлах                                 | false         |
