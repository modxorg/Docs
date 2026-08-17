---
title: "thread"
description: "Контроллер просмотра темы Discuss с постами, pagination и событием OnDiscussRenderThread"
translation: "extras/discuss/discuss.controllers/thread"
---

Контроллер Thread (thread/index) показывает пользователю всю тему с постами.

## Основная информация

| Since Version         | 1.0                                    |
| --------------------- | -------------------------------------- |
| Controller File       | controllers/web/thread/index.class.php |
| Controller Class Name | DiscussThreadController                |
| Controller Template   | pages/thread/index.tpl                 |
| Manifest Name         | thread/index                           |

## Опции

Если вы не знаете, что такое manifest, вернитесь к документу [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started"). Опции ниже поместите в массив options «board» manifest.

| Key                     | Default                | Description                                                                         |
| ----------------------- | ---------------------- | ----------------------------------------------------------------------------------- |
| showPosts               | true                   | Показывать посты в `[[+posts]]`. Обычно нужно включить.                |
| limit                   | 10                     | Постов на странице                                                            |
| discuss.post_sort_dir | ASC                    | Порядок сортировки постов: ASC или DESC                                               |
| sortAnswerFirst         | false                  | Для Q&A темы посты с отметкой answer идут первыми.                    |
| postAttachmentRowTpl    | post/disPostAttachment | Chunk для каждого вложения.                                                   |
| postTpl                 | post/disThreadPost     | Chunk для отдельных постов.                                              |
| rowCls                  | dis-post               | Класс строки поста                                                      |
| childrenCls             | dis-board-post         |                                                                                     |
| actionLinkTpl           | disActionLink          | Tpl chunk для action links.                                                     |
| rowSeparator            | line break             | Разделитель между строками                                                       |
| showViewing             |                        | Показать читателей по сессиям. Плейсхолдер `[[+readers]]`. |
| showBreadcrumbs         |                        | Breadcrumbs на этом контроллере.                                                |
| showTitleInBreadcrumbs  |                        |                                                                                     |
| showPaginationIfOnePage | true                   | Показывать pagination при одной странице.                                     |

## Шаблон контроллера

``` html
<!-- thread/index.html -->
[[+top]]

[[+aboveThread]]
<div class="status [[+locked:is=`1`:then=`locked`:else=`unlocked`]]">
    <div class="f1-f12 h-group [[+answered:notempty=`answered`]]">
        <h1 class="Category" post="[[+id]]">
            [[+answered:notempty=`<span class="tag solved">[[%discuss.solved]]</span>`:default=``]]
            <a href="[[+url]]" title="[[+title]]">[[+title]]</a>
        </h1>
    </div>
    <div class="f1-f9">
        <div class="a-dis-actionbuttons h-group">
            Subscribe: <a href="[[~[[*id]]]]thread/feed.xml?thread=[[+id]]">RSS</a>
                    [[+actionlink_subscribe:notempty=`
                    <a href="[[+actionlink_subscribe]]">By email</a>`]]
                    [[+actionlink_unsubscribe:notempty=`
                    <a href="[[+actionlink_unsubscribe]]">Stop emails</a>`]]
        </div>
    </div>
    <div class="f1-f9">
        <header class="dis-cat-header dark-gradient h-group sticky-bar top">
            [[+pagination:default=``]]
            [[- USER LOGGED IN ]]
            [[!+discuss.user.id:notempty=`
            <div class="post-box">
                [[+locked:is=`1`:then=``:else=`<a class="dis-action-reply Button" href="[[+actionlink_reply]]">Reply to thread</a>`]]
                <a class="Button" href="[[+actionlink_unread]]">Mark as unread</a>
                [[+moderators]]
            </div>`]]
            [[- USER NOT LOGGED IN ]]
            [[!+discuss.user.id:is=``:then=`
            <div class="post-box">
                <a href="[[~[[*id]]]]login" class="Button dis-action-login" >Login to Post</a>
            </div>`]]
        </header>
        <ul class="dis-list h-group">
            [[+posts]]
        </ul>
        [[+pagination:notempty=`
        <div class="paginate stand-alone bottom horiz-list">[[+pagination]]</div>`]]
        [[$thread-login-post]]
        [[+locked:notempty=`<p class="m-notice">[[%discuss.thread_locked]]</p>`:default=`[[+quick_reply_form]]`]]
        [[+belowThread]]
        [[+discuss.error_panel]]
    </div><!-- Close Content From Wrapper -->

    [[+bottom]]

    [[+sidebar]]
</div>
<!--close thread/index.html -->
```

## Системные события

### OnDiscussRenderThread

Все текущие плейсхолдеры доступны в массиве $placeholders. return или $modx->event->output() должны вернуть массив плейсхолдеров для переопределения. Плагин на этом событии. единственный способ задать top, bottom, aboveThread и belowThread.
