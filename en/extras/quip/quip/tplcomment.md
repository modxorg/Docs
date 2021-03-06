---
title: "tplComment"
_old_id: "958"
_old_uri: "revo/quip/quip.quip/quip.quip.tplcomment"
---

## Quip's tplComment Chunk

This is the Chunk displayed with the &tplComment property on the [Quip.Quip](extras/quip/quip "Quip.Quip") snippet.

## Default Value

```html
<li class="[[+cls]]" id="[[+idprefix]][[+id]]" [[+depth_margin:notempty=`style="padding-left: [[+depth_margin]]px"`]]>
<div id="[[+idprefix]][[+id]]-div" class="quip-comment-body [[+alt]]">
    <div class="quip-comment-right">
        [[+gravatarUrl:notempty=`<img src="[[+gravatarUrl]]" class="quip-avatar" alt="" />`]]
    </div>

    <p class="quip-comment-meta">
        <span class="quip-comment-author">[[+authorName]]:</span><br />
        <span class="quip-comment-createdon"><a href="[[+url]]">[[+createdon]]</a>
        [[+approved:if=`[[+approved]]`:is=`1`:then=``:else=`- <em>[[%quip.unapproved? &namespace=`quip` &topic=`default`]]</em>`]]
        </span>
    </p>

    <div class="quip-comment-text">
        <p>[[+body]]</p>

        [[+replyUrl:notempty=`<p><span class="quip-reply-link"><a href="[[+replyUrl]]">[[%quip.reply? &namespace=`quip` &topic=`default`]]</a></span></p>`]]
    </div>

    <div class="quip-comment-options">
        [[+report]]
        [[+options]]
    </div>
    <div class="quip-break"></div>
</div>
    [[+children:notempty=`<ol class="quip-comment-list">[[+children]]</ol>`]]
</li>
```

## Available Placeholders

| Name         | Description                                                                                                 |
| ------------ | ----------------------------------------------------------------------------------------------------------- |
| thread       | The thread of the comment.                                                                                  |
| parent       | The comment's parent. Defaults to 0.                                                                        |
| resource     | The ID of the resource associated with the thread of this comment.                                          |  |
| rank         | The comment's rank.                                                                                         |
| author       | The ID of the User who posted this comment. Only applies if the user was logged-in; otherwise it will be 0. |
| body         | The text of the comment.                                                                                    |
| createdon    | The timestamp of when this comment was created.                                                             |
| editedon     | The timestamp of when this comment was last edited.                                                         |
| approved     | Whether or not this comment has been approved.                                                              |
| approvedby   | The ID of the User who approved this comment. 0 if moderation is disabled.                                  |
| approvedon   | A timestamp of when this comment was approved.                                                              |
| name         | The name of the author of the comment.                                                                      |
| email        | The email of the author of the comment.                                                                     |
| website      | The website of the author of the comment, if provided.                                                      |
| ip           | The IP that this comment was posted from.                                                                   |
| deleted      | Whether or not this comment has been deleted.                                                               |
| deletedon    | The timestamp when this comment was deleted. Empty if not deleted.                                          |
| deletedby    | The User ID of the user who deleted this comment. 0 if not deleted.                                         |
| idx          | The index of the current row iteration.                                                                     |
| alt          | Whether or not this is an alternate row.                                                                    |
| url          | The direct URL of the comment.                                                                              |
| threaded     | Whether or not the comment is in a thread with threading support.                                           |
| depth        | The depth of the comment.                                                                                   |
| depth_margin | The margin in pixels of the comment, due to the depth.                                                      |
| cls          | The CSS class applied to the comment.                                                                       |
| md5email     | The email of the author of the comment, md5'ed.                                                             |
| gravatarIcon | The Gravatar icon type.                                                                                     |
| gravatarSize | The Gravatar icon size.                                                                                     |
| allowRemove  | Whether or not the current user can remove this comment.                                                    |
| reported     | If this comment has been reported as spam.                                                                  |
| options      | Any moderation options for the comment.                                                                     |
| report       | The link to report this comment as spam.                                                                    |
| authorName   | The name of the author of the comment.                                                                      |
| replyUrl     | The URL for threaded comments where the reply form is located.                                              |

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
