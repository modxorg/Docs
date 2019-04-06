---
title: "Quip"
_old_id: "957"
_old_uri: "revo/quip/quip.quip"
---

## The Quip Snippet

This snippet displays all the comments for a given thread.

## Usage

Simply place the snippet wherever you would like to display a comment thread, and specify what the name of that thread will be.

``` php
[[!Quip? &thread=`myThread`]]
```

## Available Properties

| Name                     | Description                                                                                                                                                                                                                                     | Default               |
| ------------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------- |
| thread                   | The ID of the thread you want to reference. This can be anything - and will be the reference point for any related comments.                                                                                                                    | n/a                   |
| parent                   | The parent to start at when displaying the thread.                                                                                                                                                                                              | 0                     |
| threaded                 | Whether or not this thread can have threaded comments. Threaded comments allow users to comment on comments, increasing the level of indentation. Non-threaded comments allow users to comment only on the parent article, not on the comments. | 1                     |
| maxDepth                 | The maximum depth that replies can be made in a threaded comment thread.                                                                                                                                                                        | 5                     |
| replyResourceId          | The ID of the Resource where the QuipReply snippet is held, for replying to threaded comments.                                                                                                                                                  |                       |
| threadedPostMargin       | The margin, in pixels, by which threaded comments are moved right for each depth level that they go.                                                                                                                                            | 15                    |
| useMargins               | Instead of using ol/li tags, do divs with margin styles (old Quip style)                                                                                                                                                                        | 0                     |
| closed                   | If set to true, the thread will not accept new comments.                                                                                                                                                                                        | 0                     |
| closeAfter               | The number of days at which the thread will automatically close after it was created. Set to 0 to leave open indefinitely.                                                                                                                      | 14                    |
| dateFormat               | The format of the date to show for a comment's post date. The syntax is in PHP [strftime](http://php.net/strftime) format.                                                                                                                      | %b %d, %Y at %I:%M %p |
| requireAuth              | If set to true, only logged in users will be able to comment on the thread.                                                                                                                                                                     | 0                     |
| useCss                   | If true, Quip will provide a basic CSS template for the presentation.                                                                                                                                                                           | 1                     |
| altRowCss                | The CSS class to put on alternating comments.                                                                                                                                                                                                   | quip-comment-alt      |
| nameField                | The field to use for the author name of each comment. Recommended values are "name" or "username".                                                                                                                                              | username              |
| showAnonymousName        | If true, will display the value of anonymousName property (defaults to "Anonymous") if the user is not logged in when posting.                                                                                                                  | 0                     |
| anonymousName            | The name to display for anonymous postings. Defaults to "Anonymous".                                                                                                                                                                            |                       |
| allowRemove              | Allow logged-in users to remove their own postings.                                                                                                                                                                                             | 1                     |
| removeThreshold          | If allowRemove is true, the number of minutes a user can remove their posting after they have posted it.                                                                                                                                        | 3                     |
| allowReportAsSpam        | Allow logged-in users to report comments as spam.                                                                                                                                                                                               | 1                     |
| useGravatar              | Whether or not to show Gravatar icons in comments.                                                                                                                                                                                              | 1                     |
| gravatarIcon             | The type of Gravatar icon to use for a user without a Gravatar.                                                                                                                                                                                 | identicon             |
| gravatarSize             | The size in pixels of the Gravatar.                                                                                                                                                                                                             | 50                    |
| sortBy                   | The field to sort comments by. If threading is on (the default behavior, or set explicitly via &threaded=`1`), then it's best leave this alone.                                                                                                 | rank                  |
| sortByAlias              | The alias of classes to use with sort by.                                                                                                                                                                                                       | quipComment           |
| sortDir                  | The direction to sort by.                                                                                                                                                                                                                       | ASC                   |
| tplComment               | A chunk for the comment itself.                                                                                                                                                                                                                 |                       |
| tplCommentOptions        | A chunk for the options, such as delete, shown to an owner of a comment.                                                                                                                                                                        |                       |
| tplComments              | The outer wrapper for comments. Can either be a chunk name or value. If set to a value, will override the chunk.                                                                                                                                |                       |
| tplReport                | The link on a comment to report as spam. Can either be a chunk name or value. If set to a value, will override the chunk.                                                                                                                       |                       |
| removeAction             | The name of the submit field to remove a comment post.                                                                                                                                                                                          | quip-remove           |
| reportAction             | The name of the submit field to report as spam a comment post.                                                                                                                                                                                  | quip-report           |
| idPrefix                 | If you want to use multiple Quip instances on a page, change this ID prefix.                                                                                                                                                                    | qcom                  |
| limit                    | The number of comments to limit per page. Setting this to a non-zero number will enable pagination.                                                                                                                                             | 0                     |
| start                    | The default comment index to start on. Recommended to leave at 0.                                                                                                                                                                               | 0                     |
| tplPagination            | A chunk for the pagination OL wrapper.                                                                                                                                                                                                          |                       |
| tplPaginationItem        | A chunk for each non-current pagination number link.                                                                                                                                                                                            |                       |
| tplPaginationCurrentItem | A chunk for the current pagination number link.                                                                                                                                                                                                 |                       |
| paginationCls            | A CSS class to put on the pagination OL wrapper.                                                                                                                                                                                                | quip-pagination       |
| pageCls                  | A CSS class to put on a non-current pagination number link.                                                                                                                                                                                     | quip-page-number      |
| currentPageCls           | A CSS class to put on the current pagination number.                                                                                                                                                                                            | quip-page-current     |

## Quip Chunks

There are 4 chunks that are processed in Quip. Their corresponding parameters are:

- [tplComment](extras/quip/quip.quip/quip.quip.tplcomment "Quip.Quip.tplComment")
- [tplCommentOptions](extras/quip/quip.quip/quip.quip.tplcommentoptions "Quip.Quip.tplCommentOptions")
- [tplComments](extras/quip/quip.quip/quip.quip.tplcomments "Quip.Quip.tplComments")
- [tplReport](extras/quip/quip.quip/quip.quip.tplreport "Quip.Quip.tplReport")

## Examples

A sample code line for a blog post that's on a Resource with no threading:

``` php
[[!Quip? &thread=`blog-post-[[*id]]` &threaded=`0`]]
```

A threaded comment thread, but only allowed to go 3 levels deep, and auto-close after 21 days:

``` php
[[!Quip? &thread=`blog-post-[[*id]]` &maxDepth=`3` &closeAfter=`21`]]
```

A comment thread, with threading, with Gravatars disabled, and only allowing logged-in comments:

``` php
[[!Quip? &thread=`blog-post-[[*id]]` &useGravatar=`0` &requireAuth=`1`]]
```

A comment thread, pagination enabled, having only 5 root comments per page, and a class on each pagination link li tag called 'pageLink':

``` php
[[!Quip? &thread=`blog-post-[[*id]]` &limit=`5` &pageCls=`pageLink`]]
```

## See Also

1. [Quip.Quip](extras/quip/quip.quip)
   1. [Quip.Quip.tplComment](extras/quip/quip.quip/quip.quip.tplcomment)
   2. [Quip.Quip.tplCommentOptions](extras/quip/quip.quip/quip.quip.tplcommentoptions)
   3. [Quip.Quip.tplComments](extras/quip/quip.quip/quip.quip.tplcomments)
   4. [Quip.Quip.tplReport](extras/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](extras/quip/quip.quipreply)
   1. [Quip.QuipReply.tplAddComment](extras/quip/quip.quipreply/quip.quipreply.tpladdcomment)
   2. [Quip.QuipReply.tplLoginToComment](extras/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
   3. [Quip.QuipReply.tplPreview](extras/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](extras/quip/quip.quiprss)
6. [Quip.Roadmap](extras/quip/quip.roadmap)
7. [Quip.Upgrading](extras/quip/quip.upgrading)
   1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/quip.upgrading-to-1.0.1)