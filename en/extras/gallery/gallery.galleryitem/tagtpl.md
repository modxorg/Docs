---
title: "tagTpl"
_old_id: "878"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl"
---

## GalleryItem's tagTpl Chunk

 This chunk is used for each Tag associated with the Item pulled by the [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet, via the &tagTpl property.

## Default Value

 ``` php
<span class="gal-item-tag"><a href="[[~[[*id]]]]?[[+tagRequestVar]]=[[+tag]]">[[+tag]]</a></span>
```

## Available Placeholders

 | Name          | Description                                                                                                                                    |
 | ------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
 | tag           | The Tag value.                                                                                                                                 |
 | item          | The ID of the Item.                                                                                                                            |
 | tagRequestVar | The tagRequestVar parameter passed to the [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet. Defaults to galTag. |

## See Also

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
5. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
