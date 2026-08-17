---
title: "tplComments"
description: "Чанк tplComments оборачивает список комментариев ветки в сниппете Quip"
translation: "extras/quip/quip/tplcomments"
---

## Чанк tplComments Quip

Этот чанк выводится через свойство &tplComments сниппета [Quip.Quip](extras/quip/quip "Quip.Quip"). Применяется, когда в сниппете Quip задано &useWrapper=`1` (значение по умолчанию).

Чанк оборачивает комментарии ветки и выводит заголовок с общим числом комментариев.

## Значение по умолчанию

```php
<div class="quip">
    <h3>[[%quip.comments]] ([[+total]])</h3>

<div id="quip-topofcomments-[[+idprefix]]"></div>

    [[+comments:notempty=`<ol class="quip-comment-list">
    [[+comments]]
    </ol>`]]

    [[+pagination]]
</div>
```

## Доступные плейсхолдеры

| Name     | Description                                   |
| -------- | --------------------------------------------- |
| comments | Комментарии ветки.                            |
| total    | Общее число комментариев в ветке.             |
| idprefix | Префикс ID комментариев ветки.                |

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
