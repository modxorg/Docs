---
title: "Slimbox"
description: "Плагин Slimbox для Gallery: миниатюры с lightbox-оверлеем при клике"
translation: "extras/gallery/gallery.plugins/slimbox"
---

## Плагин Slimbox для Gallery

Плагин Slimbox быстро выводит Gallery с миниатюрами и простым lightbox-оверлеем при клике. Использует [Slimbox2 plugin](http://www.digitalia.be/software/slimbox2) для jQuery.

## Использование

Добавьте этот параметр в сниппет Gallery:

```php
[[!Gallery? &plugin=`slimbox`]]
```

## Доступные свойства

У Slimbox есть собственные свойства. Передайте их в сниппет [Gallery](extras/gallery "Gallery"), чтобы переопределить значения по умолчанию.

| Name                     | Description                                                                                                    | Default Value                                                      |
| ------------------------ | -------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------ |
| slimboxUseCss            | При 1 подключает CSS Slimbox.                                                                  | 1                                                                  |
| slimboxCss               | Если slimboxUseCss = 1, загружает CSS из этого свойства. Если не задано, используется CSS по умолчанию. | {slimbox\_url}packages/slimbox/css/slimbox2.css                    |
| slimboxRenderJsOnStartup | Загружает JS Slimbox в HEAD страницы. При 0 загрузка внизу страницы.                          | 1                                                                  |
| slimboxLoadJQuery        | При 1 добавляет загрузку jQuery на страницу. Оставьте 0, если jQuery уже подключён (рекомендуется).   | 0                                                                  |
| slimboxJQueryUrl         | Если slimboxLoadJQuery = 1, загружает jQuery по этому URL.                                  | `https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js` |
| slimboxJsTpl             | Чанк tpl для JS Slimbox. Обычно эту настройку можно не менять.                                     | slimbox/js                                                         |

Также есть свойства, которые влияют на поведение Slimbox:

| Name                     | Description                                                                                                                                                                                                                                                                                                                                              | Default Value      |
| ------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------ |
| loop                     | При 1 пользователь переходит между первым и последним изображением галереи Slimbox, если изображений больше одного.                                                                                                                                                                                                           | 0                  |
| overlayOpacity           | Прозрачность фонового оверлея. 1 непрозрачный, 0 полностью прозрачный.                                                                                                                                                                                                                                                                | 0.8                |
| overlayFadeDuration      | Длительность анимации появления и исчезновения оверлея в миллисекундах. 0 отключает эффект fade.                                                                                                                                                                                                                           | 400                |
| resizeDuration           | Длительность анимации изменения ширины и высоты в миллисекундах. 0 отключает анимацию resize.                                                                                                                                                                                                                                    | 400                |
| resizeEasing             | Имя easing-эффекта для анимации resize (для всех кроме «swing» нужен jQuery Easing Plugin). Многим easing нужно больше времени, поэтому подстройте resizeDuration выше.                                                                                                | swing              |
| initialWidth             | Начальная ширина overlay box в пикселях.                                                                                                                                                                                                                                                                                                         | 250                |
| initialHeight            | Начальная высота overlay box в пикселях.                                                                                                                                                                                                                                                                                                        | 250                |
| imageFadeDuration        | Длительность fade-in анимации изображения в миллисекундах. 1 отключает эффект, изображение появляется сразу.                                                                                                                                                                                                                    | 400                |
| captionAnimationDuration | Длительность анимации подписи в миллисекундах. 1 отключает эффект, подпись появляется сразу.                                                                                                                                                                                                                                 | 400                |
| counterText              | Текст счётчика в подписях при показе нескольких изображений. {x} заменяется на индекс текущего изображения, {y} на общее число. false (boolean, без кавычек) или "" отключает счётчик. | "Image {x} of {y}" |

## Примеры

Slimbox для альбома с ID 2 с непрерывным циклом. Также загружается jQuery.

```php
[[Gallery?
    &album=`2`
    &plugin=`slimbox`
    &loop=`1`
    &slimboxLoadJQuery=`1`
]]
```

Slimbox для альбома с ID 2, JS и CSS внизу страницы.

```php
[[Gallery?
    &album=`2`
    &plugin=`slimbox`
    &slimboxRenderJsOnStartup=`0`
]]
```

## Смотрите также

1. [Gallery.Gallery](extras/gallery/gallery/index)
    1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
    2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
    1. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/containertpl)
    2. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
    1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/albumtpl)
    2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/galleryitempagination)
    3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/tagtpl)
    4. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/tpl)
4. [Gallery.Plugins](extras/gallery/gallery.plugins)
    1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/galleriffic)
    2. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/slimbox)
5. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
6. [Gallery.Example1](extras/gallery/gallery.example1)
7. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
