---
title: "tpl"
description: "Chunk tpl сниппета getArchives: шаблон вывода записей архива"
translation: "extras/archivist/archivist.getarchives/tpl"
---

## Chunk tpl getArchives

Это chunk, который выводится через параметр &tpl сниппета [getArchives](extras/archivist/archivist.getarchives "Archivist.getArchives").

## Значение по умолчанию

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

## Доступные плейсхолдеры

Любое поле ресурса доступно как плейсхолдер. Chunk работает так же, как параметр tpl у [getResources](extras/getresources "getResources").

## См. также

1. [Archivist.Archivist](extras/archivist/archivist)
   1. [Archivist.Archivist.tpl](extras/archivist/archivist/tpl)
2. [Archivist.ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](extras/archivist/archivist.getarchives)
   1. [Archivist.getArchives.tpl](extras/archivist/archivist.getarchives/tpl)
