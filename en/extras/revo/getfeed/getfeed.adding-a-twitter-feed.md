---
title: "getFeed.Adding a Twitter Feed"
_old_id: "886"
_old_uri: "revo/getfeed/getfeed.adding-a-twitter-feed"
---

<div class="warning">**Do NOT use this method for showing a twitter feed!**  
Twitter has deprecated their API v1.0 (which this tutorial makes use of) and it will be disabled COMPLETELY starting June 11th. See <https://dev.twitter.com/blog/api-blackout-testing-continues-may-22-2013> for more information from Twitter.

You can use JSONDerulo (<http://modx.com/extras/package/jsonderulo>) or TwitterX (<http://modx.com/extras/package/twitterx>) to show twitter feeds instead.

</div><del>Adding Twitter to Your Site</del>
--------------------------------------

<del>This tutorial shows you how to add Twitter feeds to your site through</del> <del>[getFeed](/extras/revo/getfeed "getFeed")</del><del>.</del>

<del>Adding the getFeed Call</del>
----------------------------------

<del>First off, after you've downloaded and installed getFeed, place this Snippet call wherever you want the Twitter feed to show up:</del>

```
<pre class="brush: php">
<ul>
[[!getFeed?
   &url=`http://twitter.com/statuses/user_timeline/123456789.rss`
   &tpl=`twitterFeedTpl`
   &limit=`3`
]]
</ul>

```<del>Make sure to change the number there to your own Twitter user ID or username.</del>

<del>So we're calling this snippet uncached, and pointing it to our public Twitter timeline. Then we only want the latest 3 tweets. From there, create a 'twitterFeedTpl' Chunk, and put this in it:</del>

```
<pre class="brush: php">
<div class="tweet">
    <p>[[+description]]
    <br /><a href="[[+link]]">[[+pubDate:ago]]</a> via [[+twitter.source]]</p>
</div>

```<del>There we go! Our Twitter feed now shows up. Note we have our :ago</del> <del>[filter](/revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)")</del><del>, which formats the date in a nice, "X minutes, X hours" ago format.</del>

<div class="note"><del>Note that the placeholder to use for the date (as well as any other placeholders) can</del> **<del>depend on the feed</del>**<del>. Check the raw XML source of a feed to see in what item the data is stored, and use that.</del></div>See Also
--------

1. [getFeed.Adding a Twitter Feed](/extras/revo/getfeed/getfeed.adding-a-twitter-feed)