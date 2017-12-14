---
title: "Gallery.Plugins.Galleriffic"
_old_id: "881"
_old_uri: "revo/gallery/gallery.plugins/gallery.plugins.galleriffic"
---

Gallerriffic Plugin for Gallery
-------------------------------

 The Gallerriffic Plugin allows you to quickly output a Gallery and display its images. It requires you to have jQuery already loaded in the page for it to work.

Usage
-----

 Simply add this parameter to the Gallery snippet:

 ```
<pre class="brush: php">
[[!Gallery? &plugin=`galleriffic`]]

```Available Properties
--------------------

 Galleriffic will override the following properties in the [Gallery](/extras/revo/gallery "Gallery") snippet. If you want to override them, simply pass the galleriffic-prefixed property instead.

 <table><tbody><tr><th> Name </th> <th> Overrides </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> gallerifficThumbTpl </td> <td> thumbTpl </td> <td> The thumb Chunk to use for each Item. </td> <td> GallerifficItemThumb </td> </tr><tr><td> gallerifficContainerTpl </td> <td> containerTpl </td> <td> The container Chunk to wrap content with. </td> <td> Galleriffic </td> </tr><tr><td> gallerifficThumbWidth </td> <td> thumbWidth </td> <td> The width of the thumbnails. </td> <td> 75 </td> </tr><tr><td> gallerifficThumbHeight </td> <td> thumbHeight </td> <td> The height of the thumbnails. </td> <td> 75 </td></tr></tbody></table> Galleriffic also comes with a few of its own, custom properties. You can pass these into the [Gallery](/extras/revo/gallery "Gallery") snippet to override their defaults.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> numThumbs </td> <td> The number of thumbnails to show per page. </td> <td> 15 </td> </tr><tr><td> navigationWidth </td> <td> The width, in pixels, of the navigation. </td> <td> 300px </td> </tr><tr><td> enableTopPager </td> <td> Whether or not to show the top pagination. </td> <td> 1 </td> </tr><tr><td> enableBottomPager </td> <td> Whether or not to show the bottom pagination. </td> <td> 1 </td> </tr><tr><td> maxPagesToShow </td> <td> Maximum number of pages to show. </td> <td> 7 </td> </tr><tr><td> renderSSControls </td> <td> Whether or not to render the slideshow controls. </td> <td> 1 </td> </tr><tr><td> renderNavControls </td> <td> Whether or not to render the navigation controls. </td> <td> 1 </td> </tr><tr><td> enableHistory </td> <td> Whether or not to enable history. </td> <td> 0 </td> </tr><tr><td> autoStart </td> <td> Whether or not to automatically start the slideshow. </td> <td> 0 </td> </tr><tr><td> defaultTransitionDuration </td> <td> The duration, in milliseconds, of transitions. </td> <td> 500 </td> </tr><tr><td> thumbsContainerSel </td> <td> The CSS selector of the container holding the thumbnails. </td> <td> #gal-gaff-thumbs </td> </tr><tr><td> imageContainerSel </td> <td> The CSS selector of the container holding the main image. </td> <td> #gal-gaff-slideshow </td> </tr><tr><td> captionContainerSel </td> <td> The CSS selector of the container holding the caption. </td> <td> #gal-gaff-caption </td> </tr><tr><td> controlsContainerSel </td> <td> The CSS selector of the container holding the nav controls. </td> <td> #gal-gaff-controls </td> </tr><tr><td> loadingContainerSel </td> <td> The CSS selector of the container holding the loading screen. </td> <td> #gal-gaff-loading </td> </tr><tr><td> playLinkText </td> <td> The text used for the Play Slideshow link. </td> </tr><tr><td> pauseLinkText </td> <td> The text used for the Pause Slideshow link. </td> </tr><tr><td> prevLinkText </td> <td> The text used for the Previous Photo link. </td> </tr><tr><td> nextLinkText </td> <td> The text used for the Next Photo link. </td> </tr><tr><td> prevPageLinkText </td> <td> The text used for the Previous Page link. </td> </tr><tr><td> nextPageLinkText </td> <td> The text used for the Next Page link. </td></tr></tbody></table>Examples
--------

 Use the Galleriffic plugin, but only display 10 thumbs per page:

 ```
<pre class="brush: php">
[[!Gallery?
   &toPlaceholder=`gallery`
   &album=`My Photos`
   &plugin=`galleriffic`
   &numThumbs=`10`
]]

``` Hide the pagination and 'show slideshow' controls, but automatically start the slideshow:

 ```
<pre class="brush: php">
[[!Gallery?
   &toPlaceholder=`gallery`
   &album=`My Photos`
   &plugin=`galleriffic`
   &renderNavControls=`0`
   &renderSSControls=`0`
   &autoStart=`1`
]]

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