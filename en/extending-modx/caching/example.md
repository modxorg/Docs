---
title: "Basic Usage"
_old_id: "1381"
_old_uri: "2.x/advanced-features/caching/caching-tutorial-basic-snippets"
---

## Create the Snippets

### Snippet One: Write to Cache

Create a Snippet named **writeCache**:

``` php
$cacheManager = $modx->getCacheManager();
$x = date('H:i:s');
$cacheManager->set('my_cache_key',$x);
return $x;
```

`set()` takes its second argument by reference. A literal — `$cacheManager->set('my_cache_key', date('H:i:s'))` — is a fatal error in PHP, so the timestamp goes into `$x` first.

Put the Snippet on a cacheable Resource, e.g. "Page One":

``` php
[[writeCache]]
```

### Snippet Two: Read from Cache

Create a Snippet named **readCache**:

``` php
$cacheManager = $modx->getCacheManager();
return $cacheManager->get('my_cache_key');
```

Put this Snippet on a different Resource, one that is not cacheable, e.g. "Page Two":

``` php
[[!readCache]]
```

## Observing the Snippets

1. Open "Page One". You will see a timestamp, e.g. '11:44:55'.
2. Open "Page Two" in another browser tab. It shows the _same_ timestamp, and keeps showing it — waiting does not change it.

Now clear the site cache (Content /-> Clear Cache) and open both Resources again.

The timestamp is written only on the first visit to "Page One" after the clear; the second visit is served from the Resource cache.

Clear the site cache again, then open "Page Two" without visiting "Page One" first.

`readCache` returns nothing: the cache is empty and `writeCache` has not run since the cache was cleared.

Now call `writeCache` uncached:

``` php
[[!writeCache]]
```

1. Open "Page One". The timestamp changes on every request.
2. Open "Page Two". It shows the timestamp from the last request to "Page One" — the cached value, unchanged by the uncached call.

## Summary

Both Snippets write to and read from the **default** partition, so their data is cleared together with the site cache (Content /-> Clear Cache). A Snippet that owns its output this way needs no caching partition of its own.

To keep cached data past a site cache clear, and to let it expire on its own, see [Lifetimes](extending-modx/caching/lifetimes).
