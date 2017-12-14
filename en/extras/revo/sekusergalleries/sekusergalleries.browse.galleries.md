---
title: "sekUserGalleries.browse.galleries"
_old_id: "989"
_old_uri: "revo/sekusergalleries/sekusergalleries.browse.galleries"
---

What is browse.galleries?
-------------------------

List of the galleries on the site.

Usage
-----

Example for browse.galleries:

```
<pre class="brush: php">
[[!browse.galleries]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!users.gallery.view? &tplContainer=`browse.galleries.container` &tplRow=`browse.galleries.row`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplContainer</td><td>The container to use to hold the gallery list.   
</td><td>browse.galleries.container</td><td>>0.0.1</td></tr><tr><td>tplRow</td><td>The list of galleries displayed in the tplContainer.   
</td><td>browse.galleries.row</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>