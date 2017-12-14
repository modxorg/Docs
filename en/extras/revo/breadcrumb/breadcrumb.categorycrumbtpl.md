---
title: "BreadCrumb.categoryCrumbTpl"
_old_id: "1726"
_old_uri: "revo/breadcrumb/breadcrumb.categorycrumbtpl"
---

BreadCrumb's categoryCrumbTpl Chunk
-----------------------------------

 This is the chunk displayed with the &categoryCrumbTpl property on the [BreadCrumb](http://rtfm.modx.com/extras/revo/breadcrumb) snippet. Used for the crumb (except the current one) whose resources are "Category".

 A resource is a "Category" if it's a folder and if it doesn't have template or have a link attribute equals to _rel="category" ._

Default Value
-------------

 Templates properties can be chunk name, file path (@FILE ) or chunk code (@INLINE )

 ```
<pre class="brush: php">
<li><a href="[[+link]]">[[+pagetitle]]</a></li>

```Available Placeholders
----------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> link </td> <td> A link to the resource of the crumb.   
 If you use the _&useWebLinkUrl=`1`_ property, the link will be the resource linked and   
 useWebLinkUrl </td> </tr><tr><td> id   
 pagetitle   
 longtitle   
 description   
 menutitle   
 ... </td> <td> All properties of the resource are output to their appropriate placeholders. </td></tr></tbody></table>