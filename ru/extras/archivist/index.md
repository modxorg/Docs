---
title: "Archivist"
description: "Extra для навигации по архивам в MODX Revolution: списки по месяцам, годам и дням, автогенерация FURL"
translation: "extras/archivist"
---

## Что такое Archivist?

Archivist это extra для навигации по архивам в MODX Revolution. Он даёт навигацию по ресурсам в стиле WordPress, а также списки архивов по месяцам, годам и дням и автоматическую генерацию FURL.

Если вам нужен блог, посмотрите [Articles](extras/articles "Articles"). Там Archivist уже встроен в удобный интерфейс.

## Требования

- MODX Revolution 2.0.0-RC-2 или новее
- PHP 5 или новее
- Для FURL может понадобиться заменить расширение «.html» на «/»: Контент → Типы контента → HTML (.html) → /

## История

Archivist написал [Shaun McCormick](https://github.com/splittingred) как компонент архивирования в стиле WordPress. Первый релиз вышел 3 июня 2010 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/archivist>

### Разработка и сообщения об ошибках

Исходный код Archivist хранится на GitHub: <http://github.com/splittingred/Archivist>

Ошибки можно сообщать здесь: <https://github.com/modxcms/Archivist/issues>

## Использование

В Archivist два сниппета: один показывает список по месяцам, годам и дням («Archivist»), другой выводит результаты архива («getArchives»).

- [Archivist](extras/archivist/archivist "Archivist"): ссылки навигации по архивам.
- [getArchives](extras/archivist/archivist.getarchives "getArchives"): результаты архивов.

## Примеры

Выведите архивы сайта со списком месяцев для ресурсов с родителями 54 и 55. На ресурсе с ID 123 покажите ресурсы за выбранный месяц.

Вызов для списка месяцев:

``` php
[[!Archivist? &parents=`54,55` &target=`123`]]
```

На странице архивов:

``` php
[[!getArchives?
   &parents=`54,55`
   &toPlaceholder=`archives`
]]

<h2>[[!+arc_month_name]] [[!+arc_year]] Archives</h2>

[[!+archives]]
```

## См. также

1. [Сниппет Archivist](extras/archivist/archivist)
    1. [Archivist tpl](extras/archivist/archivist/tpl)
2. [Сниппет ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](extras/archivist/archivist.getarchives)
    1. [Archivist.getArchives.tpl](extras/archivist/archivist.getarchives/tpl)
