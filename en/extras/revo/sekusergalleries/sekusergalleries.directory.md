---
title: "sekUserGalleries.directory"
_old_id: "990"
_old_uri: "revo/sekusergalleries/sekusergalleries.directory"
---

What is directory?
------------------

This snippet displays the the amount of space is used and how much space is available for the user to use.

Usage
-----

Example for directory:

```
<pre class="brush: php">
[[!directory]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!directory? &tplDirContainer=`directory.container` &tplDirGraph=`directory.bargraph`]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>tplDirContainer</td><td>The container to use to hold the bar graph.   
</td><td>directory.container</td><td>>0.0.1</td></tr><tr><td>tplDirGraph</td><td>The bar graph showing stats.   
</td><td>directory.bargraph</td><td>>0.0.1</td></tr><tr><td>loadjquery</td><td>This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.   
</td><td>load\_jquery system setting</td><td>>0.0.3</td></tr><tr><td>customcss</td><td>To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`").</td><td> </td><td>>0.0.3</td></tr><tr><td>graphcss</td><td>Like customcss, this will load the css file that defines the bar graph appearance.   
</td><td> </td><td>>0.0.3</td></tr></tbody></table>