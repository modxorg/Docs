---
title: "Gallery.GalleryAlbums.containerTpl"
_old_id: "1693"
_old_uri: "revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl"
---

GalleryAlbums' containerTpl Chunk
---------------------------------

 This chunk is used for wrapping all albums iterated through by the [GalleryAlbums](extras/revo/gallery/gallery.galleryalbums) snippet (available with 1.6.0 beta).

Default Value
-------------

 There is no default value.

Available Placeholders
----------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> albums </td> <td> The Album rows. </td> </tr><tr><td> nav.first </td> <td> The ID of the first Album. </td> </tr><tr><td> nav.prev </td> <td> The ID of the previous Album. </td> </tr><tr><td> nav.current </td> <td> The ID of the current Album. </td> </tr><tr><td> nav.next </td> <td> The ID of the next Album. </td> </tr><tr><td> nav.last </td> <td> The ID of the last Album. </td> </tr><tr><td> nav.curIdx </td> <td> The index of the current Album. </td> </tr><tr><td> nav.count </td> <td> The count of the Album rows. </td> </tr><tr><td> albumRequestVar </td> <td> The albumRequestVar parameter passed to the [GalleryAlbums](extras/revo/gallery/gallery.galleryalbums) snippet. Defaults to galAlbum. </td></tr></tbody></table> Example 
---------

 The following example shows possible placeholders. It displays a previous/next gallery navigation in an album or a gallery overview.

 ```
<pre class="brush: php">[[+nav.curIdx:ne=`<div>
<ul>
<li>
[[+nav.prev:notempty=`<a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+nav.prev]]`]]">Previous Gallery</a>`
:else=`<span>Previous Gallery</span>`]]
</li>
<li>
<a href="[[~[[*id]]]]">Overview</a>
</li>
<li>
[[+nav.next:notempty=`<a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+nav.next]]`]]">Next Gallery</a>`:else=`<span>Next Gallery</span>`]]
</li>
</ul>
<div>Gallery [[+nav.curIdx]] of [[+nav.count]]</div>
`:else=`<div>
[[+albums]]
</div>`]]

```See Also
--------

1. [Gallery.Gallery](extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.rowTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
  2. [Gallery.GalleryAlbums.containerTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
3. [Gallery.GalleryItem](extras/revo/gallery/gallery.galleryitem)
  1. [Gallery.GalleryItem.albumTpl](extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
  2. [Gallery.GalleryItem.GalleryItemPagination](extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
  3. [Gallery.GalleryItem.tagTpl](extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
  4. [Gallery.GalleryItem.tpl](extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](extras/revo/gallery/gallery.plugins)
  1. [Gallery.Plugins.Galleriffic](extras/revo/gallery/gallery.plugins/gallery.plugins.galleriffic)
  2. [Gallery.Plugins.Slimbox](extras/revo/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](extras/revo/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/revo/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/revo/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/revo/gallery/gallery.setting-up-the-galleryitem-tv)