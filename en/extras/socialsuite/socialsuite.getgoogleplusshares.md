---
title: "getGooglePlusShares"
_old_id: "1008"
_old_uri: "revo/socialsuite/socialsuite.getgoogleplusshares"
---

[SocialSuite](extras/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

getGooglePlusSharesis a [snippet](developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns a number indicating the amount of times a certain URL has been **shared** using Google+. At this time, it uses an **unofficial API**, meaning it could potentially break at any given moment until Google releases a supported API.

## Snippet Properties

| Property                  | Default Value           | Description                                                                                                                                                                    |
| ------------------------- | ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| url                       | url of current resource | The url to find the amount of shares for. Note that this needs to be a full url, so when generating URLs using the `[[~]]` syntax, make sure to add &scheme=`full`, like this: |
| `[[~15? &scheme=`full`]]` |
| cache                     | true                    | If the result should be cached or not, on by default. Set to 0 to disable (not advised).                                                                                       |
| cacheExpires              | 3600                    | Time (in seconds) the cache is considered valid, and new data is retrieved from facebook.                                                                                      |

## Basic Usage

Get the amount of shares for the current resource:

``` php
[[!getGooglePlusShares]]
```

Get the amount of shares for the url "`http://google.com/`" and format it nicely using the [prettyNumbers](extras/socialsuite/socialsuite.prettynumbers "SocialSuite.prettyNumbers") output filter that comes with SocialSuite:

``` php
[[!getGooglePlusShares:prettyNumbers? &url=`http://google.com/`]]
```

Run this snippet inside another snippet to get counts of a specific url:

``` php
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getGooglePlusShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Google+.";
```
