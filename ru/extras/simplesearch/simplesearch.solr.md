---
title: "Solr"
description: "Настройка поиска Solr в SimpleSearch"
translation: "extras/simplesearch/simplesearch.solr"
---

## Требования для поиска Solr

Поиск Solr в SimpleSearch имеет несколько требований:

- Вы используете SimpleSearch версии 1.4 или новее
- Установлен пакет PECL Solr, [доступный здесь](http://pecl.php.net/package/solr).
- Запущен сервер Solr с индексом для вашей установки MODX.

Если нужна помощь с установкой Solr, [официальная документация Solr](http://wiki.apache.org/solr/) будет полезна.

SimpleSearch также предоставляет образец schema.xml для конфигурации Solr. Он находится здесь:

- core/components/simplesearch/docs/solr.schema.xml

Переименуйте файл в 'schema.xml', поместите в каталог conf/ нужного ядра Solr и перезапустите Solr.

Если вы установили SimpleSearch до 1.4.0-pl, обновите schema.xml до последней версии (см. каталог docs/ выше) и переиндексируйте все ресурсы, чтобы использовать поиск по TV.

## Настройка SimpleSearch для Solr

Откройте [Системные настройки](building-sites/settings "System Settings") и измените следующие параметры:

- **sisea.driver\_class** -> установите «SimpleSearchDriverSolr»
- **sisea.driver\_db\_specific** -> установите «No», потому что Solr не зависит от SQL-баз

Затем проверьте остальные параметры, специфичные для Solr.

При нескольких ядрах Solr настройка «sisea.solr.path» часто выглядит как «solr/corename».

### Индексация существующих ресурсов

Дальше нужно проиндексировать уже существующие ресурсы в Solr. SimpleSearch предоставляет служебный сниппет для этого. Разместите сниппет «SimpleSearchIndexAll» на любой странице и откройте её. (Сначала настройте Solr, как описано выше.) Сниппет проиндексирует все существующие ресурсы. После выполнения удалите вызов сниппета.

По мере разработки сайта SimpleSearch автоматически индексирует ресурсы через плагин SimpleSearchIndexer.

Готово. На сайте работает поиск на Solr.

## Прочие заметки

Несколько свойств SimpleSearch не применяются к поиску через Solr:

- maxWords, useAllWords, searchStyle, fieldPotency, customPackages

Эти свойства сниппета SimpleSearch игнорируются при использовании Solr.

## Заметка для пользователей 2.1.0-rc4 и ранее

Из-за бага в MODX 2.1.0-rc4 и ранее нужно исправить файл:

`core/model/modx/processors/resource/unpublish.php`

Найдите строку «OnDocUnpublished» в вызове invokeEvent. Замените на: `OnDocUnPublished` (с заглавной P). Тогда Solr переиндексирует ресурс при снятии с публикации через дерево.

Проблема исправлена в MODX Revolution 2.1.0-pl и новее.

## Смотрите также

1. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch)
    1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch/containertpl)
    2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch/currentpagetpl)
    3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch/pagetpl)
    4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch/tpl)
    5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch/faceted-search-through-posthooks)
2. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
    1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/tpl)
3. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)
