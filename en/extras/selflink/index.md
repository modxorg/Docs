---
title: "selfLink"
_old_id: "708"
_old_uri: "revo/selflink"
---

## What is selfLink?

selfLink is a simple snippet for MODX Revolution which can help create links or anchors to a page by direction like 'up', 'next' and 'previous'.

selfLink was first released on March 8, 2011 and was created by Bert Oost.

## Requirements

selfLink was created as a Revolution snippet, and should function on all versions since 2.0.0. If you notice inconsistencies in certain versions, please inform the developer on the forum topic.

## Download & Installation

To get started using the selfLink snippet, simply go to System -> Package Manager -> Add new extra -> provider: modxcms.com -> MODx add-ons -> Content and find selfLink. Download the package, and install it in the main package manager workspace.

## Using selfLink

selfLink is an easy to use snippet which can be used in a few different ways using the parameters.

| Parameter | Description                                                                        | Default value             |
| --------- | ---------------------------------------------------------------------------------- | ------------------------- |
| direction | Enter one of the values like 'up', 'next' or 'previous                             |                           |
| id        | (optional) Enter the ID of the resource where the link must be from                | Current page ID           |
| tpl       | (optional) The chunkname to use for the link presentation                          | `<a href="...">Title</a>` |
| linktext  | (optional) Alternative link text. When not entered, the resource pagetitle is used |                           |

## Examples

Minimum call for getting a link to the next resource in the tree

``` php
[[selfLink? &direction=`next`]]
```

## External sources

Forum topic for selfLink 0.1-rc1: (soon)

Github repository: <https://github.com/bertoost/MODx-SelfLink>
