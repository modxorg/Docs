---
title: "Обновление до 1.0.1"
description: "Изменения в Quip 1.0.1: форма в tplComment и вложенность ol/li"
translation: "extras/quip/quip.upgrading/upgrading-to-1.0.1"
---

## Обновление до 1.0.1

При переходе на Quip 1.0.0 учтите следующие изменения:

### Больше нет тега form

В чанке &tplComment больше нет HTML-тега form. Кнопки «remove» и «report as spam» теперь ссылки. Обновите свои чанки и CSS под это.

### Корректная вложенность OL/LI

В чанке &tplComment дочерние комментарии теперь вкладываются внутрь, а не снаружи каждого li. Возможно, потребуется обновить чанки и CSS. Новый чанк выглядит так:

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

## См. также

1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/upgrading-to-1.0.1)
