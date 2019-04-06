---
title: "containerTpl"
_old_id: "796"
_old_uri: "revo/breadcrumb/breadcrumb.containertpl"
---

## BreadCrumb's containerTpl

 This is the chunk displayed with the &containerTpl property on the [BreadCrumb](extras/breadcrumb "BreadCrumb") snippet. Contains the list of crumbs.

## Default Value

 Since BreadCrumb 1.3.0, containerTpl is no longer a chunk but a snippet property.
 Templates properties can be chunk name, file path (@FILE:) or chunk code (@CODE:)

 ``` php
@CODE :
<ul id="breadcrumb" itemprop="breadcrumb">
  <li><a href="[[++site_url]]">[[++site_name]]</a></li>
  [[+crumbs]]
</ul>
```

## Available Placeholders

 | Name   | Description        |
 | ------ | ------------------ |
 | crumbs | The list of crumbs |
