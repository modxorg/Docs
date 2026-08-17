---
title: "tplCommentOptions"
description: "Чанк tplCommentOptions для опций комментария (удаление) в сниппете Quip"
translation: "extras/quip/quip/tplcommentoptions"
---

## Чанк tplCommentOptions Quip

Этот чанк выводится через свойство &tplCommentOptions сниппета [Quip.Quip](extras/quip/quip "Quip.Quip"). Он показывается автору комментария до истечения removeThreshold или модераторам ветки.

## Значение по умолчанию

```php
[[+allowRemove:notempty=`| <a href="[[+removeUrl]]">[[%quip.remove]]</a>`]]
```

## Доступные плейсхолдеры

Доступны все плейсхолдеры из чанка [tplComment](extras/quip/quip/tplcomment "Quip.Quip.tplComment").

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
