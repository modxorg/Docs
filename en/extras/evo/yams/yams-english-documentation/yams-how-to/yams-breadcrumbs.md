---
title: "YAMS + Breadcrumbs"
_old_id: "1681"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-breadcrumbs"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Breadcrumbs](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-breadcrumbs)</td></tr></table></div>How can I make Breadcrumbs work with YAMS?
==========================================

Two options are available.

Option 1
--------

A YAMS customised version of the Breadcrumbs snippet version 1.0.1 is available. To use this create a new snippet called BreadcrumbsYAMS, which has the following code:

```
<pre class="brush: php">
<?php
return require( $modx->config['site_path'] . 'assets/modules/yams/snippets/breadcrumbs.101.yams.snippet.php' );
?>

```Then call the snippet with an additional language id parameter: `&langid=`(yams_id)``. For example:

```
<pre class="brush: php">
[[BreadcrumbsYAMS? &langid=`(yams_id)`]]

```<div class="warning">**Warning**  
Please note that this version of the breadcrumbs snippet will not resolve weblinks. To do that, please see [the instructions on the known issues page of the YAMS forums](http://modxcms.com/forums/index.php/topic,43846.msg264300.html#msg264300).</div>Option 2
--------

The second option is to use Wayfinder to generate the Breadcrumbs. [@French Fries](http://modxcms.com/forums/index.php?action=profile;u=16271) has kindly provided some templates that can be customised as required. To use them, the Wayfinder call should look something like this:

```
<pre class="brush: php">
<span class="crumbBox"> [[Wayfinder? &startId=`0` &displayStart=`1` &textOfLinks=`menutitle` &level=`6` &titleOfLinks=`longtitle` &hideSubMenus=`true` &rowIdPrefix=`` &sortBy=`id` &sortOrder=`asc` &hereTpl=`@FILE:assets/modules/yams/tpl/wayfinder/doc/breadcrumbs/here.tpl` &activeParentRowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/doc/breadcrumbs/activeparentrow.tpl` &rowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/doc/breadcrumbs/row.tpl` &outerTpl=`@FILE:assets/modules/yams/tpl/wayfinder/doc/breadcrumbs/outer.tpl` ]] </span>

```