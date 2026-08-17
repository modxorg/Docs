---
title: "tplReport"
description: "Чанк tplReport для ссылки «Пожаловаться на спам» в сниппете Quip"
translation: "extras/quip/quip/tplreport"
---

## Чанк tplReport Quip

Этот чанк выводится через свойство &tplReport сниппета [Quip.Quip](extras/quip/quip "Quip.Quip").

Выводит ссылку «Report as Spam» для комментария.

## Значение по умолчанию

```php
<span class="quip-comment-report">
    [[+reported:empty=`<a href="[[+reportUrl]]">[[%quip.report_as_spam]]</a>`]]
    [[+reported:notempty=`<span>[[%quip.reported_as_spam]]</span>`]]
</span>
```

## Доступные плейсхолдеры

Доступны все плейсхолдеры из [tplComment](extras/quip/quip/tplcomment "Quip.Quip.tplComment"), плюс:

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| reported | Помечен ли комментарий как спам.                       |

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
