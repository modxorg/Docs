---
title: "Hits"
_old_id: "1324"
_old_uri: "revo/hits"
---

Hits tracks pagehits with a punch by counting MODX Revolution page view and storing them in a custom table.

With hits you can:

- record page hits based on a provided hit\_key (such as a resource id)
- Returns the results of a hit query and [use with getResources]([[~[[*id]]]]#with-getresources)

Usage
-----

Record a hit for the current resource.

 ```
<pre class="brush: php">
[[!Hits? &punch=`[[*id]]`]]


```Record a hit for resource 3.

 ```
<pre class="brush:php">
[[!Hits? &punch=`3`]]


```Record 20 hit for resource 4

 ```
<pre class="brush:php">
[[!Hits? &punch=`4` &amount=`20`]]


```Remove 4 hit from resource 5.

 ```
<pre class="brush:php">
[[!Hits? &punch=`5` &amount=`-4`]]


```Get a comma-delimited list of ids of the 10 most visited pages 10 levels down from the web context.

 ```
<pre class="brush:php">
[[!Hits? &parents=`0` &depth=`10` &limit=`10` &outputSeparator=`,`]]


```Get a comma-delimited list of ids of the 4 least visited pages that are children of resource 2 and use your own hitInfo chunk to render results.

 ```
<pre class="brush:php">
[[!Hits? &parents=`2` limit=`4` &dir=`ASC`  &chunk=`hitInfo` &outputSeparator=`,`]]


```Get the four most hit resources, discluding the first

 ```
<pre class="brush:php">
[[!Hits? &parents=`0` &limit=`4` &offset=`1` &outputSeparator=`,`]]


```Knockout resource 3 then add 2 hits (knockout zeros value before adding punches)

 ```
<pre class="brush:php">
[[!Hits? &punch=`3` &amount=`2` &knockout=`1`]]


```Available Properties
--------------------

 <table><colgroup><col style="text-align:left;"></col><col style="text-align:left;"></col><col style="text-align:right;"></col><col style="text-align:right;"></col></colgroup><thead><tr><th style="text-align:left;">Name</th> <th style="text-align:left;">Description</th> <th style="text-align:right;">Default Value</th> <th style="text-align:right;">Added in version</th> </tr></thead><tbody><tr><td style="text-align:left;">punch</td> <td style="text-align:left;">If set, a hit\_key to record one or more hits for. Usually a resource id.</td> <td style="text-align:right;"></td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">amount</td> <td style="text-align:left;">The amount of hits to record for the punched hit\_key.</td> <td style="text-align:right;">1</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">parents</td> <td style="text-align:left;">Comma-delimited list of ids serving as parents to search for most visited resources within. If provided, results are returned.</td> <td style="text-align:right;"></td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">depth</td> <td style="text-align:left;">Integer value indicating depth to search for resources from each parent. First level of resources beneath parent is depth.</td> <td style="text-align:right;">10</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">tpl</td> <td style="text-align:left;">hit\_key, hit\_count, and id (of hit) paramters will be passed into the provided chunk for each result.</td> <td style="text-align:right;">outputs hit\_key</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">limit</td> <td style="text-align:left;">The amount of results to return.</td> <td style="text-align:right;">5</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">sort</td> <td style="text-align:left;">Property to sort results on. Available options are hit\_count, hit\_key or id.</td> <td style="text-align:right;">hit\_count</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">dir</td> <td style="text-align:left;">Direction to sort properties on.</td> <td style="text-align:right;">DESC</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">outputSeparator</td> <td style="text-align:left;">An optional string to separate each tpl instance.</td> <td style="text-align:right;">“\\n”</td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">toPlaceholder</td> <td style="text-align:left;">If set, will assign the result to this placeholder rather than outputting.</td> <td style="text-align:right;"></td> <td style="text-align:right;">1.0.0</td> </tr><tr><td style="text-align:left;">offset</td> <td style="text-align:left;">Optionally offset results</td> <td style="text-align:right;"></td> <td style="text-align:right;">1.1.0</td> </tr><tr><td style="text-align:left;">knockout</td> <td style="text-align:left;">Set to 1 to zero hit\_count of punched record before incrementing by amount</td> <td style="text-align:right;"></td> <td style="text-align:right;">1.2.0</td></tr></tbody></table>With getResources
-----------------

Hits can be used be used with [getResources](http://rtfm.modx.com/display/ADDON/getResources) to list the most or least visited pages. This will pass a comma seperated list of ids of the 10 most visited pages according to Hits into getResources.

 ```
<pre class="brush:php">
[[getResources?
&resources=`[[!Hits? &parents=`0` &depth=`10` &limit=`10` &outSeperator=`,`]]`
...
]]

```Optimization
------------

#### Recording Hits

Hits needs to be called uncached whenever it is punching hits. If you don’t want the processing of a hit to affect page load time you can record your hits after page load using AJAX.

#### Displaying Statistics

When using with getResources remember that you can utilize [getCache](https://github.com/opengeek/getCache/wiki) to cache the results to the filesystem for a determined period time as well as share the cache across multiple pages. If you are displaying a “Most Visited Pages” nav in your sidebar, the results are probably going to be the same across all or multiple pages. Thus, you can utilize the getCache cacheElementKey paramater to share the cache file across multiple (in this case all) resources. Move getResources tag to a ‘getMostViewed’ Chunk.

 ```
<pre class="brush:php">
[[!getCache?
&element=`getMostViewed`
&cacheExpires=`900`
&cacheKey=`hits`
&cacheElementKey=`getMostViewed`
]]

```The getMostViewed chunk will now only be processed every 15 minutes and load from a single shared cache. This means no matter how many visitors we have, we are only processing this output once every 15 minutes.

Alternatively, if results from getResources vary from page to page, you could wrap the Hits tag with getCache.

 ```
<pre class="brush:php">
[[getResources?
&resources=`[[!getCache?
&element=`mostHitsIDs`
&cacheExpires=`900`
&cacheKey=`hits`
&cacheElementKey=`mostHitsIDs`]]`
...
]]

```See Also
--------

- [Project home](https://github.com/jpdevries/hits) on Github