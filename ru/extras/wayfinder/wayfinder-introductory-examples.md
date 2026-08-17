---
title: "Вводные примеры Wayfinder"
description: "Пошаговые примеры вызовов Wayfinder и соответствующего HTML-вывода для настройки меню"
translation: "extras/wayfinder/wayfinder-introductory-examples"
---

Wayfinder это один из самых важных сниппетов для сайта на MODX, потому что почти **каждый** сайт использует меню.

## Перед началом

В следующих примерах мы будем ссылаться на такие образцы ресурсов:

![](modx_resources.jpg)

### Диаграмма

Ниже графическое представление различных форматирующих чанков, которые мы рассмотрим в этих примерах:

![](wf_regions.png)

На первый взгляд это может показаться сложным, но если вы будете сверяться с этой диаграммой, читая примеры ниже, всё станет понятнее.

### Для запоминания

Полезно сразу пояснить: свойства форматирования Wayfinder бывают двух типов. Одни форматируют _СПИСКИ_, другие форматируют _ЭЛЕМЕНТЫ СПИСКА_.

#### Чанки списков

Эти параметры должны ссылаться на чанки, содержащие вариант _СПИСКА_ или контейнера элементов:

- **&outerTpl**
- **&innerTpl**

#### Чанки элементов списка

Эти параметры должны ссылаться на чанки, содержащие вариант _ЭЛЕМЕНТА_:

- **&rowTpl**
- **&innerRowTpl**
- **&parentRowTpl**

**Знайте свои чанки**
Всё становится проще, когда вы понимаете, какие параметры ссылаются на списки, а какие на элементы.

## Базовое использование

Самый простой вызов WayFinder использует встроенное форматирование:

### Вызов сниппета

``` php
[[Wayfinder? &startId=`55` ]]
```

### Пример вывода

``` html
<ul>
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <li><a href="media-hub/blog/" title="HG Blog">HG Blog</a>

    <ul>
        <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section">Blog Test Section</a>

        <ul>
            <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post">Test Post</a></li>
            <li><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a></li>
            <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post">Third Post</a></li>
        </ul>

        </li>
        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>

    </li>
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

Вы видите, как поведение по умолчанию вкладывает неупорядоченные списки. Неплохо для вызова сниппета с одним параметром.

## Форматирование каждой ссылки: rowTpl

Далее мы можем явно задать формат каждой ссылки через параметр &rowTpl, как в следующем вызове:

``` php
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl`]]
```

Мы настроили чанк «rowTpl» так:

``` php
<!-- rowTpl -->
<li[[+wf.id]][[+wf.classes]]>
<a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>
[[+wf.wrapper]]
</li>
```

### Пример вывода

``` html
<ul>
    <!-- rowTpl -->
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/blog/" title="HG Blog">HG Blog</a>

    <ul>
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section">Blog Test Section</a>

        <ul>
            <!-- rowTpl -->
            <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post">Test Post</a></li>
            <!-- rowTpl -->
            <li><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a></li>
            <!-- rowTpl -->
            <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post">Third Post</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>

    </li>
    <!-- rowTpl -->
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

По сути это то же самое, но теперь у нас явный контроль над форматированием каждого элемента.
Мы также добавили комментарий в чанк, чтобы было видно, как итерируется вывод.

## Внешняя обёртка: форматирование `<ul>`

Далее мы явно отформатируем внешние неупорядоченные списки `<ul>`, задав параметр **&outerTpl**.

Вот наш пример вызова сниппета:

``` php
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl`]]
```

А вот новый чанк «outerTpl»:

``` php
<!-- outerTpl -->
<ul id="topnav"[[+wf.classes]]>
[[+wf.wrapper]]
</ul>
```

### Пример вывода

``` html
<!-- outerTpl -->
<ul class="topnav">
    <!-- rowTpl -->
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/blog/" title="HG Blog">HG Blog</a>

    <!-- outerTpl -->
    <ul class="topnav">
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section">Blog Test Section</a>

        <!-- outerTpl -->
        <ul class="topnav">
            <!-- rowTpl -->
            <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post">Test Post</a></li>
            <!-- rowTpl -->
            <li><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a></li>
            <!-- rowTpl -->
            <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post">Third Post</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>

    </li>
    <!-- rowTpl -->
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

Теперь у нас есть контроль над каждым элементом и над форматом `<ul>` для каждого списка.

Будьте осторожны: вопреки названию **outerTpl** не обязательно форматирует только самую внешнюю обёртку. Он форматирует _КАЖДУЮ_ группу элементов с дочерними элементами, _если не указан_ чанк **_innerTpl_**! Если вам нужно более «ожидаемое» поведение, когда **outerTpl** форматирует только внешнюю группу, явно укажите параметр «innerTpl» (см. ниже).

Один вывод: НЕ используйте CSS id внутри **outerTpl**, потому что на странице может оказаться несколько элементов с одним и тем же ID.

Заметили, как в **outerTpl** мы явно задали CSS-класс? Это не обязательно: **Wayfinder** предоставляет параметры для установки CSS-классов многих компонентных чанков (об этом чуть позже).

## ParentRow: особое форматирование для родительских папок

На этот раз мы зададим другой форматирующий чанк для элементов-папок с дочерними элементами (то есть «контейнеров», как их называет документация). На нашем примере изображения это относится к страницам «HG Blog (59)» и «Blog Test Section (100)».

### Пример вызова сниппета

``` php
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow`]]
```

Вот содержимое чанка «parentRow»:

``` php
<!-- ParentRow -->
<li>
<a href="[[+wf.link]]">[[+wf.linktext]]</a> - [[+wf.description]]
[[+wf.wrapper]]
</li>
```

### Пример вывода

Вот пример вывода.

``` html
<!-- outerTpl -->
<ul class="topnav">
    <!-- rowTpl -->
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- ParentRow -->
    <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

    <!-- outerTpl -->
    <ul class="topnav">
        <!-- ParentRow -->
        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

        <!-- outerTpl -->
        <ul class="topnav">
            <!-- rowTpl -->
            <li class="first">
            <a href="media-hub/blog/test-section/test-post" title="Test Post">Test Post</a></li>
            <!-- rowTpl -->
            <li><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a></li>
            <!-- rowTpl -->
            <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post">Third Post</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>

    </li>
    <!-- rowTpl -->
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

Если бы мы не указали параметр **&parentRowTpl**, вместо него использовался бы чанк **&rowTpl**, и вывод совпал бы с одним из предыдущих примеров.

## innerTpl

Ранее мы заметили, что параметр outerTpl форматирует внешнюю группу
и любую другую группу элементов. По сути он используется как контейнер `<ul>` для обёртки
различных элементов списка. Но часто внешний `<ul>` нужно оформить иначе, чем вложенные `<ul>` с подэлементами.

Тогда можно использовать &innerTpl.

``` php
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow` &innerTpl=`innerTpl`]]
```

### Пример вывода

``` html
<!-- outerTpl -->
<ul class="topnav">
    <!-- rowTpl -->
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- ParentRow -->
    <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

    <!-- innerTpl: outerTpl is used if this is not specified -->
    <ul class="topnav">
        <!-- ParentRow -->
        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

        <!-- innerTpl: outerTpl is used if this is not specified -->
        <ul class="topnav">
            <!-- rowTpl -->
            <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post">Test Post</a></li>
            <!-- rowTpl -->
            <li><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a></li>
            <!-- rowTpl -->
            <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post">Third Post</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>

    </li>
    <!-- rowTpl -->
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

## innerRowTpl

Последний элемент форматирования: различать элементы верхнего уровня и элементы, вложенные глубже в подменю.

Этот чанк это вариация базового **&rowTpl**. Вот наш «innerRowTpl»:

``` html
<!-- innerRowTpl -->
<li><a href="[[+wf.link]]">[[+wf.linktext]]</a>[[+wf.wrapper]]</li>
```

### Вызов сниппета

Вот как выглядит наш вызов сниппета:

``` php
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow` &innerTpl=`innerTpl` &innerRowTpl=`innerRowTpl`]]
```

### Пример вывода

Вот выведенный HTML:

``` html
<!-- outerTpl -->
<ul class="topnav">
    <!-- rowTpl -->
    <li class="first"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- ParentRow -->
    <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

    <!-- innerTpl: outerTpl is used if this is not specified -->
    <ul class="topnav">
        <!-- ParentRow -->
        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

        <!-- innerTpl: outerTpl is used if this is not specified -->
        <ul class="topnav">
            <!-- innerRowTpl -->
            <li><a href="media-hub/blog/test-section/test-post">Test Post</a></li>
            <!-- innerRowTpl -->
            <li><a href="media-hub/blog/test-section/other-post">Other Post</a></li>
            <!-- innerRowTpl -->
            <li><a href="media-hub/blog/test-section/third-post">Third Post</a></li>
        </ul>

        </li>
        <!-- innerRowTpl -->
        <li><a href="media-hub/blog/archives">Archives</a></li>

    </ul>
    </li>
    <!-- rowTpl -->
    <li><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="last"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

Иными словами, страницы верхнего уровня (56, 57, 58, 60, 61, 62) используют стандартный **&rowTpl**, а все страницы во вложенных папках
используют &innerRowTpl.

## Настройка классов

Прежде чем углубляться дальше, быстро покажем, как другие доступные параметры влияют на итоговый вывод. Возможно, вам не понадобится создавать десятки разных чанков для форматирования. В наших
примерах первому и последнему элементам строки добавляются пользовательские CSS-классы. Wayfinder добавляет их
в плейсхолдер `[[+wf.attributes]]` внутри нашего «rowTpl»:

``` php
<!-- rowTpl -->
<li[[+wf.id]][[+wf.classes]]>
<a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>
[[+wf.wrapper]]
</li>
```

Мы зададим следующие параметры, чтобы вы увидели, как они влияют на вывод:

- &firstClass
- &lastClass
- &rowClass
- &outerClass

### Вызов сниппета

Наш изменённый вызов Wayfinder выглядит так:

``` php
[[!Wayfinder? &startId=`55`
&rowTpl=`rowTpl`
&outerTpl=`outerTpl`
&firstClass=`my_first_class`
&lastClass=`my_last_class`
&rowClass=`my_row_class`
&outerClass=`my_outer_class`
]]
```

### Пример вывода

Вот как выглядит пример вывода:

``` php
<!-- outerTpl -->
<ul id="topnav" class="my_outer_class">
    <!-- rowTpl -->
    <li class="my_row_class my_first_class"><a href="media-hub/news" title="HG in the News">HG in the News</a></li>
    <!-- rowTpl -->
    <li class="my_row_class"><a href="media-hub/events" title="HG Events">HG Events</a></li>
    <!-- rowTpl -->
    <li class="my_row_class"><a href="media-hub/press" title="Press Releases">Press Releases</a></li>
    <!-- rowTpl -->
    <li class="my_row_class"><a href="media-hub/blog/" title="HG Blog">HG Blog</a>

    <!-- outerTpl -->
    <ul id="topnav">
        <!-- rowTpl -->
        <li class="my_row_class my_first_class">
        <a href="media-hub/blog/test-section/" title="Blog Test Section">Blog Test Section</a>

        <!-- outerTpl -->
        <ul id="topnav">
            <!-- rowTpl -->
            <li class="my_row_class my_first_class"><a href="media-hub/blog/test-section/test-post" title="Test Post">Test
                Post</a></li>
            <!-- rowTpl -->
            <li class="my_row_class"><a href="media-hub/blog/test-section/other-post" title="Other Post">Other Post</a>
            </li>
            <!-- rowTpl -->
            <li class="my_row_class my_last_class"><a href="media-hub/blog/test-section/third-post"
                title="Third Post">Third Post</a></li>
        </ul>
        </li>

        <!-- rowTpl -->
        <li class="my_row_class my_last_class"><a href="media-hub/blog/archives" title="Blog Archives">Archives</a></li>
    </ul>
    </li>
    <!-- rowTpl -->
    <li class="my_row_class"><a href="media-hub/fast-facts" title="HG Fast Facts">HG Fast Facts</a></li>
    <!-- rowTpl -->
    <li class="my_row_class"><a href="media-hub/publications" title="HG Publications">HG Publications</a></li>
    <!-- rowTpl -->
    <li class="my_row_class my_last_class"><a href="media-hub/media-contact" title="Media Contact">Media Contact</a></li>
</ul>
```

Обратите внимание: у первой и последней ссылок два класса. «my\_row\_class» добавляется ко **всем** строкам, а первый и последний элементы дополнительно получают «my\_first\_class» или «my\_last\_class» поверх «my\_row\_class».

Помните: если вы хотите использовать эти параметры, обязательно включите
плейсхолдер `[[+wf.attributes]]` в ваши чанки!

## Заключение

Надеемся, эти иллюстрации помогли вам понять, как различные чанки сочетаются для создания полностью настраиваемого меню.
