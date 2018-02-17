---
title: "Caching Tutorial - Basic Snippets"
_old_id: "1381"
_old_uri: "2.x/advanced-features/caching/caching-tutorial-basic-snippets"
---

This page is designed to demonstrate some basic principles about the MODX cache manager and how it can be used to help you write more effective Snippets.

## Create Our Snippets

### Snippet One: Write to Cache

Here's our first Snippet, named **cacheWrite**:

```
<pre class="brush: php">
$cacheManager = $modx->getCacheManager();
$x = date('H:i:s');
$cacheManager->set('my_cache_key',$x);
return $x;

```Remember that we need to use the $x variable as an intermediary because the cacheManager relies on variable references. You can't simply pass it a static value.

This snippet simple stores the current timestamp to a cache key named "my\_cache\_key". Put this Snippet on a page in your site (CACHED), e.g. on "Page One":

```
<pre class="brush: php">
[[writeCache]]

```### Snippet Two: Read from Cache

Next, we will create simple snippet that will _read_ values from the cache, named **readCache**:

```
<pre class="brush: php">
$cacheManager = $modx->getCacheManager();
return $cacheManager->get('my_cache_key');

```And put this Snippet onto a different page on your site (UNCACHED), e.g. on "Page Two":

```
<pre class="brush: php">
[[!readCache]]

```## Observing our Snippets

1\. First, navigate to "Page One" (or just preview that page in your site). You should see a simple timestamp, e.g. '11:44:55'. 
2\. Next, navigate to "Page Two" on your site in a separate browser tab. You should see the _same_ timestamp, e.g. '11:44:55'. Even if you wait 5 minutes, the timestamp should not change.

1. Clear the Site cache (Site /-> Clear Cache), then repeat this process. What do you see?

You should notice that the timestamp gets set only when you _first_ visit Page One.

Try this:

1\. Clear your Site Cache 
2\. Visit Page Two. What happens?

You should notice that Page Two and the `readCache` Snippet returns nothing when the cache is empty and the `writeCache` snippet hasn't written anything to the cache.

Next, try this:

1\. Edit "Page One" so that it calls `writeCache` uncached:

```
<pre class="brush: php">
[[!writeCache]]

```2\. Visit "Page One" in a browser. Notice the timestamp. 
3\. Refresh "Page One". Notice that the timestamp updates. 
4\. Visit "Page Two" in a browser. What timestamp does it show?

You'll see that "Page Two" in this scenario will always show the timestamp from the last time "Page One" was accessed.

## Summary

This page demonstrated some basic principles of the cache manager, but even with these basic functions, you can do a lot more with your Snippets. You can write custom data to the MODX cache and have that data get cleared out when the Site's cache is cleared. This is useful when you need some extra control over your Snippet output and you don't want to go through the hassle of creating your own caching partition. Cached data in these examples has a lifetime that is the same as the other cached data for resources: it gets updated when you manually update it in your snippets, or when you clear your site's cache using the "Site -> Clear Cache" menu.