---
title: "mxHasTvs"
_old_id: "1375"
_old_uri: "revo/mxhastvs"
---

About mxHasTvs
--------------

mxHasTvs is used to return a value based on TV value for the resource (docid). This allows you to perform quick and efficient templates to avoid the pitfalls of conditional modifiers. Useful for complex UI (template, chunk, etc.) rules to switch rendering based on a resources Template Variable(TV) value. Allows a true and false string or empty to be returned based on any matching TV value being found.

Properties:
-----------

<table><tbody><tr><th>Parameter</th><th>Type</th><th>Description</th></tr><tr><td>@docid</td><td>(int)</td><td>The resource id to find TV values of</td></tr><tr><td>@tvIds</td><td>(mixed)</td><td>Comma separated list of TV Ids to find for the resource</td></tr><tr><td>@true</td><td>(string)</td><td>Optional; String which can be a chunk, snippet, or about any other value you want displayed if values found in TV-Ids objects, if not set then snippet will return 1 (one) as the response.</td></tr><tr><td>@false</td><td>(string)</td><td>Optional; String you want to display when no matching TV values are found for the resource; can be an empty string. If not set then the snippet will return 0 (zero) as the response. (blank, null, '', default tv value)</td></tr><tr><td>@forceTrueResource</td><td>(mixed)</td><td>Comma separated list of Resource Ids to force a true response on</td></tr><tr><td>@forceFalseResource</td><td>(mixed)</td><td>Comma separated list of Resource Ids to force a false response on</td></tr><tr><td>@forceTrueTemplate</td><td>(mixed)</td><td>Comma separated list of Template Ids to force a true response on</td></tr><tr><td>@forceFalseTemplate</td><td>(mixed)</td><td>Comma separated list of Template Ids to force a false response on</td></tr><tr><td>@forcePriorityResrouce</td><td>(int)</td><td>Use 1 (one), default, to have resource TV forced check first, or set to 0 (zero) to have the template forced TV check have priority.</td></tr></tbody></table>Example:
--------

Returns the chunk as success or has matched TV values in the resource   
if no value(s) found for TV items then the response is empty. Also forces   
a true response on resource id 1.

\[\[!mxhastvs? &tvIds=`11,20` &true=`\[\[$doSomethingChunkName\]\]` &false=`` &forceTrueResource=`1` \]\]