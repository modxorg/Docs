---
title: "tplComments"
_old_id: "960"
_old_uri: "revo/quip/quip.quip/quip.quip.tplcomments"
---

## Quip's tplComments Chunk

This is the Chunk displayed with the &tplComments property on the [Quip.Quip](extras/quip/quip "Quip.Quip") snippet. Only applicable when &useWrapper is set to 1 in the Quip snippet (which it is by default).

This chunk wraps the comments for a thread, and provides a heading with the total number of comments.

## Default Value

```php
<div class="quip">
    <h3>[[%quip.comments]] ([[+total]])</h3>

<div id="quip-topofcomments-[[+idprefix]]"></div>

    [[+comments:notempty=`<ol class="quip-comment-list">
    [[+comments]]
    </ol>`]]

    [[+pagination]]
</div>
```

## Available Placeholders

| Name     | Description                                   |
| -------- | --------------------------------------------- |
| comments | The comments for the thread.                  |
| total    | The total number of comments for this thread. |
| idprefix | The ID prefix for the thread's comments.      |

## See Also

1. [Quip.Quip](extras/quip/quip)
    1. [Quip.Quip.tplComment](extras/quip/quip/tplcomment)
    2. [Quip.Quip.tplCommentOptions](extras/quip/quip/tplcommentoptions)
    3. [Quip.Quip.tplComments](extras/quip/quip/tplcomments)
    4. [Quip.Quip.tplReport](extras/quip/quip/tplreport)
2. [Quip.QuipCount](extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](extras/quip/quip.quipreply)
    1. [Quip.QuipReply.tplAddComment](extras/quip/quip.quipreply/tpladdcomment)
    2. [Quip.QuipReply.tplLoginToComment](extras/quip/quip.quipreply/tpllogintocomment)
    3. [Quip.QuipReply.tplPreview](extras/quip/quip.quipreply/tplpreview)
5. [Quip.QuipRss](extras/quip/quip.quiprss)
6. [Quip.Upgrading](extras/quip/quip.upgrading)
    1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/upgrading-to-1.0.1)
