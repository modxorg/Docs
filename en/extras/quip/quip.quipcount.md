---
title: "QuipCount"
_old_id: "962"
_old_uri: "revo/quip/quip.quipcount"
---

## What is QuipCount?

QuipCount is an assistance snippet for Quip that can be used to quickly gather the number of comments on a thread, or the number of comments by a user.

## Usage

To grab the number of comments on a thread:

``` php 
[[QuipCount? &thread=`mythread`]]
```

To grab the number of comments by a user with username 'jb2009':

``` php 
[[QuipCount? &type=`user` &user=`jb2009`]]
```

## Available Properties

| Name | Description | Default Value |
|------|-------------|---------------|
| type | The type of mode to call QuipCount in. Either "thread" or "user". | thread |
| thread | If in thread mode, the thread to count comments from. |  |
| user | If in user mode, either the User's ID or username. |  |

## Examples

Get the number of comments in thread "thread32":

``` php 
[[QuipCount? &thread=`thread32`]]
```

Get the number of comments for user `mikegeorge`:

``` php 
[[QuipCount? &type=`user` &user=`mikegeorge`]]
```

## See Also

1. [Quip.Quip](/extras/quip/quip.quip)
  1. [Quip.Quip.tplComment](/extras/quip/quip.quip/quip.quip.tplcomment)
  2. [Quip.Quip.tplCommentOptions](/extras/quip/quip.quip/quip.quip.tplcommentoptions)
  3. [Quip.Quip.tplComments](/extras/quip/quip.quip/quip.quip.tplcomments)
  4. [Quip.Quip.tplReport](/extras/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](/extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](/extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](/extras/quip/quip.quipreply)
  1. [Quip.QuipReply.tplAddComment](/extras/quip/quip.quipreply/quip.quipreply.tpladdcomment)
  2. [Quip.QuipReply.tplLoginToComment](/extras/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
  3. [Quip.QuipReply.tplPreview](/extras/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](/extras/quip/quip.quiprss)
6. [Quip.Roadmap](/extras/quip/quip.roadmap)
7. [Quip.Upgrading](/extras/quip/quip.upgrading)
  1. [Quip.Upgrading to 1.0.1](/extras/quip/quip.upgrading/quip.upgrading-to-1.0.1)