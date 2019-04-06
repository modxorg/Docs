---
title: "GalleryItem"
_old_id: "875"
_old_uri: "revo/gallery/gallery.galleryitem"
---

## GalleryItem Snippet

 The GalleryItem snippet displays a single Gallery Item.

## Properties

 | Name                 | Description                                                                                                          | Default Value |
 | -------------------- | -------------------------------------------------------------------------------------------------------------------- | ------------- |
 | id                   | The ID of the item to display                                                                                        |               |
 | toPlaceholders       | If true, will set the properties of the Item to placeholders. If false, will use the tpl property to output a chunk. | 1             |
 | toPlaceholdersPrefix | Optional. The prefix to add to placeholders set by this snippet. Only works if toPlaceholders is true.               | galitem       |
 | tpl                  | Name of a chunk to use when toPlaceholders is set to false.                                                          | galItem       |
 | albumTpl             | Name of a chunk to use for each album that is listed for the Item.                                                   | galItemAlbum  |
 | albumSeparator       | A string separator for each album listed for the Item.                                                               | ,             |
 | albumRequestVar      | The REQUEST var to use when linking albums.                                                                          | galAlbum      |
 | tagTpl               | Name of a chunk to use for each tag that is listed for the Item.                                                     | galItemTag    |
 | tagSeparator         | A string separator for each tag listed for the Item.                                                                 | ,&nsbp;       |
 | tagSortDir           | A the direction to sort the tags listed for the Item.                                                                | DESC          |
 | tagRequestVar        | The REQUEST var to use when linking tags.                                                                            | galTag        |
 | thumbWidth           | The max width of the generated thumbnail, in pixels.                                                                 | 100           |
 | thumbHeight          | The max height of the generated thumbnail, in pixels.                                                                | 100           |
 | thumbZoomCrop        | Whether or not to use zoom cropping for the thumbnail.                                                               | 1             |
 | thumbQuality         | The quality of the thumbnail, from 0-100.                                                                            | 90            |
 | thumbFar             | The "far" value for phpThumb for the thumbnail, for aspect ratio zooming.                                            | C             |
 | thumbProperties      | A JSON object of parameters to pass to phpThumb as properties for the thumbnail.                                     |               |
 | imageWidth           | The max width of the generated image.                                                                                | 500           |
 | imageHeight          | The max height of the generated image.                                                                               | 500           |
 | imageZoomCrop        | Whether or not to use zoom cropping for the image.                                                                   | 0             |
 | imageQuality         | The quality of the image, from 0-100.                                                                                | 90            |
 | imageFar             | The "far" value for phpThumb for the generated image, for aspect ratio zooming.                                      | C             |
 | imageProperties      | A JSON object of parameters to pass to phpThumb as properties for the generated image.                               |               |

## Default Placeholders

 When toPlaceholders is set to 1, GalleryItem automatically sets placeholders for the item. They are prefixed by default with 'galitem', but you can change that with the toPlaceholdersPrefix parameter. A list of these placeholders is as follows:

 | Name        | Description                                                                                                                                |
 | ----------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
 | name        | The name of the Item.                                                                                                                      |
 | filename    | The filename of the item. This will be relative to the path where the files are stored, which is usually assets/components/gallery/files/. |
 | description | The description of the item.                                                                                                               |
 | mediatype   | The media type of the Item. Currently this is only 'image'.                                                                                |
 | createdon   | The timestamp that this Item was created on.                                                                                               |
 | createdby   | The User ID of the creator of this Item.                                                                                                   |
 | active      | If this Item is active or not. Can be 1 or 0.                                                                                              |
 | albums      | A list of Albums this Item is in.                                                                                                          |
 | tags        | A list of Tags associated with this Item.                                                                                                  |
 | url         | If set, a URL for this Item.                                                                                                               |

## GalleryItem Chunks

 There are 3 chunks that are processed in GalleryItem. Their corresponding GalleryItem parameters are:

- [tpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tpl "Gallery.GalleryItem.tpl") - The Chunk to use if toPlaceholders is set to 0.
- [albumTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl "Gallery.GalleryItem.albumTpl") - The Chunk to use for each Album listed with the item.
- [tagTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl "Gallery.GalleryItem.tagTpl") - The Chunk to use for each Tag listed with the item.

## Examples

 Display the Item with ID 12, but only if it exists.

 ``` php 
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
```

 Display the Item with ID 23, but use a Chunk called 'Photo' for display.

 ``` php 
[[!GalleryItem? 
  &id=`23` 
  &toPlaceholders=`0` 
  &tpl=`Photo`
]]
```

 Display the Item with ID 432 with a Chunk called 'Photo', but separate the Tags associated with it by a pipe ("|"):

 ``` php 
[[!GalleryItem? 
  &id=`432` 
  &toPlaceholders=`0` 
  &tpl=`Photo` 
  &tagSeparator=` | `
]]
```

## See Also

1. [Gallery.Gallery](extras/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](extras/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
  3. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
  4. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
  5. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
  6. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
  7. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
  8. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](extras/gallery/gallery.plugins)
  9. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/gallery.plugins.galleriffic)
  10. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)