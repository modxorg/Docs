---
title: "tpl"
description: "Чанк tpl для вывода элемента GalleryItem при toPlaceholders = 0"
translation: "extras/gallery/gallery.galleryitem/tpl"
---

## Чанк tpl GalleryItem

Этот чанк используется, когда в сниппете [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem") задано &toPlaceholders = 0.

## Значение по умолчанию

```php
<a href="[[+url:is=``:then=`[[+image]]`:else=`[[+url]]`]]">
    <img src="[[+thumbnail]]" alt="[[+name]]" />
</a>
```

## Доступные плейсхолдеры

| Name        | Description                                                                                                                                |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
| name        | Имя элемента.                                                                                                                      |
| filename    | Имя файла элемента. Путь относительно каталога хранения, обычно assets/components/gallery/files/. |
| description | Описание элемента.                                                                                                               |
| mediatype   | Тип медиа элемента. Сейчас только «image».                                                                                |
| createdon   | Метка времени создания элемента.                                                                                               |
| createdby   | ID пользователя, создавшего элемент.                                                                                                   |
| active      | Активен ли элемент. Может быть 1 или 0.                                                                                              |
| albums      | Список альбомов элемента.                                                                                                          |
| tags        | Список тегов элемента.                                                                                                  |

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
