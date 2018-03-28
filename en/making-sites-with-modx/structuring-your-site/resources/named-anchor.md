---
title: "Named Anchor"
_old_id: "207"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/named-anchor"
---

## What is a Named Anchor?

A named anchor is a link to content within the current resource.

A typical named anchor will be similar to:

> <a name="prohibited"></a>

The problem with using named anchors with MODX and friendly URLs enabled, is that the <base href=""> tag, which is required to maintain relative urls, will confuse browsers, thinking that any anchors point to the base href page which would usually be your homepage. Luckily - nothing is impossible with MODX, and there are (at least) two ways to overcome this issue.

## Accessing the Named Anchor by adding the URL manually

To generate a link to the current Resource, while using a named anchor of "prohibited":

``` php 
<a href="[[~[[*id]]]]#prohibited">Prohibited Activities</a>
```

To generate a link to a Resource with ID 12, while using a named anchor of "prohibited":

``` php 
<a href="[[~12]]#prohibited">Prohibited Activities</a>
```

## Using a Plugin to automatically add the URL when using anchors

Alternatively, you could use a plugin to automatically prepend a link to the current resource before the actual anchor.

Put the following code into a new plugin, and on the System Events tab assign it to the "OnWebPagePrerender" event (based on [this post](http://forums.modx.com/thread/35800/plugin-anchorsaway?page=3#dis-post-199475)).

``` php 
if($modx->resource->get('id') !=$modx->config['site_start']) {  $modx->resource->_output =str_replace('href="#','href="' .$modx->makeUrl($modx->resource->get('id')) .'#',$modx->resource->_output);}
```

The code first makes sure we are not on the homepage (if we are, there is no need to add the url to the page). When we're not it will replace any occurrences of href="# with href="link-to-page.html#, making sure your anchors will work as intended.

With this solution, you can still refer to anchors on other pages using the second example above.