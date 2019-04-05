---
title: "Slimbox"
_old_id: "882"
_old_uri: "revo/gallery/gallery.plugins/gallery.plugins.slimbox"
---

## Slimbox Plugin for Gallery

 The Slimbox Plugin allows you to quickly output a Gallery and display its image thumbnails, with a simple lightbox overlay when you click a thumbnail. It uses the [Slimbox2 plugin](http://www.digitalia.be/software/slimbox2) for jQuery.

## Usage

 Simply add this parameter to the Gallery snippet:

 ``` php 
[[!Gallery? &plugin=`slimbox`]]
```

## Available Properties

 Slimbox comes with its own custom properties. You can pass these into the [Gallery](/extras/gallery "Gallery") snippet to override their defaults.

 | Name                     | Description                                                                                                    | Default Value                                                    |
 | ------------------------ | -------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- |
 | slimboxUseCss            | If 1, will use the provided slimbox CSS file.                                                                  | 1                                                                |
 | slimboxCss               | If slimboxUseCss is 1, will load CSS file in this property. If none is set, will use the default provided one. | {slimbox\_url}packages/slimbox/css/slimbox2.css                  |
 | slimboxRenderJsOnStartup | Load the Slimbox JS in the HEAD of the page. If set to 0, will load it at the bottom.                          | 1                                                                |
 | slimboxLoadJQuery        | If set to 1, will add JQuery to load in the page. Leave at 0 if you're already loading jQuery (recommended).   | 0                                                                |
 | slimboxJQueryUrl         | If slimboxLoadJQuery is set to 1, will load the jQuery JS file from this URL.                                  | https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js |
 | slimboxJsTpl             | The tpl chunk for the slimbox JS. You can most likely ignore this setting.                                     | slimbox/js                                                       |

 There are also properties that affect how Slimbox behaves:

 | Name                     | Description                                                                                                                                                                                                                                                                                                                                              | Default Value      |
 | ------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------ |
 | loop                     | If set to 1, allows the user to navigate between the first and last images of a Slimbox gallery, when there is more than one image to display.                                                                                                                                                                                                           | 0                  |
 | overlayOpacity           | The level of opacity of the background overlay. 1 Is opaque, 0 is completely transparent.                                                                                                                                                                                                                                                                | 0.8                |
 | overlayFadeDuration      | The duration of the overlay fade-in and fade-out animations, in milliseconds. Set it to 0 to disable the overlay fade effects.                                                                                                                                                                                                                           | 400                |
 | resizeDuration           | The duration of the resize animation for width and height, in milliseconds. Set it to 0 to disable resize animations.                                                                                                                                                                                                                                    | 400                |
 | resizeEasing             | The name of the easing effect that you want to use for the resize animation (jQuery Easing Plugin required for all but "swing"). Many easings require a longer execution time to look good, so you should adjust the resizeDuration option above as well.                                                                                                | swing              |
 | initialWidth             | The initial width of the overlay box, in pixels.                                                                                                                                                                                                                                                                                                         | 250                |
 | initialHeight            | The initial height of the overlay box, in pixels.                                                                                                                                                                                                                                                                                                        | 250                |
 | imageFadeDuration        | The duration of the image fade-in animation, in milliseconds. Set it to 1 to disable this effect and make the image appear instantly.                                                                                                                                                                                                                    | 400                |
 | captionAnimationDuration | The duration of the caption animation, in milliseconds. Set it to 1 to disable it and make the caption appear instantly.                                                                                                                                                                                                                                 | 400                |
 | counterText              | Text value; allows you to customize, translate or disable the counter text which appears in the captions when multiple images are shown. Inside the text, {x} will be replaced by the current image index, and {y} will be replaced by the total number of images. Set it to false (boolean value, without quotes) or "" to disable the counter display. | "Image {x} of {y}" |

## Examples

 Load slimbox for the album with ID 2, and make it loop continuously. Also, load jQuery.

 ``` php 
[[Gallery?
  &album=`2`
  &plugin=`slimbox`
  &loop=`1`
  &slimboxLoadJQuery=`1`
]]
```

 Load slimbox for the album with ID 2, and put the JS and CSS at the bottom of the page.

 ``` php 
[[Gallery?
  &album=`2`
  &plugin=`slimbox`
  &slimboxRenderJsOnStartup=`0`
]]
```

## See Also

1. [Gallery.Gallery](/extras/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.containerTpl](/extras/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
  2. [Gallery.GalleryAlbums.rowTpl](/extras/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
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