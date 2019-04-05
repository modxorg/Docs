---
title: "tpl"
_old_id: "879"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.tpl"
---

## GalleryItem's tpl Chunk

 This chunk is used when &toPlaceholders is set to 0 on the [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet.

## Default Value

 ``` php 

<a href="[[+url:is=``:then=`[[+image]]`:else=`[[+url]]`]]">
    <img src="[[+thumbnail]]" alt="[[+name]]" />
</a>

```

## Available Placeholders

 | Name | Description |
|------|-------------|
| name | The name of the Item. |
| filename | The filename of the item. This will be relative to the path where the files are stored, which is usually assets/components/gallery/files/. |
| description | The description of the item. |
| mediatype | The media type of the Item. Currently this is only 'image'. |
| createdon | The timestamp that this Item was created on. |
| createdby | The User ID of the creator of this Item. |
| active | If this Item is active or not. Can be 1 or 0. |
| albums | A list of Albums this Item is in. |
| tags | A list of Tags associated with this Item. |

## See Also

1. [Gallery.Gallery](/extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.containerTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
  2. [Gallery.GalleryAlbums.rowTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
3. [Gallery.GalleryItem](/extras/revo/gallery/gallery.galleryitem)
  1. [Gallery.GalleryItem.albumTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
  2. [Gallery.GalleryItem.GalleryItemPagination](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
  3. [Gallery.GalleryItem.tagTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
  4. [Gallery.GalleryItem.tpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](/extras/revo/gallery/gallery.plugins)
  1. [Gallery.Plugins.Galleriffic](/extras/revo/gallery/gallery.plugins/gallery.plugins.galleriffic)
  2. [Gallery.Plugins.Slimbox](/extras/revo/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](/extras/revo/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](/extras/revo/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](/extras/revo/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](/extras/revo/gallery/gallery.setting-up-the-galleryitem-tv)