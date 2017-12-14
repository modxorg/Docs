---
title: "BreadCrumb.containerTpl"
_old_id: "796"
_old_uri: "revo/breadcrumb/breadcrumb.containertpl"
---

BreadCrumb's containerTpl
-------------------------

 This is the chunk displayed with the &containerTpl property on the [BreadCrumb](/extras/revo/breadcrumb "BreadCrumb") snippet. Contains the list of crumbs.

Default Value
-------------

<div class="info"> Since BreadCrumb 1.3.0, containerTpl is no longer a chunk but a snippet property.   
 Templates properties can be chunk name, file path (@FILE:) or chunk code (@CODE:) </div> ```
<pre class="brush: php">
@CODE : 
<ul id="breadcrumb" itemprop="breadcrumb">
  <li><a href="[[++site_url]]">[[++site_name]]</a></li>
  [[+crumbs]]
</ul>

```Available Placeholders
----------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> crumbs </td> <td> The list of crumbs </td></tr></tbody></table>