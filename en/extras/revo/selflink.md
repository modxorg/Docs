---
title: "selfLink"
_old_id: "708"
_old_uri: "revo/selflink"
---

<div>- [What is selfLink?](#selfLink-WhatisselfLink%3F)
  - [Requirements](#selfLink-Requirements)
  - [Download & Installation](#selfLink-Download%26Installation)
- [Using selfLink](#selfLink-UsingselfLink)
  - [Examples](#selfLink-Examples)
- [External sources](#selfLink-Externalsources)

</div>What is selfLink?
=================

selfLink is a simple snippet for MODx Revolution which can help create links or anchors to a page by direction like 'up', 'next' and 'previous'.

selfLink was first released on March 8, 2011 and was created by Bert Oost.

Requirements
------------

selfLink was created as a Revolution snippet, and should function on all versions since 2.0.0. If you notice inconsistencies in certain versions, please inform the developer on the forum topic.

Download & Installation
-----------------------

To get started using the selfLink snippet, simply go to System -> Package Manager -> Add new extra -> provider: modxcms.com -> MODx add-ons -> Content and find selfLink. Download the package, and install it in the main package manager workspace.

Using selfLink
==============

selfLink is an easy to use snippet which can be used in a few different ways using the parameters.

<table><tbody><tr><th>Parameter</th><th>Description   
</th><th>Default value   
</th></tr><tr><td>direction   
</td><td>Enter one of the values like 'up', 'next' or 'previous   
</td><td> </td></tr><tr><td>id   
</td><td>(optional) Enter the ID of the resource where the link must be from   
</td><td>Current page ID   
</td></tr><tr><td>tpl   
</td><td>(optional) The chunkname to use for the link presentation   
</td><td><a href="...">Title</a>   
</td></tr><tr><td>linktext   
</td><td>(optional) Alternative link text. When not entered, the resource pagetitle is used   
</td><td> </td></tr></tbody></table>Examples
--------

Minimum call for getting a link to the next resource in the tree

```
<pre class="brush: php">
[[selfLink? &direction=`next`]]

```External sources
================

Forum topic for selfLink 0.1-rc1: (soon)

Github repository: <https://github.com/bertoost/MODx-SelfLink>