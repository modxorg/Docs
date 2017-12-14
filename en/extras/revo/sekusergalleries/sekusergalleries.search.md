---
title: "sekUserGalleries.search"
_old_id: "992"
_old_uri: "revo/sekusergalleries/sekusergalleries.search"
---

What is search?
---------------

This snippet displays the selected album information and the album items.

Usage
-----

Example for search:

```
<pre class="brush: php">
[[!search]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!search? &tplContainer=`search.container` &tplAlbumList=`users.gallery.albumlist`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplContainer</td><td>The container to use to hold the search results.   
</td><td>search.container</td><td>>0.0.1</td></tr><tr><td>tplAlbumList</td><td>The list of albums to display in the tplContainer template.   
</td><td>users.gallery.albumlist</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr></tbody></table>