---
title: "tplAddComment"
_old_id: "965"
_old_uri: "revo/quip/quip.quipreply/quip.quipreply.tpladdcomment"
---

## QuipReply's tplAddComment Chunk

This is the Chunk displayed with the &tplAddComment property on the [Quip.QuipReply](/extras/revo/quip/quip.quipreply "Quip.QuipReply") snippet.

## Default Value

``` php 
[[+preview]]
<span class="quip-success" id="quip-success-[[+idprefix]]">[[+successMsg]]</span>

<form id="quip-add-comment-[[+idprefix]]" action="[[+url]]#quip-comment-preview-box-[[+idprefix]]" method="post">
<div class="quip-comment quip-add-comment">
    <input type="hidden" name="nospam" value="" />
    <input type="hidden" name="thread" value="[[+thread]]" />
    <input type="hidden" name="parent" value="[[+parent]]" />
    <input type="hidden" name="auth_nonce" value="[[+auth_nonce]]" />
    <input type="hidden" name="preview_mode" value="[[+preview_mode]]" />

     <div class="quip-fld">
        <label for="quip-comment-name-[[+idprefix]]">[[%quip.name? &namespace=`quip` &topic=`default`]]:<span class="quip-error">[[+error.name]]</span></label>
        <input type="text" name="name" id="quip-comment-name-[[+idprefix]]" value="[[+name]]" />
        <br />
    </div>
    
    <div class="quip-fld">
        <label for="quip-comment-email-[[+idprefix]]">[[%quip.email]]:<span class="quip-error">[[+error.email]]</span></label>
        <input type="text" name="email" id="quip-comment-email-[[+idprefix]]" value="[[+email]]" />
        <br />
    </div>
    
    <div class="quip-fld">
        <label for="quip-comment-website-[[+idprefix]]">[[%quip.website]]:<span class="quip-error">[[+error.website]]</span></label>
        <input type="text" name="website" id="quip-comment-website-[[+idprefix]]" value="[[+website]]" />
        <br />
    </div>

    <div class="quip-fld">
        <label for="quip-comment-notify-[[+idprefix]]">[[%quip.notify_me]]:<span class="quip-error">[[+error.notify]]</span></label>
        <input type="checkbox" value="1" name="notify" id="quip-comment-notify-[[+idprefix]]" [[+notify:if=`[[+notify]]`:eq=`1`:then=`checked="checked"`]] />
        <br />
    </div>

    <div class="quip-fld recaptcha">
    [[+quip.recaptcha_html]]
    <span class="quip-error">[[+error.recaptcha]]</span>
    </div>
    
    
    <p><span class="quip-allowed-tags">[[%quip.allowed_tags? &tags=`[[++quip.allowed_tags:htmlent]]`]]</span>[[%quip.comment_add_new]]<span class="quip-error">[[+error.comment]]</span></p>
    <textarea name="comment" id="quip-comment-box-[[+idprefix]]" rows="5">[[+comment]]</textarea>
    
    <button type="submit" name="[[+preview_action]]" value="1">[[%quip.preview]]</button>
    [[+can_post:is=`1`:then=`<button type="submit" name="[[+post_action]]" value="1">[[%quip.post]]</button>`]]
    
    <br class="clear" />
</div>
</form>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| thread | The comment thread. |
| parent | The parent comment this comment is being posted in reply to. Defaults to 0. |
| url | The URL to post to. |
| preview | The preview form. |
| idprefix | The ID prefix for this thread. |
| name | The name of the poster. |
| email | The email of the poster. |
| website | The website of the poster. |
| notify | If the poster checked Notify or not. |
| comment | The posted comment. |
| error | If a general error, will show here. |
| quip.recaptcha\_html | If recaptcha is on, the HTML for reCaptcha's form. |

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