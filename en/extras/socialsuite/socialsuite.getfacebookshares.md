---
title: "getFacebookShares"
_old_id: "1007"
_old_uri: "revo/socialsuite/socialsuite.getfacebookshares"
---

[SocialSuite](extras/socialsuite "SocialSuite") is a collection of useful tools for integrating various social media into your MODX website.

getFacebookShares is a [snippet](developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns a number indicating the amount of times a certain URL has been **shared or commented on** using Facebook.

## Snippet Properties

| Property                  | Default Value           | Description                                                                                                                                                                                                                                                                                                       |
| ------------------------- | ----------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| url                       | url of current resource | The url to find the amount of shares for. Note that this needs to be a full url, so when generating URLs using the `[[~]]` syntax, make sure to add &scheme=`full`, like this:                                                                                                                                    |
| `[[~15? &scheme=`full`]]` |
| cache                     | true                    | If the result should be cached or not, on by default. Set to 0 to disable (not advised).                                                                                                                                                                                                                          |
| cacheExpires              | 3600                    | Time (in seconds) the cache is considered valid, and new data is retrieved from facebook.                                                                                                                                                                                                                         |
| node                      | shares                  | Change to "comments" to get a count of comments for the specific url, usually only available if you have a facebook comment widget on that page, note that this only seems to count root-level comments (so not replies to comments). You can also set this to "id" to see the url that Facebook is checking for. |

## Example Usages

Get the the amount of shares for the current resource:

``` php
[[!getFacebookShares]]
```

Get the amount of facebook comments for the current resource:

``` php
[[!getFacebookShares? &node=`comments`]]
```

Get the amount of facebook comments for a resource in a getResources tpl:

``` php
Comments: [[!getFacebookShares? &node=`comments` &url=`[[~[[+id]]? &scheme=`full`]]`]]
```

Get the amount of shares for the url "`http://google.com/`" and format it nicely using the prettyNumbers output filter that comes with SocialSuite:

``` php
[[!getFacebookShares:prettyNumbers? &url=`http://google.com/`]]
```

Run this snippet inside another snippet to get counts of a specific url:

``` php
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getFacebookShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Facebook.";
```
