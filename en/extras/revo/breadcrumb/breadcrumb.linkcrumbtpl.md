---
title: "BreadCrumb.linkCrumbTpl"
_old_id: "798"
_old_uri: "revo/breadcrumb/breadcrumb.linkcrumbtpl"
---

BreadCrumb's linkCrumbTpl Chunk
-------------------------------

This is the chunk displayed with the &linkCrumbTpl property on the [BreadCrumb](/extras/revo/breadcrumb "BreadCrumb") snippet. Used for the crumb (except the current one).

Default Value
-------------

<div class="info">Since BreadCrumb 1.3.0, linkCrumbTpl is no longer a chunk but a snippet property.   
 Templates properties can be chunk name, file path (@FILE:) or chunk code (@CODE:)</div> ```
<pre class="brush: php"><li><a href="[[+link]]">[[+pagetitle]]</a></li>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th> <th>Description</th> </tr><tr><td>link</td> <td>A link to the resource of the crumb.   
 If you use the _&useWebLinkUrl=`1`_ property, the link will be the resource linked and   
 useWebLinkUrl   
</td> </tr><tr><td>id   
 pagetitle   
 longtitle   
 description   
 menutitle   
 ...   
</td> <td>All properties of the resource are output to their appropriate placeholders. </td></tr></tbody></table>