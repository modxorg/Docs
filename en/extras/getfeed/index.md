---
title: "getFeed"
_old_id: "650"
_old_uri: "revo/getfeed"
---

## What is getFeed?

A simple snippet to retrieve an RSS feed and iterate the feed items using a Chunk.

## Requirements

- MODX Revolution 2.0.0-RC-2 or later
- PHP5 or later

## History

getFeed was written by [Jason Coward](https://github.com/opengeek) as a simple feed reading component, and first released on June 11th, 2010.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/690>

### Development and Bug Reporting

getFeed is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/getFeed>

Bugs can be filed here: <http://github.com/splittingred/getFeed/issues>

## Usage

getFeed is used by placing the Snippet call into your content and passing a 'url' parameter:

``` php
[[!getFeed? &url=`http://path.com/to/my/rss.feed.rss`]]
```

### Available Properties

| Name          | Description                                                                                                 | Default |
| ------------- | ----------------------------------------------------------------------------------------------------------- | ------- |
| url           | URL of the feed to retrieve.                                                                                |         |
| tpl           | Name of a chunk to serve as an item tpl. If blank, will output the placeholders as arrays.                  |         |
| limit         | Limit the number of items to return; 0 is no limit.                                                         | 0       |
| offset        | The zero-based index of the item to start at in the feed results.                                           | 0       |
| totalVar      | The name of a placeholder where the total number of items in the feed is stored. For getPage compatibility. | total   |
| toPlaceholder | If set, will set the output to this placeholder name. If not set, will output directly the results.         |         |

### Chunk Placeholders

Since different feeds return different placeholders, what is best to get the placeholders available is to pass getFeed without a 'tpl' parameter. This will then show you an array of fields and their values. Their 'indexes', or the key of each array item, can be used in a placeholder.

Some common placeholders are:

- **title** - The title of the post.
- **link** - A direct link to the post.
- **description** - The description of the post.
- **pubdate** - The date the post was published.
- **guid** - The GUID of the post.
- **author** - The name of the author of the post.
- **category** - Any tags or category associations the post has.
- **summary** - A short summary of the post.
- **date\_timestamp** - The timestamp of the post.

## Examples

- [Adding a Twitter Feed](extras/getfeed/getfeed.adding-a-twitter-feed "getFeed.Adding a Twitter Feed")
