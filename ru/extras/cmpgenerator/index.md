---
title: "CMPGenerator"
description: "GUI для генерации xPDO-схем и классов пользовательских таблиц MODX"
translation: "extras/cmpgenerator/index"
---

## Что такое CMPGenerator?

CMPGenerator рассчитан на PHP-разработчиков, которые создают пользовательские таблицы для сниппета, плагина или CMP. CMPGenerator это GUI: одной кнопкой вы получаете xPDO scheme files и классы для своих таблиц и быстро подключаете xPDO в проектах.

## Необходимые знания

Вам нужно понимать:

- Базы данных — [MySQL](http://dev.mysql.com/)
- [PHP](http://php.net)
- Затем можно использовать [XPDO](developing-in-modx/basic-development/xpdo "xPDO")
- [Стандарты кода MODX](developing-in-modx/code-standards "Code Standards")

## История

CMPGenerator написал Josh Gulledge для упрощения создания и подключения пользовательских таблиц к CMP, сниппету или плагину. Разработка началась в июле 2011, первый публичный релиз вышел в начале 2012 года.

### Установка

Установите CMPGenerator через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management"). Страница extra: <https://modx.com/extras/package/cmpgenerator>.

### Разработка и сообщения об ошибках

CMPGenerator на GitHub: <https://github.com/jgulledge19/CMPGenerator>, issues: <https://github.com/jgulledge19/CMPGenerator/issues>.

## Как использовать

- Создайте таблицы удобным способом: phpMyAdmin, SQLYog и т.д.
  Автоинкрементный первичный ключ лучше назвать id
- Создайте новый Package
    - Уникальное имя, желательно с префиксом пакетов.
      Пример по инициалам First Middle Last: fmlMyCustomPackage
      Используйте только буквы и цифры
    - Перечислите созданные таблицы через запятую
    - Укажите префикс таблиц. Лучше тот же, что у установки MODX.
    - Выберите Build Scheme, если нужна схема. Без этого таблицы не задействовать.
    - Выберите Build Package для генерации всех файлов.
- После создания файлов при связях между таблицами добавьте код вручную в core/components/YOUR-CMP/model/YOUR-CMP/YOUR-CMP.mysql.custom.schema.xml. См. [Defining Relationships](extending-modx/xpdo/custom-models/defining-a-schema/relationships).
  Обновите связи и перегенерируйте пакет: Build Scheme — No, Build Package — Yes, сохраните.

**Build Scheme** создаёт или пересоздаёт xml-файл. Если вы правили файл вручную, ставьте No.

**Build Package** создаёт или пересоздаёт xPDO class files (пакет).

При новом CMP CMPGenerator создаёт папки в assets/components/MYCMP и core/components/MYCMP.

## См. также

1. [CMPGenerator.5 minute example](extras/cmpgenerator/cmpgenerator.5-minute-example)
2. [CMPGenerator.Foreign Databases](extras/cmpgenerator/cmpgenerator.foreign-databases)
