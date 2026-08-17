---
title: "Обновление до схемы v1.1"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1"
---

## Обновление моделей со схемы версии 1.0 до 1.1

В xPDO 2.0.0-rc3 в элемент `object` схемы xPDO добавили новый элемент для описания индексов таблиц. Чтобы сохранить обратную совместимость runtime-кода со старыми схемами, где индексы описывали атрибутами _index_ и _index\_group_ элементов `field`, схемы с новым элементом нужно отличать от старых. Поэтому к элементу `model` добавили атрибут _version_ со значением 1.1. Все устаревшие модели без элемента version считаются версией 1.0.

Чтобы упростить конвертацию существующих mysql-моделей, в xPDO есть инструмент, который запускают из командной строки или браузера.

### xpdo/tools/schema/upgrade-mysql-1.1.php

Этот простой инструмент принимает несколько аргументов, автоматически конвертирует определения индексов вашей модели 1.0 в формат 1.1 и добавляет version="1.1" к элементу `model`.

- Обязательные аргументы
    - **pkg** : имя пакета модели, который конвертируют.
    - **pkg\_path** : корневой путь пакета модели.
    - **schema\_name** : имя файла схемы xPDO для конвертации.
    - **schema\_path** : путь к файлу схемы.
- Необязательные аргументы
    - **backup\_path** : путь для записи резервной копии схемы. Если не указан, backup пишется в тот же каталог (schema\_path).
    - **backup\_prefix** : строка, которую добавляют в начало имени backup-файла схемы. По умолчанию `~`.
    - **dsn** : валидная строка PDO DSN.
    - **dbuser** : пользователь БД с доступом к указанному DSN.
    - **dbpass** : пароль для указанного dbuser.
    - **regen** : если true, после обновления схемы модель регенерируется.
    - **write** : если true, обновлённая схема записывается в файл, оригинал сохраняется в backup.
    - **echo** : если true, обновлённая схема выводится в STDOUT.
    - **debug** : задаёт уровень отладки xPDO. Если true, **echo** автоматически становится true.
    - **include** : внешний файл свойств, из которого подключают аргументы.
    - **error\_reporting** : уровень PHP error\_reporting для скрипта. По умолчанию -1 (ошибки не сообщаются).
    - **display\_errors** : настройка PHP display\_errors. По умолчанию true.

#### Правила аргументов

- Должен быть задан хотя бы один из четырёх аргументов: **echo**, **write**, **regen** или **debug**.
- Аргумент **write** нельзя использовать, если **debug** равен true.
- **regen** можно использовать только когда задан **write** или схема уже версии 1.1.

### Использование

**realpath() для аргументов путей**
Все значения аргументов \_path (и аргумента include) проходят через realpath().

#### Запуск как CLI-скрипт

CLI-аргументы задают в формате:

``` php
--argument[=value]
```

**булевы аргументы**
Если знак равенства и значение не указаны, значение аргумента становится boolean true.

Пример вызова CLI:

``` php
user@hostname:/home/user/xpdo$ php xpdo/tools/schema/upgrade-mysql-1.1.php --pkg=sample --pkg_path=models/ --schema_name=sample.mysql.schema.xml --schema_path=schemas/ --echo --write --regen
```

Либо используйте аргумент include, чтобы задать свойства из внешнего файла.

Пример файла свойств `sample.schema.properties.php`:

``` php
<?php
$pkg='sample';
$pkg_path='models/';
$schema_name='sample.mysql.schema.xml';
$schema_path='schemas/';
$echo=true;
$write=true;
$regen=true;
```

Пример CLI-вызова с файлом свойств:

``` php
user@hostname:/home/user/xpdo$ php xpdo/tools/schema/upgrade-mysql-1.1.php --include=sample.schema.properties.php
```

**CLI-аргументы перекрывают файл свойств**
Любые аргументы в CLI-вызове перекрывают значения, заданные и подключённые из файла свойств.

#### Запуск как web-запрос

Скрипт можно выполнить и как web-запрос, передав аргументы как переменные $\_REQUEST, $\_GET, $\_POST или $\_COOKIE. Пример URL такого вызова:

``` php
http://localhost/food/xpdo/tools/schema/upgrade-mysql-1.1.php?pkg=sample&pkg_path=models/&schema_name=sample.mysql.schema.xml&schema_path=schemas/&echo=true&write=true&regen=true
```

**булевы аргументы**
Чтобы задать boolean true, передайте строку `true`. Иначе значение считается boolean false.
