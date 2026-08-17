---
title: "rowTpl"
description: "Чанк rowTpl для каждого альбома в сниппете GalleryAlbums"
translation: "extras/gallery/gallery.galleryalbums/rowtpl"
---

## Чанк rowTpl GalleryAlbums

Этот чанк используется для каждого альбома, который перебирает сниппет [GalleryAlbums](extras/gallery/gallery.galleryalbums "Gallery.GalleryAlbums").

## Значение по умолчанию

```php
<li[[+cls:notempty=``]]><a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+id]]`]]">[[+showName:notempty=`[[+name]]`]]</a></li>
```

## Доступные плейсхолдеры

| Name            | Description                                                                                                                                              |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
| id              | ID альбома.                                                                                                                                     |
| name            | Имя альбома.                                                                                                                                   |
| parent          | ID родителя альбома. По умолчанию 0.                                                                                                               |
| description     | Описание альбома.                                                                                                                            |
| createdon       | Метка времени создания альбома.                                                                                                               |
| createdby       | ID пользователя, создавшего альбом.                                                                                                              |
| rank            | «Rank», порядок хранения альбома.                                                                                                  |
| active          | Отмечен ли альбом как «Active». Может быть 1 или 0.                                                                                             |
| prominent       | Отмечен ли альбом как «Prominent». Может быть 1 или 0.                                                                                          |
| albumRequestVar | Параметр albumRequestVar, переданный в сниппет [GalleryAlbums](extras/gallery/gallery.galleryalbums "Gallery.GalleryAlbums"). По умолчанию galAlbum. |
| image           | Ссылка на изображение, определённую сниппетом GalleryAlbums.                                                                                         |

Если вы используете плейсхолдер image в шаблоне как src для img, свойства миниатюры из вызова сниппета могут не применяться. Не проблема: добавьте их сами, потому что image это вызов phpthumb. Например, миниатюра 240x160 с zoomcrop:

```php
<img src="[[+image]]&w=240&h=160&zc=1" alt="[[+name]]" />
```

## Смотрите также

1. [Gallery.Gallery](extras/gallery/gallery/index)
   1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
   2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
   1. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
   1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/albumtpl)
   2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/galleryitempagination)
   3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/tagtpl)
4. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/tpl)
5. [Gallery.Plugins](extras/gallery/gallery.plugins)
   1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/galleriffic)
   2. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/slimbox)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
