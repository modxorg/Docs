---
title: "currentCrumbTpl"
_old_id: "797"
_old_uri: "revo/breadcrumb/breadcrumb.currentcrumbtpl"
---

## BreadCrumb's currentCrumbTpl Chunk

This is the chunk displayed with the ¤tCrumbTpl property on the [BreadCrumb](/extras/revo/breadcrumb "BreadCrumb") snippet. Used for the current crumb.

## Default Value

Since BreadCrumb 1.3.0, currentCrumbTpl is no longer a chunk but a snippet property. 
 Templates properties can be chunk name, file path (@FILE:) or chunk code (@CODE:)

 ``` php 
<li>[[+pagetitle]]</li>

```

## Available Placeholders

| Name | Description |
|------|-------------|
| link | A link to the resource of the crumb. 
 If you use the _&useWebLinkUrl=`1`_ property, the link will be the resource linked and 
 useWebLinkUrl |
| id 
 pagetitle 
 longtitle 
 description 
 menutitle 
 ... | All properties of the resource are output to their appropriate placeholders. |

## Examples

By default the current crumb isn't a link but it's very easy to change that. Replace the chunk by :

``` php 
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
```