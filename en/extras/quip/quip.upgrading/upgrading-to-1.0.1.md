---
title: "Quip.Upgrading to 1.0.1"
_old_id: "971"
_old_uri: "revo/quip/quip.upgrading/quip.upgrading-to-1.0.1"
---

## Upgrading to 1.0.1

If you are upgrading to Quip 1.0.0, you'll need to note the following changes:

### No More Form Tag

In the &tplComment chunk, there is no longer any html form tag. The 'remove' and 'report as spam' buttons are now links. You will need to upgrade your tpls and CSS to reflect this.

### OLs/LIs Now Properly Nested

In the &tplComment chunk, children comments are now properly nested inside, rather than outside each li tag. You may need to upgrade your tpls and CSS to reflect this. The new chunk looks like this:

```html
<li class="[[+cls]]" id="[[+idprefix]][[+id]]" [[+depth_margin:notempty=`style="padding-left: [[+depth_margin]]px"`]]>
<div id="[[+idprefix]][[+id]]-div" class="quip-comment-body [[+alt]]">
    <div class="quip-comment-right">
        [[+md5email:notempty=`<img src="http://www.gravatar.com/avatar/[[+md5email]]?s=[[+gravatarSize]]&d=[[+gravatarIcon]]" class="quip-avatar" />`]]
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
</div>
    [[+children:notempty=`<ol class="quip-comment-list">[[+children]]</ol>`]]
</li>
```

## See Also

1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/upgrading-to-1.0.1)
