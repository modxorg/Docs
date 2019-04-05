---
title: "Gallery"
_old_id: "870"
_old_uri: "revo/gallery/gallery.gallery/"
---

## Gallery Snippet

 This snippet displays a "gallery" of images from either an album, a tag, or both.

## Properties

 | Name                    | Description                                                                                                                                                                                                                                                         | Default Value   |
 | ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------- |
 | album                   | Will load only items from this album. Can be either the name or ID of the Album.                                                                                                                                                                                    |                 |
 | tag                     | Will load only items with this tag.                                                                                                                                                                                                                                 |                 |
 | plugin                  | The name of a plugin to use for front-end displaying. See "Plugins" section below.                                                                                                                                                                                  |                 |
 | thumbTpl                | The Chunk to use as a tpl for each thumbnail.                                                                                                                                                                                                                       | galItemThumb    |
 | containerTpl            | An optional chunk to wrap the output in.                                                                                                                                                                                                                            |                 |
 | toPlaceholder           | If set, will set the output to a placeholder of this value, and the snippet call will output nothing.                                                                                                                                                               |                 |
 | placeholderPrefix       | If no placeholder is set, will prefix properties of the name/id/description/total of the current Album with this prefix.                                                                                                                                            | gallery.        |
 | thumbWidth              | The width of the generated thumbnail, in pixels.                                                                                                                                                                                                                    | 100             |
 | thumbHeight             | The height of the generated thumbnail, in pixels.                                                                                                                                                                                                                   | 100             |
 | thumbZoomCrop           | Whether or not to use zoom crop on the thumbnail.                                                                                                                                                                                                                   | 1               |
 | thumbFar                | The aspect ratio for phpThumb with the thumbnail. The image is created at size specified by "w" and "h" (which must both be set). Values are the alignment: L=left,R=right,T=top,B=bottom,C=center. Set to BL,BR,TL,TR to specify for landscape or portrait images. | C               |
 | thumbQuality            | The quality of the generated thumbnail, from 0-100.                                                                                                                                                                                                                 | 90              |
 | thumbProperties         | A JSON object of parameters to pass to phpThumb as properties for the thumbnail.                                                                                                                                                                                    |                 |
 | imageWidth              | If being used by a plugin, the max width of the currently on-display image.                                                                                                                                                                                         | 500             |
 | imageHeight             | If being used by a plugin, the max height of the currently on-display image.                                                                                                                                                                                        | 500             |
 | imageZoomCrop           | Whether or not to use zoom crop on the image.                                                                                                                                                                                                                       |                 |
 | imageFar                | The aspect ratio for phpThumb with the image.                                                                                                                                                                                                                       |                 |
 | imageQuality            | If being used by a plugin, the quality of the image, from 0-100.                                                                                                                                                                                                    | 90              |
 | imageProperties         | A JSON object of parameters to pass to phpThumb as properties for the image.                                                                                                                                                                                        |                 |
 | sort                    | The field to sort images by. You can use "rand" to make a random sort.                                                                                                                                                                                              | rank            |
 | dir                     | The direction to sort images by.                                                                                                                                                                                                                                    | ASC             |
 | limit                   | If set to non-zero, will only show X number of items.                                                                                                                                                                                                               | 0               |
 | start                   | The index to start grabbing from when limiting the number of items. Similar to an SQL order by start clause.                                                                                                                                                        | 0               |
 | showInactive            | If true, will also display inactive images.                                                                                                                                                                                                                         | false           |
 | albumRequestVar         | Can be used to define which REQUEST var to look out for to filter on album, used in conjunction with checkForRequestAlbumVar=`true`. This can be used filtered on a gallery name or ID.                                                                             | galAlbum        |
 | checkForRequestAlbumVar | If true, if a REQUEST var with the value of the albumRequestVar (defaults to galAlbum) property is found, will use that as the album property for the snippet.                                                                                                      | false           |
 | tagRequestVar           | Can be used to define which REQUEST var to look out for to filter on tag, used on conjunction with checkForRequestTagVar=`true`.                                                                                                                                    | galTag          |
 | checkForRequestTagVar   | If true, if a REQUEST var with the value of the tagRequestVar (defaults to galTag) is found is found, will use that as the tag property for the snippet.                                                                                                            | false           |
 | useCss                  | If true, will use the CSS provided by the Gallery snippet. Set to '0' to not load any Gallery-provided CSS.                                                                                                                                                         | 1 (true)        |
 | itemCls                 | The CSS class to use for each item.                                                                                                                                                                                                                                 | gal-item        |
 | activeCls               | The CSS class to add if the item is the "active" item.                                                                                                                                                                                                              | gal-item-active |
 | linkToImage             | Whether or not to link directly to the image for each thumbnail, or to the GalleryItem-customized URL.                                                                                                                                                              | 0               |
 | linkAttributes          | HTML attributes for the A tag in the item tpl.                                                                                                                                                                                                                      |                 |
 | imageAttributes         | HTML attributes for the img tag in the item tpl.                                                                                                                                                                                                                    |                 |

## Gallery Chunks

 There are 2 chunks that are processed in Gallery. Their corresponding Gallery parameters are:

- [thumbTpl](/extras/gallery/gallery.gallery/gallery.gallery.thumbtpl "Gallery.Gallery.thumbTpl") - The Chunk to use for each Item displayed.
- [containerTpl](/extras/gallery/gallery.gallery/gallery.gallery.containertpl "Gallery.Gallery.containerTpl") - Optional. If set, will wrap the contents with this chunk.

## Plugins

 Gallery allows you to display your galleries either straight as thumbnail images in the front-end, or using jQuery plugins. You can pass a plugin name through the Gallery snippet property &plugin.

- [Slimbox](/extras/gallery/gallery.plugins/gallery.plugins.slimbox "Gallery.Plugins.Slimbox")
- [Galleriffic](/extras/gallery/gallery.plugins/gallery.plugins.galleriffic "Gallery.Plugins.Galleriffic")

 Note that Galleriffic changes the `thumbTpl` property to `gallerifficThumbTpl`, and the `containerTpl` property to `gallerifficContainerTpl`.

## Examples

 Display a gallery of photos in the 'My Album' album:

 ``` php 
[[!Gallery? 
  &album=`My Album`
]]
```

 Display a gallery of photos in the 'Trucks' album, but use a custom Chunk called 'truckThumb' for the thumbnails:

 ``` php 
[[!Gallery? 
  &album=`Trucks` 
  &thumbTpl=`truckThumb`
]]
```

 Display a gallery of photos with the tag 'Cool' and use the Galleriffic plugin:

 ``` php 
[[!Gallery? 
  &tag=`Cool` 
  &plugin=`Galleriffic`
]]
```

 Grab only 3 photos from the 'Cars' album, and set it to the "gallery" placeholder.:

 ``` php
[[!Gallery? 
  &limit=`3` 
  &album=`Cars` 
  &toPlaceholder=`gallery`
]]
<div class="my-gallery">
[[+gallery]]
</div>
```

 Using &thumbProperties to set the output of the thumbnails to 90% quality jpg instead of png:

 ``` php
[[!Gallery? 
  &album=`My Album` 
  &thumbProperties=`{"f":"jpg","q":"90%"}`
]]
```

## See Also

1. [Gallery.Gallery](/extras/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.rowTpl](/extras/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
  2. [Gallery.GalleryAlbums.containerTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
3. [Gallery.GalleryItem](/extras/gallery/gallery.galleryitem)
  1. [Gallery.GalleryItem.albumTpl](/extras/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
  2. [Gallery.GalleryItem.GalleryItemPagination](/extras/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
  3. [Gallery.GalleryItem.tagTpl](/extras/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
  4. [Gallery.GalleryItem.tpl](/extras/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](/extras/gallery/gallery.plugins)
  1. [Gallery.Plugins.Galleriffic](/extras/gallery/gallery.plugins/gallery.plugins.galleriffic)
  2. [Gallery.Plugins.Slimbox](/extras/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](/extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](/extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](/extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](/extras/gallery/gallery.setting-up-the-galleryitem-tv)