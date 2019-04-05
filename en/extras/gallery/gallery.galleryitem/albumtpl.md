---
title: "albumTpl"
_old_id: "876"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl"
---

## GalleryItem's albumTpl Chunk

 This chunk is used for each Album associated with the Item pulled by the [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet, via the &albumTpl property.

## Default Value

 ``` html 
<span class="gal-item-album"><a href="[[~[[*id]]]]?[[+albumRequestVar]]=[[+id]]">[[+name]]</a></span>
```

## Available Placeholders

 | Name            | Description                                                                                                                                              |
 | --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
 | id              | The ID of the Album.                                                                                                                                     |
 | name            | The name of the Album.                                                                                                                                   |
 | parent          | The parent ID of the Album. Defaults to 0.                                                                                                               |
 | description     | The description of the Album.                                                                                                                            |
 | createdon       | A timestamp of when the Album was created.                                                                                                               |
 | createdby       | The ID of the User that created this Album.                                                                                                              |
 | rank            | The 'rank', or order, in which this Album is stored as.                                                                                                  |
 | active          | Whether or not this Album is marked "Active". Can be 1 or 0.                                                                                             |
 | prominent       | Whether or not this Album is marked "Prominent". Can be 1 or 0.                                                                                          |
 | albumRequestVar | The albumRequestVar parameter passed to the [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet. Defaults to galAlbum. |

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