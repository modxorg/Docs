---
title: "tplReport"
_old_id: "961"
_old_uri: "revo/quip/quip.quip/quip.quip.tplreport"
---

## Quip's tplReport Chunk

This is the Chunk displayed with the &tplReport property on the [Quip.Quip](extras/quip/quip "Quip.Quip") snippet.

Displays a 'Report as Spam' link for a comment.

## Default Value

```php
<span class="quip-comment-report">
    [[+reported:empty=`<a href="[[+reportUrl]]">[[%quip.report_as_spam]]</a>`]]
    [[+reported:notempty=`<span>[[%quip.reported_as_spam]]</span>`]]
</span>
```

## Available Placeholders

All of the placeholders in [tplComment](extras/quip/quip/tplcomment "Quip.Quip.tplComment") are available here, plus:

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| reported | Whether or not this comment has been reported as spam. |

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
