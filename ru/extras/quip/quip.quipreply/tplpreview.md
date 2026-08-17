---
title: "tplPreview"
description: "Чанк tplPreview для предпросмотра комментария в сниппете QuipReply"
translation: "extras/quip/quip.quipreply/tplpreview"
---

## Чанк tplPreview QuipReply

Чанк для параметра &tplPreview [QuipReply](extras/quip/quip.quipreply "Quip.QuipReply"). Показывается, когда пользователь просматривает комментарий перед публикацией.

## Значение по умолчанию

```php
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

## См. также

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
