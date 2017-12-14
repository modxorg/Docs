---
title: "EvoGallery"
_old_id: "637"
_old_uri: "evo/evogallery"
---

<div>- [What is EvoGallery?](#EvoGallery-WhatisEvoGallery%3F)
- [Requirements](#EvoGallery-Requirements)
- [History](#EvoGallery-History)
  - [Public Releases](#EvoGallery-PublicReleases)
  - [Download](#EvoGallery-Download)
- [Install](#EvoGallery-Install)
- [Usage](#EvoGallery-Usage)
  - [Module](#EvoGallery-Module)
      - [Configuration](#EvoGallery-Configuration)
            - [Some examples of PHPThumb config](#EvoGallery-SomeexamplesofPHPThumbconfig)
  - [Snippet](#EvoGallery-Snippet)
      - [Display](#EvoGallery-Display)
      - [Types](#EvoGallery-Types)
      - [Other Properties](#EvoGallery-OtherProperties)
      - [Examples](#EvoGallery-Examples)
  - [Template Placeholders](#EvoGallery-TemplatePlaceholders)
  - [ManagerManager Function](#EvoGallery-ManagerManagerFunction)

</div>What is EvoGallery?
-------------------

EvoGallery is a dynamic gallery extra for MODx Evolution. It allows you to quickly and easily create galleries of images by associating them with any page on your site. Galleries can be outputted in a variety of ways using a templated system.

Requirements
------------

- MODx Evolution 1.0 or later
- PHP5 or later

History
-------

EvoGallery was originally written by Brian Stanback some years ago and was simply known as the Gallery Module. Jeff Whitfield later took it and rewrote all the javascript using jQuery and used the Uploadify jQuery plugin in an effort to make the uploader compatible with newer versions of Flash. Many updates have been made since then to give it more functionality. The name was changed later to EvoGallery in order to differentiate this add-on from many of the other "gallery" add-ons including ones for MODx Revolution. In January 2011, development has been picked up by several community members with the intention to bring this plugin back to speed.

### Public Releases

<table><tbody><tr><th>Version</th><th>Date</th></tr><tr><td>1.0.0-beta1</td><td>May 13th, 2010</td></tr><tr><td>1.1.0-beta1   
</td><td>August 28th, 2011   
</td></tr></tbody></table>### Download

EvoGallery can be downloaded from the MODx Extras Repository [here](http://modxcms.com/extras/package/676).

This add-on should NOT be confused with the Gallery add-on for MODx Revolution. EvoGallery does not create stand-alone, self-contained galleries that are not associated with a particular page. Every photo uploaded must be associated with a page in the site tree.

Install
-------

To install EvoGallery, unzip the downloaded file and follow the following steps:

- Create a directory called 'galleries' in the assets directory of your MODx site and give it full write permissions (777).
- Copy/Upload the assets/modules/evogallery directory to the assets/modules directory of your MODx site.
- Copy/Upload the assets/snippets/evogallery directory to the assets/evosnippets directory of your MODx site.
- (Optional) Copy/Upload the assets/plugins/managermanager/functions/gallerylink.inc.php file to the assets/plugins/managermanager/functions directory of your MODx site.
- Copy/Upload the install directory to the root directory of your MODx site
- Run the installer (<http://yoursite/install/index.php>) and follow the simple on-screen instructions to complete the installation.

Once you've completed the installation, be sure and remove the installer directory from your site.

Usage
-----

EvoGallery requires the use of both a module and a snippet to achieve full functionality.

### Module

The EvoGallery module allows you to manage all the photos that are associated with the various pages of your site. After clicking on the EvoGallery item under Modules, you'll be presented with a top-level list of pages from the site tree:

![](/download/attachments/16220172/evogallery_docs_01.png?version=1&modificationDate=1274134789000)

From there, simply click on the links to drill down to the page you wish to manage:

![](/download/attachments/16220172/evogallery_docs_02.png?version=1&modificationDate=1274134812000)

Uploading photos is as easy as clicking on the Select Files button and choosing the photos you want to upload. The files you select will be added to the queue:

![](/download/attachments/16220172/evogallery_docs_03.png?version=1&modificationDate=1274134818000)

To upload the photos, simply click on the Upload Files link below the queue. Each photo will then be uploaded and, along with each photo, a thumbnail will be created. Both photos and thumbnails are processed and resized based on the module configuration (more on that in a second):

![](/download/attachments/16220172/evogallery_docs_04.png?version=1&modificationDate=1274134824000)

Once a photo is uploaded, you can manage the additional properties of the image simply by hovering over an image and clicking on the edit icon. A lightbox will popup that will allow you to update the title, description, and keywords for the image as well as the ability to upload and replace the existing image with a new one:

![](/download/attachments/16220172/evogallery_docs_05.png?version=1&modificationDate=1274134832000)

If you need to delete an image, simply hover over the thumbnail of an image and click on the red 'X'. You can also reorder the order of the images simply by dragging and dropping images in the order you want and then clicking on the 'Save Order' button.

#### Configuration

Advanced configuration options are available through module configuration:

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>PHPThumb config for images in JSON (phpthumbImage)</td><td>PHPThumb parameters for images (see below for details)   
</td><td>{'w': 940, 'h': 940, 'q': 95}</td></tr><tr><td>PHPThumb config for thumbs in JSON (phpthumbThumb)   
</td><td>PHPThumb parameters for thumbnails (see below for details)   
</td><td>{'w': 175, 'h': 175, 'q': 75}</td></tr><tr><td>Root Document ID (docId)   
</td><td>ID of the document root to begin listing galleries for (0 for all documents)</td><td>0</td></tr><tr><td>Save path (savePath)   
</td><td>Full system path to location of product images</td><td>assets/galleries</td></tr><tr><td>Module path (modulePath)</td><td>Path to the module directory</td><td>assets/modules/evogallery/</td></tr><tr><td>Keep original images (keepOriginal)   
</td><td>If set to 'Yes', this will keep original images when upload   
</td><td>Yes</td></tr><tr><td>Random filenames (randomFilenames)   
</td><td>If set to 'Yes', this will apply generated random filenames to uploaded pictures</td><td>No</td></tr></tbody></table>Please note the following:

1. PHPThumb config only affect images uploaded AFTER changing the settings. Or you can regenerate all images from action menu.
2. MODX Evolution don't support double quotes in parameter values, so use single quote.

##### Some examples of PHPThumb config

Max width 940, max height 940, quality 95

```
<pre class="brush: php">
{'w': 940, 'h': 940, 'q': 95}

```Max width 1280, max height 1024, quality 95, apply watermark filter with filename '/assets/images/watermark.png' and position top-left

```
<pre class="brush: php">
{'w': 1280, 'h': 1024, 'q': 95, 'fltr': ['wmi|/assets/images/watermark.png|TL']}

```Max width 1280, max height 1024, quality 95, zoom crop, apply brightness filter with value 200, apply watermark filter with filename '/assets/images/watermark.png' and position to bottom-right

```
<pre class="brush: php">
{'w': 1280, 'h': 1024, 'q': 95, 'zc': 1, 'fltr': ['brit|200', 'wmi|/assets/images/watermark.png|BR']}

```### Snippet

Once you've added images to some pages, you then have to output the various images and galleries to the front-end of the site. The EvoGallery snippet allows you to generate lists of your images and galleries in a variety of ways.

#### Display

EvoGallery has three basic display modes when calling the snippet:

- galleries
- images
- single

The 'galleries' mode allows you to display a list of available galleries in a container. By default, the document ID is set to the current document but can be overridden using the 'docId' property.

The 'images' mode allows you to display a list of images associated with a given page. By default, the document ID is set to the current document but, just like the 'galleries' mode, it can be overridden using the 'docId' property.

The 'single' mode allows you to display a single image provided that you know the ID of it in the database. Generally, this information is determined through a separate snippet instance in 'images' mode before passing it on to another instance. By default, this mode looks for a 'picId' variable via a standard PHP request variable.

#### Types

The 'type' property tells the snippet what default templates to use when outputting the list of images or galleries. If you look in the EvoGallery snippet directory (/assets/snippets/evogallery/), you notice that there is a classes folder as well as a few other folders (jquery-cycle, simple-list, and single). These correspond to the available types that can be assigned to the snippet.

If you look inside a type folder, you'll notice three files: tpl.config.txt, tpl.default.txt, and tpl.item.default.txt. These files are used to set the default templates for the given type. Other files could be used to set the default templates for the first, last, and alternate items (tpl.item.first.txt, tpl.item.last.txt, and tpl.item.alt.txt respectively).

The tpl.config.txt file allows you to set which CSS and script files to load when the gallery is called. To add a file, simply create a new line after one of the three designated file type areas: @EXTSCRIPT, @SCRIPT, or @CSS. @EXTSCRIPT is for scripts that are meant to be loaded outside of the given type directly. This allows you to load script files using either a direct URL or a path that's root relative to your site. @SCRIPT is for script files that reside inside the given type directory. @CSS is for CSS files that reside inside the given type directory. If you create subdirectories within the type directory, be sure that the paths written for lines in the @SCRIPT and @CSS sections are relative to your root type directory.

While you may use a custom type to assign templates to the EvoGallery snippet, it's not always necessary to do so. You could leave the 'type' property out and simply assign chunks to the various templates. Since the default type doesn't have any CSS or script files assigned for the tpl.config.txt, you're free to create a snippet call made up of entirely assigned chunk templates.

#### Other Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>display</td><td>Have the snippet output either a list of galleries within the specified doc Id, a list of images within a gallery, or a single image based on a pic Id. Possible values: galleries, images, single</td><td>images</td></tr><tr><td>type</td><td>Output type, if specified, the snippet will automatically load the required javascript. Pre-packaged types: simple-list, single, jquery-cycle</td><td>simple-list</td></tr><tr><td>includeAssets</td><td>Register external scripts and CSS files required by the specified gallery type. If set to 0, these will need to be included manually in the document <head></td><td>1</td></tr><tr><td>picId</td><td>ID of specific pic to show when displaying by a single image</td><td>$\_REQUEST\[ 'picId' \]</td></tr><tr><td>docId</td><td>Document ID for which to display gallery (default: document from which snippet was called). Multiple document id's can be specified by commas (no spaces), or \* for all documents</td><td>$modx->documentIdentifier</td></tr><tr><td>gallerySortBy</td><td>Galleries sort order (possible fields: id, pagetitle, longtitle, description, alias, pub\_date, introtext, editedby, editedon, publishedon, publishedby, menutitle) or RAND()</td><td>menuindex</td></tr><tr><td>gallerySortDir</td><td>Direction to sort the galleries ASC or DESC</td><td>ASC</td></tr><tr><td>ignoreHidden</td><td>Display documents marked as hidden in the gallery listing</td><td>0</td></tr><tr><td>excludeDocs</td><td>Prevent the specified documents from showing in the gallery listing. Multiple document id's can be specified by commas (no spaces).</td><td>0</td></tr><tr><td>sortBy</td><td>Sort items by field (possible fields: id, content\_id, filename, title, description, sortorder) or RAND()</td><td>sortorder   
</td></tr><tr><td>sortDir</td><td>Direction to sort the items ASC or DESC</td><td>ASC</td></tr><tr><td>limit</td><td>Limit the number of items to display</td><td>null</td></tr><tr><td>tags</td><td>Comma delimited set of tags to filter results by. Looks in the keywords field for the images.</td><td>null</td></tr><tr><td>tagMode</td><td>Search mode for tag: AND or OR</td><td>AND</td></tr><tr><td>tpl</td><td>Chunk template for the outer gallery template (defaults to tpl.default.txt for selected type). Placeholders: items</td><td>$this->config\['snippetPath'\] . $this->config\['type'\] . '/tpl.default.txt'</td></tr><tr><td>itemTpl</td><td>Chunk template for each thumbnail/image in the gallery. See below for available placeholders.</td><td>$this->config\['snippetPath'\] . $this->config\['type'\] . '/tpl.item.default.txt'   
</td></tr><tr><td>itemTplFirst</td><td>Chunk template for last thumbnail/image in the gallery (defaults to tpl.item.first.txt for selected type)</td><td>$this->config\['snippetPath'\] . $this->config\['type'\] . '/tpl.item.first.txt'</td></tr><tr><td>itemTplLast</td><td>Chunk template for last thumbnail/image in the gallery (defaults to tpl.item.last.txt for selected type)</td><td>$this->config\['snippetPath'\] . $this->config\['type'\] . '/tpl.item.last.txt'</td></tr><tr><td>itemTplAlt</td><td>Chunk template for alternate thumbnail/image in the gallery (defaults to tpl.item.alt.txt for selected type)</td><td>$this->config\['snippetPath'\] . $this->config\['type'\] . '/tpl.item.alt.txt'</td></tr><tr><td>itemAltNum</td><td>Modifier for the alternate thumbnail/image (defaults to every second item)</td><td>2</td></tr><tr><td>galleriesUrl</td><td>URL to the galleries directory (should contain folders with the Id of the document, with a thumbs/ folder within each document's gallery)</td><td>$modx->config\[ 'base\_url' \] . 'assets/galleries/'</td></tr><tr><td>galleriesPath</td><td>Path to the galleries directory</td><td>$modx->config\[ 'base\_path' \] . 'assets/galleries/'</td></tr><tr><td>snippetUrl</td><td>URL to the snippet directory</td><td>$modx->config\[ 'base\_url' \] . 'assets/snippets/evogallery/'</td></tr><tr><td>snippetPath</td><td>Path to the snippet directory</td><td>$modx->config\[ 'base\_path' \] . 'assets/snippets/evogallery/'</td></tr><tr><td>id</td><td>Unique ID for this EvoGallery instance and unique URL parameters</td><td>null   
</td></tr><tr><td>paginate   
</td><td>Paginate the results set into pages of &show length</td><td>0   
</td></tr><tr><td>paginateAlwaysShowLinks</td><td>Determine whether or not to always show previous next links</td><td>0   
</td></tr><tr><td>show</td><td>Number of images to display in the results when pagination on</td><td>20</td></tr><tr><td>paginateNextText</td><td>Text for next label</td><td>Next</td></tr><tr><td>paginatePreviousText</td><td>Text for previous label</td><td>Previous</td></tr><tr><td>tplPaginatePrevious</td><td>Template for the previous link</td><td><a href='\[<ins>url</ins>\]' class='eg\_previous\_link'>\[<ins>PaginatePreviousText</ins>\]</a></td></tr><tr><td>tplPaginateNext</td><td>Template for the next link</td><td><a href='\[<ins>url</ins>\]' class='eg\_next\_link'>\[<ins>PaginateNextText</ins>\]</a></td></tr><tr><td>tplPaginateNextOff</td><td>Template for the inside of the next link</td><td><span class='eg\_next\_off eg\_off'>\[<ins>PaginateNextText</ins>\]</span></td></tr><tr><td>tplPaginatePreviousOff</td><td>Template for the inside of the previous link</td><td><span class='eg\_previous\_off eg\_off'>\[<ins>PaginatePreviousText</ins>\]</span></td></tr><tr><td>tplPaginatePage</td><td>Template for the page link</td><td><a class='eg\_page' href='\[<ins>url</ins>\]'>\[<ins>page</ins>\]</a></td></tr><tr><td>tplPaginateCurrentPage</td><td>Template for the current page link</td><td><span class='eg\_currentpage'>\[<ins>page</ins>\]</span></td></tr></tbody></table>#### Examples

Output a list of images using the jQuery Cycle type (jquery-cycle):

```
<pre class="brush: php">
[[EvoGallery? &display=`images` &type=`jquery-cycle`]]

```Output a list of images using the jQuery Cycle type (jquery-cycle), sorted on the 'sortorder' variable:

```
<pre class="brush: php">
 [[EvoGallery? &display=`images` &type=`jquery-cycle` &sortBy=`sortorder`]]

```Output the galleries available in a specific container using a specific item template:

```
<pre class="brush: php">
[[EvoGallery? &display=`galleries` &docId=`22` &itemTpl=`galleryListItem`]]

```### Template Placeholders

Depending on the display type, there are several available placeholders which you may use in the chunks for the template parameters. You can also reference a template variable by its name. These placeholders have PHx enabled, so you may use specific PHx syntax in your templates.

<table><tbody><tr><th>Placeholder</th><th>Available in   
</th><th>Outputs   
</th></tr><tr><td>total   
</td><td>Gallery display   
</td><td>Total amount of images within the current gallery.   
</td></tr><tr><td>images\_dir   
</td><td>Gallery, single and images display   
</td><td>Image directory for the current gallery.   
</td></tr><tr><td>thumbs\_dir   
</td><td>Gallery, single and images display   
</td><td>Thumbnail directory for the current gallery.   
</td></tr><tr><td>original\_dir   
</td><td>Gallery, single and images display</td><td>Original image directory for current gallery.   
</td></tr><tr><td>plugin\_dir   
</td><td>Gallery, single and images display</td><td>URL path of current output type</td></tr><tr><td>id   
</td><td>Gallery, single and images display   
</td><td>In gallery display, this returns the document ID for the current gallery. In images and single view, this returns the unique ID (`picId`) for an image.   
</td></tr><tr><td>content\_id   
</td><td>Single and images display   
</td><td>Returns the document ID the image is linked to.   
</td></tr><tr><td>filename   
</td><td>Gallery, single and images display   
</td><td>The filename of the current image. In Gallery view, this is the first image of the gallery based on the `sortBy` and `sortOrder` parameters.   
</td></tr><tr><td>title   
</td><td>Single and images display   
</td><td>Title which has been specified in the backend.   
</td></tr><tr><td>description   
</td><td>Single and images display   
</td><td>Description which has been specified in the backend.   
</td></tr><tr><td>keywords   
</td><td>Single and images display   
</td><td>Comma delimited list of keywords for the image as specified in the backend.   
</td></tr><tr><td>sortorder   
</td><td>Single and images display   
</td><td>Sort number, based on the order in the backend. (_Please note that due to a bug in 1.0 beta1 the sortorder will not be properly saved to the database. For a fix refer to the_ _[forums](http://modxcms.com/forums/index.php/topic,49489.msg294113.html#msg294113 "http://modxcms.com/forums/index.php/topic,49489.msg294113.html#msg294113")__._)   
</td></tr><tr><td>Resource variables   
</td><td>Gallery display   
</td><td>The following resource variables are available in gallery display through placeholders:   
`id, pagetitle, longtitle, description, alias, pub_date, introtext, editedby, editedon, publishedon, publishedby, menutitle`  
</td></tr></tbody></table>### ManagerManager Function

Included in the distribution of EvoGallery is an optional function for the [ManagerManager](http://modxcms.com/extras/package/255) plugin that allows you to create a link directly to the section of EvoGallery that is related to a given page. This is a great help to content editors since they don't have to constantly click over to the EvoGallery module and drill down to manage the page they want.

To use the function, simply create a text template variable and name it whatever you want. Next, add the following call to your ManagerManager rules:

```
<pre class="brush: php">
mm_galleryLink($fields, $roles, $templates, $moduleid);

```- $fields should be replaced with the field name you want to affect. If you named your template variable 'gallery' you replace $fields with 'gallery'.
- $roles should be replaced with the IDs of the roles that should be affected or left empty to apply the rule to all roles.
- $templates contains the IDs of templates to apply the rule to, or can be left empty to apply to all templates.
- $moduleid is a custom variable specific to this function. It tells the function what module ID to use. To find out the ID of a module, simply copy the link to the module in the main menu. The ID will be part of the URL itself. E.g.: /manager/index.php?a=112&id=<ins>2</ins>. In this case, the $moduleid is 2.

Since EvoGallery 1.1 in the distribution is an optional widget for the ManagerManager plugin that allows you to create a tab within document editing page

```
<pre class="brush: php">
mm_widget_evogallery($moduleid, $title, $roles, $templates);

```- $moduleid is a custom variable specific to this function. It tells the function what module ID to use. To find out the ID of a module, simply copy the link to the module in the main menu. The ID will be part of the URL itself. E.g.: /manager/index.php?a=112&id=<ins>2</ins>. In this case, the $moduleid is 2.
- $title is display name of tab.
- $roles should be replaced with the IDs of the roles that should be affected or left empty to apply the rule to all roles.
- $templates contains the IDs of templates to apply the rule to, or can be left empty to apply to all templates.