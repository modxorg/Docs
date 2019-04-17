---
title: "ChunkMap"
_old_id: "811"
_old_uri: "revo/discuss/discuss.chunkmap"
---

You may find the [Discss Controller documentation](extras/discuss/discuss.controllers "Discuss.Controllers") easier to use than the below placeholder coverage.

## Map of Chunks to Page Placeholders

This page outlines all the placeholders for each page that use related chunks, and notes which chunks those placeholders use.

### Commonly-Used Placeholders

These placeholders are used across most pages and always use the same chunks:

| Placeholder | Chunks |
|-------------|--------|
| trail | breadcrumbs/disBreadcrumbsLink |  For a crumb link  |
| breadcrumbs/disBreadcrumbsActive |  For an active crumb text |
| breadcrumbs/disBreadcrumbs |  The entire crumbs wrapper |
| boards | board/disLastPostBy |  For the "Last Post" by part |
| board/disSubForumLink |  For any sub-boards in the board row |
| category/disCategoryLi |  For the category row |
| board/disBoardLi |  For each board |
| actionbuttons | No chunks currently, but a UL tag with classes 'dis-action-btns right' and li tags for each button |
| pagination | pagination/PaginationLink |  For a link to a page (1,2,3) |
| pagination/PaginationActive |  Text for the active page |
| pagination/PaginationWrapper |  The wrapper for the pagination |
| usermenu | disUserMenu |

### home.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent\_posts | post/disPostLi |
| activeUsers | user/disActiveUserRow |

### board.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts | post/disBoardPost |  For each post in an li |
| board/disLastPostBy |  For the "last post by" part |
| readers | Just a string of a tags |
| moderators | Just a string of a tags |

### thread/index.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts - post/disThreadPost |  For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| readers | Just a string of a tags |
| threadactionbuttons - disActionButton |  For each button
| disActionButtons |  Wrapper of all buttons |

### thread/new.tpl

| Placeholder | Chunks |
|-------------|--------|
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### thread/reply.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread\_posts | post/disThreadPost - For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### thread/modify.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread\_posts | post/disThreadPost |  For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### thread/move.tpl

| Placeholder | Chunks |
|-------------|--------|
| boards | board/disBoardOpt - A collection of option tags |

### thread/preview.tpl

| Placeholder | Chunks |
|-------------|--------|
| post | post/disPostPreview |

### thread/recent.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent\_posts | post/disPostLi |

### thread/unread.tpl

| Placeholder | Chunks |
|-------------|--------|
| threads | post/disPostLi |

### thread/unread\_last\_visit.tpl

| Placeholder | Chunks |
|-------------|--------|
| threads | post/disPostLi |

### post/track.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts | post/disPostLi |

### user/ignoreboards.tpl

| Placeholder | Chunks |
|-------------|--------|
| boards |  disBoardCheckbox - For each board and its checkbox |
| disBoardCategoryIb |  For each Category, with a placeholder for its nested boards |

### user/index.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent\_posts | post/disPostLi |

### user/subscriptions.tpl

| Placeholder | Chunks |
|-------------|--------|
| subscriptions | user/disUserSubscriptionRow |

### messages/index.tpl

| Placeholder | Chunks |
|-------------|--------|
| messages | message/disMessageLi |

### messages/modify.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread\_posts | post/disThreadPost - For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### messages/new.tpl

| Placeholder | Chunks |
|-------------|--------|
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### messages/reply.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread\_posts | post/disThreadPost - For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| attachment\_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error\_panel | Ignore this. Always empty. |

### messages/view.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts |  post/disThreadPost - For each post in the thread |
| post/disThreadPostPrint |  Replaces prior chunk if Print Thread is clicked |
| post/disPostAttachment |  For each attachment on the post |
| readers | Just a string of a tags |
| threadactionbuttons | disActionButton - For each button |
| disActionButtons - Wrapper of all buttons |

### search.tpl

| results | disSearchResult |
|---------|-----------------|
| boards | board/disBoardOpt - A collection of option tags |

## See Also

1. [Discuss.Installation](extras/discuss/discuss.installation)
     1. [Discuss.Installation from Git](extras/discuss/discuss.installation/discuss.installation-from-git)
2. [Discuss.Getting Started](extras/discuss/discuss.getting-started)
3. [Discuss.Creating a Discuss Theme](extras/discuss/discuss.creating-a-discuss-theme)
4. [Discuss.Controllers](extras/discuss/discuss.controllers)
     1. [Discuss.Controllers.board](extras/discuss/discuss.controllers/discuss.controllers.board)
         1. [Discuss.Controllers.board.xml](extras/discuss/discuss.controllers/discuss.controllers.board/discuss.controllers.board.xml)
     2. [Discuss.Controllers.home](extras/discuss/discuss.controllers/discuss.controllers.home)
     3. [Discuss.Controllers.login](extras/discuss/discuss.controllers/discuss.controllers.login)
     4. [Discuss.Controllers.logout](extras/discuss/discuss.controllers/discuss.controllers.logout)
     5. [Discuss.Controllers.profile](extras/discuss/discuss.controllers/discuss.controllers.profile)
     6. [Discuss.Controllers.register](extras/discuss/discuss.controllers/discuss.controllers.register)
     7. [Discuss.Controllers.search](extras/discuss/discuss.controllers/discuss.controllers.search)
     8. [Discuss.Controllers.thread](extras/discuss/discuss.controllers/discuss.controllers.thread)
5. [Discuss.Database Model](extras/discuss/discuss.database-model)
6. [Discuss.Contributing](extras/discuss/discuss.contributing)
7. [Discuss.ChunkMap](extras/discuss/discuss.chunkmap)
8. [Discuss.Features](extras/discuss/discuss.features)
9. [Discuss.Roadmap](extras/discuss/discuss.roadmap)
10. [Configuring Sphinx for Search](extras/discuss/configuring-sphinx-for-search)