---
title: "all"
_old_id: "1016"
_old_uri: "revo/taglister/taglister.taglister/taglister.taglister.all"
---

## tagLister's all Chunk

This is the Chunk displayed with the &all property on the [tagLister](extras/taglister/taglister "tagLister") snippet.

## Default Value

```php
<li class="[[+cls]]">
<a href="[[~[[+target]]? &[[+tagVar]]=``]]">[[+tag]]</a> ([[+count]])
</li>
```

## Available Placeholders

| Name   | Description                               |
| ------ | ----------------------------------------- |
| tag    | The text for the All Tags link.           |
| tagVar | The REQUEST var specifying the tag param. |
| target | The target Resource ID to link to.        |
| count  | The number of Resources with tags.        |
| cls    | The CSS class to put on the LI tag.       |

## See Also

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
