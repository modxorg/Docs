---
title: "PageBreaker"
description: "Плагин для разбиения длинных текстов на страницы с пагинацией и ЧПУ"
translation: "extras/pagebreaker/index"
---

## Описание

PageBreaker: плагин, который показывает большие тексты по страницам.
Он ищет в тексте специальную строку (**<!- splitter ->**) и делит текст по ней. Есть пагинация и дружественные URL для страниц текста.

Разделители можно вставить вручную или через плагин TinyMCE (см. ниже).

Страница с разбиением не должна кешироваться. Иначе при смене страницы вы увидите один и тот же текст.

### Требования

- MODX Revolution 2.1 или новее
- PHP5 или новее

### Домашняя страница и демо

<http://bezumkin.ru/modx/pagebreaker/>

### Загрузка

Скачайте через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из репозитория MODX Extras: <https://modx.com/extras/package/pagebreaker>

## Использование

По умолчанию достаточно расставить разделители в контенте ресурса и отключить кеширование. Плагин сделает остальное.

PageBreaker поставляется с одним плагином:

- [PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker "PageBreaker.PageBreaker")

И двумя чанками:

- [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation "tpl.PageBreaker.navigation"): английская версия этого чанка.
- [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax "tpl.PageBreaker.ajax"): нужен только при переключении страниц через ajax.

## Интеграция с TinyMCE

После установки pagebreaker перезаписывается встроенный плагин TinyMCE [pagebreak](http://www.tinymce.com/wiki.php/Plugin:pagebreak).

![](pagebreaker_1.png)

Включите плагин и дополнительные кнопки в системных настройках.
Откройте **System** -> **System Settings**, фильтр namespace **timymce**, в **Custom Buttons Row 3** укажите:

``` php
pagebreak,pagebreakmanual,pagebreakauto,pagebreakcls
```

В **Custom Plugins** добавьте:

``` php
pagebreak
```

![](pagebreaker_2.png)

В TinyMCE появятся 4 новые кнопки.
Если видна только одна кнопка, переустановите Pagebreaker. Так бывает, если TinyMCE установили **после** Pagebreaker.

Кнопки слева направо:

- Разделить страницу в позиции курсора
- Ввести число символов и разбить текст автоматически
- Автоматически разбить текст каждые 2000 символов
- Удалить все разделители на странице

После удаления PageBreaker переустановите TinyMCE. Плагин pagebreak будет удалён, и TinyMCE может перестать работать.

## См. также

1. [PageBreaker.PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation)
