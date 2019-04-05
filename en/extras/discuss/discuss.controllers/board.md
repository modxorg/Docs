---
title: "board"
_old_id: "814"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.board"
---

The board controller builds an overview of threads in a board.

- [Basic Information](#Discuss.Controllers.board-BasicInformation)
- [Options](#Discuss.Controllers.board-Options)
- [Controller Template](#Discuss.Controllers.board-ControllerTemplate)
- [System Events](#Discuss.Controllers.board-SystemEvents)
  - [OnDiscussRenderBoard](#Discuss.Controllers.board-OnDiscussRenderBoard)



## Basic Information

| Since Version | 1.0 |
|---------------|-----|
| Controller File | controllers/web/board.class.php |
| Controller Class Name | DiscussBoardController |
| Controller Template | pages/board.tpl |
| Manifest Name | board |

![](https://img.skitch.com/20120916-fqd33t11u3en2xrscqe4kyu8j4.jpg)

## Options

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board" options array of the manifest.

| Key | Default | Description |
|-----|---------|-------------|
| showSubBoards |  | When set to true, subboards will be available in the "boards" placeholder. When no boards are available, the "boards" placeholder will be empty and "boards\_toggle" will have a value of "display: none;", which can be used to hide outer wrappers for subboards. |
| showReaders |  | When set to true, users viewing the board will be available in the "readers" placeholder. User needs discuss.view\_online permission. Setting discuss.show\_whos\_online needs to be enabled. Text is built up from the users' username, wrapped in an <a> tag if the user has access to view profiles, with multiple people viewing joined together with a comma. |
| showModerators |  | When set to true, the moderators for the current board will be available in the "moderators" placeholder. The text in here will be built up from the users display or username, wrapped in an <a> tag if the viewer has access to view profiles, with multiple moderators joined together with a comma. |
| showPaginationIfOnePage |  | If there is only one page of threads, this switch decides if there should be a pagination available in the "pagination" placeholder or not. |
| **board/getlist common options** |  |  |
| lastPostTpl | board/disLastPostBy | Chunk used to create the "lastpost" placeholder. This chunk gets fed the following placeholders: 
- createdon: timestamp of post formatted to discuss.date\_format system setting.
- user: iD of the user that last posted
- username: username of the user that last posted
- thread: ID of the thread last posted in
- id: the post ID
- url: the url to the last post
- author\_link: <a> tag to author if user has access to view profiles, otherwise just the username. |
| subBoardTpl | board/disSubForumLink | Chunk used to loop over subforums to eventually fill the "subforums" placeholder after joined together with the value of the subBoardSeparator option. This chunk gets the following placeholders: 
- id: the ID of the subboard
- title: the title of the subboard |
| subBoardSeparator | comma and line break (\\n) | Used to join together the subBoardTpl chunks to one string. |
| categoryRowTpl | category/disCategoryLi | Chunk used to loop over categories. Gets the following placeholders: 
- list: boards belonging to the current category, formatted with the boardRowTpl option's chunk, joined with a newline (\\n)
- rowClass: classes to apply to the category, either "alt" or "even". |
| boardRowTpl | board/disBoardLi | Chunk used to loop over boards. Gets the following placeholders: 
- [All board fields](http://rtfm.modx.com/display/ADDON/Discuss.Database+Model#Discuss.DatabaseModel-disBoardBoards) and the following:
- unread (1|0): if the board has been read by the user or not
- unread-cls (dis-unread|dis-read): class that can be used for changing the view of read/unread boards.
- last\_post\_createdon: user ID of last poster
- last\_post\_udn: use users' display name or not
- last\_post\_display\_name: display name of the last poster
- lastPost: formatted last post information. See lastPostTpl for chunk and placeholders. Empty if no last poster.
- subforums: formatted list of subboards. See subBoardTpl for chunk and placeholders. Empty if no subboards.
- post\_stats: formatted list of statistics for this board, based on the discuss.board\_post\_stats lexicon entry.
- is\_locked: when the board is set to locked this returns an empty div with class dis-board-locked, otherwise it is empty. |
| checkUnread | true | When set to false, this board will not check if the user has read the posts in this forum and will simply mark them as read when not logged in, and unread when logged in. Note that this affects the unread and unread-cls placeholders for the boardRowTpl. |

## Controller Template

This controller template has the following placeholders you can use, on top of the placeholders mentioned in the options above:

| Placeholder | Description |
|-------------|-------------|
|  | [All fields of the disBoard object.](http://rtfm.modx.com/display/ADDON/Discuss.Database+Model#Discuss.DatabaseModel-disBoardBoards) |
| posts | The posts in this board. |
| boards | Sub boards of this forum, if available and enabled (see options above). |
| boards\_toggle | Either "display:none;" or empty depending on the value in boards. |
| top | Empty unless set by plugin on OnDiscussRenderBoard event by using $modx->event->output(array('name-of-placeholder' => 'stuff')); |
| bottom | See "top" placeholder. |
| aboveThreads | See "top" placeholder. |
| belowBoards | See "top" placeholder. |
| belowThreads | See "top" placeholder. |
| pagination | Pagination for this board. |
| readers | Users viewing this board |
| moderators | Moderators for this board |
| trail | Breadcrumbs for this board |
| actionbuttons | Actions avialable for the user. See note on actionbuttons on the [Controllers](/extras/revo/discuss/discuss.controllers "Discuss.Controllers") page. |

``` php 
[[+top]]
<div>
    <form action="[[~[[*id]]]]search" method="GET">
        <input type="hidden" name="board" value="[[+id]]" />
        <input type="text" name="s" value="" style="width: 200px; margin-right: 5px;" placeholder="[[%discuss.search_this_board]]" />

        <input type="submit"  value="[[%discuss.search]]" />
    </form>
</div>
[[+trail]]

[[+aboveBoards]]
<ol style="[[+boards_toggle]]">
[[+boards]]
</ol>

[[+belowBoards]]

<br />

[[+actionbuttons]]

<div><span>[[%discuss.pages? &namespace=`discuss` &topic=`web`]]:</span> <ul>[[+pagination]]</ul></div>

<br />

<div>
<div>
    <div>
        <div style="width: 25%">[[%discuss.last_post]]</div>
        <div style="width: 10%">[[%discuss.replies]]</div>
        <div style="width: 10%">[[%discuss.views]]</div>
        <div style="width: 55%;">[[%discuss.message]]</div>
    </div>
    <br />
</div>
<ol>
[[+posts]]
</ol>
</div>

<br />

[[+actionbuttons]]

<div><span>[[%discuss.pages]]:</span> <ul>[[+pagination]]</ul></div>

[[+belowThreads]]

<p>[[+readers]]</p>
<p>[[+moderators]]</p>
<p>[[+trail]]</p>

[[+bottom]]
```

## System Events

### OnDiscussRenderBoard

All currently set placeholders are available through the $placeholders array. The return value or $modx->event->output() value is expected to be an array of placeholders to override. Using a plugin on this event is the only way to put a value in the top, bottom, aboveThreads, belowThreads, aboveBoards and belowBoards placeholders.