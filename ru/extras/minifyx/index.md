---
title: "MinifyX"
description: "Сниппет для объединения JS и CSS файлов и ускорения загрузки страницы"
translation: "extras/minifyx/index"
---

## Что такое MinifyX?

MinifyX это сниппет, который объединяет JS и CSS файлы, снижая нагрузку на сервер и ускоряя загрузку.

MinifyX создан и поддерживается [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Требования

MinifyX требует MODX® Revolution 2.2.0 или новее.

## История

| Version   | Release date       | Author                                                                                                                                      | Changes                              |
| --------- | ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------ |
| 1.0.0-PL1 | March 26th, 2012   | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.                     |
| 1.1.0-PL  | September 09, 2012 | [Vasiliy Naumkin](http://bezumkin.ru)                                                                                                       | Improved minifiers and code refactor |

## Загрузка и установка

Установите пакет через менеджер пакетов MODX®.

## Что нужно знать

MinifyX объединяет файлы в один кэш-файл и загружает его оттуда. При объединении CSS используйте абсолютные пути для изображений и URL-вызовов. То же для javascript. Некоторые фреймворки используют bootloaders (например EXT), которые должны лежать в своих каталогах. Не попадите в эту ловушку.

## Использование MinifyX на фронтенде

## Размещение сниппета

Разместите основной вызов `[[[MinifyX](extras/minifyx "MinifyX")]]` на странице. Сниппет назначает следующие плейсхолдеры:

| Placeholder name          | Content                                                                                                                             |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| `[[+MinifyX.css]]`        | The tag containing the source to the CSS cache file (should be placed in the head, most of the time before the javascript includes) |
| `[[+MinifyX.javascript]]` | The tag containing the source to the javascript cache file (should be placed in the head)                                           |

## Параметры конфигурации

| Parameter                                       | Description                                                   | Values                 | Default Value                    | Required |
| ----------------------------------------------- | ------------------------------------------------------------- | ---------------------- | -------------------------------- | -------- |
| jsSources                                       | Comma separated list to your JS files from the site base URL  | Comma separated string | (empty)                          | no       |
| cssSources                                      | Comma separated list to your CSS files from the site base URL | Comma separated string | (empty)                          | no       |
| minifyCss                                       | Whether to minify the CSS or not                              | 0 = no, 1 = yes        | 0                                | no       |
| minifyJs                                        | Whether to minify the JS or not                               |
| (only block comments allowed! **experimental**) | 0 = no, 1 = yes                                               | 0                      | no                               |
| cacheFolder                                     | The folder to the cache files from the site base URL          | A string               | assets/components/minifyx/cache/ | no       |
| jsFilename                                      | Base name of destination js file, without extension           | A string               | scripts                          |          |
| cssFilename                                     | Base name of destination css file, without extension          | A string               | styles                           |          |

## Примеры

Ниже основной вызов сниппета и размещение плейсхолдеров. Все параметры необязательны.

``` php
<html>
<head>
[[MinifyX?
  &jsSources=`
    /assets/myframework.js,
    /assets/lightbox.js,
    /assets/script.js
`
  &cssSources=`
    /assets/style1.css,
    /assets/style2.css
`
]]

[[+MinifyX.javascript]]
[[+MinifyX.css]]
</head>
<body></body>
</html>
```

## Внешние источники

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/minifyx.html>

GitHub repository: <http://www.github.com/b03tz/MinifyX/> and <https://github.com/bezumkin/MinifyX>

Report bugs and request features: <http://www.github.com/b03tz/MinifyX/issues>
