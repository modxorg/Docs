---
title: "Интеграция шаблонов"
translation: "building-sites/integrating-templates"
---

## Построение шаблона

Интеграция сайта в MODX часто начинается с определения того, какие элементы сайта обычно повторяются от страницы к странице. Как правило, повторяющиеся элементы будут заголовок, навигация и нижний колонтитул.

В приведенном ниже примере показан простой шаблон, в котором контент, заполняемый в каждом отдельном ресурсе полем контента, может быть вставлен в тег `[[*content]]`, который, в свою очередь, окружен разметкой, определенной как [Шаблон](building-sites/elements/templates).

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

Дополнительные шаблоны также могут быть необходимы, поскольку структура страницы отличается.

В случае создания поста в блоге мы можем также захотеть добавить боковую панель, и хотя у нас есть много вариантов, чтобы добавить это, например, создание [Переменные шаблона](building-sites/elements/template-variables) чтобы включать и выключать боковую панель, редактору сайта может быть удобнее просто выбрать шаблон для сообщений в блоге, который уже содержит боковую панель. Поэтому в этом случае может быть хорошей идеей установить вторичный шаблон.

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
    <!-- Aside Start -->
    <aside>
        <section>
            <h4>Related posts</h4>
            <ul>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </section>
    </aside>
    <!-- Aside End -->
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

## Использование чанков

[Чанки](building-sites/elements/chunks) способ предложить управления повторяющимся контентом в одном месте. В приведенном выше примере шаблона есть статическая навигация в верхнем и нижнем колонтитулах, это может стать проблемой, если возникла необходимость изменить текст для одной из этих ссылок. Вместо изменения текста в каждом шаблоне и десинхронизации риска было бы предпочтительно обновить его один раз, и это изменение отразится на всех шаблонах. Мы можем сделать это, используя чанки.

Приведенный ниже пример иллюстрирует размещение верхнего, нижнего и нижнего колонтитула в чанке.

```php
[[$headerHTML]]
    <main>
        [[*content]]
    </main>
    [[$aside]]
[[$footerHTML]]
```

Чанк `headerHTML` заменил разметку, которая ранее была в заголовке, включая тег DOCTYPE и заголовок. Чанк `footerHTML` теперь заменил разметку нижнего колонтитула, включая закрывающиеся теги body и html. В случае, описанном выше относительно изменения текста ссылки, теперь его нужно будет выполнить только один раз в блоке.

Чанки не ограничиваются включением верхнего уровня, они также могут быть вложены в другие чанки. В приведенном ниже примере мы создали новый чанк с именем `metaData` и заполнили его некоторыми общими метаданными.

``` php
  <!-- SEO Microdata (Schema.org variant) - Google, Bing, Yahoo -->
  <meta content="[[++site_name]]" itemprop="description">
  <meta content="[[++site_name]]" itemprop="name">
  <meta content="http://www.[[!++http_host]]" itemprop="url">
  <meta content="http://www.[[!++http_host]]/meta_thumbnail.png" itemprop="image">
  <meta content="info@[[!++http_host]]" itemprop="email">
  <meta content="[[++site_name]]" name="companyright">
```

Теперь мы можем встроить этот чанк в существующий чанк `headerHTML`:

``` php
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
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
```

## Использование Сниппетов

MODX предлагает много динамики из коробки, но [Сниппеты](building-sites/elements/snippets) способ расширить эту динамику. Внутри нашего сниппета `headerHTML` у нас есть навигация, которая может быть создана и управляться динамически с использованием сниппета или дополнительного дополнения, такого как [Wayfinder](extras/wayfinder) или [pdoMenu](extras/pdoTools/Snippets/pdoMenu). Wayfinder и pdoMenu - это дополнения, которые могут автоматически заполнять ваше меню на основе ресурсов, имеющихся на вашем сайте. Кроме того, они также могут обрабатывать «активный» класс, когда пользователь перемещается по сайту, а также множество других функций.

Чтобы использовать этот сниппет, вставьте его вместо текущего статического меню в блоке headerHTML.

``` php
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
   [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
<body>
    <!-- Header Start -->
    <header>
        <nav>
            [[pdoMenu?
              &parents=`0`
              &level=`1`
            ]]
        </nav>
    </header>
    <!-- Header End -->
```

*В приведенном выше примере используется pdoMenu. Для получения дополнительной функциональности и свойств, которые могут быть применены, включая диктовку вывода html, пожалуйста, проверьте [документацию](extras/pdoTools/Snippets/pdoMenu).*

Тем не менее, сниппеты не ограничиваются существующими дополнениями и могут быть созданы и затем включены в ваш шаблон для выполнения любой динамической функции, которую позволяет язык PHP. Например, мы могли бы создать сниппет с именем `getWeather` и заполнить его следующим кодом:

``` php
// Получение API URL
$jsonurl = "https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=b6907d289e10d714a6e88b30761fae22";

// Вызов API
$json = file_get_contents($jsonurl);

// Получение результатов
$weather = json_decode($json);

// Получение описания погоды
return $weather->weather[0]->main;
```  

Отсюда можно вызвать Сниппет внутри нашего `aside`, который будет служить виджетом для получения текущего описания погоды.

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        [[getWeather]]
    </section>
</aside>
```

The result of this Snippet would render on the front end like this:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        Drizzle
    </section>
</aside>
```

Результат этого сниппета во время вызова выводит значение `Drizzle`. Это значение из API будет кэшироваться в MODX, так как Snippet был вызван без флага uncache `!`. Однако в этом случае использования это может быть проблематично, поскольку кэшированное значение `Drizzle` может сохраняться даже после изменения погоды. Этот конкретный сниппет должен быть вызван без кэширования с использованием флага `!`, чтобы предотвратить эту проблему. Чтобы вызвать сниппет без кэширования, поместите флаг перед именем фрагмента `[[!GetWeather]]`.

Этот сниппет также может быть расширен с использованием другого сниппета, который получает местоположение пользователя из другого API. Результат которого затем может быть передан в сниппет getWeather в качестве параметра.

``` php
[[!getWeather? &location=`[[!getLocation]]`]]
```

Сниппет `getWeather` может быть обновлен для захвата свойства и установки значения местоположения в вызове API.

``` php
// Получение свойств
$location = $modx->getOption('location', $scriptProperties);

// Получение API URL
$jsonurl = "https://samples.openweathermap.org/data/2.5/weather?q=" . $location . "&appid=b6907d289e10d714a6e88b30761fae22";

// Вызов API
$json = file_get_contents($jsonurl);

// Получение результатов
$weather = json_decode($json);

// Получение описания погоды
return $weather->weather[0]->main;
```

Узнайте больше о [Сниппетах](building-sites/elements/snippets).

## Ресурсы

[Серия видео Быстрого старта](building-sites/integrating-templates/video-quick-start)

[Именованный якорь](building-sites/integrating-templates/named-anchor)
