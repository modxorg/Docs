---
title: "containerTpl"
description: "Чанк containerTpl для обёртки вывода сниппета Gallery"
translation: "extras/gallery/gallery/containertpl"
---

## Чанк containerTpl Gallery

Этот чанк используется, когда в сниппете [Gallery](extras/gallery "Gallery") задано &containerTpl.

Лучше не использовать это свойство, а обернуть вывод в ресурсе или чанке. Так вы получите больше гибкости.

## Значение по умолчанию

Значения по умолчанию для &containerTpl нет. Если чанк не указан, вывод не оборачивается.

## Доступные плейсхолдеры

| Name               | Description                           |
| ------------------ | ------------------------------------- |
| thumbnails         | Сгенерированные миниатюры.             |
| album\_name        | Имя текущего альбома.        |
| album\_description | Описание текущего альбома. |

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
