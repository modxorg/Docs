---
title: "Gallery.GalleryAlbums.rowTpl"
_old_id: "874"
_old_uri: "revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl"
---

GalleryAlbums' rowTpl Chunk
---------------------------

This chunk is used for each Album iterated through by the [GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums "Gallery.GalleryAlbums") snippet.

Default Value
-------------

```
<pre class="brush: php">
<li[[+cls:notempty=``]]><a href="[[~[[*id]]? &[[+albumRequestVar]]=`[[+id]]`]]">[[+showName:notempty=`[[+name]]`]]</a></li>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>id</td><td>The ID of the Album.</td></tr><tr><td>name</td><td>The name of the Album.</td></tr><tr><td>parent</td><td>The parent ID of the Album. Defaults to 0.</td></tr><tr><td>description</td><td>The description of the Album.</td></tr><tr><td>createdon</td><td>A timestamp of when the Album was created.</td></tr><tr><td>createdby</td><td>The ID of the User that created this Album.</td></tr><tr><td>rank</td><td>The 'rank', or order, in which this Album is stored as.</td></tr><tr><td>active</td><td>Whether or not this Album is marked "Active". Can be 1 or 0.</td></tr><tr><td>prominent</td><td>Whether or not this Album is marked "Prominent". Can be 1 or 0.</td></tr><tr><td>albumRequestVar</td><td>The albumRequestVar parameter passed to the [GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums "Gallery.GalleryAlbums") snippet. Defaults to galAlbum.</td></tr><tr><td>image   
</td><td>The link to an image as determined by the GalleryAlbums snippet.   
</td></tr></tbody></table>When you use the image placeholder in your template as the source for an image tag, it doesn't seem to obey the thumbnail properties given in the snippet-call. But no worries, you can add them yourself as this image-placeholder is actually a call to phpthumb. So, lets say you want your thumbnail to be 240x160 with zoomcrop, you can do:

```
<pre class="brush: php">
<img src="[[+image]]&w=240&h=160&zc=1" alt="[[+name]]" />

```See Also
--------

1. [Gallery.Gallery](/extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.rowTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
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