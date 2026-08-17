---
title: "boilerX"
description: "HTML5 Boilerplate для MODX Revolution с настраиваемыми чанками и системными настройками"
translation: "extras/boilerx/index"
---

## Что такое boilerX?

![](html5.png)

[HTML5 Boilerplate](https://github.com/jpdevries/boilerx) помогает собирать быстрые, надёжные и адаптивные веб-приложения и сайты. Стартовый набор с опытом сотен разработчиков в одном пакете.

boilerX подключает HTML5 Boilerplate в один клик и настраивается через системные настройки. При установке assets boilerplate автоматически попадают в папку assets.

## Установка

Установите через Package Manager.

Уберите «sample.» из имён элементов boilerX. Тогда при обновлении пакетов ваши правки не перезапишутся.

## Пример шаблона

boilerX поставляется с примером шаблона, который подключает чанки в нужном порядке.

```html
[[$bx-head-open]]
[[$bx-head-append]]
[[$bx-head-close]]
[[$bx-container-open]]
[[*content]]
[[$bx-container-close]]
[[$bx-bottom-open]]
[[$bx-bottom-close]]
```

## Чанки boilerX

> bx-head-open

Основная часть header: CSS, modernizr и meta-теги.

> bx-head-append

Пустой чанк для CSS, JavaScript или meta-тегов перед закрытием head. Удобное место для MetaX.

> bx-head-close

Закрывает тег head.

> bx-container-open

Пустой чанк для обёрточного div при необходимости.

> bx-container-close

Пустой чанк закрывает разметку из bx-container-open.

> bx-bottom-open

Отложенный JavaScript и код Google Analytics. **bx-bottom-close**

> bx-bottom-close

Закрывает теги body и html.

## Системные настройки

| Имя                | Описание                                          | По умолчанию                                                    |
| ------------------- | ---------------------------------------------------- | ---------------------------------------------------------- |
| Google Analytics ID | Необязательно. Без значения код отслеживания закомментирован  | UAXXXXXXXX1                                                |
| CSS Path            | Путь к main.css                     | assets/components/boilerx/css/main.css                     |
| Normalize CSS Path  | Путь к normalize.css                | assets/components/boilerx/css/normalize.css                |
| jQuery version      | Версия jQuery для HTML5 Boilerplate      | 1.9.1                                                      |
| Modernizr.js Path   | Путь к modernizr.js                        | assets/components/boilerx/js/vendor/modernizr. 2.6.2.min.js |
| Meta Author         | Meta author                         | Site Authors                                               |
| Meta Description    | Meta description                        | Not Another Wordpress Site                                 |
| Meta Viewport       | Viewport для iOS                           | width=device-width,initial-scale=1                         |
| IE Edge Mode        | Тег IE Edge mode                                | IE=edge,chrome=1                                           |
| IE Chrome Frame     | Версия IE для Chrome Frame       | 7                                                          |
| Show Comments       | Показывать подсказки в комментариях разметки | true                                                       |

## Пример разметки

Вывод sample.BoilerXTemplate по умолчанию. Повторяет разметку HTML5 Boilerplate 4.2.0 (h5bp-html5-boilerplate-defe483)

``` html
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1">
    <title>MODX Revolution - Home</title>
    <meta name="description" content="Site Description">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="assets/components/boilerx/css/normalize.css">
    <link rel="stylesheet" href="assets/components/boilerx/css/main.css">
    <script src="assets/components/boilerx/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- Use this chunk to append to your head tag -->
</head>
<!-- Use these body classes to target any combination of specific templates, ids, children, and class_keys -->
<body class="t-2 id-1 p-0 ck-modDocument">
    <!--[if lt IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/components/boilerx/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="assets/components/boilerx/js/plugins.js"></script>
    <script src="assets/components/boilerx/js/main.js"></script>
    <!-- Change UAXXXXXXXX1 to be your site's ID by setting bx.ga-id System Setting to auto-enable tracking -->
    <!--script>
        var _gaq=[ ['_setAccount','UAXXXXXXXX1'],['_trackPageview'] ];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script-->
</body>
</html>
```

## См. также

1. [bx-head-open](extras/boilerx/bx-head-open)
2. [bx-head-append](extras/boilerx/bx-head-append)
3. [bx-head-close](extras/boilerx/bx-head-close)
4. [bx-container-open](extras/boilerx/bx-container-open)
5. [bx-container-close](extras/boilerx/bx-container-close)
6. [bx-bottom-open](extras/boilerx/bx-bottom-open)
7. [bx-bottom-close](extras/boilerx/bx-bottom-close)
