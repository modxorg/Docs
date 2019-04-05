---
title: "thread"
_old_id: "822"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.thread"
---

The Thread (thread/index) controller is the one that shows an entire thread of posts to the user.

## Basic Information

| Since Version         | 1.0                                    |
| --------------------- | -------------------------------------- |
| Controller File       | controllers/web/thread/index.class.php |
| Controller Class Name | DiscussThreadController                |
| Controller Template   | pages/thread/index.tpl                 |
| Manifest Name         | thread/index                           |

## Options

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board" options array of the manifest.

| Key                     | Default                | Description                                                                           |
| ----------------------- | ---------------------- | ------------------------------------------------------------------------------------- |
| showPosts               | true                   | To show posts.. you'll want this enabled. Posts go into \[\[+posts\]\]                |
| limit                   | 10                     | Amount of posts per page                                                              |
| discuss.post\_sort\_dir | ASC                    | The sort order for posts: ASC or DESC                                                 |
| sortAnswerFirst         | false                  | If enabled, Q&A threads will sort posts marked as answer on top.                      |
| postAttachmentRowTpl    | post/disPostAttachment | Chunk to wrap each attachment in.                                                     |
| postTpl                 | post/disThreadPost     | The chunk to wrap individual posts in.                                                |
| rowCls                  | dis-post               | A class to add to the post row                                                        |
| childrenCls             | dis-board-post         |                                                                                       |
| actionLinkTpl           | disActionLink          | Tpl chunk for the action links.                                                       |
| rowSeparator            | line break             | separator to use between rows                                                         |
| showViewing             |                        | Show the readers based on sessions. Makes the \[\[+readers\]\] placeholder available. |
| showBreadcrumbs         |                        | Show breadcrumbs on this controller.                                                  |
| showTitleInBreadcrumbs  |                        |                                                                                       |
| showPaginationIfOnePage | true                   | Wether 1 page pagination should show up or not.                                       |

## Controller Template

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

## System Events

### OnDiscussRenderThread

All currently set placeholders are available through the $placeholders array. The return value or $modx->event->output() value is expected to be an array of placeholders to override. Using a plugin on this event is the only way to put a value in the top, bottom, aboveThread and belowThread placeholders.