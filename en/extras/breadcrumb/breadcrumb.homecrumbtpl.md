---
title: "homeCrumbTpl"
_old_id: "1727"
_old_uri: "revo/breadcrumb/breadcrumb.homecrumbtpl"
---

 BreadCrumb's homeCrumbTpl Chunk

 This is the chunk displayed with the &linkCrumbTpl property on the [BreadCrumb](http://rtfm.modx.com/extras/revo/breadcrumb) snippet. Used for the crumb (except the current one).

## Default Value

 Since BreadCrumb 1.3.0, linkCrumbTpl is no longer a chunk but a snippet property.

 Templates properties can be chunk name, file path (@FILE) or chunk code (@INLINE )

 ``` php
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
```

## Available Placeholders

 | Name                                             | Description                                                                            |
 | ------------------------------------------------ | -------------------------------------------------------------------------------------- |
 | link                                             | A link to the resource of the crumb.                                                   |
 | useWebLinkUrl                                    | If you use the _&useWebLinkUrl=`1`_ property, the link will be the resource linked and |
 | id pagetitle longtitle description menutitle ... | All properties of the resource are output to their appropriate placeholders.           |
