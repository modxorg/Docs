---
title: "BannerX"
_old_id: "606"
_old_uri: "revo/bannerx"
---

# BannerX 

**BannerX has been replaced with [BannerY](/extras/revo/bannery "BannerY")**

Display images with hyperlinks at designated positions in a page. The developer is Bezumkin / Jeroen Kenters.

## Version 

0.2.0 beta, released 10th of May 2012.

## Usage 

``` php 
[[BannerX? &position=`1` &sortby=`RAND()` &limit=`1`]]
```

This will retrieve randomly one banner that is set to be active for assigned position 1.

## Available Properties 

| Name | Description | Default |
|------|-------------|---------|
| tpl | Name of a chunk serving as a recourse template | bxAd |
| sortdir | Order of the results | ASC |
| sortby | Return results in random order | RAND() |
| limit | If set to non-zero, will only show X number of items | 5 |
| position | If set to non-zero, will retrieve only images that are assigned to the position given. | 0 |

## Available Placeholders 

| Name | Description |
|------|-------------|
| adposition |  |
| image | The image assigned to this banner |
| name | The name assigned to this banner |
| url | The url assigned to this banner |
