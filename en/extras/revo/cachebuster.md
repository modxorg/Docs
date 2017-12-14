---
title: "cachebuster"
_old_id: "1390"
_old_uri: "revo/cachebuster"
---

 [Cachebuster](http://modx.com/extras/package/cachebuster) allows you to easily control whether or not assets are loaded fresh from the server or versioned by a site version setting. Simply append the smartcache Chunk to the end of your asset URLs as seen below.

Using Cachebuster
-----------------

 ```
<pre class="brush: php">
<link rel="stylesheet" href="[[++assets_url]]css/styles.css?nc=[[$smartcache]]">

``` If the `cb.cachebust``System Setting` is enabled the asset will never be cached by the browser. If disabled, it will return the current version of the website obtained from the `cb.site_ver System Setting`. Adding the site version to the URL will ensure that when changes pushed to production returning visiting aren't loading stale files from their browser cache.

 Optional Settings
------------------

### Placeholder

 Cachebuster can set to a placeholder rather than returning a value. Simply pass the name of the placeholder you'd like to use as seen below.

 ```
<pre class="brush: php">
[[$smartcache? &placeholder=`cbtime`]]
```### Appending Paramater

 To append a URL parameter to the result use the param paramater as seen below.

 ```
<pre class="brush: php">
[[$smartcache? &param=`?cb`]]
```See Also
--------

- [Project home on Github](https://github.com/jpdevries/Cachebuster)