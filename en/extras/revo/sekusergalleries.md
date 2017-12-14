---
title: "sekUserGalleries"
_old_id: "707"
_old_uri: "revo/sekusergalleries"
---

What is sekUserGalleries?
-------------------------

SekUserGalleries is a gallery manager designed for users to upload and manage personal galleries.

### Requirements

- MODx Revolution 2.2.0-pl2 or later
- PHP5 or later
- Current beta version of sekUserGalleries requires sekFancyBox, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/sekfancybox>.
- Current beta version of sekUserGalleries requires sekFormTools, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/sekformtools>.
- Current beta version of sekUserGalleries requires sekSiteTools, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/seksitetools>.
- Login is recommended to manage users and can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/login> (Login may have its own prerequisites).

### History

SekUserGalleries was written by Stephen Smith, and first released on Mar 19th, 2012.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/sekusergalleries>.

### Development and Bug Reporting

SekUserGalleries is on GitHub: <https://github.com/insomnix/sekUserGalleries>, report any issues or feature requests here: <https://github.com/insomnix/sekUserGalleries/issues>.

Usage
-----

The sekUserGalleries is called through several snippets using the below tags ?(currently all snippets should be called on separate pages):

- [sekUserGalleries.browse.galleries](/extras/revo/sekusergalleries/sekusergalleries.browse.galleries "sekUserGalleries.browse.galleries") - This will display all the galleries.
- [sekUserGalleries.users.gallery.view](/extras/revo/sekusergalleries/sekusergalleries.users.gallery.view "sekUserGalleries.users.gallery.view") - Display the selected galleries albums. If no gallery is specified in the url, and the user is logged in and has permission to have a gallery, this will default to that user's gallery page.
- [sekUserGalleries.users.gallery.manage](/extras/revo/sekusergalleries/sekusergalleries.users.gallery.manage "sekUserGalleries.users.gallery.manage") - This page will allow the user to change their user settings for the gallery, if they are logged in and have permission.
- [sekUserGalleries.album.view](/extras/revo/sekusergalleries/sekusergalleries.album.view "sekUserGalleries.album.view") - View the images within the selected album.
- [sekUserGalleries.album.manage](/extras/revo/sekusergalleries/sekusergalleries.album.manage "sekUserGalleries.album.manage") - Add, edit, and remove albums to the gallery, if the user is logged in and has permission.
- [sekUserGalleries.album.items.manage](/extras/revo/sekusergalleries/sekusergalleries.album.items.manage "sekUserGalleries.album.items.manage") - Add, edit, and remove the album items. Currently set up to upload images only.
- [sekUserGalleries.album.items.helper](/extras/revo/sekusergalleries/sekusergalleries.album.items.helper "sekUserGalleries.album.items.helper") - This helper snippet does all the work for the \[\[album.items.manage\]\] snippet.
- [sekUserGalleries.image.information](/extras/revo/sekusergalleries/sekusergalleries.image.information "sekUserGalleries.image.information") - Simple snippet that gives additional information about an image, like the date the picture was taken, camera used, etc.
- [sekUserGalleries.search](/extras/revo/sekusergalleries/sekusergalleries.search "sekUserGalleries.search") - Search the albums title, description, and keywords, and display.
- [sekUserGalleries.directory](/extras/revo/sekusergalleries/sekusergalleries.directory "sekUserGalleries.directory") - Display how much space the user is currently using on the server (This uses the 1024 based measurement, MiB, GiB, etc).

Ensure that the page resource id for each snippet is entered into the Settings (see below Available Settings) to ensure the pages work correctly.

Available Settings
------------------

<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>sekusergalleries.load\_jquery</td><td>This will enable or disable JQuery from being loaded when sekUserGalleries is called on a page. If JQuery is being loaded from another extra used on the same pages as sekUserGalleries, or it is loaded in a template, this setting should be set to No/False.   
</td><td>Yes/True   
</td><td>>0.0.1   
</td></tr><tr><td>sekusergalleries.browsegalleries\_resource\_id</td><td>The id of the page using the \[\[browse.galleries\]\] snippet.   
</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.usersgallery\_resource\_id</td><td>The id of the page using the \[\[users.gallery.view\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.editgallery\_resource\_id</td><td>The id of the page using the \[\[users.gallery.manage\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.album\_view\_resource\_id</td><td>The id of the page using the \[\[album.view\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.album\_manage\_resource\_id</td><td>The id of the page using the \[\[album.manage\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.items\_manage\_resource\_id</td><td>The id of the page using the \[\[album.items.manage\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.items\_helper\_resource\_id</td><td>The id of the page using the \[\[album.items.helper\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.album\_search\_resource\_id</td><td>The id of the page using the \[\[search\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.image\_info\_resource\_id</td><td>The id of the page using the \[\[image.information\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.directory\_stats\_resource\_id</td><td>The id of the page using the \[\[directory\]\] snippet.</td><td> </td><td>>0.0.1</td></tr><tr><td>sekusergalleries.gallerycover\_thumb\_max\_width</td><td>Set the maximum pixel width of the gallery cover thumbnail image.   
</td><td>150   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.gallerycover\_thumb\_max\_height</td><td>Set the maximum pixel height of the gallery cover thumbnail image.</td><td>150   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.gallerycover\_display\_max\_width</td><td>Set the maximum pixel width of the gallery cover display image.</td><td>300   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.gallerycover\_display\_max\_height</td><td>Set the maximum pixel height of the gallery cover display image.</td><td>300   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.image\_thumb\_max\_width</td><td>Set the maximum pixel width of the thumbnail image.</td><td>150   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.image\_thumb\_max\_height</td><td>Set the maximum pixel height of the thumbnail image.</td><td>150   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.max\_file\_size</td><td>Maximum upload file size in bytes.   
</td><td>5242880</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.min\_file\_size</td><td>Minimum file size in bytes.   
</td><td>1   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.orient\_image</td><td>Auto orient image.   
</td><td>0   
</td><td>>0.0.1</td></tr><tr><td>sekusergalleries.discard\_aborted\_uploads</td><td>Discard aborted uploads.   
</td><td>1   
</td><td>>0.0.1</td></tr></tbody></table>The Manager
-----------

### Group Settings

The group settings uses modx's user group's and role's to manage the permissions for using the gallery. By default, anyone can view the galleries, but only a user with matching user group and role defined in the Group Settings can create, edit, or delete images and albums. To learn more about how Modx manages user groups view the [User Groups](http://rtfm.modx.com/display/revolution20/User+Groups) section.

<table><tbody><tr><th>Setting</th><th>Description   
</th><th>Version   
</th></tr><tr><td>User Group   
</td><td>Select a single user group from the drop down to define the permissions for the user's gallery.   
</td><td>>0.0.1</td></tr><tr><td>User Role</td><td>This uses the Modx User Groups to manage the permissions. Select a role from the drop down.   
</td><td>>0.0.1</td></tr><tr><td>Amount   
</td><td>Integer to define the amount of space the user, with the defined user group and role, can use.   
</td><td>>0.0.1</td></tr><tr><td>Unit   
</td><td>The unit of measure for the amount of space allocated for the user. (MiB,GiB, etc)   
</td><td>>0.0.1</td></tr><tr><td>Level   
</td><td>The level of enforcement. Soft will allow users to continue to add files after the maximum amount of space is reached. Hard will prevent further uploads if the amount of space allocated is reached.   
</td><td>>0.0.1</td></tr><tr><td>Private   
</td><td>Set to Yes, only the user who owns the gallery can access the images. If set to No, anyone can view the files in the gallery.   
</td><td>>0.0.1</td></tr></tbody></table>### Mime Types Accepted

A list of mime types that can be uploaded. A list of mime types can be found at [FeedForAll](http://www.feedforall.com/mime-types.htm).

<table><tbody><tr><th>Setting   
</th><th>Description   
</th><th>Version   
</th></tr><tr><td>Mime Types Accepted   
</td><td>The mime type accepted for upload.   
</td><td>>0.0.1</td></tr><tr><td>Resized File Ext   
</td><td>Change file ext to, ie tiff to jpg.   
</td><td>>0.0.1   
</td></tr></tbody></table>Example Mime Types Accepted.

<table><tbody><tr><th>Mime Types Accepted</th><th>Resized File Ext   
</th></tr><tr><td>image/jpeg</td><td>jpg</td></tr><tr><td>image/pjpeg</td><td>jpg</td></tr><tr><td>image/png</td><td>png</td></tr></tbody></table>### Image Size Settings

<table><tbody><tr><th>Setting</th><th>Description</th><th>Version</th></tr><tr><td>Name</td><td>One word name for the image size group.   
</td><td>>0.0.1</td></tr><tr><td>Description</td><td>A brief description of the image group.   
</td><td>>0.0.1</td></tr><tr><td>Max Width</td><td>Maximum width of the image.   
</td><td>>0.0.1</td></tr><tr><td>Max Height</td><td>Maximum height of the image.</td><td>>0.0.1</td></tr><tr><td>Image Quality</td><td>Resized image quality, the lower the number the smaller the file size.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Image</td><td>The image to use as a watermark.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Brightness</td><td>The brightness of the watermark.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Text</td><td>Text to use as a watermark. This field is ignored if watermark image is used.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Text Color</td><td>Color of the watermark text. Format is 0,0,0   
</td><td>>0.0.1</td></tr><tr><td>Watermark Font</td><td>Watermark font style.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Font Size</td><td>Watermark font size.   
</td><td>>0.0.1</td></tr><tr><td>Watermark Location</td><td>Location to place the watermark.   
</td><td>>0.0.1</td></tr><tr><td>Primary</td><td>Set only one image to primary.   
</td><td>>0.0.1</td></tr></tbody></table>