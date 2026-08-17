---
title: "tplComment"
description: "Чанк tplComment для вывода одного комментария в сниппете Quip"
translation: "extras/quip/quip/tplcomment"
---

## Чанк tplComment Quip

Этот чанк выводится через свойство &tplComment сниппета [Quip.Quip](extras/quip/quip "Quip.Quip").

## Значение по умолчанию

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

## Доступные плейсхолдеры

| Name         | Description                                                                                                 |
| ------------ | ----------------------------------------------------------------------------------------------------------- |
| thread       | Ветка комментария.                                                                                          |
| parent       | Родитель комментария. По умолчанию 0.                                                                       |
| resource     | ID ресурса, связанного с веткой этого комментария.                                                          |  |
| rank         | Ранг комментария.                                                                                           |
| author       | ID пользователя, опубликовавшего комментарий. Только для авторизованных, иначе 0.                           |
| body         | Текст комментария.                                                                                          |
| createdon    | Время создания комментария.                                                                                 |
| editedon     | Время последнего редактирования.                                                                            |
| approved     | Одобрен ли комментарий.                                                                                     |
| approvedby   | ID пользователя, одобрившего комментарий. 0, если модерация отключена.                                     |
| approvedon   | Время одобрения комментария.                                                                                |
| name         | Имя автора комментария.                                                                                     |
| email        | Email автора комментария.                                                                                   |
| website      | Сайт автора, если указан.                                                                                   |
| ip           | IP, с которого опубликован комментарий.                                                                     |
| deleted      | Удалён ли комментарий.                                                                                      |
| deletedon    | Время удаления. Пусто, если не удалён.                                                                      |
| deletedby    | ID пользователя, удалившего комментарий. 0, если не удалён.                                                 |
| idx          | Индекс текущей строки в итерации.                                                                           |
| alt          | Чередующаяся ли это строка.                                                                                 |
| url          | Прямой URL комментария.                                                                                     |
| threaded     | Включена ли вложенность в ветке.                                                                            |
| depth        | Глубина комментария.                                                                                        |
| depth_margin | Отступ в пикселях из-за глубины.                                                                            |
| cls          | CSS-класс комментария.                                                                                      |
| md5email     | Email автора в формате md5.                                                                                 |
| gravatarIcon | Тип иконки Gravatar.                                                                                        |
| gravatarSize | Размер иконки Gravatar.                                                                                     |
| allowRemove  | Может ли текущий пользователь удалить этот комментарий.                                                     |
| reported     | Помечен ли комментарий как спам.                                                                            |
| options      | Опции модерации для комментария.                                                                            |
| report       | Ссылка «Пожаловаться на спам».                                                                              |
| authorName   | Имя автора комментария.                                                                                     |
| replyUrl     | URL формы ответа для вложенных комментариев.                                                                |

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
