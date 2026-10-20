---
title: "Интеграция шаблонов"
translation: "building-sites/integrating-templates"
description: "Сборка шаблона MODX из тегов, чанков и сниппетов статичной HTML-страницы: шапка и подвал как чанки, меню как сниппет и динамический виджет."
---

## Построение шаблона

Отправная точка — статичная HTML-страница сайта. Части, которые повторяются от страницы к странице, — шапка, навигация и подвал, — становятся [Шаблоном](building-sites/elements/templates). Содержимое каждой страницы переезжает в поле, которое читает шаблон.

В шаблоне ниже `[[*content]]` стоит там, где должно быть содержимое страницы. MODX подставляет на это место содержимое ресурса, который использует шаблон.

``` html
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
<body>
    <!-- Header Start -->
    <header>
        <nav>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->
    <main>
        [[*content]]
    </main>
    <!-- Footer Start -->
    <footer>
        <nav>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
            </ul>
        </nav>
    </footer>
    <!-- Footer End -->
</body>
</html>
```

> [!WARNING]
> `[[!++site_url]]`, `[[!++http_host]]` и `[[!++url_scheme]]` — это **значения конфигурации, а не системные настройки**. Они приходят из `config.inc.php`, и в менеджере их не изменить.

| Тег | Константа в `config.inc.php` | Значение |
| --- | --- | --- |
| `[[!++site_url]]` | `MODX_SITE_URL` | адрес сайта с завершающей косой чертой |
| `[[!++http_host]]` | `MODX_HTTP_HOST` | хост без схемы |
| `[[!++url_scheme]]` | `MODX_URL_SCHEME` | `http://` или `https://` с завершающей косой чертой |

Полный адрес собирается как `[[!++url_scheme]][[!++http_host]]`.

Странице с другой структурой нужен второй шаблон. Для записи в блоге сделайте шаблон с боковой панелью и дайте редактору выбирать его для записей. [TV](building-sites/elements/template-variables), которая включает и выключает панель, — другой вариант, но тогда выбор придётся делать редактору на каждой странице.

Шаблон записи в блоге — это тот же шаблон с добавленной боковой панелью, шапка и head остаются прежними:

``` html
<main>
    [[*content]]
</main>
<aside>
    <section>
        <h4>Related posts</h4>
        <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
        </ul>
    </section>
</aside>
```

## Использование чанков

[Чанки](building-sites/elements/chunks) хранят разметку, которая повторяется в разных шаблонах, чтобы её можно было править в одном месте. В шапке и подвале примера выше лежат ссылки навигации. Если разметка вставлена в каждый шаблон, изменение текста одной ссылки приходится повторять в каждом шаблоне, и копии расходятся. Перенесите разметку в чанки — и правка происходит один раз.

Шапка, подвал и боковая панель переезжают в три чанка:

``` php
[[$headerHTML]]
    <main>
        [[*content]]
    </main>
    [[$aside]]
[[$footerHTML]]
```

Чанк `headerHTML` хранит DOCTYPE, head и шапку. Чанк `footerHTML` хранит подвал и закрывающие теги `</body>` и `</html>`. Текст ссылки меняется в чанке — и изменение сразу попадает во все шаблоны.

Чанк можно вложить в другой чанк. Чанк `metaData` хранит общие метаданные:

``` php
  <!-- SEO Microdata (Schema.org variant) - Google, Bing, Yahoo -->
  <meta content="[[++site_name]]" itemprop="description">
  <meta content="[[++site_name]]" itemprop="name">
  <meta content="[[!++url_scheme]][[!++http_host]]" itemprop="url">
  <meta content="[[!++url_scheme]][[!++http_host]]/meta_thumbnail.png" itemprop="image">
  <meta content="info@[[!++http_host]]" itemprop="email">
  <meta content="[[++site_name]]" name="companyright">
```

Его можно встроить в чанк `headerHTML`:

``` php
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
   [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
```

## Использование сниппетов

Сниппет добавляет шаблону или чанку динамическое поведение. Такой сниппет может заменить и навигацию в чанке `headerHTML`. [Wayfinder](extras/wayfinder) и [pdoMenu](extras/pdoTools/Snippets/pdoMenu) собирают меню из ресурсов сайта и отмечают текущий ресурс классом `active`.

Вместо статичных ссылок в чанке `headerHTML` вызовите:

``` php
<nav>
    [[pdoMenu?
      &parents=`0`
      &level=`1`
    ]]
</nav>
```

*У pdoMenu есть и другие свойства и свой формат вывода — смотрите [документацию](extras/pdoTools/Snippets/pdoMenu).*

Собственный сниппет делает всё, что позволяет PHP. Этот, с именем `getWeather`, читает текущую погоду через API:

``` php
// Stash API URL
$jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=YOUR_API_KEY";

// Call API
$json = @file_get_contents($jsonurl);
if ($json === false) {
    return 'The weather service is not available';
}

// Stash results
$weather = json_decode($json, true);
if (!isset($weather['weather'][0]['main'])) {
    return 'The weather service returned no data';
}

// Return weather description
return $weather['weather'][0]['main'];
```

> [!WARNING]
> **Ключ API должен быть вашим.** Ключ сервиса бесплатный, его получают на сайте самого сервиса. Ключ, который раньше стоял в этом примере, больше не работает, а на любой запрос без верного ключа сервис отвечает ошибкой. Поэтому сниппет выше проверяет ответ, прежде чем читать данные.

Вызовите сниппет в чанке `aside`, и он послужит виджетом с текущим описанием погоды:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        [[getWeather]]
    </section>
</aside>
```

Сниппет подставляет свой ответ в страницу:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        Drizzle
    </section>
</aside>
```

Значение `Drizzle` — это то, что сервис отдал, когда пример писался, ответ меняется со временем. MODX кэширует его, потому что в вызове выше нет флага `!`, и закэшированный `Drizzle` переживёт смену погоды. Вызовите сниппет без кэширования: поставьте `!` перед именем — `[[!getWeather]]`.

Сниппет может передать параметр другому сниппету. `getLocation` читает местоположение посетителя через другой API и передаёт его в `getWeather`:

``` php
[[!getWeather? &location=`[[!getLocation]]`]]
```

Сниппет `getWeather` принимает свойство и подставляет местоположение в вызов API. Остальной код остаётся прежним:

``` php
// Get properties
$location = $modx->getOption('location', $scriptProperties);

// Stash API URL
$jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=" . $location . "&appid=YOUR_API_KEY";
```

## Смотрите также

1. [Интеграция шаблонов](building-sites/integrating-templates)
2. [Серия видео «Быстрый старт»](building-sites/integrating-templates/video-quick-start)
3. [Именованный якорь](building-sites/integrating-templates/named-anchor)
4. [Шаблоны](building-sites/elements/templates)
5. [Чанки](building-sites/elements/chunks)
6. [Сниппеты](building-sites/elements/snippets)
7. [Переменные шаблона](building-sites/elements/template-variables)
