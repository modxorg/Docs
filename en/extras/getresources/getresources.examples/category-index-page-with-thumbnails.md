---
title: "getResources.Category Index Page with Thumbnails"
_old_id: "888"
_old_uri: "revo/getresources/getresources.examples/getresources.category-index-page-with-thumbnails"
---

Make sure you get phpThumbOf as this does the magic of scaling your thumbnail images.

## The TV

We need to create a way to attach an image to each page.

1. Create a new TV and name it: page-thumbnail
2. Input type: Image
3. Select the proper templates in template access and save.

## The Chunks

I like to put my snippet calls in a chunk, this way the RTE doesn't turn the & into &amp;

Create a chunk and name it list-docs-thumb.

``` php
<div class="list-docs thumb grid">
    [[!getResources?  
        &parents=`[[*id]]`
        &tpl=`list-docs-thumb-tpl`  
        &limit=`100`  
        &sortdir=`ASC`  
        &includeTVs=`1`  
        &includeContent=`1`
        &depth=`0`  
        &sortby=`menuindex`  
    ]]  
</div><!-- eof list-docs -->?
```

 **Create a second chunk for the getResources template, name it: list-docs-thumb-tpl** (see what I did there? Naming conventions are your friend.)

``` php
<div class="list-item column span-6">
    <h2>[[+pagetitle]]</h2>
    <a href="[[~[[+id]]]]" title="[[+pagetitle]]">
        <img src="[[+tv.page-thumb:phpthumbof=`w=153&h=200&zc=1`]]" alt="[[+pagetitle]]" />
    </a>  
    <p>[[+introtext]]</p>
</div>  <!-- eof item -->?
```

## Installation

Now just paste `[[$list-docs-thumb]]` into any page with child pages and TV's set and away you go.

You should be able to pick up a little bit of speed by omitting the &includeContent parameter if you're not using the content in the template :)

Note that this specific example requires phpThumbOf to be installed to display the images - it can be gotten through the package manager.

Use ```&tvFilters=`page-thumb==%` ``` to skip resources with empty TV
