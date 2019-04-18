---
title: "sekUserGalleries"
_old_id: "707"
_old_uri: "revo/sekusergalleries"
---

## What is sekUserGalleries?

SekUserGalleries is a gallery manager designed for users to upload and manage personal galleries.

### Requirements

- MODX Revolution 2.2.0-pl2 or later
- PHP5 or later
- Current beta version of sekUserGalleries requires sekFancyBox, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/sekfancybox>.
- Current beta version of sekUserGalleries requires sekFormTools, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/sekformtools>.
- Current beta version of sekUserGalleries requires sekSiteTools, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/seksitetools>.
- Login is recommended to manage users and can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/login> (Login may have its own prerequisites).

### History

SekUserGalleries was written by Stephen Smith, and first released on Mar 19th, 2012.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/sekusergalleries>.

### Development and Bug Reporting

SekUserGalleries is on GitHub: <https://github.com/insomnix/sekUserGalleries>, report any issues or feature requests here: <https://github.com/insomnix/sekUserGalleries/issues>.

## Usage

The sekUserGalleries is called through several snippets using the below tags ?(currently all snippets should be called on separate pages):

- [sekUserGalleries.browse.galleries](extras/sekusergalleries/sekusergalleries.browse.galleries "sekUserGalleries.browse.galleries") - This will display all the galleries.
- [sekUserGalleries.users.gallery.view](extras/sekusergalleries/sekusergalleries.users.gallery.view "sekUserGalleries.users.gallery.view") - Display the selected galleries albums. If no gallery is specified in the url, and the user is logged in and has permission to have a gallery, this will default to that user's gallery page.
- [sekUserGalleries.users.gallery.manage](extras/sekusergalleries/sekusergalleries.users.gallery.manage "sekUserGalleries.users.gallery.manage") - This page will allow the user to change their user settings for the gallery, if they are logged in and have permission.
- [sekUserGalleries.album.view](extras/sekusergalleries/sekusergalleries.album.view "sekUserGalleries.album.view") - View the images within the selected album.
- [sekUserGalleries.album.manage](extras/sekusergalleries/sekusergalleries.album.manage "sekUserGalleries.album.manage") - Add, edit, and remove albums to the gallery, if the user is logged in and has permission.
- [sekUserGalleries.album.items.manage](extras/sekusergalleries/sekusergalleries.album.items.manage "sekUserGalleries.album.items.manage") - Add, edit, and remove the album items. Currently set up to upload images only.
- [sekUserGalleries.album.items.helper](extras/sekusergalleries/sekusergalleries.album.items.helper "sekUserGalleries.album.items.helper") - This helper snippet does all the work for the \[\[album.items.manage\]\] snippet.
- [sekUserGalleries.image.information](extras/sekusergalleries/sekusergalleries.image.information "sekUserGalleries.image.information") - Simple snippet that gives additional information about an image, like the date the picture was taken, camera used, etc.
- [sekUserGalleries.search](extras/sekusergalleries/sekusergalleries.search "sekUserGalleries.search") - Search the albums title, description, and keywords, and display.
- [sekUserGalleries.directory](extras/sekusergalleries/sekusergalleries.directory "sekUserGalleries.directory") - Display how much space the user is currently using on the server (This uses the 1024 based measurement, MiB, GiB, etc).

Ensure that the page resource id for each snippet is entered into the Settings (see below Available Settings) to ensure the pages work correctly.

## Available Settings

| Name                                                | Description                                                                                                                                                                                                                                                     | Default  | Version |
| --------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| sekusergalleries.load\_jquery                       | This will enable or disable JQuery from being loaded when sekUserGalleries is called on a page. If JQuery is being loaded from another extra used on the same pages as sekUserGalleries, or it is loaded in a template, this setting should be set to No/False. | Yes/True | >0.0.1  |
| sekusergalleries.browsegalleries\_resource\_id      | The id of the page using the \[\[browse.galleries\]\] snippet.                                                                                                                                                                                                  |          | >0.0.1  |
| sekusergalleries.usersgallery\_resource\_id         | The id of the page using the \[\[users.gallery.view\]\] snippet.                                                                                                                                                                                                |          | >0.0.1  |
| sekusergalleries.editgallery\_resource\_id          | The id of the page using the \[\[users.gallery.manage\]\] snippet.                                                                                                                                                                                              |          | >0.0.1  |
| sekusergalleries.album\_view\_resource\_id          | The id of the page using the \[\[album.view\]\] snippet.                                                                                                                                                                                                        |          | >0.0.1  |
| sekusergalleries.album\_manage\_resource\_id        | The id of the page using the \[\[album.manage\]\] snippet.                                                                                                                                                                                                      |          | >0.0.1  |
| sekusergalleries.items\_manage\_resource\_id        | The id of the page using the \[\[album.items.manage\]\] snippet.                                                                                                                                                                                                |          | >0.0.1  |
| sekusergalleries.items\_helper\_resource\_id        | The id of the page using the \[\[album.items.helper\]\] snippet.                                                                                                                                                                                                |          | >0.0.1  |
| sekusergalleries.album\_search\_resource\_id        | The id of the page using the \[\[search\]\] snippet.                                                                                                                                                                                                            |          | >0.0.1  |
| sekusergalleries.image\_info\_resource\_id          | The id of the page using the \[\[image.information\]\] snippet.                                                                                                                                                                                                 |          | >0.0.1  |
| sekusergalleries.directory\_stats\_resource\_id     | The id of the page using the \[\[directory\]\] snippet.                                                                                                                                                                                                         |          | >0.0.1  |
| sekusergalleries.gallerycover\_thumb\_max\_width    | Set the maximum pixel width of the gallery cover thumbnail image.                                                                                                                                                                                               | 150      | >0.0.1  |
| sekusergalleries.gallerycover\_thumb\_max\_height   | Set the maximum pixel height of the gallery cover thumbnail image.                                                                                                                                                                                              | 150      | >0.0.1  |
| sekusergalleries.gallerycover\_display\_max\_width  | Set the maximum pixel width of the gallery cover display image.                                                                                                                                                                                                 | 300      | >0.0.1  |
| sekusergalleries.gallerycover\_display\_max\_height | Set the maximum pixel height of the gallery cover display image.                                                                                                                                                                                                | 300      | >0.0.1  |
| sekusergalleries.image\_thumb\_max\_width           | Set the maximum pixel width of the thumbnail image.                                                                                                                                                                                                             | 150      | >0.0.1  |
| sekusergalleries.image\_thumb\_max\_height          | Set the maximum pixel height of the thumbnail image.                                                                                                                                                                                                            | 150      | >0.0.1  |
| sekusergalleries.max\_file\_size                    | Maximum upload file size in bytes.                                                                                                                                                                                                                              | 5242880  | >0.0.1  |
| sekusergalleries.min\_file\_size                    | Minimum file size in bytes.                                                                                                                                                                                                                                     | 1        | >0.0.1  |
| sekusergalleries.orient\_image                      | Auto orient image.                                                                                                                                                                                                                                              | 0        | >0.0.1  |
| sekusergalleries.discard\_aborted\_uploads          | Discard aborted uploads.                                                                                                                                                                                                                                        | 1        | >0.0.1  |

## The Manager

### Group Settings

The group settings uses modx's user group's and role's to manage the permissions for using the gallery. By default, anyone can view the galleries, but only a user with matching user group and role defined in the Group Settings can create, edit, or delete images and albums. To learn more about how Modx manages user groups view the [User Groups](http://rtfm.modx.com/display/revolution20/User+Groups) section.

| Setting    | Description                                                                                                                                                                                           | Version |
| ---------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| User Group | Select a single user group from the drop down to define the permissions for the user's gallery.                                                                                                       | >0.0.1  |
| User Role  | This uses the Modx User Groups to manage the permissions. Select a role from the drop down.                                                                                                           | >0.0.1  |
| Amount     | Integer to define the amount of space the user, with the defined user group and role, can use.                                                                                                        | >0.0.1  |
| Unit       | The unit of measure for the amount of space allocated for the user. (MiB,GiB, etc)                                                                                                                    | >0.0.1  |
| Level      | The level of enforcement. Soft will allow users to continue to add files after the maximum amount of space is reached. Hard will prevent further uploads if the amount of space allocated is reached. | >0.0.1  |
| Private    | Set to Yes, only the user who owns the gallery can access the images. If set to No, anyone can view the files in the gallery.                                                                         | >0.0.1  |

### Mime Types Accepted

A list of mime types that can be uploaded. A list of mime types can be found at [FeedForAll](http://www.feedforall.com/mime-types.htm).

| Setting             | Description                         | Version |
| ------------------- | ----------------------------------- | ------- |
| Mime Types Accepted | The mime type accepted for upload.  | >0.0.1  |
| Resized File Ext    | Change file ext to, ie tiff to jpg. | >0.0.1  |

Example Mime Types Accepted.

| Mime Types Accepted | Resized File Ext |
| ------------------- | ---------------- |
| image/jpeg          | jpg              |
| image/pjpeg         | jpg              |
| image/png           | png              |

### Image Size Settings

| Setting              | Description                                                                   | Version |
| -------------------- | ----------------------------------------------------------------------------- | ------- |
| Name                 | One word name for the image size group.                                       | >0.0.1  |
| Description          | A brief description of the image group.                                       | >0.0.1  |
| Max Width            | Maximum width of the image.                                                   | >0.0.1  |
| Max Height           | Maximum height of the image.                                                  | >0.0.1  |
| Image Quality        | Resized image quality, the lower the number the smaller the file size.        | >0.0.1  |
| Watermark Image      | The image to use as a watermark.                                              | >0.0.1  |
| Watermark Brightness | The brightness of the watermark.                                              | >0.0.1  |
| Watermark Text       | Text to use as a watermark. This field is ignored if watermark image is used. | >0.0.1  |
| Watermark Text Color | Color of the watermark text. Format is 0,0,0                                  | >0.0.1  |
| Watermark Font       | Watermark font style.                                                         | >0.0.1  |
| Watermark Font Size  | Watermark font size.                                                          | >0.0.1  |
| Watermark Location   | Location to place the watermark.                                              | >0.0.1  |
| Primary              | Set only one image to primary.                                                | >0.0.1  |