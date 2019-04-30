---
title: "tpl"
_old_id: "780"
_old_uri: "revo/archivist/archivist.getarchives/archivist.getarchives.tpl"
---

## getArchives tpl Chunk

This is the Chunk displayed with the &tpl property on the [Archivist](extras/archivist/archivist.getarchives "Archivist.getArchives") snippet.

## Default Value

``` php
<div class="post">
    <h2 class="title"><a href="[[~[[+id]]]]">[[+pagetitle]]</a></h2>
    <p class="post-info">Posted by [[+createdby:userinfo=`fullname`]]</p>
    <div class="entry">
        <p>[[+introtext:default=`[[+content:ellipsis=`100`]]`]]</p>
    </div>
    <p class="postmeta">
      <span class="links">
<a href="[[~[[+id]]]]" class="readmore">Read more</a>
| <span class="date">[[+publishedon:strtotime:date=`%b %d, %Y`]]</span>
      </span>
    </p>
</div>
```

## Available Placeholders

Any field on a Resource is available to use as a property. The Chunk is similar to how [getResources](extras/getresources "getResources")'s tpl property works.

## See Also

1. [Archivist.Archivist](extras/archivist/archivist)
   1. [Archivist.Archivist.tpl](extras/archivist/archivist/tpl)
2. [Archivist.ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](extras/archivist/archivist.getarchives)
   1. [Archivist.getArchives.tpl](extras/archivist/archivist.getarchives/tpl)
