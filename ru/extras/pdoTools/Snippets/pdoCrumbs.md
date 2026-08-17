---
title: "pdoCrumbs"
description: "Сниппет pdoCrumbs для хлебных крошек: параметры, шаблоны и генерация title страницы"
translation: "extras/pdoTools/Snippets/pdoCrumbs"
---

Сниппет для построения навигации в стиле хлебных крошек.

Хорошая замена [BreadCrumb](extras/breadcrumb). Работает с документами из любых контекстов и даёт много опций выбора ресурсов.

Сниппет очень быстрый, потому что за один запрос выбирает только указанные элементы из БД.

## Свойства

Принимает все свойства [pdoTools](extras/pdoTools/General_settings) и некоторые свои:

| Property             | Default              | Description                                                                                                                                                       |
| -------------------- | -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **&showLog**         | 0                    | Показывает дополнительную информацию о работе сниппета. Только для пользователей, авторизованных в контексте «mgr».                                                  |
| **&from**            | 0                    | Id ресурса, с которого начинать строить крошки. Обычно корень сайта «0».                                             |
| **&to**              |                      | Id ресурса, на котором заканчивать крошки. По умолчанию id текущей страницы.                                                                       |
| **&exclude**         |                      | Список id ресурсов через запятую, которые нужно исключить из вывода.                                                                                     |
| **&toPlaceholder**   |                      | Если не пусто, сниппет сохранит все данные в плейсхолдер с тем же именем вместо вывода на экран.                                |
| **&outputSeparator** | `&nbsp;&rarr;&nbsp;` | Символ-разделитель между крошками.                                                                                                           |
| **&tpl**             |                      | Имя чанка для форматирования вывода. Если не указано, на экран выводятся поля ресурса.                                     |
| **&tplCurrent**      |                      | Чанк для форматирования крошки текущего ресурса в навигации.                                                                                             |
| **&tplMax**          |                      | Чанк, добавляемый в конец результатов, если крошек больше **&limit**.                                                                         |
| **&tplHome**         |                      | Чанк для ссылки на главную страницу.                                                                                                                   |
| **&tplWrapper**      |                      | Чанк-обёртка для всех результатов. Один плейсхолдер: `[[+output]]`. Не работает вместе с **&toSeparatePlaceholders**. |
| **&wrapIfEmpty**     |                      | Выводить обёртку **&tplWrapper**, даже если результатов нет.                                                                                            |
| **&showCurrent**     | 1                    | Показывать текущий документ в навигации.                                                                                                                   |
| **&showHome**        | 0                    | Показывать крошку для главной страницы.                                                                                                                                |
| **&showAtHome**      | 1                    | Показывать крошки на главной странице.                                                                                                                                |
| **&hideSingle**      | 0                    | Не показывать результат, если крошка только одна.                                                                                                           |
| **&direction**       | ltr                  | Направление навигации: слева направо «ltr» или справа налево «rtl», например для арабского.                                                                 |

### Свойства шаблонов

| Template        | Default                                              |
| --------------- | ---------------------------------------------------- |
| **&tpl**        | `@INLINE <a href="[[+link]]">[[+menutitle]]</a>`     |
| **&tplCurrent** | `@INLINE <span>[[+menutitle]]</span>`                |
| **&tplMax**     | `@INLINE <span>&nbsp;...&nbsp;</span>`               |
| **&tplHome**    |
| **&tplWrapper** | `@INLINE <div class="breadcrumbs">[[+output]]</div>` |

## Примеры

Генерация хлебных крошек для текущей страницы:

```php
[[pdoCrumbs]]
```

Генерация ограниченного числа элементов:

```php
[[pdoCrumbs?
    &limit=`2`
]]
```

Сниппет хорошо работает при вызове из pdoResources. Например, чанк:

```php
<h3>[[+pagetitle]]</h3>
<p>[[+introtext]]</p>
[[pdoCrumbs?
    &to=`[[+id]]`
    &showCurrent=`0`
]]
```

## Генерация заголовков страниц

pdoCrumbs можно вызывать внутри другого сниппета, например для генерации тега header страниц.

Сниппет Title:

```php
<?php
// We define variables
if (empty($separator)) {$separator = ' / ';}
if (empty($titlefield)) {$titlefield = 'longtitle';}
if (empty($parents_limit)) {$parents_limit = 3;}
if (empty($tplPages)) {$tplPages = 'No. [[+page]] of [[+pageCount]]';}

// Key and cache settings
$cacheKey = $modx->resource->getCacheKey() . '/title_' . sha1(serialize($_REQUEST));
$cacheOptions = array('cache_key' => 'resource');

if (!$title = $modx->cacheManager->get($cacheKey, $cacheOptions)) {
    // We learn the name of the page
    $title = !empty($modx->resource->$titlefield)
        ? $modx->resource->$titlefield
        : $modx->resource->pagetitle;

    // Add a search query, if there is one
    if (!empty($_GET['query']) && strlen($_GET['query']) > 2) {
        // We need to use a placeholder to avoid
        $title .= ' «[[+mse2_query]]»';
    }

    // Adding pagination if indicated
    if (!empty($_GET['page'])) {
        $title .= $separator . str_replace('[[+page]]', intval($_GET['page']), $tplPages);
    }

    // Adding parents
    $crumbs = $modx->runSnippet('pdoCrumbs', array(
        'to' => $modx->resource->id,
        'limit' => $parents_limit,
        'outputSeparator' => $separator,
        'showHome' => 0,
        'showAtHome' => 0,
        'showCurrent' => 0,
        'direction' => 'rtl',
        'tpl' => '@INLINE [[+menutitle]]',
        'tplCurrent' => '@INLINE [[+menutitle]]',
        'tplWrapper' => '@INLINE [[+output]]',
        'tplMax' => ''
    ));
    if (!empty($crumbs)) {
        $title = $title . $separator . $crumbs;
    }

    // By caching the results
    $modx->cacheManager->set($cacheKey, $title, 0, $cacheOptions);
}

// return title
return $title;
```

Вызов сниппета на странице

```php
<title>[[Title]] / [[++site_name]] - my best website in the world</title>
```

## Демо

Рабочий пример [генерации крошек в результатах поиска] [3] mSearch2.

[![](https://file.modx.pro/files/a/f/4/af4033fffb71ad040e3ff2f6c01d9bf5s.jpg)](https://file.modx.pro/files/a/f/4/af4033fffb71ad040e3ff2f6c01d9bf5.png)

Также сайт [bezumkin.ru][4] использует динамические title.

[3]: http://bezumkin.ru/search?query=pdotools
[4]: http://bezumkin.ru/
