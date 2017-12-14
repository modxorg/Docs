---
title: "sekUserGalleries.users.gallery.manage"
_old_id: "993"
_old_uri: "revo/sekusergalleries/sekusergalleries.users.gallery.manage"
---

What is users.gallery.manage?
-----------------------------

If the user is logged in and has permission to have a gallery, this will display the options the user has for their gallery. A title, description, and cover image.

Usage
-----

Example for users.gallery.manage:

```
<pre class="brush: php">
[[!users.gallery.manage]]

```You can also specify the template:

```
<pre class="brush: php">
[[!users.gallery.manage? &tplFormGallery=`users.gallery.form`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplFormGallery</td><td>The form container to edit the gallery settings.   
</td><td>users.gallery.form</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>