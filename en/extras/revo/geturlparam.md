---
title: "getUrlParam"
_old_id: "655"
_old_uri: "revo/geturlparam"
---

A simple snippet that will return a value passed through a URL parameter. The Parameter is sanitized and kept below a set size.

Revolution makes it easy to pass [URL parameters](http://rtfm.modx.com/display/revolution20/Resources#Resources-URLParametersforResourceTags). This snippet makes it simple to use that URL parameter.

#### OPTIONS

**name** - The parameter name, defaults to "p"   
**int** - (Opt) Set as true to only allow integer values   
**max** - (Opt) The maximum length of the returned value, defaults to 20   
**default** - (Opt) The value returned if no URL parameter is found

Send parameter

```
<pre class="brush: php">
[[~10? &val=`5`]]

```Retrieve the value

```
<pre class="brush: php">
[[!getUrlParam? &name=`val` &int=`1`]]

```<div class="note">This snippet needs to be called uncached to get the current value.</div>