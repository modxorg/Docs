---
title: "sekUserGalleries.album.items.manage"
_old_id: "986"
_old_uri: "revo/sekusergalleries/sekusergalleries.album.items.manage"
---

What is album.items.manage?
---------------------------

If the user is logged in and has permission to have a gallery, this will allow the user to add, edit, and remove items within an album.

Usage
-----

Example for album.items.manage:

```
<pre class="brush: php">
[[!album.items.manage]]

```You can also specify the template:

```
<pre class="brush: php">
[[!album.items.manage? &tplItemsForm=`album.items.form`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplItemsForm</td><td>The form container to add, edit, and delete album items.   
</td><td>album.items.form</td><td>>0.0.1</td></tr><tr><td>tplJsDisplay</td><td>Javascript code that displays the uploaded item information.   
</td><td>album.items.js.display</td><td>>0.0.1</td></tr><tr><td>tplJsUpload</td><td>Javascript code that displays the upload form for the album item.</td><td>album.items.js.upload</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>