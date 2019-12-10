---
title: "mxHasTvs"
_old_id: "1375"
_old_uri: "revo/mxhastvs"
---

mxHasTvs is used to return a value based on TV value for the resource (docid). This allows you to perform quick and efficient templates to avoid the pitfalls of conditional modifiers. Useful for complex UI (template, chunk, etc.) rules to switch rendering based on a resources Template Variable(TV) value. Allows a true and false string or empty to be returned based on any matching TV value being found.

## Properties

| Parameter              | Type     | Description                                                                                                                                                                                                               |
| ---------------------- | -------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| @docid                 | (int)    | The resource id to find TV values of                                                                                                                                                                                      |
| @tvIds                 | (mixed)  | Comma separated list of TV Ids to find for the resource                                                                                                                                                                   |
| @true                  | (string) | Optional; String which can be a chunk, snippet, or about any other value you want displayed if values found in TV-Ids objects, if not set then snippet will return 1 (one) as the response.                               |
| @false                 | (string) | Optional; String you want to display when no matching TV values are found for the resource; can be an empty string. If not set then the snippet will return 0 (zero) as the response. (blank, null, '', default tv value) |
| @forceTrueResource     | (mixed)  | Comma separated list of Resource Ids to force a true response on                                                                                                                                                          |
| @forceFalseResource    | (mixed)  | Comma separated list of Resource Ids to force a false response on                                                                                                                                                         |
| @forceTrueTemplate     | (mixed)  | Comma separated list of Template Ids to force a true response on                                                                                                                                                          |
| @forceFalseTemplate    | (mixed)  | Comma separated list of Template Ids to force a false response on                                                                                                                                                         |
| @forcePriorityResrouce | (int)    | Use 1 (one), default, to have resource TV forced check first, or set to 0 (zero) to have the template forced TV check have priority.                                                                                      |

## Example

Returns the chunk as success or has matched TV values in the resource
if no value(s) found for TV items then the response is empty. Also forces
a true response on resource id 1.

``` php
[[!mxhastvs?
    &tvIds=`11,20`
    &true=`[[$doSomethingChunkName]]`
    &false=``
    &forceTrueResource=`1`
]]
```
