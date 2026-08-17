---
title: "AdvSearch"
description: "Расширенный поиск для MODX Revolution: MySQL, Zend Lucene, фасетный поиск и поиск в пользовательских пакетах"
translation: "extras/advsearch"
---

## Что такое AdvSearch?

AdvSearch это расширение расширенного поиска для MODX Revolution. Поддерживает поиск через MySQL, опциональную индексацию Zend Lucene для динамического контента, фасетный поиск и поиск в пользовательских пакетах.

## Требования

- MODX Revolution 2.0.8 или новее (в документации пакета также указано 2.1+)
- PHP с включённой поддержкой многобайтовых строк (`use_multibyte` / mbstring)
- Кодировка UTF-8
- jQuery (поставляется с AdvSearch, в текущих деревьях пакета используется более новая сборка, чем в старой заметке про 1.5.1)
- Только для `&engine=` `zend` или `all`: библиотека ZendSearch Lucene (см. ниже)

Поиск только через MySQL (`&engine=` `mysql`, значение по умолчанию) не требует ZendSearch.

## История

AdvSearch написал [Coroico](https://github.com/coroico), первый релиз вышел 14 августа 2011 года. Основано на AjaxSearch для MODX Evolution от KyleJ/Coroico с опциональной индексацией Lucene через ZendSearch.

### Загрузка

Установите через Менеджер в [Управлении пакетами](developing-in-modx/advanced-development/package-management) или скачайте из репозитория Extras: <https://modx.com/extras/package/advsearch>

Если планируете использовать движок Zend Lucene, установите ZendSearch до индексации или поиска с этим движком (см. ниже).

### Разработка и отчёты об ошибках

Исходный код и issues на GitHub: <https://github.com/coroico/AdvSearch>

## Установка ZendSearch (движок Lucene)

Zend Framework стал [Laminas Project](https://getlaminas.org/). Laminas **не** принял компонент Lucene search. Официальной замены `laminas-search` для AdvSearch нет.

Текущий AdvSearch (см. `advsearch.zend.controller.class.php` на ветке [Development](https://github.com/coroico/AdvSearch)) подключает автозагрузчик Composer по пути:

`{libraryPath}ZendSearch/vendor/autoload.php`

По умолчанию `libraryPath` указывает на `core/components/advsearch/libraries/` (переопределите свойством AdvSearch `&libraryPath`, если храните библиотеки в другом месте). После установки нужен файл:

`core/components/advsearch/libraries/ZendSearch/vendor/autoload.php`

AdvSearch использует PHP API `\ZendSearch\Lucene\`.

### Установка через Composer (рекомендуется)

На сервере из корня MODX (подставьте свой путь, если Extra установлен иначе):

``` bash
mkdir -p core/components/advsearch/libraries/ZendSearch
cd core/components/advsearch/libraries/ZendSearch
composer require handcraftedinthealps/zendsearch
```

[`handcraftedinthealps/zendsearch`](https://github.com/handcraftedinthealps/ZendSearch) это поддерживаемый форк заброшенного пакета [`zendframework/zendsearch`](https://github.com/zendframework/ZendSearch). Сохраняет пространство имён `\ZendSearch\`, которое ожидает AdvSearch, и рассчитан на современный PHP.

Можно использовать `composer require zendframework/zendsearch`, если вас устраивает заброшенный upstream и более старые ограничения зависимостей.

Убедитесь, что autoload существует, затем задайте `&engine=` `zend` или `all` в вызовах AdvSearch и постройте индекс Lucene инструментами индексации AdvSearch.

### Почему не полный Laminas?

Laminas заменил большинство компонентов Zend Framework. ZendSearch Lucene уже был без сопровождения и не мигрировал. Подстановка типового релиза Laminas в `assets/libraries/Zend` (старый путь из документации) не удовлетворит текущий загрузчик AdvSearch.

## Использование

В AdvSearch в основном два сниппета: один выводит форму («AdvSearchForm»), другой показывает результаты поиска («AdvSearch»).
Третий сниппет («AdvSearchHelp») показывает окно справки по синтаксису запросов.

- [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm")
- [AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp "AdvSearch.AdvSearchHelp")
- [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch")

Шаблоны по умолчанию для формы и результатов поставляются как чанки. Они устанавливаются через управление пакетами.

## Примеры

Форма поиска и под ней результаты:

``` php
[[!AdvSearchForm]]

<h2>Results</h2>
[[!AdvSearch]]
```

Форма, которая отправляет на страницу результатов, ресурс 82 (там вызывается AdvSearch):

``` php
[[!AdvSearchForm? &landing=`82`]]
```

## См. также

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch/containertpl)
    2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch/extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch/paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch/paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch/tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/helplinktpl)
