---
title: "tpl"
_old_id: "780"
_old_uri: "revo/archivist/archivist.getarchives/archivist.getarchives.tpl"
---

## getArchives tpl Chunk

This is the Chunk displayed with the &tpl property on the [Archivist](/extras/revo/archivist/archivist.getarchives "Archivist.getArchives") snippet.

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

Any field on a Resource is available to use as a property. The Chunk is similar to how [getResources](/extras/revo/getresources "getResources")'s tpl property works.

## See Also

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  1. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)