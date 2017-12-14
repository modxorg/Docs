---
title: "Quip.Quip.tplComment"
_old_id: "958"
_old_uri: "revo/quip/quip.quip/quip.quip.tplcomment"
---

Quip's tplComment Chunk
-----------------------

This is the Chunk displayed with the &tplComment property on the [Quip.Quip](/extras/revo/quip/quip.quip "Quip.Quip") snippet.

Default Value
-------------

```
<pre class="brush: php"><li class="[[+cls]]" id="[[+idprefix]][[+id]]" [[+depth_margin:notempty=`style="padding-left: [[+depth_margin]]px"`]]>
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

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th> <th>Description</th> </tr><tr><td>thread</td> <td>The thread of the comment.</td> </tr><tr><td>parent</td> <td>The comment's parent. Defaults to 0.</td> </tr><tr><td>resource</td><td>The ID of the resource associated with the thread of this comment.</td> </tr><tr><td>rank</td> <td>The comment's rank.</td> </tr><tr><td>author</td> <td>The ID of the User who posted this comment. Only applies if the user was logged-in; otherwise it will be 0.</td> </tr><tr><td>body</td> <td>The text of the comment.</td> </tr><tr><td>createdon</td> <td>The timestamp of when this comment was created.</td> </tr><tr><td>editedon</td> <td>The timestamp of when this comment was last edited.</td> </tr><tr><td>approved</td> <td>Whether or not this comment has been approved.</td> </tr><tr><td>approvedby</td> <td>The ID of the User who approved this comment. 0 if moderation is disabled.</td> </tr><tr><td>approvedon</td> <td>A timestamp of when this comment was approved.</td> </tr><tr><td>name</td> <td>The name of the author of the comment.</td> </tr><tr><td>email</td> <td>The email of the author of the comment.</td> </tr><tr><td>website</td> <td>The website of the author of the comment, if provided.</td> </tr><tr><td>ip</td> <td>The IP that this comment was posted from.</td> </tr><tr><td>deleted</td> <td>Whether or not this comment has been deleted.</td> </tr><tr><td>deletedon</td> <td>The timestamp when this comment was deleted. Empty if not deleted.</td> </tr><tr><td>deletedby</td> <td>The User ID of the user who deleted this comment. 0 if not deleted.</td> </tr><tr><td>idx</td> <td>The index of the current row iteration.</td> </tr><tr><td>alt</td> <td>Whether or not this is an alternate row.</td> </tr><tr><td>url</td> <td>The direct URL of the comment.</td> </tr><tr><td>threaded</td> <td>Whether or not the comment is in a thread with threading support.</td> </tr><tr><td>depth</td> <td>The depth of the comment.</td> </tr><tr><td>depth\_margin</td> <td>The margin in pixels of the comment, due to the depth.</td> </tr><tr><td>cls</td> <td>The CSS class applied to the comment.</td> </tr><tr><td>md5email</td> <td>The email of the author of the comment, md5'ed.</td> </tr><tr><td>gravatarIcon</td> <td>The Gravatar icon type.</td> </tr><tr><td>gravatarSize</td> <td>The Gravatar icon size.</td> </tr><tr><td>allowRemove</td> <td>Whether or not the current user can remove this comment.</td> </tr><tr><td>reported</td> <td>If this comment has been reported as spam.</td> </tr><tr><td>options</td> <td>Any moderation options for the comment.</td> </tr><tr><td>report</td> <td>The link to report this comment as spam.</td> </tr><tr><td>authorName</td> <td>The name of the author of the comment.</td> </tr><tr><td>replyUrl</td> <td>The URL for threaded comments where the reply form is located.</td></tr></tbody></table>See Also
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