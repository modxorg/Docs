---
title: "sekUserGalleries.album.view"
_old_id: "988"
_old_uri: "revo/sekusergalleries/sekusergalleries.album.view"
---

What is album.view?
-------------------

This snippet displays the selected album information and the album items.

Usage
-----

Example for album.view:

```
<pre class="brush: php">
[[!album.view]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!album.view? &tplAlbum=`album.view` &tplAlbumItems=`album.items.list`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplAlbum</td><td>The container to use to hold the album information and the album items.   
</td><td>album.view</td><td>>0.0.1</td></tr><tr><td>tplAlbumItems</td><td>The list of album items to display in the tplAlbum template.   
</td><td>album.items.list</td><td>>0.0.1</td></tr><tr><td>tplAltItems</td><td>A list of alternate image links that are defined by the image sizes in the manager that is not the primary image.   
</td><td>album.items.alt</td><td>>0.0.1</td></tr><tr><td>tplPasswordForm</td><td>The template to display when a password is required to view the album.   
</td><td>album.password.form</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>