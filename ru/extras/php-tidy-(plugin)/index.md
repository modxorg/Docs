---
title: "PHP Tidy (plugin)"
description: "Плагин MODX Revolution на базе парсера PHP Tidy, срабатывает на OnWebPagePrerender"
translation: "extras/php-tidy-(plugin)/index"
---

Плагин основан на парсере [PHP Tidy](http://php.net/manual/en/book.tidy.php), портирован в MODX автором goldsky.
Только для MODX Revolution. Скачивается через Управление пакетами.
Запускается на событии MODX OnWebPagePrerender.

Чтобы изменить свойства плагина, откройте вкладку свойств плагина.
Полный справочник свойств: [HTML Tidy Configuration Options](http://tidy.sourceforge.net/docs/quickref.html)

## HTML 5

Отредактируйте **new-blocklevel-tags**, добавьте:

> article, aside, bdi, command, details, summary, figure, figcaption, footer, header, hgroup, mark, meter, nav, progress, ruby, rt, rp, section, time, wbr, audio, video, source, embed, track, canvas, datalist, keygen, output

## UTF 8

Чтобы плагин корректно обрабатывал символы UTF-8, задайте **char-encoding**, **input-encoding** и **output-encoding** в **utf8**
