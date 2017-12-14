---
title: "Quip.QuipCount"
_old_id: "962"
_old_uri: "revo/quip/quip.quipcount"
---

What is QuipCount?
------------------

QuipCount is an assistance snippet for Quip that can be used to quickly gather the number of comments on a thread, or the number of comments by a user.

Usage
-----

To grab the number of comments on a thread:

```
<pre class="brush: php">
[[QuipCount? &thread=`mythread`]]

```To grab the number of comments by a user with username 'jb2009':

```
<pre class="brush: php">
[[QuipCount? &type=`user` &user=`jb2009`]]

```Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>type</td><td>The type of mode to call QuipCount in. Either "thread" or "user".</td><td>thread</td></tr><tr><td>thread</td><td>If in thread mode, the thread to count comments from.</td><td> </td></tr><tr><td>user</td><td>If in user mode, either the User's ID or username.</td><td> </td></tr></tbody></table>Examples
--------

Get the number of comments in thread "thread32":

```
<pre class="brush: php">
[[QuipCount? &thread=`thread32`]]

```Get the number of comments for user `mikegeorge`:

```
<pre class="brush: php">
[[QuipCount? &type=`user` &user=`mikegeorge`]]

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