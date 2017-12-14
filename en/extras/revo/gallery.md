---
title: "Gallery"
_old_id: "647"
_old_uri: "revo/gallery"
---

<div>- [What is Gallery?](#Gallery-WhatisGallery%3F)
- [Requirements](#Gallery-Requirements)
- [History and Info](#Gallery-HistoryandInfo)
  - [Download](#Gallery-Download)
  - [Development and Bug Reporting](#Gallery-DevelopmentandBugReporting)
- [Usage](#Gallery-Usage)
  - [Snippets](#Gallery-Snippets)
  - [System Settings](#Gallery-SystemSettings)
  - [Using the Custom TV](#Gallery-UsingtheCustomTV)
  - [Gallery Plugins](#Gallery-GalleryPlugins)
  - [Gallery manager page](#Gallery-Gallerymanagerpage)
  - [Gallery Media Source](#Gallery-GalleryMediaSource)
- [Examples](#Gallery-Examples)
- [See Also](#Gallery-SeeAlso)

</div>What is Gallery?
----------------

 Gallery is a dynamic Gallery Extra for MODx Revolution. It allows you to quickly and easily put up galleries of images, sort them, tag them, and display them in a myriad of ways in the front-end of your site.

 A tutorial has been made for Gallery by the community, and can be downloaded here: [Tutorial - Gallery Component with Galleriffic.pdf](/download/attachments/13664292/Tutorial+-+Gallery+Component+with+Galleriffic.pdf?version=1&modificationDate=1288905236000)

Requirements
------------

- MODx Revolution 2.0.0-rc-2 or later
- PHP5 or later
- php-mbstring Enabled

History and Info
----------------

 Gallery was written by Shaun McCormick (splittingred) as a dynamic Gallery component, and first released on February 5th, 2010.

 You can view the [roadmap here](/extras/revo/gallery/gallery.roadmap "Gallery.Roadmap").

### Download

 It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, available here: <http://modx.com/extras/package/gallery>

### Development and Bug Reporting

 Gallery is stored and developed in GitHub, and can be found here: <https://github.com/modxcms/Gallery>

Usage
-----

 The Gallery snippets can be called using the [tags](/revolution/2.x/making-sites-with-modx/tag-syntax "Tag Syntax"):

 ```
<pre class="brush: php">[[Gallery? &album=`My Album`]]
[[GalleryAlbums? &limit=`10`]]

```### Snippets

 Gallery comes packaged with 3 snippets - one called "Gallery", which displays a gallery from either an Album, a Tag, or both; a snippet called "GalleryAlbums", which displays a list of Albums; and a snippet called "GalleryItem", which displays a single Gallery Item.

- [Gallery](/extras/revo/gallery/gallery.gallery "Gallery.Gallery")
- [GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums "Gallery.GalleryAlbums")
- [GalleryItem](/extras/revo/gallery/gallery.galleryitem "Gallery.GalleryItem")

### System Settings

 You can change the place where you store your Gallery images by changing the following settings:

 <table><tbody><tr><td> gallery.files\_path </td> <td> The absolute path of a folder to store images in. </td> </tr><tr><td> gallery.files\_url </td> <td> The web-accessible URL that you can reach gallery.files\_path from. </td></tr></tbody></table> As of version 1.3.0 you can also enable and control a TinyMCE integration for Gallery item descriptions. These settings are included:

 <table><tbody><tr><th> key   
</th> <th> description   
</th> </tr><tr><td> gallery.use\_richtext   
</td> <td> Set to yes (true) to enable the TinyMCE integration. Note that you will need to have the TinyMCE Extra installed in order for this to work.   
</td> </tr><tr><td> gallery.tiny.width   
</td> <td> Width of the text editor in either pixels or a percentage.   
</td> </tr><tr><td> gallery.tiny.height   
</td> <td> Height of the text editor in either pixels or a percentage. </td> </tr><tr><td> gallery.tiny.buttons1/2/3/4/5   
</td> <td> Buttons to display on the different rows (1 through 5). When empty this will inherit from the main TinyMCE settings.   
</td> </tr><tr><td> gallery.tiny.custom\_plugins   
</td> <td> A comma separated list of plugins to load. When empty this will inherit from the main TInyMCE settings.   
</td> </tr><tr><td> gallery.tiny.theme\_advanced\_blockformats   
</td> <td> Block formats to use in the drop down box. Inherits from main TinyMCE settings when empty.   
</td> </tr><tr><td> gallery.tiny.theme\_advanced\_css\_selectors   
</td> <td> CSS Selectors to choose from. Inherits from main TinyMCE settings when empty.   
</td></tr></tbody></table>### Using the Custom TV

 Gallery comes packaged with a custom TV input and output type for managing Gallery images in the backend. You can crop, resize, rotate, and more with it. Please see the following article for more usage:

- [Setting Up the GalleryItem TV](/extras/revo/gallery/gallery.setting-up-the-galleryitem-tv "Gallery.Setting Up the GalleryItem TV")

### Gallery Plugins

 Gallery allows you to display your galleries either straight as thumbnail images in the front-end, or using jQuery plugins. You can pass a plugin name through the Gallery snippet. Currently, the only available plugin is for [Galleriffic](/extras/revo/gallery/gallery.plugins/gallery.plugins.galleriffic "Gallery.Plugins.Galleriffic").

### Gallery manager page

 Gallery ships with a custom manager page (can be found in the Components top menu) where you can manage your albums. You can create new ones, and use the name you give it in the Gallery snippet to retrieve that specific album. After you have created an album you can right click and update it to manage the photos associated with it.

 You can use four different types of uploading. Either single item upload (optionally with a rich text description, see the system settings explained above), multi upload, bulk upload which searches a folder on the filesystem and imports the images found, or zip upload which unpacks a zip file.

### Gallery Media Source

 Gallery ships with a custom Media Source type that can be used to show your Albums and their items in the left-hand tree in the manager. Simply create a new Media Source with type "Gallery Albums", and Gallery will handle the rest.

Examples
--------

 A sample code line for a Galleriffic-powered gallery for the album "My Album".

 ```
<pre class="brush: php">[[!Gallery? &album=`My Album` &plugin=`galleriffic`]]

``` Grab the first 10 photos tagged "Fun":

 ```
<pre class="brush: php">[[!Gallery? &tag=`Fun`]]

``` Grab all photos in the album "My Album" with tag "Blue":

 ```
<pre class="brush: php">[[!Gallery? &album=`My Album` &tag=`blue`]]

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