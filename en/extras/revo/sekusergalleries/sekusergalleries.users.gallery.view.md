---
title: "sekUserGalleries.users.gallery.view"
_old_id: "994"
_old_uri: "revo/sekusergalleries/sekusergalleries.users.gallery.view"
---

What is users.gallery.view?
---------------------------

This snippet displays the albums for the selected user's gallery. Each user that has the correct permissions can create a single gallery. The gallery itself holds the albums, there is no limit on the number of albums that can be created. If no gallery is specified in the url when accessing this page, and a user is logged in and has permission to have a gallery, this will default to that user's gallery page.

Usage
-----

Example for users.gallery.view:

```
<pre class="brush: php">
[[!users.gallery.view]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!users.gallery.view? &tplGallery=`users.gallery.view` &tplAlbumList=`users.gallery.albumlist`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplGallery</td><td>The container to use to hold the gallery information and the albums.   
</td><td>users.gallery.view</td><td>>0.0.1</td></tr><tr><td>tplAlbumList</td><td>The list of albums.   
</td><td>users.gallery.albumlist</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>