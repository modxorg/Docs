---
title: Сбока model/schema
translation: "contribute/code/tooling/model"
---

Изменения в основной модели (добавление/изменение/удаление полей или таблиц базы данных) необходимо применить к файлам схемы XML в `core/model/schema/`.

После внесения изменений в схему их необходимо встроить в файлы модели для использования xPDO.

## Подготовка

Если вы еще этого не сделали, убедитесь, что вы скопировали `_build/build.properties.sample.php` в` _build/build.properties.php`. Никаких изменений в файл не требуется.

## Сборка

Используйте Composer, чтобы запустить сценарий сборки для всех файлов схемы и построить файлы модели:

``` bash
composer run-script parse-schema
```

или

``` bash
php composer.phar run-script parse-schema
```
