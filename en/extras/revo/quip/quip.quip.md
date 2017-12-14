---
title: "Quip.Quip"
_old_id: "957"
_old_uri: "revo/quip/quip.quip"
---

The Quip Snippet
----------------

This snippet displays all the comments for a given thread.

Usage
-----

Simply place the snippet wherever you would like to display a comment thread, and specify what the name of that thread will be.

```
<pre class="brush: php">
[[!Quip? &thread=`myThread`]]

```Available Properties
--------------------

<table id="TBL1376497247027"><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>thread</td><td>The ID of the thread you want to reference. This can be anything - and will be the reference point for any related comments.</td><td>n/a</td></tr><tr><td>parent</td><td>The parent to start at when displaying the thread.</td><td>0</td></tr><tr><td>threaded</td><td>Whether or not this thread can have threaded comments. Threaded comments allow users to comment on comments, increasing the level of indentation. Non-threaded comments allow users to comment only on the parent article, not on the comments.</td><td>1</td></tr><tr><td>maxDepth</td><td>The maximum depth that replies can be made in a threaded comment thread.</td><td>5</td></tr><tr><td>replyResourceId</td><td>The ID of the Resource where the QuipReply snippet is held, for replying to threaded comments.</td><td> </td></tr><tr><td>threadedPostMargin</td><td>The margin, in pixels, by which threaded comments are moved right for each depth level that they go.</td><td>15</td></tr><tr><td>useMargins</td><td>Instead of using ol/li tags, do divs with margin styles (old Quip style)</td><td>0</td></tr><tr><td>closed</td><td>If set to true, the thread will not accept new comments.</td><td>0</td></tr><tr><td>closeAfter</td><td>The number of days at which the thread will automatically close after it was created. Set to 0 to leave open indefinitely.</td><td>14</td></tr><tr><td>dateFormat</td><td>The format of the date to show for a comment's post date. The syntax is in PHP [strftime](http://php.net/strftime) format.</td><td>%b %d, %Y at %I:%M %p</td></tr><tr><td>requireAuth</td><td>If set to true, only logged in users will be able to comment on the thread.</td><td>0</td></tr><tr><td>useCss</td><td>If true, Quip will provide a basic CSS template for the presentation.</td><td>1</td></tr><tr><td>altRowCss</td><td>The CSS class to put on alternating comments.</td><td>quip-comment-alt</td></tr><tr><td>nameField</td><td>The field to use for the author name of each comment. Recommended values are "name" or "username".</td><td>username</td></tr><tr><td>showAnonymousName</td><td>If true, will display the value of anonymousName property (defaults to "Anonymous") if the user is not logged in when posting.</td><td>0</td></tr><tr><td>anonymousName</td><td>The name to display for anonymous postings. Defaults to "Anonymous".</td><td> </td></tr><tr><td>allowRemove</td><td>Allow logged-in users to remove their own postings.</td><td>1</td></tr><tr><td>removeThreshold</td><td>If allowRemove is true, the number of minutes a user can remove their posting after they have posted it.</td><td>3</td></tr><tr><td>allowReportAsSpam</td><td>Allow logged-in users to report comments as spam.</td><td>1</td></tr><tr><td>useGravatar</td><td>Whether or not to show Gravatar icons in comments.</td><td>1</td></tr><tr><td>gravatarIcon</td><td>The type of Gravatar icon to use for a user without a Gravatar.</td><td>identicon</td></tr><tr><td>gravatarSize</td><td>The size in pixels of the Gravatar.</td><td>50</td></tr><tr><td>sortBy</td><td>The field to sort comments by. If threading is on (the default behavior, or set explicitly via &threaded=`1`), then it's best leave this alone.</td><td>rank</td></tr><tr><td>sortByAlias</td><td>The alias of classes to use with sort by.</td><td>quipComment</td></tr><tr><td>sortDir</td><td>The direction to sort by.</td><td>ASC</td></tr><tr><td>tplComment</td><td>A chunk for the comment itself.</td><td> </td></tr><tr><td>tplCommentOptions</td><td>A chunk for the options, such as delete, shown to an owner of a comment.</td><td> </td></tr><tr><td>tplComments</td><td>The outer wrapper for comments. Can either be a chunk name or value. If set to a value, will override the chunk.</td><td> </td></tr><tr><td>tplReport</td><td>The link on a comment to report as spam. Can either be a chunk name or value. If set to a value, will override the chunk.</td><td> </td></tr><tr><td>removeAction</td><td>The name of the submit field to remove a comment post.</td><td>quip-remove</td></tr><tr><td>reportAction</td><td>The name of the submit field to report as spam a comment post.</td><td>quip-report</td></tr><tr><td>idPrefix</td><td>If you want to use multiple Quip instances on a page, change this ID prefix.</td><td>qcom</td></tr><tr><td>limit</td><td>The number of comments to limit per page. Setting this to a non-zero number will enable pagination.</td><td>0</td></tr><tr><td>start</td><td>The default comment index to start on. Recommended to leave at 0.</td><td>0</td></tr><tr><td>tplPagination</td><td>A chunk for the pagination OL wrapper.</td><td> </td></tr><tr><td>tplPaginationItem</td><td>A chunk for each non-current pagination number link.</td><td> </td></tr><tr><td>tplPaginationCurrentItem</td><td>A chunk for the current pagination number link.</td><td> </td></tr><tr><td>paginationCls</td><td>A CSS class to put on the pagination OL wrapper.</td><td>quip-pagination</td></tr><tr><td>pageCls</td><td>A CSS class to put on a non-current pagination number link.</td><td>quip-page-number</td></tr><tr><td>currentPageCls</td><td>A CSS class to put on the current pagination number.</td><td>quip-page-current</td></tr></tbody></table>Quip Chunks
-----------

There are 4 chunks that are processed in Quip. Their corresponding parameters are:

- [tplComment](/extras/revo/quip/quip.quip/quip.quip.tplcomment "Quip.Quip.tplComment")
- [tplCommentOptions](/extras/revo/quip/quip.quip/quip.quip.tplcommentoptions "Quip.Quip.tplCommentOptions")
- [tplComments](/extras/revo/quip/quip.quip/quip.quip.tplcomments "Quip.Quip.tplComments")
- [tplReport](/extras/revo/quip/quip.quip/quip.quip.tplreport "Quip.Quip.tplReport")

Examples
--------

A sample code line for a blog post that's on a Resource with no threading:

```
<pre class="brush: php">
[[!Quip? &thread=`blog-post-[[*id]]` &threaded=`0`]]

```A threaded comment thread, but only allowed to go 3 levels deep, and auto-close after 21 days:

```
<pre class="brush: php">
[[!Quip? &thread=`blog-post-[[*id]]` &maxDepth=`3` &closeAfter=`21`]]

```A comment thread, with threading, with Gravatars disabled, and only allowing logged-in comments:

```
<pre class="brush: php">
[[!Quip? &thread=`blog-post-[[*id]]` &useGravatar=`0` &requireAuth=`1`]]

```A comment thread, pagination enabled, having only 5 root comments per page, and a class on each pagination link li tag called 'pageLink':

```
<pre class="brush: php">
[[!Quip? &thread=`blog-post-[[*id]]` &limit=`5` &pageCls=`pageLink`]]

```See Also
--------

1. [Quip.Quip](/extras/revo/quip/quip.quip)
  1. [Quip.Quip.tplComment](/extras/revo/quip/quip.quip/quip.quip.tplcomment)
  2. [Quip.Quip.tplCommentOptions](/extras/revo/quip/quip.quip/quip.quip.tplcommentoptions)
  3. [Quip.Quip.tplComments](/extras/revo/quip/quip.quip/quip.quip.tplcomments)
  4. [Quip.Quip.tplReport](/extras/revo/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](/extras/revo/quip/quip.quipcount)
3. [Quip.QuipLatestComments](/extras/revo/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](/extras/revo/quip/quip.quipreply)
  1. [Quip.QuipReply.tplAddComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpladdcomment)
  2. [Quip.QuipReply.tplLoginToComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
  3. [Quip.QuipReply.tplPreview](/extras/revo/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](/extras/revo/quip/quip.quiprss)
6. [Quip.Roadmap](/extras/revo/quip/quip.roadmap)
7. [Quip.Upgrading](/extras/revo/quip/quip.upgrading)
  1. [Quip.Upgrading to 1.0.1](/extras/revo/quip/quip.upgrading/quip.upgrading-to-1.0.1)