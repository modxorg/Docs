---
title: "containerTpl"
_old_id: "871"
_old_uri: "revo/gallery/gallery.gallery/gallery.gallery.containertpl"
---

## Gallery's containerTpl Chunk

This chunk is used when &containerTpl is set on the [Gallery](extras/gallery "Gallery") snippet.

It's recommended to actually not use this property, and just wrap your output in your Resource or Chunk; that will allow you more flexibility in the future.

## Default Value

There is no default value for the &containerTpl; if none is specified, the output will not be wrapped with any container.

## Available Placeholders

| Name               | Description                           |
| ------------------ | ------------------------------------- |
| thumbnails         | The generated thumbnails.             |
| album\_name        | The name of the current Album.        |
| album\_description | The description of the current Album. |

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
5. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
6. [Gallery.Example1](extras/gallery/gallery.example1)
7. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
