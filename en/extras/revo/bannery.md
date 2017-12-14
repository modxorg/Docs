---
title: "BannerY"
_old_id: "607"
_old_uri: "revo/bannery"
---

BannerY
=======

Display images with hyperlinks at designated positions in a page. Fork from Jeroen Kenters BannerX (it was removed from MODX repository by author).

Usage
-----

```
<pre class="brush: php">
[[BannerY? &position=`1` &sortby=`RAND()` &limit=`1`]]

```This will retrieve randomly one banner that is set to be active for assigned position 1.

Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>tpl</td><td>Name of a chunk serving as a recourse template</td><td>byAd</td></tr><tr><td>sortdir</td><td>Order of the results</td><td>ASC</td></tr><tr><td>sortby</td><td>Return results in random order</td><td>RAND()</td></tr><tr><td>limit</td><td>If set to non-zero, will only show X number of items</td><td>5</td></tr><tr><td>position</td><td>If set to non-zero, will retrieve only images that are assigned to the position given.</td><td>0</td></tr></tbody></table>Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>adposition</td><td> </td></tr><tr><td>idx</td><td>The index of banner in this position</td></tr><tr><td>image</td><td>The image assigned to this banner</td></tr><tr><td>name</td><td>The name assigned to this banner</td></tr><tr><td>url</td><td>The url assigned to this banner</td></tr><tr><td>description   
</td><td>Any text message for this banner</td></tr></tbody></table>