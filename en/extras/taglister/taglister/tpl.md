---
title: "tpl"
_old_id: "1017"
_old_uri: "revo/taglister/taglister.taglister/taglister.taglister.tpl"
---

## tagLister's tpl Chunk

This is the Chunk displayed with the &tpl property on the [tagLister](/extras/taglister/taglister.taglister "tagLister.tagLister") snippet.

## Default Value

``` php 
<li class="[[+cls]]">
<a href="[[~[[+target]]? &[[+tagVar]]=`[[+tag]]`]]">[[+tag]]</a> ([[+count]])
</li>
```

## Available Placeholders

| Name   | Description                            |
| ------ | -------------------------------------- |
| tag    | The current tag.                       |
| tagVar | The REQUEST var specifying the tag.    |
| target | The target Resource ID to link to.     |
| count  | The number of Resources with this tag. |
| cls    | The CSS class to put on the LI tag.    |

## See Also

1. [tagLister.getResourcesTag](/extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/taglister/taglister.taglister)
  1. [tagLister.tagLister.all](/extras/taglister/taglister.taglister/taglister.taglister.all)
  2. [tagLister.tagLister.tpl](/extras/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/taglister/taglister.tolinks)
  1. [tagLister.tolinks.tpl](/extras/taglister/taglister.tolinks/taglister.tolinks.tpl)