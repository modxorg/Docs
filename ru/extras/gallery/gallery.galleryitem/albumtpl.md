---
title: "albumTpl"
description: "Чанк albumTpl для каждого альбома элемента в GalleryItem"
translation: "extras/gallery/gallery.galleryitem/albumtpl"
---

## Чанк albumTpl GalleryItem

Этот чанк используется для каждого альбома элемента, который выбирает сниппет [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem"), через свойство &albumTpl.

## Значение по умолчанию

```html
<span class="gal-item-album"><a href="[[~[[*id]]]]?[[+albumRequestVar]]=[[+id]]">[[+name]]</a></span>
```

## Доступные плейсхолдеры

| Name            | Description                                                                                                                                        |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| id              | ID альбома.                                                                                                                               |
| name            | Имя альбома.                                                                                                                             |
| parent          | ID родителя альбома. По умолчанию 0.                                                                                                         |
| description     | Описание альбома.                                                                                                                      |
| createdon       | Метка времени создания альбома.                                                                                                         |
| createdby       | ID пользователя, создавшего альбом.                                                                                                        |
| rank            | «Rank», порядок хранения альбома.                                                                                            |
| active          | Отмечен ли альбом как «Active». Может быть 1 или 0.                                                                                       |
| prominent       | Отмечен ли альбом как «Prominent». Может быть 1 или 0.                                                                                    |
| albumRequestVar | Параметр albumRequestVar, переданный в сниппет [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem"). По умолчанию galAlbum. |

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
