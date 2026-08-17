---
title: "Cliche"
description: "Компонент галереи изображений для MODX Revolution 2.2"
translation: "extras/cliche/index"
---

Cliche это компонент галереи изображений для MODX Revolution 2.2.

## Установка

-   Установите компонент через Package Manager.
-   Перезагрузите страницу
-   Выберите Cliche в главном меню Components
-   Создайте альбом и загрузите изображения
-   Используйте сниппет Cliche для вывода альбомов

## Возможности

-   Простое управление изображениями: компонент ориентирован на простоту
-   Множественная загрузка файлов: пакетная загрузка изображений и/или zip-архивов
-   Удобная шаблонизация: используйте любую HTML-разметку (в tpl-файле или в чанке через менеджер) и любые CSS-стили
-   Javascript-эффекты: подключайте популярные эффекты из библиотеки на ваш выбор

### До публичного релиза

-   Cliche Thumbnail Template variable: простой способ управлять миниатюрой записи для ресурса
-   Плагин Gallerific
-   Более полная документация

## Использование

Используйте сниппет Cliche для вывода галерей как вам нужно.

Просто добавьте следующую строку в документ:

```php
[[Cliche]]
```

Чтобы показать список всех альбомов:

```php
[[Cliche?
    &view=`albums`
]]
```

Чтобы показать конкретный альбом:

```php
[[Cliche?
    &id=`your_album_id`
    &view=`album`
]]
```

Чтобы показать одно изображение:

```php
[[Cliche?
    &id=`your_image_id`
    &view=`image`
]]
```

### Доступные параметры

| Parameter                                                                      | Description                                                        | Default Value               |
| ------------------------------------------------------------------------------ | ------------------------------------------------------------------ | --------------------------- |
| thumbWidth                                                                     | Ширина миниатюры в пикселях                                        | 120                         |
| thumbHeight                                                                    | Высота миниатюры в пикселях                                        | 120                         |
| wrapperTpl                                                                     | HTML-чанк обёртки, общий для всех представлений                    | Albums : albumwrapper       |
| itemTpl                                                                        | HTML-чанк каждого элемента, общий для всех представлений           | Albums : albumcover         |
| plugin                                                                         | Контроллер плагина, PHP-файл, который управляет параметрами вывода | default                     |
| columns                                                                        | Количество колонок для отображения                                 | 3                           |
| columnBreak                                                                    | HTML-разметка для разрыва колонок в стандартном просмотрщике       | `<br style="clear: both;">` |
| browse                                                                         | Используется для списка альбомов и просмотра альбома.              |
| Указывает, должна ли миниатюра вести на страницу или напрямую на изображение | 1                                                                  |
| loadJquery                                                                     | Установите 0, чтобы Cliche не загружал Jquery.                     | 1                           |
| loadCss                                                                        | Установите 1 для загрузки пользовательского CSS.                   | 0                           |
| css                                                                            | Путь и имя CSS-файла без расширения .css.                          |                             |

### Шаблоны

По умолчанию все чанки файловые и находятся в: "_core/components/cliche/controllers/web/plugins/**\[plugin\]**/\_\_\[chunkName\].tpl_"

Однако вы можете использовать любой обычный чанк.
Cliche сначала ищет чанк в базе данных, а если его нет, берёт файл из каталога плагина (как \*.tpl файл).
Вы можете пропустить поиск в базе и использовать только файловые чанки через параметр "_use_filebased_chunks_"

#### Плагин default

##### default/albumcover.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a title="[[+albumname]]" href="[[+url]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+albumname]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/albumcoverzoom.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+albumname]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+albumname]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/albumswrapper.tpl

```php
<div class="cliche" id="albums_list">
    [[+items]]
</div><!-- End #albums_list -->
```

##### default/albumwrapper.tpl

```php
<div class="cliche galleryid-[[+id]]" id="album-[[+id]]">
 [[+items]]
</div><!-- End #album-[[+id]] -->
```

##### default/image.tpl

```php
<div class="cliche">
    <div class="item">
        <a title="[[+name]]" class="zoom" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </div>
</div>
```

##### default/item.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+name]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/itemzoom.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+name]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/script.tpl

```php
$("a.zoom").fancybox();
```

#### Плагин Gallerific

##### galleriffic/item.tpl

```php
<li>
    <a class="thumb" name="leaf" href="[[+image]]" title="[[+name]]">
        <img src="[[+thumbnail]]" alt="Title #[[+id]]" />
    </a>
    <div class="caption">
        <div class="download">
            <a href="[[+image]]">Download Original</a>
        </div>
        <div class="image-title">[[+name]]</div>
        <div class="image-desc">[[+description]]</div>
    </div>
</li>
```

##### galleriffic/script.tpl

```javascript
jQuery(document).ready(function ($) {
    $("div.navigation").css({ width: "220px", float: "left" });
    $("div.content").css("display", "block");

    // Initially set opacity on thumbs and add
    // additional styling for hover effect on thumbs
    var onMouseOutOpacity = 0.67;
    $("#thumbs ul.thumbs li").opacityrollover({
        mouseOutOpacity: onMouseOutOpacity,
        mouseOverOpacity: 1.0,
        fadeSpeed: "fast",
        exemptionSelector: ".selected",
    });

    // Initialize Advanced Galleriffic Gallery
    var gallery = $("#thumbs").galleriffic({
        delay: 2500,
        numThumbs: 15,
        preloadAhead: 10,
        enableTopPager: true,
        enableBottomPager: true,
        maxPagesToShow: 7,
        imageContainerSel: "#slideshow",
        controlsContainerSel: "#controls",
        captionContainerSel: "#caption",
        loadingContainerSel: "#loading",
        renderSSControls: true,
        renderNavControls: true,
        playLinkText: "Play Slideshow",
        pauseLinkText: "Pause Slideshow",
        prevLinkText: "&lsaquo; Previous Photo",
        nextLinkText: "Next Photo &rsaquo;",
        nextPageLinkText: "Next &rsaquo;",
        prevPageLinkText: "&lsaquo; Prev",
        enableHistory: false,
        autoStart: false,
        syncTransitions: true,
        defaultTransitionDuration: 900,
        onSlideChange: function (prevIndex, nextIndex) {
            // 'this' refers to the gallery, which is an extension of $('#thumbs')
            this.find("ul.thumbs")
                .children()
                .eq(prevIndex)
                .fadeTo("fast", onMouseOutOpacity)
                .end()
                .eq(nextIndex)
                .fadeTo("fast", 1.0);
        },
        onPageTransitionOut: function (callback) {
            this.fadeTo("fast", 0.0, callback);
        },
        onPageTransitionIn: function () {
            this.fadeTo("fast", 1.0);
        },
    });
});
```

##### galleriffic/wrapper.tpl

```php
 <div id="gallery" class="content">
    <div id="controls" class="controls"></div>
    <div class="slideshow-container">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
    </div>
    <div id="caption" class="caption-container"></div>
</div>
<div id="thumbs" class="navigation">
    <ul class="thumbs noscript">
        [[+items]]
    </ul>
</div>
<div style="clear: both;"></div>
```

### Ошибки и проблемы

Cliche разрабатывается на GitHub по адресу: <https://github.com/argnist/Cliche>
Старая версия автора: <https://github.com/lossendae/Cliche>
