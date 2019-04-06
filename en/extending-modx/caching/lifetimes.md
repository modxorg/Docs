---
title: "Lifetimes"
_old_id: "1382"
_old_uri: "2.x/advanced-features/caching/caching-tutorial-lifetimes"
---

A common need is the ability to control how long a piece of data should live – how long before it expires and is no longer good?. Just like with bottles of milk, knowing the expiration date can tell us whether our data is still good or if we need to recalculate it.

## Create a Snippet

In this example, we are going to create a snippet that stores a bit of data for a short period of time. Paste the following bit of code into a new Snippet named "testCache" and then save it.

``` php
<?php
$cacheManager = $modx->getCacheManager();

$lifetime = 10; // in seconds

if (!$payload = $cacheManager->get('my_cache_key')) {
    $payload = date('H:i:s');
    $cacheManager->set('my_cache_key',$payload, $lifetime);
}

return $payload;
```

The trick here is that the output from the cacheManager will be null if the data either does not exist or has expired.

## Reference the Snippet

When you reference a snippet that is using custom caching like this, you _must_ call it uncached. That bypasses the standard caching mechanisms and it allows your code to take caching into its own hands.

``` php
[[!testCache]]
```

## Observations

When you view your page containing the `testCache`. Refresh the page frequently. You should notice that the datestamp only refreshes every 10 seconds!

When you clear the Site's cache, your cached data will get cleared out, so you can trigger a new datestamp by clearing your site's cache (this is a bit easier to see if you bump up your lifetime to 60 seconds or so).

If you want your data to stick around even after a user has cleared the site cache, you need to set up your own caching partition – that's in a different tutorial. The example here is ideal for caching data that has something to do with pages because the cache will get cleared when a page is updated.

## Summary

Setting custom lifetimes for your cached data can be a great way to help your site take a load off. Caching data for even a minute or two (or even a few seconds) can make the difference between a responsive web server and a crippled site. In our example, we are are calculating the current date for demonstration purposes, but think about how this technique can save CPU cycles when the thing than you are calculating is particularly intensive, say an intensive database query or a slow API call.
