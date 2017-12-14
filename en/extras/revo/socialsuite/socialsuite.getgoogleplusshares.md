---
title: "SocialSuite.getGooglePlusShares"
_old_id: "1008"
_old_uri: "revo/socialsuite/socialsuite.getgoogleplusshares"
---

[SocialSuite](/extras/revo/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

getGooglePlusSharesis a [snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns a number indicating the amount of times a certain URL has been **shared** using Google+. At this time, it uses an **unofficial API**, meaning it could potentially break at any given moment until Google releases a supported API.

Snippet Properties
------------------

<table><tbody><tr><th>Property</th><th>Default Value</th><th>Description</th></tr><tr><td>url</td><td>url of current resource</td><td>The url to find the amount of shares for. Note that this needs to be a full url, so when generating URLs using the \[\[~\]\] syntax, make sure to add &scheme=`full`, like this:   
\[\[~15? &scheme=`full`\]\]   
</td></tr><tr><td>cache</td><td>true</td><td>If the result should be cached or not, on by default. Set to 0 to disable (not advised).</td></tr><tr><td>cacheExpires</td><td>3600</td><td>Time (in seconds) the cache is considered valid, and new data is retrieved from facebook.</td></tr></tbody></table>Basic Usage
-----------

Get the amount of shares for the current resource:

```
<pre class="brush: php">
[[!getGooglePlusShares]]

```Get the amount of shares for the url "http://google.com/" and format it nicely using the [prettyNumbers](/extras/revo/socialsuite/socialsuite.prettynumbers "SocialSuite.prettyNumbers") output filter that comes with SocialSuite:

```
<pre class="brush: php">
[[!getGooglePlusShares:prettyNumbers? &url=`http://google.com/`]]

```Run this snippet inside another snippet to get counts of a specific url:

```
<pre class="brush: php">
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getGooglePlusShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Google+.";

```