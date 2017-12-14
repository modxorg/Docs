---
title: "Gallery.GalleryItem.albumTpl"
_old_id: "876"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl"
---

GalleryItem's albumTpl Chunk
----------------------------

 This chunk is used for each Album associated with the Item pulled by the [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet, via the &albumTpl property.

Default Value
-------------

 ```
<pre class="brush: php">
<span class="gal-item-album"><a href="[[~[[*id]]]]?[[+albumRequestVar]]=[[+id]]">[[+name]]</a></span>

```Available Placeholders
----------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> id </td> <td> The ID of the Album. </td> </tr><tr><td> name </td> <td> The name of the Album. </td> </tr><tr><td> parent </td> <td> The parent ID of the Album. Defaults to 0. </td> </tr><tr><td> description </td> <td> The description of the Album. </td> </tr><tr><td> createdon </td> <td> A timestamp of when the Album was created. </td> </tr><tr><td> createdby </td> <td> The ID of the User that created this Album. </td> </tr><tr><td> rank </td> <td> The 'rank', or order, in which this Album is stored as. </td> </tr><tr><td> active </td> <td> Whether or not this Album is marked "Active". Can be 1 or 0. </td> </tr><tr><td> prominent </td> <td> Whether or not this Album is marked "Prominent". Can be 1 or 0. </td> </tr><tr><td> albumRequestVar </td> <td> The albumRequestVar parameter passed to the [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem") snippet. Defaults to galAlbum. </td></tr></tbody></table>See Also
--------

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