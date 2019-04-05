---
title: "tpl"
_old_id: "1019"
_old_uri: "revo/taglister/taglister.tolinks/taglister.tolinks.tpl"
---

## tolinks's tpl Chunk

This is the Chunk displayed with the &tpl property on the [tagLister](/extras/revo/taglister/taglister.tolinks "tagLister.tolinks") snippet.

## Default Value

``` php 
<a href="[[+url]]" class="[[+cls]]">[[+item]]</a>
```

## Using Full URLs

If you need to generate a full URL to page containing your [getResourcesTag](/extras/revo/taglister/taglister.getresourcestag "tagLister.getResourcesTag") Snippet, try using something like the following:

``` php 
<a href="[[++site_url]][[+url]]" class="[[+cls]]">[[+item]]</a>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| item | The text of each item. |
| url | The generated URL for each link. |
| cls | The CSS class for each item. |

## See Also

1. [tagLister.getResourcesTag](/extras/revo/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/revo/taglister/taglister.taglister)
  1. [tagLister.tagLister.all](/extras/revo/taglister/taglister.taglister/taglister.taglister.all)
  2. [tagLister.tagLister.tpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/revo/taglister/taglister.tolinks)
  1. [tagLister.tolinks.tpl](/extras/revo/taglister/taglister.tolinks/taglister.tolinks.tpl)