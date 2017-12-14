---
title: "Gallery.GalleryAlbums"
_old_id: "873"
_old_uri: "revo/gallery/gallery.galleryalbums/"
---

GalleryAlbums Snippet
---------------------

 This snippet displays a list of Albums. It by default only grabs "prominent" albums.

 You can display a thumbnail for each album of an image in the album by setting the "rowTpl" property to "galAlbumRowWithCoverTpl", or using \[\[+image\]\] in your custom rowTpl.

Properties
----------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> rowTpl </td> <td> The Chunk to use for each album row. </td> <td> galAlbumRowTpl </td> </tr><tr><td> containerTpl </td> <td> The Chunk to use for wrapping all album rows (available with 1.6.0 beta). </td> <td> </td> </tr><tr><td> sort </td> <td> The field to sort the results by. </td> <td> createdon </td> </tr><tr><td> dir </td> <td> The direction to sort the results by. </td> <td> DESC </td> </tr><tr><td> limit </td> <td> If set to non-zero, will limit the number of results returned. </td> <td> 10 </td> </tr><tr><td> start </td> <td> The index to start from in the results. </td> <td> 0 </td> </tr><tr><td> toPlaceholder </td> <td> If not empty, will set the output to a placeholder with this value. </td> <td> </td> </tr><tr><td> showInactive </td> <td> If 1, will show inactive galleries as well. </td> <td> 0 </td> </tr><tr><td> showAll </td> <td> If 1, will show all albums regardless of their parent. </td> <td> 1 </td> </tr><tr><td> showName </td> <td> If 0, will hide name of Album. </td> <td> 1 </td> </tr><tr><td> parent </td> <td> Grab only the albums with a parent album with this ID. Remember to set showAll to 0, otherwise it won't work! </td> <td> 0 </td> </tr><tr><td> prominentOnly </td> <td> If 1, will only display albums marked with a "prominent" status. </td> <td> 1 </td> </tr><tr><td> albumCoverSort </td> <td> The field which to use when sorting to get the Album Cover. To get the first image, use "rank". To get a random image, use "random". </td> <td> rank </td> </tr><tr><td> albumCoverSortDir </td> <td> The direction to use when sorting to get the Album Cover. Accepts "ASC" or "DESC". </td> <td> ASC </td> </tr><tr><td> thumbWidth </td> <td> The width for the cover album thumbnail. </td> <td> 100 </td> </tr><tr><td> thumbHeight </td> <td> The width for the cover album thumbnail. </td> <td> 100 </td> </tr><tr><td> thumbZoomCrop </td> <td> Whether or not to use zoom crop on the cover album thumbnail. </td> <td> 1 </td> </tr><tr><td> thumbFar </td> <td> The aspect ratio for phpThumb with the cover album thumbnail. </td> <td> C </td> </tr><tr><td> thumbQuality </td> <td> If quality of the cover album thumbnail, from 0-100. </td> <td> 90 </td> </tr><tr><td> thumbProperties </td> <td> A JSON object of parameters to pass to phpThumb as properties for the album thumbnail. </td> <td> </td> </tr><tr><td> albumRequestVar </td> <td> If checkForRequestAlbumVar is set to true on the Gallery snippet, will look for a REQUEST var with this name to select the album. </td> <td> </td> </tr><tr><td> totalVar </td> <td> Define the key of a placeholder set by GalleryAlbums indicating the total number of Albums that would be selected not considering the limit value (available with 1.6.0 beta). </td> <td> total </td></tr></tbody></table>GalleryAlbums Chunks
--------------------

 The following chunks are processed in GalleryAlbums. The corresponding GalleryAlbums parameter are:

- [rowTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl "Gallery.GalleryAlbums.rowTpl") - The Chunk to use for each album displayed.
- [containerTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl) - The Chunk to use for wrapping all album rows (available with 1.6.0 beta).

Examples
--------

 Grab a list first 10 active, prominent albums.

 ```
<pre class="brush: php">[[!GalleryAlbums]]

``` Grab 10 alphanumerically sorted prominent albums:

 ```
<pre class="brush: php">[[!GalleryAlbums? &sort=`name` &dir=`ASC`]]

``` Grab most recent 3 Albums, whether prominent or not, and set to the placeholder 'albums':

 ```
<pre class="brush: php">[[!GalleryAlbums? &limit=`3` &prominentOnly=`0` &toPlaceholder=`albums`]]

``` Display the most recent 3 albums with a random cover image.

 ```
<pre class="brush: php">[[!GalleryAlbums? &limit=`3` &albumCoverSort=`random`]]

``` Using &thumbProperties to set the output of the album cover thumbnail to 90% quality jpg instead of png:

 ```
<pre class="brush: php">[[!GalleryAlbums? &thumbProperties=`{"f":"jpg","q":"90%"}`]]

```See Also
--------

1. [Gallery.Gallery](/extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.containerTpl](extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
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