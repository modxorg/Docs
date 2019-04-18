---
title: "Gallery"
_old_id: "647"
_old_uri: "revo/gallery"
---

## What is Gallery?

 Gallery is a dynamic Gallery Extra for MODX Revolution. It allows you to quickly and easily put up galleries of images, sort them, tag them, and display them in a myriad of ways in the front-end of your site.

 A tutorial has been made for Gallery by the community, and can be downloaded here: [Tutorial - Gallery Component with Galleriffic.pdf](/download/attachments/13664292/Tutorial+-+Gallery+Component+with+Galleriffic.pdf?version=1&modificationDate=1288905236000)

## Requirements

- MODX Revolution 2.0.0-rc-2 or later
- PHP5 or later
- php-mbstring Enabled

## Historyand Info

 Gallery was written by Shaun McCormick (splittingred) as a dynamic Gallery component, and first released on February 5th, 2010.

 You can view the [roadmap here](extras/gallery/gallery.roadmap "Gallery.Roadmap").

### Download

 It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, available here: <http://modx.com/extras/package/gallery>

### Development and Bug Reporting

 Gallery is stored and developed in GitHub, and can be found here: <https://github.com/modxcms/Gallery>

## Usage

 The Gallery snippets can be called using the [tags](making-sites-with-modx/tag-syntax "Tag Syntax"):

 ``` php
[[Gallery? &album=`My Album`]]
[[GalleryAlbums? &limit=`10`]]
```

### Snippets

 Gallery comes packaged with 3 snippets - one called "Gallery", which displays a gallery from either an Album, a Tag, or both; a snippet called "GalleryAlbums", which displays a list of Albums; and a snippet called "GalleryItem", which displays a single Gallery Item.

- [Gallery](extras/gallery/gallery.gallery "Gallery.Gallery")
- [GalleryAlbums](extras/gallery/gallery.galleryalbums "Gallery.GalleryAlbums")
- [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem")

### System Settings

 You can change the place where you store your Gallery images by changing the following settings:

 | gallery.files\_path | The absolute path of a folder to store images in.                   |
 | ------------------- | ------------------------------------------------------------------- |
 | gallery.files\_url  | The web-accessible URL that you can reach gallery.files\_path from. |

 As of version 1.3.0 you can also enable and control a TinyMCE integration for Gallery item descriptions. These settings are included:

 | key                                          | description                                                                                                                                 |
 | -------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
 | gallery.use\_richtext                        | Set to yes (true) to enable the TinyMCE integration. Note that you will need to have the TinyMCE Extra installed in order for this to work. |
 | gallery.tiny.width                           | Width of the text editor in either pixels or a percentage.                                                                                  |
 | gallery.tiny.height                          | Height of the text editor in either pixels or a percentage.                                                                                 |
 | gallery.tiny.buttons1/2/3/4/5                | Buttons to display on the different rows (1 through 5). When empty this will inherit from the main TinyMCE settings.                        |
 | gallery.tiny.custom\_plugins                 | A comma separated list of plugins to load. When empty this will inherit from the main TInyMCE settings.                                     |
 | gallery.tiny.theme\_advanced\_blockformats   | Block formats to use in the drop down box. Inherits from main TinyMCE settings when empty.                                                  |
 | gallery.tiny.theme\_advanced\_css\_selectors | CSS Selectors to choose from. Inherits from main TinyMCE settings when empty.                                                               |

### Using the Custom TV

 Gallery comes packaged with a custom TV input and output type for managing Gallery images in the backend. You can crop, resize, rotate, and more with it. Please see the following article for more usage:

- [Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv "Gallery.Setting Up the GalleryItem TV")

### Gallery Plugins

 Gallery allows you to display your galleries either straight as thumbnail images in the front-end, or using jQuery plugins. You can pass a plugin name through the Gallery snippet. Currently, the only available plugin is for [Galleriffic]((extras/gallery/gallery.plugins/galleriffic "Gallery.Plugins.Galleriffic").

### Gallery manager page

 Gallery ships with a custom manager page (can be found in the Components top menu) where you can manage your albums. You can create new ones, and use the name you give it in the Gallery snippet to retrieve that specific album. After you have created an album you can right click and update it to manage the photos associated with it.

 You can use four different types of uploading. Either single item upload (optionally with a rich text description, see the system settings explained above), multi upload, bulk upload which searches a folder on the filesystem and imports the images found, or zip upload which unpacks a zip file.

### Gallery Media Source

 Gallery ships with a custom Media Source type that can be used to show your Albums and their items in the left-hand tree in the manager. Simply create a new Media Source with type "Gallery Albums", and Gallery will handle the rest.

## Examples

 A sample code line for a Galleriffic-powered gallery for the album "My Album".

 ``` php
[[!Gallery? &album=`My Album` &plugin=`galleriffic`]]
```

 Grab the first 10 photos tagged "Fun":

 ``` php
[[!Gallery? &tag=`Fun`]]
```

 Grab all photos in the album "My Album" with tag "Blue":

 ``` php
[[!Gallery? &album=`My Album` &tag=`blue`]]
```

## See Also

1. [Gallery.Gallery](extras/gallery/gallery/index)
     1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
     2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
     1. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/containertpl)
     2. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
     1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/albumtpl)
     2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/galleryitempagination)
     3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/tagtpl)
     4. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/tpl)
4. [Gallery.Plugins](extras/gallery/gallery.plugins)
     1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/galleriffic)
     2. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/slimbox)
5. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
