---
title: "containerTpl"
_old_id: "1693"
_old_uri: "revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl"
---

## GalleryAlbums' containerTpl Chunk

This chunk is used for wrapping all albums iterated through by the [GalleryAlbums](extras/gallery/gallery.galleryalbums) snippet (available with 1.6.0 beta).

## Default Value

There is no default value.

## Available Placeholders

| Name            | Description                                                                                                                      |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| albums          | The Album rows.                                                                                                                  |
| nav.first       | The ID of the first Album.                                                                                                       |
| nav.prev        | The ID of the previous Album.                                                                                                    |
| nav.current     | The ID of the current Album.                                                                                                     |
| nav.next        | The ID of the next Album.                                                                                                        |
| nav.last        | The ID of the last Album.                                                                                                        |
| nav.curIdx      | The index of the current Album.                                                                                                  |
| nav.count       | The count of the Album rows.                                                                                                     |
| albumRequestVar | The albumRequestVar parameter passed to the [GalleryAlbums](extras/gallery/gallery.galleryalbums) snippet. Defaults to galAlbum. |

## Example

The following example shows possible placeholders. It displays a previous/next gallery navigation in an album or a gallery overview.

``` html
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

## See Also

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
9. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
10. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
11. [Gallery.Example1](extras/gallery/gallery.example1)
12. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
