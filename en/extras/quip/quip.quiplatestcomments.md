---
title: "QuipLatestComments"
_old_id: "963"
_old_uri: "revo/quip/quip.quiplatestcomments"
---

## The QuipLatestComments Snippet

QuipLatestComments is an assistance snippet for Quip that can be used to quickly show the latest comments on a thread, by user, or across the site.

## Usage

To grab the latest 5 comments:

``` php
[[!QuipLatestComments]]
```

To grab the number of comments on a thread:

``` php
[[QuipLatestComments? &type=`thread` &thread=`mythread`]]
```

To grab the number of comments by a user with username 'jb2009':

``` php
[[QuipLatestComments? &type=`user` &user=`jb2009`]]
```

## Available Properties

| Name      | Description                                                                                   | Default Value           |
| --------- | --------------------------------------------------------------------------------------------- | ----------------------- |
| type      | The type of mode to call QuipCount in. Either "all", "thread", "family" or "user".            | all                     |
| thread    | If in thread mode, the thread to count comments from.                                         |                         |
| user      | If in user mode, either the User's ID or username.                                            |                         |
| family    | If in family mode, a string contained in the thread's name.                                   |                         |
| tpl       | The chunk to use for each comment.                                                            | quipLatestComment       |
| limit     | The number of comments to grab.                                                               |
| start     | The starting index of latest comments.                                                        | 0                       |
| stripTags | Whether or not to strip html tags in the comment.                                             | true                    |
| bodyLimit | The number of characters in the comment link before it is truncated and an ellipsis is added. | 30                      |
| rowCss    | The CSS class to put on each row.                                                             | quip-latest-comment     |
| altRowCss | The CSS class to put on alternate rows.                                                       | quip-latest-comment-alt |

## Examples

Get the latest comments in thread "thread32", with a body limit of 100 characters:

``` php
[[!QuipLatestComments? &type=`thread` &thread=`thread32` &bodyLimit=`100`]]
```

Get the latest 10 comments for user `mikegeorge`:

``` php
[[!QuipLatestComments? &type=`user` &user=`mikegeorge` &limit=`10`]]
```

Get the latest 20 comments for all threads beginning with 'blog-post':

``` php
[[!QuipLatestComments? &type=`family` &family=`blog-post` &limit=`10`]]
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