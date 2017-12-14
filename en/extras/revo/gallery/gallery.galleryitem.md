---
title: "Gallery.GalleryItem"
_old_id: "875"
_old_uri: "revo/gallery/gallery.galleryitem"
---

<div>- [GalleryItem Snippet](#Gallery.GalleryItem-GalleryItemSnippet)
- [Properties](#Gallery.GalleryItem-Properties)
- [Default Placeholders](#Gallery.GalleryItem-DefaultPlaceholders)
- [GalleryItem Chunks](#Gallery.GalleryItem-GalleryItemChunks)
- [Examples](#Gallery.GalleryItem-Examples)
- [See Also](#Gallery.GalleryItem-SeeAlso)
 
</div>GalleryItem Snippet
-------------------

 The GalleryItem snippet displays a single Gallery Item.

Properties
----------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> id </td> <td> The ID of the item to display </td> <td> </td> </tr><tr><td> toPlaceholders </td> <td> If true, will set the properties of the Item to placeholders. If false, will use the tpl property to output a chunk. </td> <td> 1 </td> </tr><tr><td> toPlaceholdersPrefix </td> <td> Optional. The prefix to add to placeholders set by this snippet. Only works if toPlaceholders is true. </td> <td> galitem </td> </tr><tr><td> tpl </td> <td> Name of a chunk to use when toPlaceholders is set to false. </td> <td> galItem </td> </tr><tr><td> albumTpl </td> <td> Name of a chunk to use for each album that is listed for the Item. </td> <td> galItemAlbum </td> </tr><tr><td> albumSeparator </td> <td> A string separator for each album listed for the Item. </td> <td> , </td> </tr><tr><td> albumRequestVar </td> <td> The REQUEST var to use when linking albums. </td> <td> galAlbum </td> </tr><tr><td> tagTpl </td> <td> Name of a chunk to use for each tag that is listed for the Item. </td> <td> galItemTag </td> </tr><tr><td> tagSeparator </td> <td> A string separator for each tag listed for the Item. </td> <td> ,&nsbp; </td> </tr><tr><td> tagSortDir </td> <td> A the direction to sort the tags listed for the Item. </td> <td> DESC </td> </tr><tr><td> tagRequestVar </td> <td> The REQUEST var to use when linking tags. </td> <td> galTag </td> </tr><tr><td> thumbWidth </td> <td> The max width of the generated thumbnail, in pixels. </td> <td> 100 </td> </tr><tr><td> thumbHeight </td> <td> The max height of the generated thumbnail, in pixels. </td> <td> 100 </td> </tr><tr><td> thumbZoomCrop </td> <td> Whether or not to use zoom cropping for the thumbnail. </td> <td> 1   
</td> </tr><tr><td> thumbQuality </td> <td> The quality of the thumbnail, from 0-100. </td> <td> 90 </td> </tr><tr><td> thumbFar </td> <td> The "far" value for phpThumb for the thumbnail, for aspect ratio zooming. </td> <td> C </td> </tr><tr><td> thumbProperties </td> <td> A JSON object of parameters to pass to phpThumb as properties for the thumbnail. </td> <td> </td> </tr><tr><td> imageWidth </td> <td> The max width of the generated image. </td> <td> 500 </td> </tr><tr><td> imageHeight </td> <td> The max height of the generated image. </td> <td> 500 </td> </tr><tr><td> imageZoomCrop </td> <td> Whether or not to use zoom cropping for the image. </td> <td> 0 </td> </tr><tr><td> imageQuality </td> <td> The quality of the image, from 0-100. </td> <td> 90 </td> </tr><tr><td> imageFar </td> <td> The "far" value for phpThumb for the generated image, for aspect ratio zooming. </td> <td> C </td> </tr><tr><td> imageProperties </td> <td> A JSON object of parameters to pass to phpThumb as properties for the generated image. </td> <td> </td></tr></tbody></table>Default Placeholders
--------------------

 When toPlaceholders is set to 1, GalleryItem automatically sets placeholders for the item. They are prefixed by default with 'galitem', but you can change that with the toPlaceholdersPrefix parameter. A list of these placeholders is as follows:

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> name </td> <td> The name of the Item. </td> </tr><tr><td> filename </td> <td> The filename of the item. This will be relative to the path where the files are stored, which is usually assets/components/gallery/files/. </td> </tr><tr><td> description </td> <td> The description of the item. </td> </tr><tr><td> mediatype </td> <td> The media type of the Item. Currently this is only 'image'. </td> </tr><tr><td> createdon </td> <td> The timestamp that this Item was created on. </td> </tr><tr><td> createdby </td> <td> The User ID of the creator of this Item. </td> </tr><tr><td> active </td> <td> If this Item is active or not. Can be 1 or 0. </td> </tr><tr><td> albums </td> <td> A list of Albums this Item is in. </td> </tr><tr><td> tags </td> <td> A list of Tags associated with this Item. </td> </tr><tr><td> url </td> <td> If set, a URL for this Item. </td></tr></tbody></table>GalleryItem Chunks
------------------

 There are 3 chunks that are processed in GalleryItem. Their corresponding GalleryItem parameters are:

- [tpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tpl "Gallery.GalleryItem.tpl") - The Chunk to use if toPlaceholders is set to 0.
- [albumTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl "Gallery.GalleryItem.albumTpl") - The Chunk to use for each Album listed with the item.
- [tagTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl "Gallery.GalleryItem.tagTpl") - The Chunk to use for each Tag listed with the item.

Examples
--------

 Display the Item with ID 12, but only if it exists.

 ```
<pre class="brush: php">
[[!GalleryItem? &id=`12`]]
[[!+galitem.image:notempty=`
<div class="image">
  <a href="[[+galitem.image]]">
    <img src="[[+galitem.image]]" alt="[[+galitem.name]]" />
  </a>
  <br />Albums: [[+galitem.albums]]
  <br />Tags: [[+galitem.tags]]
</div>
`]]

``` Display the Item with ID 23, but use a Chunk called 'Photo' for display.

 ```
<pre class="brush: php">
[[!GalleryItem? &id=`23` &toPlaceholders=`0` &tpl=`Photo`]]

``` Display the Item with ID 432 with a Chunk called 'Photo', but separate the Tags associated with it by a pipe ("|"):

 ```
<pre class="brush: php">
[[!GalleryItem? &id=`432` &toPlaceholders=`0` &tpl=`Photo` &tagSeparator=` | `]]

```See Also
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