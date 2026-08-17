---
title: "Установка из командной строки"
sortorder: "3"
_old_id: "349"
_old_uri: "2.x/getting-started/installation/command-line-installation"
translation: "getting-started/installation/cli"
---

Установка через CLI доступна только для MODX Revolution 2.2 и новее.

## Установка MODX через PHP CLI

MODX позволяет обновлять и устанавливать через командную строку (CLI) с config XML. Подробнее о файле [здесь](getting-started/installation/cli/config.xml "The Setup Config Xml File"). Так можно собрать простые скрипты для обновления установок MODX.

Перед обновлением **всегда** делайте backup файлов.

## Новая установка через CLI

[Скачайте MODX](https://modx.com/download/) и распакуйте файлы на сервер. В `setup/` скопируйте `config.dist.new.xml` в `config.xml`. MODX ищет `setup/config.xml` при установке. Файл можно вынести из `setup/` (и из webroot MODX) и указать путь аргументом `--config=/path/to/config.xml`.

Отредактируйте XML: данные БД, пути MODX и остальные параметры. В CLI перейдите в `setup/` и выполните:

``` php
php ./index.php --installmode=new
```

MODX установится и выведет время работы и ошибки (они также попадут в лог в `core/cache/logs/`).

Примечание: если core лежит не в стандартном месте, добавьте:

``` shell
--core_path=/path/to/core/
```

## Базовое обновление MODX через CLI

Как при новой установке, но в XML достаточно атрибутов:

- `inplace`
- `unpacked`
- `language`
- `remove_setup_directory`

И любых других, которые хотите изменить при обновлении. Пример: `config.dist.upgrade.xml`. Затем в `setup/`:

``` shell
php ./index.php --installmode=upgrade
```

Обновление завершится с отчётом о времени и ошибках (лог в `core/cache/logs/`).

## Расширенное обновление MODX через CLI

Как базовое обновление, но нужны все атрибуты из `config.dist.upgrade-advanced.xml`. При advanced upgrade меняется любой из них.

Затем в `setup/`:

``` shell
php ./index.php --installmode=upgrade-advanced
```

## Вспомогательный скрипт

На GitHub есть **installmodx.php**: [https://github.com/craftsmancoding/modx\_utils/blob/master/installmodx.php](https://github.com/craftsmancoding/modx_utils/blob/master/installmodx.php)

Он добавляет опции командной строки для этого процесса.

## Смотрите также

1. [Базовая установка](getting-started/installation/standard)
2. [Руководство Lighttpd](getting-started/friendly-urls/lighttpd)
3. [Установка на сервере с ModSecurity](getting-started/installation/troubleshooting/modsecurity)
4. [Конфигурация Nginx](getting-started/friendly-urls/nginx)
5. [Расширенная установка](getting-started/installation/advanced)
6. [Установка через Git](getting-started/installation/git)
7. [Установка из командной строки](getting-started/installation/cli)
8. [XML-файл конфигурации setup](getting-started/installation/cli/config.xml)
9. [Устранение неполадок при установке](getting-started/installation/troubleshooting)
10. [Установка прошла успешно, что дальше?](getting-started/getting-started)
