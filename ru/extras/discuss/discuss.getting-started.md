---
title: "Начало работы"
description: "Обзор контроллеров, manifest и тем Discuss после установки"
translation: "extras/discuss/discuss.getting-started"
---

После установки Discuss вы, скорее всего, сразу захотите добавить свой стиль. Прежде чем начать, заварите кофе: предстоит разобраться в устройстве компонента.

Готовы? Discuss большой. Форумы сложнее, чем кажется на первый взгляд. Это руководство поможет разобраться в частях системы и настроить Discuss под себя. Ниже разберём:

## Контроллер(ы) Discuss

Если вы установили Discuss с демо-данными, увидите один ресурс с пустым шаблоном и, возможно, самым простым и мощным вызовом сниппета:

``` php
[[!Discuss]]
```

Этот ресурс направляет каждый запрос к форуму (включая печатные страницы, XML-ленты и т. д.) в Discuss, который обрабатывает их внутри. Не нужно создавать отдельные ресурсы и шаблоны для каждого представления (контроллера), проще поддерживать.

Внутри Discuss разбирает URL запроса, например:

> <http://forums.modx.com/thread/32480/discuss-native-threaded-forum-for-modx-revolution>

Discuss определяет, что вы ищете. В этом примере нужна тема с ID 32480 и alias для ЧПУ. Обработку страницы передают контроллеру «thread», который по ID и другим параметрам формирует вывод. Маршрутизация выполняется при каждом запросе и может указывать на любой из более чем 30 контроллеров.

Каждому контроллеру нужен шаблон. Большинство оборачиваются в «wrapper.tpl» (кроме xml-контроллеров), затем подставляется шаблон конкретного контроллера. Шаблоны файловые и по умолчанию называются так же, как контроллер (например, контроллер thread/unread использует шаблон thread/unread в core/components/discuss/themes/<theme_name>/pages/). Через Manifest можно указать другой файл шаблона, поэтому имя может отличаться в зависимости от темы.

## Manifest Discuss

Чтобы темизация была простой в поддержке, гибкой и привязанной к теме, у тем Discuss нужен manifest. В manifest указаны controller-specific javascript и css, а также опции контроллеров и chunk-подобная разметка для общих блоков (например, сайдбаров), которую мы называем modules.

Manifest это один файл темы в корневой директории темы. Например, manifest темы default лежит в [core/components/discuss/themes/default/manifest.php](https://github.com/modxcms/Discuss/blob/develop/core/components/discuss/themes/default/manifest.php). Это PHP-файл, но если вы не знаете PHP, не уходите: разобраться несложно, ниже будет руководство и полный перечень опций.

В manifest вы можете задать:

1. Глобальные CSS и JS. Это необязательно (можно подключить в wrapper.tpl), но файлы из manifest попадут в вывод на большинстве страниц (xml-страницы снова исключение).
2. CSS и JS только для отдельных контроллеров: print, home, thread/reply и т. д.
3. Опции для конкретных [контроллеров](extras/discuss/discuss.controllers "Discuss.Controllers").
4. Modules (разберём позже).

Manifest даёт много возможностей, но лучше ограничивать число динамически подключаемых CSS и JS файлов глобально или для отдельных контроллеров.

Общая структура manifest это большой многомерный PHP-массив. По сути это коллекция ключей и значений на три уровня вложенности в PHP. Упрощённый фрагмент:

``` php
$manifest = array(
    'global' => array(
        'css' => array(
            'header' => array(
                'index.css',
                'forums-styles.css',
                'jquery-ui-1.8.16.custom.css',
            ),
        ),
        'js' => array(
            'header' => array(
                'jquery-1.6.2.min.js',
                'jquery-ui-1.8.16.custom.min.js',
                'forums.js',
            ),
        ),
    ),
    'print' => array(
        'css' => array(
            'header' => array(
                'print.css',
            ),
        ),
    ),
    'home' => array(
        'js' => array(
            'header' => array(
                'forums.home.js',
            ),
        ),
        'options' => array(
            'showBoards' => true,
            'showBreadcrumbs' => true,
            'showRecentPosts' => false,
            'showStatistics' => true,
            'showLoginForm' => false,
            'bypassUnreadCheck' => true,
            'checkUnread' => true,
            'showLogoutActionButton' => false,
            'hideIndexBreadcrumbs' => true,
            'subBoardSeparator' => '',
        ),
    ),

);
return $manifest;
```

Мы задаём переменную $manifest как массив с первым элементом «global», который тоже массив. На втором уровне два элемента: css и js. Они задают третий уровень: файлы (относительно assets/components/discuss/themes/theme_name/css или js/) для загрузки в header на каждом контроллере. Для js можно указать footer вместо header, добавить footer отдельным элементом или inline, чтобы обернуть содержимое в `<script>` в header. Это удобно, когда теме нужны параметры из настроек или Discuss.

Ниже global идут контроллеры print и home с css или js так же, как в global. У home есть массив «options» с true/false или строками, например subBoardSeparator в фрагменте выше. Эти опции меняют поведение контроллера. При чтении [документации контроллеров](extras/discuss/discuss.controllers "Discuss.Controllers") учитывайте эти опции.

## Темы

Темизация в MODX строится вокруг core/components/discuss/themes/theme_name/ и зеркальной assets/components/discuss/themes/theme_name/ для файлов с прямым доступом (js, css, images). В core/themes по умолчанию есть каталоги «chunks» и «pages» с HTML, куда подставляется контент через плейсхолдеры. Если вы работали с Wayfinder или getResources, идея знакома. Чтобы выбрать тему, измените настройку **discuss.theme** на имя нужной директории. Если её нет, используется «default».

Файлы в «pages» оканчиваются на .tpl и в основном соответствуют имени [контроллера](extras/discuss/discuss.controllers "Discuss.Controllers"), например «board» или «thread/new». Это содержимое отдельных контроллеров и разметка конкретного представления.

Особые «wrapper.tpl» и «print-wrapper.tpl» служат внешней обёрткой для controller wrappers в зависимости от запроса.

Файлы в «chunks» содержат небольшие фрагменты HTML с расширением .chunk.tpl. Например, «board/disboardli.chunk.tpl» используется в цикле по доскам, а «category/discategoryli.chunk.tpl» для категорий. Шаблоны писем лежат в подпапке «emails».

Подробнее о создании кастомных тем в отдельном руководстве.
