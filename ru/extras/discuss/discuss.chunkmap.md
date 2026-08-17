---
title: "ChunkMap"
description: "Соответствие плейсхолдеров страниц Discuss и используемых chunks"
translation: "extras/discuss/discuss.chunkmap"
---

Вместо таблиц ниже может быть удобнее [документация контроллеров Discuss](extras/discuss/discuss.controllers "Discuss.Controllers").

## Карта chunks и плейсхолдеров страниц

На этой странице перечислены плейсхолдеры каждой страницы и chunks, которые они используют.

### Часто используемые плейсхолдеры

Эти плейсхолдеры встречаются на большинстве страниц и всегда используют одни и те же chunks:

| Placeholder | Chunks |
|-------------|--------|
| trail | breadcrumbs/disBreadcrumbsLink |  Ссылка в цепочке  |
| breadcrumbs/disBreadcrumbsActive |  Текст активной крошки |
| breadcrumbs/disBreadcrumbs |  Обёртка всей цепочки |
| boards | board/disLastPostBy |  Часть «Last Post» by  |
| board/disSubForumLink |  Поддоски в строке доски |
| category/disCategoryLi |  Строка категории |
| board/disBoardLi |  Каждая доска |
| actionbuttons | Chunks пока нет, UL с классами 'dis-action-btns right' и li для каждой кнопки |
| pagination | pagination/PaginationLink |  Ссылка на страницу (1,2,3) |
| pagination/PaginationActive |  Текст активной страницы |
| pagination/PaginationWrapper |  Обёртка pagination |
| usermenu | disUserMenu |

### home.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent_posts | post/disPostLi |
| activeUsers | user/disActiveUserRow |

### board.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts | post/disBoardPost |  Каждый пост в li |
| board/disLastPostBy |  Часть «last post by» |
| readers | Строка a-тегов |
| moderators | Строка a-тегов |

### thread/index.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts - post/disThreadPost |  Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| readers | Строка a-тегов |
| threadactionbuttons - disActionButton |  Каждая кнопка
| disActionButtons |  Обёртка всех кнопок |

### thread/new.tpl

| Placeholder | Chunks |
|-------------|--------|
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### thread/reply.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread_posts | post/disThreadPost - Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### thread/modify.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread_posts | post/disThreadPost |  Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### thread/move.tpl

| Placeholder | Chunks |
|-------------|--------|
| boards | board/disBoardOpt - Набор option-тегов |

### thread/preview.tpl

| Placeholder | Chunks |
|-------------|--------|
| post | post/disPostPreview |

### thread/recent.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent_posts | post/disPostLi |

### thread/unread.tpl

| Placeholder | Chunks |
|-------------|--------|
| threads | post/disPostLi |

### thread/unread_last_visit.tpl

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
| boards |  disBoardCheckbox - Каждая доска и её checkbox |
| disBoardCategoryIb |  Каждая категория с плейсхолдером для вложенных досок |

### user/index.tpl

| Placeholder | Chunks |
|-------------|--------|
| recent_posts | post/disPostLi |

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
| thread_posts | post/disThreadPost - Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### messages/new.tpl

| Placeholder | Chunks |
|-------------|--------|
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### messages/reply.tpl

| Placeholder | Chunks |
|-------------|--------|
| thread_posts | post/disThreadPost - Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| attachment_fields | post/disAttachmentFields |
| buttons | disPostButtons |
| discuss.error_panel | Игнорируйте. Всегда пусто. |

### messages/view.tpl

| Placeholder | Chunks |
|-------------|--------|
| posts |  post/disThreadPost - Каждый пост в теме |
| post/disThreadPostPrint |  Заменяет предыдущий chunk при Print Thread |
| post/disPostAttachment |  Каждое вложение поста |
| readers | Строка a-тегов |
| threadactionbuttons | disActionButton - Каждая кнопка |
| disActionButtons - Обёртка всех кнопок |

### search.tpl

| results | disSearchResult |
|---------|-----------------|
| boards | board/disBoardOpt - Набор option-тегов |

## Смотрите также

1. [Discuss.Installation](extras/discuss/discuss.installation)
     1. [Discuss.Installation from Git](extras/discuss/discuss.installation/installation-from-git)
2. [Discuss.Getting Started](extras/discuss/discuss.getting-started)
3. [Discuss.Creating a Discuss Theme](extras/discuss/discuss.creating-a-discuss-theme)
4. [Discuss.Controllers](extras/discuss/discuss.controllers)
     1. [Discuss.Controllers.board](extras/discuss/discuss.controllers/board)
         1. [Discuss.Controllers.board.xml](extras/discuss/discuss.controllers/board/xml)
     2. [Discuss.Controllers.home](extras/discuss/discuss.controllers/home)
     3. [Discuss.Controllers.login](extras/discuss/discuss.controllers/login)
     4. [Discuss.Controllers.logout](extras/discuss/discuss.controllers/logout)
     5. [Discuss.Controllers.profile](extras/discuss/discuss.controllers/profile)
     6. [Discuss.Controllers.register](extras/discuss/discuss.controllers/register)
     7. [Discuss.Controllers.search](extras/discuss/discuss.controllers/search)
     8. [Discuss.Controllers.thread](extras/discuss/discuss.controllers/thread)
5. [Discuss.Database Model](extras/discuss/discuss.database-model)
6. [Discuss.Contributing](extras/discuss/discuss.contributing)
7. [Discuss.ChunkMap](extras/discuss/discuss.chunkmap)
8. [Discuss.Features](extras/discuss/discuss.features)
9. [Configuring Sphinx for Search](extras/discuss/configuring-sphinx-for-search)
