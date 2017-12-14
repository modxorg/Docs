---
title: "Gallery.Gallery.thumbTpl"
_old_id: "872"
_old_uri: "revo/gallery/gallery.gallery/gallery.gallery.thumbtpl"
---

Gallery's thumbTpl Chunk
------------------------

 This is the Chunk displayed with the &thumbTpl property on the [Gallery](/extras/revo/gallery "Gallery") snippet.

Default Value
-------------

 ```
<pre class="brush: php">
<div class="[[+cls]]">
    <a href="[[+linkToImage:if=`[[+linkToImage]]`:is=`1`:then=`[[+image_absolute]]`:else=`[[~[[*id]]?
            &[[+imageGetParam]]=`[[+id]]`
            &[[+albumRequestVar]]=`[[+album]]`
            &[[+tagRequestVar]]=`[[+tag]]` ]]`]]">
        <img class="[[+imgCls]]" src="[[+thumbnail]]" alt="[[+name]]" />
    </a>
</div>

```Available Placeholders
----------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> name </td> <td> The name of the Item. </td> </tr><tr><td> filename </td> <td> The base filename of the Item. </td> </tr><tr><td> filesize </td> <td> The size of the file for the Item. </td> </tr><tr><td> thumbnail </td> <td> A URL to the generated thumbnail image for this Item. </td> </tr><tr><td> image </td> <td> A URL to the generated image for this item. </td> </tr><tr><td> image\_absolute   
</td> <td> The actual image URL (instead of the thumbnail/image placeholders which have been run through phpthumb based on snippet properties).   
</td> </tr><tr><td> description </td> <td> The description of the item. </td> </tr><tr><td> mediatype </td> <td> The media type of the Item. Currently this is only 'image'. </td> </tr><tr><td> createdon </td> <td> The timestamp that this Item was created on. </td> </tr><tr><td> createdby </td> <td> The User ID of the creator of this Item. </td> </tr><tr><td> active </td> <td> If this Item is active or not. Can be 1 or 0. </td> </tr><tr><td> tags </td> <td> A list of Tags associated with this Item. </td> </tr><tr><td> cls </td> <td> The value of the &itemCls property on the Gallery Snippet. Defaults to 'gal-item'. </td> </tr><tr><td> linkToImage </td> <td> In the default content, if true, will link directly to the Image rather than appending the imageGetParam placeholder to a request param. Defaults to 1. </td> </tr><tr><td> imageGetParam </td> <td> The GET param to use when adding a GET param to link with the GalleryItem snippet. Defaults to 'galItem'. </td> </tr><tr><td> albumRequestVar </td> <td> The GET param to use to add when linking with the GalleryItem snippet. Clicking the image will stay on the selected Album with this Snippet. </td> </tr><tr><td> album </td> <td> The currently displayed Album. </td></tr></tbody></table>See Also
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