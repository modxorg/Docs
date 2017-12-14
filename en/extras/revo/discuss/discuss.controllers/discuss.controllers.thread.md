---
title: "Discuss.Controllers.thread"
_old_id: "822"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.thread"
---

The Thread (thread/index) controller is the one that shows an entire thread of posts to the user.

<div>- [Basic Information](#Discuss.Controllers.thread-BasicInformation)
- [Options](#Discuss.Controllers.thread-Options)
- [Controller Template](#Discuss.Controllers.thread-ControllerTemplate)
- [System Events](#Discuss.Controllers.thread-SystemEvents)
  - [OnDiscussRenderThread](#Discuss.Controllers.thread-OnDiscussRenderThread)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/thread/index.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussThreadController   
</td></tr><tr><td>Controller Template</td><td>pages/thread/index.tpl</td></tr><tr><td>Manifest Name</td><td>thread/index</td></tr></tbody></table>Options
-------

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board" options array of the manifest.

<table><tbody><tr><th>Key</th><th>Default</th><th>Description</th></tr><tr><td>showPosts   
</td><td>true</td><td>To show posts.. you'll want this enabled. Posts go into \[<span class="error">\[+posts\]</span>\]</td></tr><tr><td>limit   
</td><td>10</td><td>Amount of posts per page</td></tr><tr><td>discuss.post\_sort\_dir   
</td><td>ASC</td><td>The sort order for posts: ASC or DESC</td></tr><tr><td>sortAnswerFirst   
</td><td>false</td><td>If enabled, Q&A threads will sort posts marked as answer on top.</td></tr><tr><td>postAttachmentRowTpl   
</td><td>post/disPostAttachment</td><td>Chunk to wrap each attachment in.</td></tr><tr><td>postTpl</td><td>post/disThreadPost</td><td>The chunk to wrap individual posts in.</td></tr><tr><td>rowCls</td><td>dis-post</td><td>A class to add to the post row</td></tr><tr><td>childrenCls</td><td>dis-board-post</td><td> </td></tr><tr><td>actionLinkTpl</td><td>disActionLink</td><td>Tpl chunk for the action links.</td></tr><tr><td>rowSeparator</td><td>line break</td><td>separator to use between rows</td></tr><tr><td>showViewing</td><td> </td><td>Show the readers based on sessions. Makes the \[<span class="error">\[+readers\]</span>\] placeholder available.</td></tr><tr><td>showBreadcrumbs</td><td> </td><td>Show breadcrumbs on this controller.</td></tr><tr><td>showTitleInBreadcrumbs</td><td> </td><td> </td></tr><tr><td>showPaginationIfOnePage</td><td>true</td><td>Wether 1 page pagination should show up or not.</td></tr></tbody></table>Controller Template
-------------------

```
<pre class="brush: php">
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


```System Events
-------------

### OnDiscussRenderThread

All currently set placeholders are available through the $placeholders array. The return value or $modx->event->output() value is expected to be an array of placeholders to override. Using a plugin on this event is the only way to put a value in the top, bottom, aboveThread and belowThread placeholders.