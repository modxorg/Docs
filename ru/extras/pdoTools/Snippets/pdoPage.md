---
title: "pdoPage"
description: "Сниппет pdoPage для пагинации других сниппетов с ajax, maxLimit и metatags"
translation: "extras/pdoTools/Snippets/pdoPage"
---

Сниппет **pdoPage** выводит работу других сниппетов с пагинацией.

Есть несколько важных отличий от *getPage*:

* 2 типа пагинации: пропуск страниц и классическая (зависит от `&pageLimit`).
* Пагинация не «плавает». Если показывать 5 ссылок на страницы, их всегда будет 5, не больше.
* Можно задать чанки для вывода, когда нет ссылок на первую, последнюю, следующую или предыдущую страницу.
* `&maxLimit` не даёт пользователю замедлить сайт большим `$_GET['limit']`.
* Редирект на первую страницу, если нет результатов или неверный параметр `&page`.
* По умолчанию работает со сниппетом [pdoResources](extras/pdoTools/Snippets/pdoResources).
* Поддерживает ajax.

## Настройки

| Name                    | Default                           | Description                                                                                                                                          |
| ----------------------- | --------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- |
| **plPrefix**            |                                   | Префикс выходных плейсхолдеров.                                                                                                                      |
| **limit**               | `10`                              | Ограничивает число возвращаемых ресурсов. «0» для без ограничений.                                                                             |
| **maxLimit**            | `100`                             | Максимальный limit запроса. Перекрывает limit из url пользователя.                                                                 |
| **offset**              |                                   | Смещение возвращаемых ресурсов для пропуска.                                                                                             |
| **page**                |                                   | Номер страницы для вывода. Перекрывает номер из url пользователя.                                                                        |
| **pageVarKey**          | `page`                            | Имя переменной с номером страницы в url.                                                                                   |
| **totalVar**            | `page.total`                      | Ключ плейсхолдера с общим числом ресурсов без учёта limit. |
| **pageLimit**           | `5`                               | Число ссылок на страницах. При 7 и больше включается расширенный режим.                                                                              |
| **element**             | `pdoResources`                    | Имя запускаемого сниппета.                                                                                                                      |
| **pageNavVar**          | `page.nav`                        | Имя плейсхолдера для вывода пагинации.                                                                                                       |
| **pageCountVar**        | `pageCount`                       | Имя плейсхолдера для числа страниц.                                                                                                      |
| **pageLinkScheme**      |                                   | Схема генерации ссылки на страницу. Плейсхолдеры `[[+pageVarKey]]` и `[[+page]]`                                                        |
| **cache**               |                                   | Кэширование результатов сниппета.                                                                                                                  |
| **cacheTime**           | `3600`                            | Время жизни кэша в секундах.                                                                                                            |
| **cacheAnonymous**      |                                   | Кэшировать только для неавторизованных посетителей.                                                                                                       |
| **toPlaceholder**       |                                   | Если задано, результат попадёт в этот плейсхолдер вместо прямого вывода.                                                                |
| **ajax**                |                                   | Поддержка ajax-запросов.                                                                                                                        |
| **ajaxMode**            |                                   | Ajax-пагинация из коробки. 3 режима: "default", "button" и "scroll".                                                              |
| **ajaxElemWrapper**     | `#pdopage`                        | jQuery-селектор обёртки с результатами и пагинацией.                                                                                 |
| **ajaxElemRows**        | `#pdopage .rows`                  | jQuery-селектор элемента с результатами.                                                                                                            |
| **ajaxElemPagination**  | `#pdopage .pagination`            | jQuery-селектор элемента с пагинацией.                                                                                                         |
| **ajaxElemLink**        | `#pdopage .pagination a`          | jQuery-селектор ссылок пагинации.                                                                                                                |
| **ajaxElemMore**        | `#pdopage .btn-more`              | jQuery-селектор кнопки «load more» при ajaxMode = button.                                                                                         |
| **ajaxHistory**         |                                   | Сохранять номер страницы в url в ajax-режиме.                                                                                           |
| **frontend_js**         | `[[+assetsUrl]]js/pdopage.min.js` | Ссылка на JavaScript, подключаемый сниппетом.                                                                                                       |
| **frontend_css**        |`[[+assetsUrl]]css/pdopage.min.css`| Ссылка на CSS, подключаемый сниппетом.                                                                                                       |
| **frontend_startup_js** |                                   | Имя чанка со скриптом в конце head при включённом ajax.                             |
| **frontend_init_js**    |                                   | Имя чанка со скриптом в конце body при включённом ajax.                             |
| **setMeta**             | `1`                               | Регистрация meta-тегов со ссылками на предыдущую и следующую страницу.                                                                                      |
| **strictMode**          | `1`                               | Строгий режим. pdoPage делает редиректы при загрузке несуществующих страниц.                                                                                   |

| Chunks                | По умолчанию                                                                                                          |
| --------------------- | ------------------------------------------------------------------------------------------------------------------- |
| **tplPage**           | `@INLINE <li><a href="[[+href]]">[[+pageNo]]</a></li>`                                                              |
| **tplPageWrapper**    | `@INLINE <div class="pagination"><ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul></div>` |
| **tplPageActive**     | `@INLINE <li class="active"><a href="[[+href]]">[[+pageNo]]</a></li>`                                               |
| **tplPageFirst**      | `@INLINE <li class="control"><a href="[[+href]]">[[%pdopage_first]]</a></li>`                                       |
| **tplPageLast**       | `@INLINE <li class="control"><a href="[[+href]]">[[%pdopage_last]]</a></li>`                                        |
| **tplPagePrev**       | `@INLINE <li class="control"><a href="[[+href]]">&laquo;</a></li>`                                                  |
| **tplPageNext**       | `@INLINE <li class="control"><a href="[[+href]]">&raquo;</a></li>`                                                  |
| **tplPageSkip**       | `@INLINE <li class="disabled"><span>...</span></li>`                                                                |
| **tplPageFirstEmpty** | `@INLINE <li class="disabled"><span>[[%pdopage_first]]</span></li>`                                                 |
| **tplPageLastEmpty**  | `@INLINE <li class="disabled"><span>[[%pdopage_last]]</span></li>`                                                  |
| **tplPagePrevEmpty**  | `@INLINE <li class="disabled"><span>&laquo;</span></li>`                                                            |
| **tplPageNextEmpty**  | `@INLINE <li class="disabled"><span>&raquo;</span></li>`                                                            |
| **ajaxTplMore**       | `@INLINE <button class="btn btn-default btn-more">[[%pdopage_more]]</button>`                                       |

## Поддержка Ajax

pdoPage умеет работать с ajax из коробки. Нужны 3 условия:

* Включена опция сниппета `&ajax`.
* Запрос с XMLHttpRequest, то есть ajax.
* В запросе есть переменная из `&pageVarKey` вызова сниппета. По умолчанию это `page`.

Включите `` &ajax=`1` `` и отправьте GET-запрос на страницу через jQuery:

```javascript
$.get('document.html?page=5', function(response) {
    console.log(response);
}, 'json');
```

Вы получите JSON с результатами запроса и служебными данными: текущая страница, всего страниц и всего результатов.
pdoPage это обёртка над сниппетом, поэтому через ajax можно запускать и другие сниппеты.

## Встроенная Ajax-пагинация

С версии **1.10** pdoPage загружает страницы через ajax автоматически.
Оберните вызов в специальную разметку:

```php
<div id="pdopage">
    <div class="rows">
        [[!pdoPage?
            &parents=`0`
            &ajaxMode=`default`
        ]]
    </div>
    [[!+page.nav]]
</div>
```

Внутри `[[+page.nav]]` div с классом "pagination", так pdoPage делает по умолчанию.

ID для этой разметки меняются параметрами:

* **ajaxElemWrapper**: jQuery-селектор обёртки с результатами и пагинацией. По умолчанию `#pdopage`.
* **ajaxElemRows**: jQuery-селектор элемента с результатами. По умолчанию `#pdopage .rows`
* **ajaxElemPagination**: jQuery-селектор элемента с пагинацией. По умолчанию `#pdopage .pagination`
* **ajaxElemLink**: jQuery-селектор ссылок пагинации. По умолчанию `pdopage .pagination a`

Последние два селектора предполагают, что вы не меняли стандартную разметку пагинации в `&tplPageWrapper`.
Логику даёт подключение JavaScript из `&frontend_js`.

Параметр `&ajax` включать не нужно, непустой `&ajaxMode` включит его сам.

### Загрузка по кнопке

В отличие от обычной пагинации, пользователь движется только вниз, подгружая элементы, поэтому блок пагинации смещается при прокрутке.

Логично разместить его сверху:

```php
<div id="pdopage">
    [[!+page.nav]]
    <div class="rows">
        [[!pdoPage?
            &parents=`0`
            &ajaxMode=`button`
            &limit=`5`
        ]]
    </div>
</div>
```

Те же селекторы плюс:

* **ajaxElemMore**: jQuery-селектор кнопки загрузки при `` &ajaxMode=`button` ``. По умолчанию `#pdopage .btn-more`.
* **ajaxTplMore**: шаблон кнопки загрузки при `` &ajaxMode=`button` ``. Должен содержать селектор из `&ajaxElemMore`.

По клику загрузится `&limit` элементов и добавится в конец блока результатов.
Если результатов больше нет, кнопка скроется.

Плавающая панель навигации показывает текущую страницу и позволяет быстро перейти.
Клики по её ссылкам не обрабатываются через ajax, это слишком сложно.

Если плавающая пагинация не нужна, скройте её через `display:none` в css.

### Загрузка при прокрутке

Похоже на предыдущий способ, но без кнопки: всё происходит автоматически при прокрутке.

```php
<div id="pdopage">
    [[!+page.nav]]
    <div class="rows">
        [[!pdoPage?
            &parents=`0`
            &ajaxMode=`scroll`
        ]]
    </div>
</div>
```

### History API

pdoPage поддерживает History API в браузере.
При включённом `&ajaxMode` сниппет может сохранять номер страницы в адресной строке, чтобы при перезагрузке ничего не терялось.
Корректно работают кнопки «вперёд» и «назад» браузера.

Поведение меняется через `&ajaxHistory` («on» или «off»). По умолчанию:

* При `` &ajaxMode=`default` `` History API включён, номер страницы сохраняется.
* При `` &ajaxMode=`scroll` `` или `` &ajaxMode=`button` `` History API выключен.

Когда `&ajaxHistory` выключен, блок навигации скрыт, страницы нельзя переключать вручную.

### Javascript callbacks

Можно указать функции, вызываемые до и после загрузки страницы через ajax:

```javascript
pdoPage.callbacks['before'] = function(config) {
    console.log('The config before load!', config);
};
pdoPage.callbacks['after'] = function(config, response) {
    console.log('The config after load!', config);
    console.log('The response from server!', response);
}
```

Версия **1.11.0-pl** добавляет обработчик события `pdopage_load`:

```javascript
$(document).on('pdopage_load', function(e, config, response) {
    console.log(e, config, response);
});
```

Проверка данных в config поможет различить разные вызовы pdoPage на одной странице.

## Свои javascript в ajax-режиме

С версии **2.7.4** можно использовать свой JavaScript в ajax-режиме. Внешний JS настраивается параметрами pdoPage `&frontend_js`, `&frontend_startup_js` и `&frontend_init_js`. По умолчанию подключается `[[+assetsUrl]]js/pdopage.min.js`, теги script ставятся в конец head/body.

### jQuery plugin

С версии **2.7.4** доступен `[[+assetsUrl]]js/jquery.pdopage.min.js`, его можно указать в `&frontend_js`. Для использования создайте два чанка и укажите их в `&frontend_startup_js` и `&frontend_init_js`.

Чанк для `&frontend_startup_js` оставьте пустым. Чанк для `&frontend_init_js` может содержать:

```javascript
<script type="text/javascript">
    $('[[+wrapper]]').pdoPage([[+config]]);
</script>
```

Плагин вызывает два события на элементе-обёртке. Их можно перехватить так:

```javascript
$('[[+wrapper]]').on('beforeLoad', function(event, pdopage, settings){
  console.log(settings);
});
$('[[+wrapper]]').on('afterLoad', function(event, pdopage, settings, response){
  console.log(settings);
  console.log(response);
});
```

Публичные методы jQuery-плагина вызываются так:

```javascript
$('[[+wrapper]]').pdoPage('<methodname>', <comma>, <separated>, <parameters>);
```

#### Пример с фильтрацией формой

Фильтрация ajax-результата pdoPage через форму:

```javascript
<script type="text/javascript">
    var pdoPageWrapper = $('[[+wrapper]]');
    pdoPageWrapper.pdoPage([[+config]]);
    $(document).ready(function () {
        $("form#my_id").on('click', 'button[type="submit"]', function(e) {
            e.preventDefault();
            var form = $(e.delegateTarget);
            $('[[+wrapper]]').pdoPage('loadPage',
                form.attr('action') + '?' + form.serialize(), 'force');
        });
    });
</script>
```

## Friendly urls для пагинации

С версии **2.2.2** параметр `&pageLinkScheme` задаёт схему ссылок на страницы.
В параметре только два плейсхолдера:

* `[[+pageVarKey]]`: переменная с именем страницы. По умолчанию `page`.
* `[[+page]]`: номер страницы.

Например:

```php
[[!pdoPage?
    &parents=`0`
    &pageLinkScheme=`/[[+pageVarKey]]-[[+page]]`
]]
[[!+page.nav]]
```

Ссылки будут такими:

```plain
/res/news/
/res/news/page-2
/res/news/page-3
```

При переходе по таким ссылкам MODX покажет 404, потому что этих страниц нет.
Нужен плагин для обработки ссылок:

```php
<?php
// Work only with OnPageNotFound
if ($modx->event->name == 'OnPageNotFound') {
    // Get the key from system settings
    $req = $modx->getOption('request_param_alias');
    // Trying to catch this key in a request
    $pageVarKey = 'page';
    // We continue only if the request is matched to our pattern "pageVarKey-page"
    if (preg_match("#.*?({$pageVarKey}-(\d+))#", $_REQUEST[$req], $matches)) {
        // Remove furl string and get the exact address of current page
        $uri = str_replace($matches[1], '', $matches[0]);

        // Find a page by this address
        $id = 0;
        // First, as it is, with the slash at the end
        if (!$id = $modx->findResource($uri)) {
            // If there is no mathes - then we try to cut slash and search again
            $id = $modx->findResource(rtrim($uri, '/'));
        }

        // If we found the resource
        if ($id) {
            // Adding the number of the page to the globals, so pdoPage could see them
            $_GET[$pageVarKey] = $_REQUEST[$pageVarKey] = $matches[2];
            // And load this page
            $modx->sendForward($id);
        }
        // If the resource was not found - do nothing. Maybe another plugin will catch this request
    }
}
```

Этот плагин обработает friendly urls для пагинации.

## Примеры

pdoPage часть pdoTools, в `&element` по умолчанию сниппет *pdoResources*.
Простой вызов покажет дочерние ресурсы:

```php
[[!pdoPage?
    &tpl=`@INLINE <p>[[+idx]] <a href="/[[+uri]]">[[+pagetitle]]</a></p>`
]]
[[!+page.nav]]
```

Все доступные документы сайта:

```php
[[!pdoPage?
    &tpl=`@INLINE <p>[[+idx]] <a href="/[[+uri]]">[[+pagetitle]]</a></p>`
    &parents=`0`
]]
[[!+page.nav]]
```

Навигация с пропуском страниц.
Если страниц меньше 7, работает как обычная навигация.

```php
[[!pdoPage?
    &tpl=`@INLINE <p>[[+idx]] <a href="/[[+uri]]">[[+pagetitle]]</a></p>`
    &parents=`0`
    &pageLimit=`7`
]]
[[!+page.nav]]
```

Кэш на 30 минут:

```php
[[!pdoPage?
    &tpl=`@INLINE <p>[[+idx]] <a href="/[[+uri]]">[[+pagetitle]]</a></p>`
    &parents=`0`
    &pageLimit=`7`
    &cache=`1`
    &cacheTime=`1800`
]]
[[!+page.nav]]
```

Максимальный limit запроса.
Какой бы limit ни указал пользователь в url, на странице будет не больше 10 результатов.

```php
[[!pdoPage?
    &tpl=`@INLINE <p>[[+idx]] <a href="/[[+uri]]">[[+pagetitle]]</a></p>`
    &parents=`0`
    &pageLimit=`7`
    &cache=`1`
    &cacheTime=`1800`
    &maxLimit=`10`
]]
[[!+page.nav]]
```
