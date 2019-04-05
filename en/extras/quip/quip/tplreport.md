---
title: "tplReport"
_old_id: "961"
_old_uri: "revo/quip/quip.quip/quip.quip.tplreport"
---

## Quip's tplReport Chunk

This is the Chunk displayed with the &tplReport property on the [Quip.Quip](/extras/revo/quip/quip.quip "Quip.Quip") snippet.

Displays a 'Report as Spam' link for a comment.

## Default Value

``` php 
<span class="quip-comment-report">
    [[+reported:empty=`<a href="[[+reportUrl]]">[[%quip.report_as_spam]]</a>`]]
    [[+reported:notempty=`<span>[[%quip.reported_as_spam]]</span>`]]
</span>
```

## Available Placeholders

All of the placeholders in [tplComment](/extras/revo/quip/quip.quip/quip.quip.tplcomment "Quip.Quip.tplComment") are available here, plus:

| Name | Description |
|------|-------------|
| reported | Whether or not this comment has been reported as spam. |

## See Also

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