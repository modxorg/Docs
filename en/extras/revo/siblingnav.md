---
title: "siblingNav"
_old_id: "710"
_old_uri: "revo/siblingnav"
---

<div>- [What is siblingNav?](#siblingNav-WhatissiblingNav%3F)
  - [Requirements](#siblingNav-Requirements)
  - [Download & Installation](#siblingNav-Download%26Installation)
- [Using siblingNav](#siblingNav-UsingsiblingNav)
  - [siblingNav Properties](#siblingNav-siblingNavProperties)
  - [Examples](#siblingNav-Examples)
- [External sources](#siblingNav-Externalsources)

</div>What is siblingNav?
===================

siblingNav is a snippet for MODx Revolution which can generate Navigation to Resource-Siblings.

siblingNav was first released on November 10, 2011 and was created by Bruno Perner for [BD Creative](http://www.bdcreative.de/).

Requirements
------------

siblingNav was created as a Revolution snippet, and should work on all versions since 2.0.0

Download & Installation
-----------------------

Install siblingNav by Package-Management

Using siblingNav
================

siblingNav Properties
---------------------

<table><tbody><tr><th>PROPERTY</th><th>DEFAULT</th><th>DESCRIPTION</th></tr><tr><td>rowTpl</td><td>snrow</td><td>chunk for siblings</td></tr><tr><td>selfTpl</td><td>snself</td><td>chunk for active row</td></tr><tr><td>prevTpl</td><td>snprev</td><td>chunk for previous-link</td></tr><tr><td>nextTpl</td><td>snnext</td><td>chunk for next-link</td></tr><tr><td>firstTpl</td><td>snfirst</td><td>chunk for link to first resource</td></tr><tr><td>lastTpl</td><td>snlast</td><td>chunk for link to last resource</td></tr><tr><td>placeholderPrefix</td><td>sn.</td><td>example: \[<span class="error">\[+sn.next\]</span>\]</td></tr><tr><td>id</td><td>modx-recource-id</td><td>the resourceid from where to get the siblings</td></tr><tr><td>parents</td><td>false</td><td>commaseperated, get siblings from more than one parent</td></tr><tr><td>showDeleted</td><td>0</td><td> </td></tr><tr><td>showUnpublished</td><td>0</td><td> </td></tr><tr><td>showHidden</td><td>0</td><td> </td></tr><tr><td>sortBy</td><td>```

 {"menuindex":"ASC","id":"ASC"} 

```</td><td>JSON-string with resource-fields for sorting</td></tr><tr><td>limit</td><td>false</td><td> </td></tr></tbody></table>you can find the default chunk-files here: <https://github.com/Bruno17/siblingnav/tree/master/core/components/siblingnav/elements/chunks>

Examples
--------

Minimum call for getting a navigation with all siblings

```
<pre class="brush: php">
[[!siblingNav]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]

```Advanced calls for getting a navigation with parents and navigate between childs of multiple parents

```
<pre class="brush: php">
[[!siblingNav? &limit=`7` &id=`[[*parent]]` &placeholderPrefix=`snparent.`]]
[[+snparent.prev]][[+snparent.prevlinks]][[+snparent.self]][[+snparent.nextlinks]][[+snparent.next]]

[[!siblingNav? &limit=`9` &parents=`29,261`]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]

```You should use firstChildRedirect in parent resources.

External sources
================

Github repository: <https://github.com/Bruno17/siblingnav>