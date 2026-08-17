---
title: "Добавление Twitter-ленты"
description: "Устаревший способ Twitter через getFeed (API v1.0)"
translation: "extras/getfeed/getfeed.adding-a-twitter-feed"
---

**НЕ используйте этот способ для Twitter-ленты!**
Twitter отключил API v1.0 (который использует этот tutorial). С 11 июня он будет недоступен полностью. Подробнее: <https://dev.twitter.com/blog/api-blackout-testing-continues-may-22-2013>

Для Twitter используйте JSONDerulo (<https://modx.com/extras/package/jsonderulo>) или TwitterX (<https://modx.com/extras/package/twitterx>).

## Twitter на сайте

Tutorial показывает, как добавить Twitter через [getFeed](extras/getfeed "getFeed").

## Вызов getFeed

После установки getFeed разместите вызов сниппета там, где нужна лента:

``` php
<ul>
[[!getFeed?
   &url=`http://twitter.com/statuses/user_timeline/123456789.rss`
   &tpl=`twitterFeedTpl`
   &limit=`3`
]]
</ul>
```

Замените число на ваш Twitter user ID или username.

Вызов без кеша указывает на публичную timeline. Нужны последние 3 твита. Создайте чанк «twitterFeedTpl»:

``` php
<div class="tweet">
    <p>[[+description]]
    <br /><a href="[[+link]]">[[+pubDate:ago]]</a> via [[+twitter.source]]</p>
</div>
```

Лента Twitter на месте. Фильтр :ago форматирует дату в вид «X minutes, X hours ago».

Плейсхолдер даты (и другие) **зависят от ленты**. Проверьте сырой XML feed, чтобы увидеть, в каком item лежат данные.

## См. также

1. [getFeed.Adding a Twitter Feed](extras/getfeed/getfeed.adding-a-twitter-feed)
