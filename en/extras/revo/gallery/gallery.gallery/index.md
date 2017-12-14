---
title: "Gallery.Gallery"
_old_id: "870"
_old_uri: "revo/gallery/gallery.gallery/"
---

Gallery Snippet
---------------

 This snippet displays a "gallery" of images from either an album, a tag, or both.

Properties
----------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> album </td> <td> Will load only items from this album. Can be either the name or ID of the Album. </td> <td> </td> </tr><tr><td> tag </td> <td> Will load only items with this tag. </td> <td> </td> </tr><tr><td> plugin </td> <td> The name of a plugin to use for front-end displaying. See "Plugins" section below. </td> <td> </td> </tr><tr><td> thumbTpl </td> <td> The Chunk to use as a tpl for each thumbnail. </td> <td> galItemThumb </td> </tr><tr><td> containerTpl </td> <td> An optional chunk to wrap the output in. </td> <td> </td> </tr><tr><td> toPlaceholder </td> <td> If set, will set the output to a placeholder of this value, and the snippet call will output nothing. </td> <td> </td> </tr><tr><td> placeholderPrefix </td> <td> If no placeholder is set, will prefix properties of the name/id/description/total of the current Album with this prefix. </td> <td> gallery. </td> </tr><tr><td> thumbWidth </td> <td> The width of the generated thumbnail, in pixels. </td> <td> 100 </td> </tr><tr><td> thumbHeight </td> <td> The height of the generated thumbnail, in pixels. </td> <td> 100 </td> </tr><tr><td> thumbZoomCrop </td> <td> Whether or not to use zoom crop on the thumbnail. </td> <td> 1 </td> </tr><tr><td> thumbFar </td> <td> The aspect ratio for phpThumb with the thumbnail. The image is created at size specified by "w" and "h" (which must both be set). Values are the alignment: L=left,R=right,T=top,B=bottom,C=center. Set to BL,BR,TL,TR to specify for landscape or portrait images. </td> <td> C </td> </tr><tr><td> thumbQuality </td> <td> The quality of the generated thumbnail, from 0-100. </td> <td> 90 </td> </tr><tr><td> thumbProperties </td> <td> A JSON object of parameters to pass to phpThumb as properties for the thumbnail. </td> <td> </td> </tr><tr><td> imageWidth </td> <td> If being used by a plugin, the max width of the currently on-display image. </td> <td> 500 </td> </tr><tr><td> imageHeight </td> <td> If being used by a plugin, the max height of the currently on-display image. </td> <td> 500 </td> </tr><tr><td> imageZoomCrop </td> <td> Whether or not to use zoom crop on the image. </td> <td> </td> </tr><tr><td> imageFar </td> <td> The aspect ratio for phpThumb with the image. </td> <td> </td> </tr><tr><td> imageQuality </td> <td> If being used by a plugin, the quality of the image, from 0-100. </td> <td> 90 </td> </tr><tr><td> imageProperties </td> <td> A JSON object of parameters to pass to phpThumb as properties for the image. </td> <td> </td> </tr><tr><td> sort </td> <td> The field to sort images by. You can use "rand" to make a random sort.   
</td> <td> rank </td> </tr><tr><td> dir </td> <td> The direction to sort images by. </td> <td> ASC </td> </tr><tr><td> limit </td> <td> If set to non-zero, will only show X number of items. </td> <td> 0 </td> </tr><tr><td> start </td> <td> The index to start grabbing from when limiting the number of items. Similar to an SQL order by start clause. </td> <td> 0 </td> </tr><tr><td> showInactive </td> <td> If true, will also display inactive images. </td> <td> false </td> </tr><tr><td> albumRequestVar </td> <td> Can be used to define which REQUEST var to look out for to filter on album, used in conjunction with checkForRequestAlbumVar=`true`. This can be used filtered on a gallery name or ID.   
</td> <td> galAlbum   
</td> </tr><tr><td> checkForRequestAlbumVar </td> <td> If true, if a REQUEST var with the value of the albumRequestVar (defaults to galAlbum) property is found, will use that as the album property for the snippet. </td> <td> false </td> </tr><tr><td> tagRequestVar </td> <td> Can be used to define which REQUEST var to look out for to filter on tag, used on conjunction with checkForRequestTagVar=`true`.   
</td> <td> galTag   
</td> </tr><tr><td> checkForRequestTagVar </td> <td> If true, if a REQUEST var with the value of the tagRequestVar (defaults to galTag) is found is found, will use that as the tag property for the snippet. </td> <td> false </td> </tr><tr><td> useCss </td> <td> If true, will use the CSS provided by the Gallery snippet. Set to '0' to not load any Gallery-provided CSS. </td> <td> 1 (true) </td> </tr><tr><td> itemCls </td> <td> The CSS class to use for each item. </td> <td> gal-item </td> </tr><tr><td> activeCls </td> <td> The CSS class to add if the item is the "active" item. </td> <td> gal-item-active </td> </tr><tr><td> linkToImage </td> <td> Whether or not to link directly to the image for each thumbnail, or to the GalleryItem-customized URL. </td> <td> 0 </td> </tr><tr><td> linkAttributes </td> <td> HTML attributes for the A tag in the item tpl. </td> <td> </td> </tr><tr><td> imageAttributes </td> <td> HTML attributes for the img tag in the item tpl. </td> <td> </td></tr></tbody></table>Gallery Chunks
--------------

 There are 2 chunks that are processed in Gallery. Their corresponding Gallery parameters are:

- [thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl "Gallery.Gallery.thumbTpl") - The Chunk to use for each Item displayed.
- [containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl "Gallery.Gallery.containerTpl") - Optional. If set, will wrap the contents with this chunk.

Plugins
-------

 Gallery allows you to display your galleries either straight as thumbnail images in the front-end, or using jQuery plugins. You can pass a plugin name through the Gallery snippet property &plugin.

- [Slimbox](/extras/revo/gallery/gallery.plugins/gallery.plugins.slimbox "Gallery.Plugins.Slimbox")
- [Galleriffic](/extras/revo/gallery/gallery.plugins/gallery.plugins.galleriffic "Gallery.Plugins.Galleriffic")

 Note that Galleriffic changes the `thumbTpl` property to `gallerifficThumbTpl`, and the `containerTpl` property to `gallerifficContainerTpl`.

Examples
--------

 Display a gallery of photos in the 'My Album' album:

 ```
<pre class="brush: php">
[[!Gallery? &album=`My Album`]]

``` Display a gallery of photos in the 'Trucks' album, but use a custom Chunk called 'truckThumb' for the thumbnails:

 ```
<pre class="brush: php">
[[!Gallery? &album=`Trucks` &thumbTpl=`truckThumb`]]

``` Display a gallery of photos with the tag 'Cool' and use the Galleriffic plugin:

 ```
<pre class="brush: php">
[[!Gallery? &tag=`Cool` &plugin=`Galleriffic`]]

``` Grab only 3 photos from the 'Cars' album, and set it to the "gallery" placeholder.:

 ```
<pre class="brush: php">
[[!Gallery? &limit=`3` &album=`Cars` &toPlaceholder=`gallery`]]
<div class="my-gallery">
[[+gallery]]
</div>

``` Using &thumbProperties to set the output of the thumbnails to 90% quality jpg instead of png:

 ```
<pre class="brush: php">
[[!Gallery? &album=`My Album` &thumbProperties=`{"f":"jpg","q":"90%"}`]]

```See Also
--------

1. [Gallery.Gallery](/extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.rowTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
  2. [Gallery.GalleryAlbums.containerTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
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