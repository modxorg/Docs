---
title: "SocialSuite.getTwitterProfile"
_old_id: "1009"
_old_uri: "revo/socialsuite/socialsuite.gettwitterprofile"
---

[SocialSuite](/extras/revo/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

getTwitter Profile is a [snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns all sorts of information about a **user** on Twitter.

<div class="info">getTwitterProfile seems to be broken right now.. will update once resolved</div>Snippet Properties
------------------

<table><tbody><tr><th>Property</th><th>Default</th><th>Description</th></tr><tr><td>user</td><td> </td><td>The username, ID or shortname of a user or page to look up information for.</td></tr><tr><td>cache</td><td>1</td><td>To cache or not to cache, that's the question. (set to 0 to disable caching)</td></tr><tr><td>cacheExpires</td><td>3600</td><td>Time in seconds for the cache to be valid.</td></tr><tr><td>showAvailableData</td><td>0</td><td>Enable this (by setting it to 1) to see a dump of all data available for the selected user. Helpful in choosing your placeholders.</td></tr><tr><td>toPlaceholders</td><td>0</td><td>Enable this (by setting it to 1) to set all data to placeholders so you can use them in existing markup. This will DISABLE parsing the chunk specified with &tpl.</td></tr><tr><td>toPlaceholdersPrefix</td><td>tw</td><td>A prefix to apply to placeholders when using toPlaceholders.</td></tr><tr><td>tpl</td><td> </td><td>Name of a chunk to parse with the placeholders (when toPlaceholders=0).</td></tr></tbody></table>Example Usage
-------------

```
<pre class="brush: php">
[[!getTwitterProfile? &user=`modx` &showAvailableData=`1` &toPlaceholders=`1`]]

```returns the following:

```
<pre class="brush: php">
<currently erroring>

```And allows you to do something like this:

```
<pre class="brush: php">
Twitter Name: [[!+tw.name]]<br />
Likes: [[!+tw.likes]]

```which outputs something like this:

```
<pre class="brush: php">
Twitter Name: MODX
Likes: 2348

```