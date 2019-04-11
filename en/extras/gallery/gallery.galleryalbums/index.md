---
title: "GalleryAlbums"
_old_id: "873"
_old_uri: "revo/gallery/gallery.galleryalbums/"
---

## GalleryAlbums Snippet

 This snippet displays a list of Albums. It by default only grabs "prominent" albums.

 You can display a thumbnail for each album of an image in the album by setting the "rowTpl" property to "galAlbumRowWithCoverTpl", or using \[\[+image\]\] in your custom rowTpl.

## Properties

 | Name              | Description                                                                                                                                                                    | Default Value  |
 | ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | -------------- |
 | rowTpl            | The Chunk to use for each album row.                                                                                                                                           | galAlbumRowTpl |
 | containerTpl      | The Chunk to use for wrapping all album rows (available with 1.6.0 beta).                                                                                                      |                |
 | sort              | The field to sort the results by.                                                                                                                                              | createdon      |
 | dir               | The direction to sort the results by.                                                                                                                                          | DESC           |
 | limit             | If set to non-zero, will limit the number of results returned.                                                                                                                 | 10             |
 | start             | The index to start from in the results.                                                                                                                                        | 0              |
 | toPlaceholder     | If not empty, will set the output to a placeholder with this value.                                                                                                            |                |
 | showInactive      | If 1, will show inactive galleries as well.                                                                                                                                    | 0              |
 | showAll           | If 1, will show all albums regardless of their parent.                                                                                                                         | 1              |
 | showName          | If 0, will hide name of Album.                                                                                                                                                 | 1              |
 | parent            | Grab only the albums with a parent album with this ID. Remember to set showAll to 0, otherwise it won't work!                                                                  | 0              |
 | prominentOnly     | If 1, will only display albums marked with a "prominent" status.                                                                                                               | 1              |
 | albumCoverSort    | The field which to use when sorting to get the Album Cover. To get the first image, use "rank". To get a random image, use "random".                                           | rank           |
 | albumCoverSortDir | The direction to use when sorting to get the Album Cover. Accepts "ASC" or "DESC".                                                                                             | ASC            |
 | thumbWidth        | The width for the cover album thumbnail.                                                                                                                                       | 100            |
 | thumbHeight       | The width for the cover album thumbnail.                                                                                                                                       | 100            |
 | thumbZoomCrop     | Whether or not to use zoom crop on the cover album thumbnail.                                                                                                                  | 1              |
 | thumbFar          | The aspect ratio for phpThumb with the cover album thumbnail.                                                                                                                  | C              |
 | thumbQuality      | If quality of the cover album thumbnail, from 0-100.                                                                                                                           | 90             |
 | thumbProperties   | A JSON object of parameters to pass to phpThumb as properties for the album thumbnail.                                                                                         |                |
 | albumRequestVar   | If checkForRequestAlbumVar is set to true on the Gallery snippet, will look for a REQUEST var with this name to select the album.                                              |                |
 | totalVar          | Define the key of a placeholder set by GalleryAlbums indicating the total number of Albums that would be selected not considering the limit value (available with 1.6.0 beta). | total          |

## GalleryAlbums Chunks

 The following chunks are processed in GalleryAlbums. The corresponding GalleryAlbums parameter are:

- [rowTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl "Gallery.GalleryAlbums.rowTpl") - The Chunk to use for each album displayed.
- [containerTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl) - The Chunk to use for wrapping all album rows (available with 1.6.0 beta).

## Examples

 Grab a list first 10 active, prominent albums.

 ``` php
[[!GalleryAlbums]]
```

 Grab 10 alphanumerically sorted prominent albums:

 ``` php
[[!GalleryAlbums?
  &sort=`name`
  &dir=`ASC`
]]
```

 Grab most recent 3 Albums, whether prominent or not, and set to the placeholder 'albums':

 ``` php
[[!GalleryAlbums?
  &limit=`3`
  &prominentOnly=`0`
  &toPlaceholder=`albums`
]]
```

 Display the most recent 3 albums with a random cover image.

 ``` php
[[!GalleryAlbums?
  &limit=`3`
  &albumCoverSort=`random`
]]
```

 Using &thumbProperties to set the output of the album cover thumbnail to 90% quality jpg instead of png:

 ``` php
[[!GalleryAlbums?
  &thumbProperties=`{"f":"jpg","q":"90%"}`
]]
```

## See Also

1. [Gallery.Gallery](extras/gallery/gallery.gallery)
     1. [Gallery.Gallery.containerTpl](extras/gallery/gallery.gallery/gallery.gallery.containertpl)
     2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
     1. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
     2. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
     1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
     2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
     3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
     4. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](extras/gallery/gallery.plugins)
     1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/gallery.plugins.galleriffic)
     2. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
