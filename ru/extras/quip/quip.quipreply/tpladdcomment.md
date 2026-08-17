---
title: "tplAddComment"
description: "Чанк tplAddComment для формы добавления комментария в сниппете QuipReply"
translation: "extras/quip/quip.quipreply/tpladdcomment"
---

## Чанк tplAddComment QuipReply

Этот чанк выводится через свойство &tplAddComment сниппета [Quip.QuipReply](extras/quip/quip.quipreply "Quip.QuipReply").

## Значение по умолчанию

```html
[[+preview]]
<span class="quip-success" id="quip-success-[[+idprefix]]"
    >[[+successMsg]]</span
>

<form
    id="quip-add-comment-[[+idprefix]]"
    action="[[+url]]#quip-comment-preview-box-[[+idprefix]]"
    method="post"
>
    <div class="quip-comment quip-add-comment">
        <input type="hidden" name="nospam" value="" />
        <input type="hidden" name="thread" value="[[+thread]]" />
        <input type="hidden" name="parent" value="[[+parent]]" />
        <input type="hidden" name="auth_nonce" value="[[+auth_nonce]]" />
        <input type="hidden" name="preview_mode" value="[[+preview_mode]]" />

        <div class="quip-fld">
            <label for="quip-comment-name-[[+idprefix]]"
                >[[%quip.name? &namespace=`quip` &topic=`default`]]:<span
                    class="quip-error"
                    >[[+error.name]]</span
                ></label
            >
            <input
                type="text"
                name="name"
                id="quip-comment-name-[[+idprefix]]"
                value="[[+name]]"
            />
            <br />
        </div>

        <div class="quip-fld">
            <label for="quip-comment-email-[[+idprefix]]"
                >[[%quip.email]]:<span class="quip-error"
                    >[[+error.email]]</span
                ></label
            >
            <input
                type="text"
                name="email"
                id="quip-comment-email-[[+idprefix]]"
                value="[[+email]]"
            />
            <br />
        </div>

        <div class="quip-fld">
            <label for="quip-comment-website-[[+idprefix]]"
                >[[%quip.website]]:<span class="quip-error"
                    >[[+error.website]]</span
                ></label
            >
            <input
                type="text"
                name="website"
                id="quip-comment-website-[[+idprefix]]"
                value="[[+website]]"
            />
            <br />
        </div>

        <div class="quip-fld">
            <label for="quip-comment-notify-[[+idprefix]]"
                >[[%quip.notify_me]]:<span class="quip-error"
                    >[[+error.notify]]</span
                ></label
            >
            <input type="checkbox" value="1" name="notify"
            id="quip-comment-notify-[[+idprefix]]"
            [[+notify:if=`[[+notify]]`:eq=`1`:then=`checked="checked"`]] />
            <br />
        </div>

        <div class="quip-fld recaptcha">
            [[+quip.recaptcha_html]]
            <span class="quip-error">[[+error.recaptcha]]</span>
        </div>

        <p>
            <span class="quip-allowed-tags"
                >[[%quip.allowed_tags?
                &tags=`[[++quip.allowed_tags:htmlent]]`]]</span
            >[[%quip.comment_add_new]]<span class="quip-error"
                >[[+error.comment]]</span
            >
        </p>
        <textarea name="comment" id="quip-comment-box-[[+idprefix]]" rows="5">
[[+comment]]</textarea
        >

        <button type="submit" name="[[+preview_action]]" value="1">
            [[%quip.preview]]
        </button>
        [[+can_post:is=`1`:then=`<button
            type="submit"
            name="[[+post_action]]"
            value="1"
        >
            [[%quip.post]]</button
        >`]]

        <br class="clear" />
    </div>
</form>
```

## Доступные плейсхолдеры

| Name                | Description                                                                 |
| ------------------- | --------------------------------------------------------------------------- |
| thread              | Ветка комментариев.                                                         |
| parent              | Родительский комментарий, на который отвечают. По умолчанию 0.              |
| url                 | URL для отправки формы.                                                     |
| preview             | Блок предпросмотра.                                                         |
| idprefix            | Префикс ID для этой ветки.                                                  |
| name                | Имя автора.                                                                 |
| email               | Email автора.                                                               |
| website             | Сайт автора.                                                                |
| notify              | Отмечен ли чекбокс Notify.                                                  |
| comment             | Текст комментария.                                                          |
| error               | Общая ошибка, если есть.                                                    |
| quip.recaptcha_html | При включённой recaptcha HTML формы reCaptcha.                              |

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
