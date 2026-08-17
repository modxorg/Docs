---
title: "containerTpl"
description: "Чанк containerTpl для обёртки альбомов в сниппете GalleryAlbums"
translation: "extras/gallery/gallery.galleryalbums/containertpl"
---

## Чанк containerTpl GalleryAlbums

Этот чанк оборачивает все альбомы, которые перебирает сниппет [GalleryAlbums](extras/gallery/gallery.galleryalbums) (доступно с 1.6.0 beta).

## Значение по умолчанию

Значения по умолчанию нет.

## Доступные плейсхолдеры

| Name            | Description                                                                                                                      |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| albums          | Строки альбомов.                                                                                                                  |
| nav.first       | ID первого альбома.                                                                                                       |
| nav.prev        | ID предыдущего альбома.                                                                                                    |
| nav.current     | ID текущего альбома.                                                                                                     |
| nav.next        | ID следующего альбома.                                                                                                        |
| nav.last        | ID последнего альбома.                                                                                                        |
| nav.curIdx      | Индекс текущего альбома.                                                                                                  |
| nav.count       | Число строк альбомов.                                                                                                     |
| albumRequestVar | Параметр albumRequestVar, переданный в сниппет [GalleryAlbums](extras/gallery/gallery.galleryalbums). По умолчанию galAlbum. |

## Пример

Пример ниже показывает возможные плейсхолдеры. Выводит навигацию previous/next по галереям в альбоме или обзор галерей.

```html
[[+nav.curIdx:ne=`
<div>
    <ul>
        <li>
            [[+nav.prev:notempty=`<a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+nav.prev]]`]]">Previous Gallery</a>`:else=`<span>Previous Gallery</span>`]]
        </li>
        <li>
            <a href="[[~[[*id]]]]">Overview</a>
        </li>
        <li>
            [[+nav.next:notempty=`<a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+nav.next]]`]]">Next Gallery</a>`:else=`<span>Next Gallery</span>`]]
        </li>
    </ul>
    <div>Gallery [[+nav.curIdx]] of [[+nav.count]]</div>
</div>
`:else=`
<div>
    [[+albums]]
</div>
`]]
```

## Смотрите также

1. [Gallery.Gallery](extras/gallery/gallery/index)
    1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
3. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
   1. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
4. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/containertpl)
5. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
   1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/albumtpl)
   2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/galleryitempagination)
   3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/tagtpl)
6. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/tpl)
7. [Gallery.Plugins](extras/gallery/gallery.plugins)
    1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/galleriffic)
8. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/slimbox)
9. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
10. [Gallery.Example1](extras/gallery/gallery.example1)
11. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
