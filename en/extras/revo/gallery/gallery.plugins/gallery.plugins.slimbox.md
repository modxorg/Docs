---
title: "Gallery.Plugins.Slimbox"
_old_id: "882"
_old_uri: "revo/gallery/gallery.plugins/gallery.plugins.slimbox"
---

Slimbox Plugin for Gallery
--------------------------

 The Slimbox Plugin allows you to quickly output a Gallery and display its image thumbnails, with a simple lightbox overlay when you click a thumbnail. It uses the [Slimbox2 plugin](http://www.digitalia.be/software/slimbox2) for jQuery.

Usage
-----

 Simply add this parameter to the Gallery snippet:

 ```
<pre class="brush: php">
[[!Gallery? &plugin=`slimbox`]]

```Available Properties
--------------------

 Slimbox comes with its own custom properties. You can pass these into the [Gallery](/extras/revo/gallery "Gallery") snippet to override their defaults.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> slimboxUseCss </td> <td> If 1, will use the provided slimbox CSS file. </td> <td> 1 </td> </tr><tr><td> slimboxCss </td> <td> If slimboxUseCss is 1, will load CSS file in this property. If none is set, will use the default provided one. </td> <td> {slimbox\_url}packages/slimbox/css/slimbox2.css </td> </tr><tr><td> slimboxRenderJsOnStartup </td> <td> Load the Slimbox JS in the HEAD of the page. If set to 0, will load it at the bottom. </td> <td> 1 </td> </tr><tr><td> slimboxLoadJQuery </td> <td> If set to 1, will add JQuery to load in the page. Leave at 0 if you're already loading jQuery (recommended). </td> <td> 0 </td> </tr><tr><td> slimboxJQueryUrl </td> <td> If slimboxLoadJQuery is set to 1, will load the jQuery JS file from this URL. </td> <td> https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js </td> </tr><tr><td> slimboxJsTpl </td> <td> The tpl chunk for the slimbox JS. You can most likely ignore this setting. </td> <td> slimbox/js </td></tr></tbody></table> There are also properties that affect how Slimbox behaves:

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> loop </td> <td> If set to 1, allows the user to navigate between the first and last images of a Slimbox gallery, when there is more than one image to display. </td> <td> 0 </td> </tr><tr><td> overlayOpacity </td> <td> The level of opacity of the background overlay. 1 Is opaque, 0 is completely transparent. </td> <td> 0.8 </td> </tr><tr><td> overlayFadeDuration </td> <td> The duration of the overlay fade-in and fade-out animations, in milliseconds. Set it to 0 to disable the overlay fade effects. </td> <td> 400 </td> </tr><tr><td> resizeDuration </td> <td> The duration of the resize animation for width and height, in milliseconds. Set it to 0 to disable resize animations. </td> <td> 400 </td> </tr><tr><td> resizeEasing </td> <td> The name of the easing effect that you want to use for the resize animation (jQuery Easing Plugin required for all but "swing"). Many easings require a longer execution time to look good, so you should adjust the resizeDuration option above as well. </td> <td> swing </td> </tr><tr><td> initialWidth </td> <td> The initial width of the overlay box, in pixels. </td> <td> 250 </td> </tr><tr><td> initialHeight </td> <td> The initial height of the overlay box, in pixels. </td> <td> 250 </td> </tr><tr><td> imageFadeDuration </td> <td> The duration of the image fade-in animation, in milliseconds. Set it to 1 to disable this effect and make the image appear instantly. </td> <td> 400 </td> </tr><tr><td> captionAnimationDuration </td> <td> The duration of the caption animation, in milliseconds. Set it to 1 to disable it and make the caption appear instantly. </td> <td> 400 </td> </tr><tr><td> counterText </td> <td> Text value; allows you to customize, translate or disable the counter text which appears in the captions when multiple images are shown. Inside the text, {x} will be replaced by the current image index, and {y} will be replaced by the total number of images. Set it to false (boolean value, without quotes) or "" to disable the counter display. </td> <td> "Image {x} of {y}" </td></tr></tbody></table>Examples
--------

 Load slimbox for the album with ID 2, and make it loop continuously. Also, load jQuery.

 ```
<pre class="brush: php">
[[Gallery?
  &album=`2`
  &plugin=`slimbox`
  &loop=`1`
  &slimboxLoadJQuery=`1`
]]

``` Load slimbox for the album with ID 2, and put the JS and CSS at the bottom of the page.

 ```
<pre class="brush: php">
[[Gallery?
  &album=`2`
  &plugin=`slimbox`
  &slimboxRenderJsOnStartup=`0`
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