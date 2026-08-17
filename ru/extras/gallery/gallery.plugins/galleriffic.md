---
title: "Galleriffic"
description: "Плагин Galleriffic для Gallery: слайдшоу с миниатюрами и навигацией"
translation: "extras/gallery/gallery.plugins/galleriffic"
---

## Плагин Galleriffic для Gallery

Плагин Galleriffic быстро выводит Gallery с изображениями. Для работы jQuery должен быть уже загружен на странице.

## Использование

Добавьте этот параметр в сниппет Gallery:

```php
[[!Gallery? &plugin=`galleriffic`]]
```

## Доступные свойства

Galleriffic переопределяет следующие свойства сниппета [Gallery](extras/gallery "Gallery"). Чтобы переопределить их, передайте свойство с префиксом galleriffic.

| Name                    | Overrides    | Description                               | Default Value        |
| ----------------------- | ------------ | ----------------------------------------- | -------------------- |
| gallerifficThumbTpl     | thumbTpl     | Чанк миниатюры для каждого элемента.     | GallerifficItemThumb |
| gallerifficContainerTpl | containerTpl | Чанк-контейнер для обёртки содержимого. | Galleriffic          |
| gallerifficThumbWidth   | thumbWidth   | Ширина миниатюр.              | 75                   |
| gallerifficThumbHeight  | thumbHeight  | Высота миниатюр.             | 75                   |

У Galleriffic также есть собственные свойства. Передайте их в сниппет [Gallery](extras/gallery "Gallery"), чтобы переопределить значения по умолчанию.

| Name                      | Description                                                   | Default Value       |
| ------------------------- | ------------------------------------------------------------- | ------------------- |
| numThumbs                 | Число миниатюр на странице.                    | 15                  |
| navigationWidth           | Ширина навигации в пикселях.                      | 300px               |
| enableTopPager            | Показывать верхнюю пагинацию.                    | 1                   |
| enableBottomPager         | Показывать нижнюю пагинацию.                 | 1                   |
| maxPagesToShow            | Максимальное число страниц в пагинации.                              | 7                   |
| renderSSControls          | Рендерить элементы управления слайдшоу.              | 1                   |
| renderNavControls         | Рендерить элементы навигации.             | 1                   |
| enableHistory             | Включить history.                             | 0                   |
| autoStart                 | Автоматически запускать слайдшоу.          | 0                   |
| defaultTransitionDuration | Длительность переходов в миллисекундах.                | 500                 |
| thumbsContainerSel        | CSS-селектор контейнера миниатюр.     | #gal-gaff-thumbs    |
| imageContainerSel         | CSS-селектор контейнера основного изображения.     | #gal-gaff-slideshow |
| captionContainerSel       | CSS-селектор контейнера подписи.        | #gal-gaff-caption   |
| controlsContainerSel      | CSS-селектор контейнера элементов навигации.   | #gal-gaff-controls  |
| loadingContainerSel       | CSS-селектор контейнера экрана загрузки. | #gal-gaff-loading   |
| playLinkText              | Текст ссылки Play Slideshow.                    |
| pauseLinkText             | Текст ссылки Pause Slideshow.                   |
| prevLinkText              | Текст ссылки Previous Photo.                    |
| nextLinkText              | Текст ссылки Next Photo.                        |
| prevPageLinkText          | Текст ссылки Previous Page.                     |
| nextPageLinkText          | Текст ссылки Next Page.                         |

## Примеры

Galleriffic с 10 миниатюрами на странице:

```php
[[!Gallery?
   &toPlaceholder=`gallery`
   &album=`My Photos`
   &plugin=`galleriffic`
   &numThumbs=`10`
]]
```

Скрыть пагинацию и элементы «show slideshow», но автоматически запустить слайдшоу:

```php
[[!Gallery?
   &toPlaceholder=`gallery`
   &album=`My Photos`
   &plugin=`galleriffic`
   &renderNavControls=`0`
   &renderSSControls=`0`
   &autoStart=`1`
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
