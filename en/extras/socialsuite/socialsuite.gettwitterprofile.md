---
title: "getTwitterProfile"
_old_id: "1009"
_old_uri: "revo/socialsuite/socialsuite.gettwitterprofile"
---

[SocialSuite](/extras/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

getTwitter Profile is a [snippet](developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns all sorts of information about a **user** on Twitter.

getTwitterProfile seems to be broken right now.. will update once resolved

## Snippet Properties

| Property             | Default | Description                                                                                                                                                       |
| -------------------- | ------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                 |         | The username, ID or shortname of a user or page to look up information for.                                                                                       |
| cache                | 1       | To cache or not to cache, that's the question. (set to 0 to disable caching)                                                                                      |
| cacheExpires         | 3600    | Time in seconds for the cache to be valid.                                                                                                                        |
| showAvailableData    | 0       | Enable this (by setting it to 1) to see a dump of all data available for the selected user. Helpful in choosing your placeholders.                                |
| toPlaceholders       | 0       | Enable this (by setting it to 1) to set all data to placeholders so you can use them in existing markup. This will DISABLE parsing the chunk specified with &tpl. |
| toPlaceholdersPrefix | tw      | A prefix to apply to placeholders when using toPlaceholders.                                                                                                      |
| tpl                  |         | Name of a chunk to parse with the placeholders (when toPlaceholders=0).                                                                                           |

## Example Usage

``` php 
[[!getTwitterProfile? &user=`modx` &showAvailableData=`1` &toPlaceholders=`1`]]
```

returns the following:

``` php 
<currently erroring>
```

And allows you to do something like this:

``` php 
Twitter Name: [[!+tw.name]]<br />
Likes: [[!+tw.likes]]
```

which outputs something like this:

``` php 
Twitter Name: MODX
Likes: 2348
```