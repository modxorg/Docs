---
title: "siblingNav"
_old_id: "710"
_old_uri: "revo/siblingnav"
---

## What is siblingNav?

siblingNav is a snippet for MODx Revolution which can generate Navigation to Resource-Siblings.

siblingNav was first released on November 10, 2011 and was created by Bruno Perner for [BD Creative](http://www.bdcreative.de/).

## Requirements

siblingNav was created as a Revolution snippet, and should work on all versions since 2.0.0

## Download & Installation

Install siblingNav by Package-Management

## Using siblingNav

## siblingNav Properties

| PROPERTY          | DEFAULT          | DESCRIPTION                                            |
| ----------------- | ---------------- | ------------------------------------------------------ |
| rowTpl            | snrow            | chunk for siblings                                     |
| selfTpl           | snself           | chunk for active row                                   |
| prevTpl           | snprev           | chunk for previous-link                                |
| nextTpl           | snnext           | chunk for next-link                                    |
| firstTpl          | snfirst          | chunk for link to first resource                       |
| lastTpl           | snlast           | chunk for link to last resource                        |
| placeholderPrefix | sn.              | example: \[\[+sn.next\]\]                              |
| id                | modx-recource-id | the resourceid from where to get the siblings          |
| parents           | false            | commaseperated, get siblings from more than one parent |
| showDeleted       | 0                |                                                        |
| showUnpublished   | 0                |                                                        |
| showHidden        | 0                |                                                        |
| sortBy            | ```              |
 {"menuindex":"ASC","id":"ASC"} 
``` | JSON-string with resource-fields for sorting |
| limit | false |  |

you can find the default chunk-files here: <https://github.com/Bruno17/siblingnav/tree/master/core/components/siblingnav/elements/chunks>

## Examples

Minimum call for getting a navigation with all siblings

``` php
[[!siblingNav]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]
```

Advanced calls for getting a navigation with parents and navigate between childs of multiple parents

``` php
[[!siblingNav? &limit=`7` &id=`[[*parent]]` &placeholderPrefix=`snparent.`]]
[[+snparent.prev]][[+snparent.prevlinks]][[+snparent.self]][[+snparent.nextlinks]][[+snparent.next]]

[[!siblingNav? &limit=`9` &parents=`29,261`]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]
```

You should use firstChildRedirect in parent resources.

## External sources

Github repository: <https://github.com/Bruno17/siblingnav>
