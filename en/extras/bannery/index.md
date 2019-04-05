---
title: "BannerY"
_old_id: "607"
_old_uri: "revo/bannery"
---

# BannerY

Display images with hyperlinks at designated positions in a page. Fork from Jeroen Kenters BannerX (it was removed from MODX repository by author).

## Usage

``` php 
[[BannerY? &position=`1` &sortby=`RAND()` &limit=`1`]]
```

This will retrieve randomly one banner that is set to be active for assigned position 1.

## Available Properties

| Name | Description | Default |
|------|-------------|---------|
| tpl | Name of a chunk serving as a recourse template | byAd |
| sortdir | Order of the results | ASC |
| sortby | Return results in random order | RAND() |
| limit | If set to non-zero, will only show X number of items | 5 |
| position | If set to non-zero, will retrieve only images that are assigned to the position given. | 0 |

## Available Placeholders

| Name | Description |
|------|-------------|
| adposition |  |
| idx | The index of banner in this position |
| image | The image assigned to this banner |
| name | The name assigned to this banner |
| url | The url assigned to this banner |
| description | Any text message for this banner |