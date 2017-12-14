---
title: "Quip.QuipReply.tplPreview"
_old_id: "967"
_old_uri: "revo/quip/quip.quipreply/quip.quipreply.tplpreview"
---

QuipReply's tplPreview Chunk
----------------------------

The Chunk for [QuipReply](/extras/revo/quip/quip.quipreply "Quip.QuipReply")'s &tplPreview parameter. It is displayed when a user is previewing their soon-to-be-posted comment.

Default Value
-------------

```
<pre class="brush: php">
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

```See Also
--------

1. [Quip.Quip](/extras/revo/quip/quip.quip)
  1. [Quip.Quip.tplComment](/extras/revo/quip/quip.quip/quip.quip.tplcomment)
  2. [Quip.Quip.tplCommentOptions](/extras/revo/quip/quip.quip/quip.quip.tplcommentoptions)
  3. [Quip.Quip.tplComments](/extras/revo/quip/quip.quip/quip.quip.tplcomments)
  4. [Quip.Quip.tplReport](/extras/revo/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](/extras/revo/quip/quip.quipcount)
3. [Quip.QuipLatestComments](/extras/revo/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](/extras/revo/quip/quip.quipreply)
  1. [Quip.QuipReply.tplAddComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpladdcomment)
  2. [Quip.QuipReply.tplLoginToComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
  3. [Quip.QuipReply.tplPreview](/extras/revo/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](/extras/revo/quip/quip.quiprss)
6. [Quip.Roadmap](/extras/revo/quip/quip.roadmap)
7. [Quip.Upgrading](/extras/revo/quip/quip.upgrading)
  1. [Quip.Upgrading to 1.0.1](/extras/revo/quip/quip.upgrading/quip.upgrading-to-1.0.1)