---
title: "Lifetimes"
_old_id: "1382"
_old_uri: "2.x/advanced-features/caching/caching-tutorial-lifetimes"
---

A lifetime is how long a cached value stays valid. Once it expires, `get()` returns `null` and the caller has to calculate the value again.

## Create a Snippet

Create a Snippet named **testCache** with this code:

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

The value is written on the first request and read on every request after that, until the lifetime runs out and `get()` returns `null` again.

## Reference the Snippet

A Snippet that manages its own caching must be called uncached. The uncached call bypasses the standard Resource caching, so your code stays in control of the value.

``` php
[[!testCache]]
```

## Observations

Open the Resource that calls `testCache` and refresh it repeatedly. The timestamp changes only once every 10 seconds.

This Snippet writes to the **default** partition, so clearing the site cache clears it too. That is why the original 10-second lifetime is hard to observe: you get a fresh 10 seconds each time you clear the cache. Raise `$lifetime` to 60 seconds to watch it expire without clearing.

Data in a partition of your own survives clearing the site cache: `refresh()` clears the fixed list of core partitions, and a partition that is not on that list is never touched. Pass the partition in `$options` — see [Programmatic (Custom) Caching](extending-modx/caching/#programmatic-caching).

## Summary

A lifetime is worth setting when the value is expensive to calculate and stays correct for a while — an intensive database query, a slow API call. Caching it for a few seconds keeps that work off every request.
