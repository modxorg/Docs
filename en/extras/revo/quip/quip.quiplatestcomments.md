---
title: "Quip.QuipLatestComments"
_old_id: "963"
_old_uri: "revo/quip/quip.quiplatestcomments"
---

The QuipLatestComments Snippet
------------------------------

QuipLatestComments is an assistance snippet for Quip that can be used to quickly show the latest comments on a thread, by user, or across the site.

Usage
-----

To grab the latest 5 comments:

```
<pre class="brush: php">
[[!QuipLatestComments]]

```To grab the number of comments on a thread:

```
<pre class="brush: php">
[[QuipLatestComments? &type=`thread` &thread=`mythread`]]

```To grab the number of comments by a user with username 'jb2009':

```
<pre class="brush: php">
[[QuipLatestComments? &type=`user` &user=`jb2009`]]

```Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>type</td><td>The type of mode to call QuipCount in. Either "all", "thread", "family" or "user".</td><td>all</td></tr><tr><td>thread</td><td>If in thread mode, the thread to count comments from.</td><td> </td></tr><tr><td>user</td><td>If in user mode, either the User's ID or username.</td><td> </td></tr><tr><td>family</td><td>If in family mode, a string contained in the thread's name.</td><td> </td></tr><tr><td>tpl</td><td>The chunk to use for each comment.</td><td>quipLatestComment</td></tr><tr><td>limit</td><td>The number of comments to grab.</td></tr><tr><td>start</td><td>The starting index of latest comments.</td><td>0</td></tr><tr><td>stripTags</td><td>Whether or not to strip html tags in the comment.</td><td>true</td></tr><tr><td>bodyLimit</td><td>The number of characters in the comment link before it is truncated and an ellipsis is added.</td><td>30</td></tr><tr><td>rowCss</td><td>The CSS class to put on each row.</td><td>quip-latest-comment</td></tr><tr><td>altRowCss</td><td>The CSS class to put on alternate rows.</td><td>quip-latest-comment-alt</td></tr></tbody></table>Examples
--------

Get the latest comments in thread "thread32", with a body limit of 100 characters:

```
<pre class="brush: php">
[[!QuipLatestComments? &type=`thread` &thread=`thread32` &bodyLimit=`100`]]

```Get the latest 10 comments for user `mikegeorge`:

```
<pre class="brush: php">
[[!QuipLatestComments? &type=`user` &user=`mikegeorge` &limit=`10`]]

```Get the latest 20 comments for all threads beginning with 'blog-post':

```
<pre class="brush: php">
[[!QuipLatestComments? &type=`family` &family=`blog-post` &limit=`10`]]

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