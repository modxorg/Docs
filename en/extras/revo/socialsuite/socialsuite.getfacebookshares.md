---
title: "SocialSuite.getFacebookShares"
_old_id: "1007"
_old_uri: "revo/socialsuite/socialsuite.getfacebookshares"
---

[SocialSuite](/extras/revo/socialsuite "SocialSuite") is a collection of useful tools for integrating various social media into your MODX website.

getFacebookShares is a [snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns a number indicating the amount of times a certain URL has been **shared or commented on** using Facebook.

Snippet Properties
------------------

<table><tbody><tr><th>Property</th><th>Default Value</th><th>Description</th></tr><tr><td>url</td><td>url of current resource</td><td>The url to find the amount of shares for. Note that this needs to be a full url, so when generating URLs using the \[\[~\]\] syntax, make sure to add &scheme=`full`, like this:   
\[\[~15? &scheme=`full`\]\]   
</td></tr><tr><td>cache</td><td>true</td><td>If the result should be cached or not, on by default. Set to 0 to disable (not advised).</td></tr><tr><td>cacheExpires</td><td>3600</td><td>Time (in seconds) the cache is considered valid, and new data is retrieved from facebook.</td></tr><tr><td>node</td><td>shares</td><td>Change to "comments" to get a count of comments for the specific url, usually only available if you have a facebook comment widget on that page, note that this only seems to count root-level comments (so not replies to comments). You can also set this to "id" to see the url that Facebook is checking for.</td></tr></tbody></table>Example Usages
--------------

Get the the amount of shares for the current resource:

```
<pre class="brush: php">
[[!getFacebookShares]]

```Get the amount of facebook comments for the current resource:

```
<pre class="brush: php">
[[!getFacebookShares? &node=`comments`]]

```Get the amount of facebook comments for a resource in a getResources tpl:

```
<pre class="brush: php">
Comments: [[!getFacebookShares? &node=`comments` &url=`[[~[[+id]]? &scheme=`full`]]`]]

```Get the amount of shares for the url "http://google.com/" and format it nicely using the prettyNumbers output filter that comes with SocialSuite:

```
<pre class="brush: php">
[[!getFacebookShares:prettyNumbers? &url=`http://google.com/`]]

```Run this snippet inside another snippet to get counts of a specific url:

```
<pre class="brush: php">
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getFacebookShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Facebook.";

```