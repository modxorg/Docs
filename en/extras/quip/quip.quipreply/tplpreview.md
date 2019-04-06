---
title: "tplPreview"
_old_id: "967"
_old_uri: "revo/quip/quip.quipreply/quip.quipreply.tplpreview"
---

## QuipReply's tplPreview Chunk

The Chunk for [QuipReply](extras/quip/quip.quipreply "Quip.QuipReply")'s &tplPreview parameter. It is displayed when a user is previewing their soon-to-be-posted comment.

## Default Value

``` php
<div class="quip-comment quip-preview" id="quip-comment-preview-box-[[+idprefix]]">
    <div class="quip-comment-right">
        [[+gravatarUrl:notempty=`<img src="[[+gravatarUrl]]" class="quip-avatar" alt="" />`]]
    </div>

    <p class="quip-comment-meta">
        <span class="quip-comment-author">[[+username]]:</span><br />
        <span class="quip-comment-createdon">[[+createdon]]</span>
    </p>

<div class="quip-comment-body"><p>[[+comment]]</p></div>
    <br class="clear" />
</div>
```

## See Also

1. [Quip.Quip](extras/quip/quip.quip)
   1. [Quip.Quip.tplComment](extras/quip/quip.quip/quip.quip.tplcomment)
   2. [Quip.Quip.tplCommentOptions](extras/quip/quip.quip/quip.quip.tplcommentoptions)
   3. [Quip.Quip.tplComments](extras/quip/quip.quip/quip.quip.tplcomments)
   4. [Quip.Quip.tplReport](extras/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](extras/quip/quip.quipreply)
   1. [Quip.QuipReply.tplAddComment](extras/quip/quip.quipreply/quip.quipreply.tpladdcomment)
   2. [Quip.QuipReply.tplLoginToComment](extras/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
   3. [Quip.QuipReply.tplPreview](extras/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](extras/quip/quip.quiprss)
6. [Quip.Roadmap](extras/quip/quip.roadmap)
7. [Quip.Upgrading](extras/quip/quip.upgrading)
   1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/quip.upgrading-to-1.0.1)