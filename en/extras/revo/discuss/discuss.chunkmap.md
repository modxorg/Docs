---
title: "Discuss.ChunkMap"
_old_id: "811"
_old_uri: "revo/discuss/discuss.chunkmap"
---

<div class="note">You may find the [Discss Controller documentation](/extras/revo/discuss/discuss.controllers "Discuss.Controllers") easier to use than the below placeholder coverage.</div><div>- [Map of Chunks to Page Placeholders](#Discuss.ChunkMap-MapofChunkstoPagePlaceholders)
  - [Commonly-Used Placeholders](#Discuss.ChunkMap-CommonlyUsedPlaceholders)
  - [home.tpl](#Discuss.ChunkMap-home.tpl)
  - [board.tpl](#Discuss.ChunkMap-board.tpl)
  - [thread/index.tpl](#Discuss.ChunkMap-thread%2Findex.tpl)
  - [thread/new.tpl](#Discuss.ChunkMap-thread%2Fnew.tpl)
  - [thread/reply.tpl](#Discuss.ChunkMap-thread%2Freply.tpl)
  - [thread/modify.tpl](#Discuss.ChunkMap-thread%2Fmodify.tpl)
  - [thread/move.tpl](#Discuss.ChunkMap-thread%2Fmove.tpl)
  - [thread/preview.tpl](#Discuss.ChunkMap-thread%2Fpreview.tpl)
  - [thread/recent.tpl](#Discuss.ChunkMap-thread%2Frecent.tpl)
  - [thread/unread.tpl](#Discuss.ChunkMap-thread%2Funread.tpl)
  - [thread/unread\_last\_visit.tpl](#Discuss.ChunkMap-thread%2Funreadlastvisit.tpl)
  - [post/track.tpl](#Discuss.ChunkMap-post%2Ftrack.tpl)
  - [user/ignoreboards.tpl](#Discuss.ChunkMap-user%2Fignoreboards.tpl)
  - [user/index.tpl](#Discuss.ChunkMap-user%2Findex.tpl)
  - [user/subscriptions.tpl](#Discuss.ChunkMap-user%2Fsubscriptions.tpl)
  - [messages/index.tpl](#Discuss.ChunkMap-messages%2Findex.tpl)
  - [messages/modify.tpl](#Discuss.ChunkMap-messages%2Fmodify.tpl)
  - [messages/new.tpl](#Discuss.ChunkMap-messages%2Fnew.tpl)
  - [messages/reply.tpl](#Discuss.ChunkMap-messages%2Freply.tpl)
  - [messages/view.tpl](#Discuss.ChunkMap-messages%2Fview.tpl)
  - [search.tpl](#Discuss.ChunkMap-search.tpl)
- [See Also](#Discuss.ChunkMap-SeeAlso)

</div>Map of Chunks to Page Placeholders
----------------------------------

This page outlines all the placeholders for each page that use related chunks, and notes which chunks those placeholders use.

### Commonly-Used Placeholders

These placeholders are used across most pages and always use the same chunks:

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>trail</td><td>breadcrumbs/disBreadcrumbsLink - For a crumb link   
breadcrumbs/disBreadcrumbsActive - For an active crumb text   
breadcrumbs/disBreadcrumbs - The entire crumbs wrapper</td></tr><tr><td>boards</td><td>board/disLastPostBy - For the "Last Post" by part   
board/disSubForumLink - For any sub-boards in the board row   
category/disCategoryLi - For the category row   
board/disBoardLi - For each board</td></tr><tr><td>actionbuttons</td><td>No chunks currently, but a UL tag with classes 'dis-action-btns right' and li tags for each button</td></tr><tr><td>pagination</td><td>pagination/PaginationLink - For a link to a page (1,2,3)   
pagination/PaginationActive - Text for the active page   
pagination/PaginationWrapper - The wrapper for the pagination</td></tr><tr><td>usermenu</td><td>disUserMenu</td></tr></tbody></table>### home.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>recent\_posts</td><td>post/disPostLi</td></tr><tr><td>activeUsers</td><td>user/disActiveUserRow</td></tr></tbody></table>### board.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>posts</td><td>post/disBoardPost - For each post in an li   
board/disLastPostBy - For the "last post by" part</td></tr><tr><td>readers</td><td>Just a string of a tags</td></tr><tr><td>moderators</td><td>Just a string of a tags</td></tr></tbody></table>### thread/index.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>readers</td><td>Just a string of a tags</td></tr><tr><td>threadactionbuttons</td><td>disActionButton - For each button   
disActionButtons - Wrapper of all buttons</td></tr></tbody></table>### thread/new.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### thread/reply.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>thread\_posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### thread/modify.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>thread\_posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### thread/move.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>boards</td><td>board/disBoardOpt - A collection of option tags</td></tr></tbody></table>### thread/preview.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>post</td><td>post/disPostPreview</td></tr></tbody></table>### thread/recent.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>recent\_posts</td><td>post/disPostLi</td></tr></tbody></table>### thread/unread.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>threads</td><td>post/disPostLi</td></tr></tbody></table>### thread/unread\_last\_visit.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>threads</td><td>post/disPostLi</td></tr></tbody></table>### post/track.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>posts</td><td>post/disPostLi</td></tr></tbody></table>### user/ignoreboards.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>boards</td><td>disBoardCheckbox - For each board and its checkbox   
disBoardCategoryIb - For each Category, with a placeholder for its nested boards</td></tr></tbody></table>### user/index.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>recent\_posts</td><td>post/disPostLi</td></tr></tbody></table>### user/subscriptions.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>subscriptions</td><td>user/disUserSubscriptionRow</td></tr></tbody></table>### messages/index.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>messages</td><td>message/disMessageLi</td></tr></tbody></table>### messages/modify.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>thread\_posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### messages/new.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### messages/reply.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>thread\_posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>attachment\_fields</td><td>post/disAttachmentFields</td></tr><tr><td>buttons</td><td>disPostButtons</td></tr><tr><td>discuss.error\_panel</td><td>Ignore this. Always empty.</td></tr></tbody></table>### messages/view.tpl

<table><tbody><tr><th>Placeholder</th><th>Chunks</th></tr><tr><td>posts</td><td>post/disThreadPost - For each post in the thread   
post/disThreadPostPrint - Replaces prior chunk if Print Thread is clicked   
post/disPostAttachment - For each attachment on the post</td></tr><tr><td>readers</td><td>Just a string of a tags</td></tr><tr><td>threadactionbuttons</td><td>disActionButton - For each button   
disActionButtons - Wrapper of all buttons</td></tr></tbody></table>### search.tpl

<table><tbody><tr><td>results</td><td>disSearchResult</td></tr><tr><td>boards</td><td>board/disBoardOpt - A collection of option tags</td></tr></tbody></table>See Also
--------

1. [Discuss.Installation](/extras/revo/discuss/discuss.installation)
  1. [Discuss.Installation from Git](/extras/revo/discuss/discuss.installation/discuss.installation-from-git)
2. [Discuss.Getting Started](/extras/revo/discuss/discuss.getting-started)
3. [Discuss.Creating a Discuss Theme](/extras/revo/discuss/discuss.creating-a-discuss-theme)
4. [Discuss.Controllers](/extras/revo/discuss/discuss.controllers)
  1. [Discuss.Controllers.board](/extras/revo/discuss/discuss.controllers/discuss.controllers.board)
      1. [Discuss.Controllers.board.xml](/extras/revo/discuss/discuss.controllers/discuss.controllers.board/discuss.controllers.board.xml)
  2. [Discuss.Controllers.home](/extras/revo/discuss/discuss.controllers/discuss.controllers.home)
  3. [Discuss.Controllers.login](/extras/revo/discuss/discuss.controllers/discuss.controllers.login)
  4. [Discuss.Controllers.logout](/extras/revo/discuss/discuss.controllers/discuss.controllers.logout)
  5. [Discuss.Controllers.profile](/extras/revo/discuss/discuss.controllers/discuss.controllers.profile)
  6. [Discuss.Controllers.register](/extras/revo/discuss/discuss.controllers/discuss.controllers.register)
  7. [Discuss.Controllers.search](/extras/revo/discuss/discuss.controllers/discuss.controllers.search)
  8. [Discuss.Controllers.thread](/extras/revo/discuss/discuss.controllers/discuss.controllers.thread)
5. [Discuss.Database Model](/extras/revo/discuss/discuss.database-model)
6. [Discuss.Contributing](/extras/revo/discuss/discuss.contributing)
7. [Discuss.ChunkMap](/extras/revo/discuss/discuss.chunkmap)
8. [Discuss.Features](/extras/revo/discuss/discuss.features)
9. [Discuss.Roadmap](/extras/revo/discuss/discuss.roadmap)
10. [Configuring Sphinx for Search](/extras/revo/discuss/configuring-sphinx-for-search)