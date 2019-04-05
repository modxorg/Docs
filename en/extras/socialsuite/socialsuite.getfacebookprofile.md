---
title: "getFacebookProfile"
_old_id: "1006"
_old_uri: "revo/socialsuite/socialsuite.getfacebookprofile"
---

[SocialSuite](/extras/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

getFacebookProfile is a [snippet](developing-in-modx/basic-development/snippets "Snippets"), part of SocialSuite, which returns all sorts of information about a **user or page** on Facebook.

## Snippet Properties

| Property             | Default | Description                                                                                                                                                       |
| -------------------- | ------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                 |         | The username, ID or shortname of a user or page to look up information for.                                                                                       |
| cache                | 1       | To cache or not to cache, that's the question. (set to 0 to disable caching)                                                                                      |
| cacheExpires         | 3600    | Time in seconds for the cache to be valid.                                                                                                                        |
| showAvailableData    | 0       | Enable this (by setting it to 1) to see a dump of all data available for the selected user. Helpful in choosing your placeholders.                                |
| toPlaceholders       | 0       | Enable this (by setting it to 1) to set all data to placeholders so you can use them in existing markup. This will DISABLE parsing the chunk specified with &tpl. |
| toPlaceholdersPrefix | fb      | A prefix to apply to placeholders when using toPlaceholders.                                                                                                      |
| tpl                  |         | Name of a chunk to parse with the placeholders (when toPlaceholders=0).                                                                                           |

## Example Usage

``` php 
[[!getFacebookProfile? &user=`modxcms` &showAvailableData=`1` &toPlaceholders=`1`]]
```

returns the following:

``` php 
name = MODX
is_published = 1
website = http://modx.com/
username = modxcms
founded = November 2004
company_overview = MODX is the Content Management System that gives developers, designers and end-users the creative freedom and power to build and maintain websites and online applications with ease. Lose the limitations. There’s no steep learning curve, no cumbersome template language, and no awkward or restrictive structures forced on your site. MODX gives you the freedom to work your way and get things done.
products = MODX Evolution, MODX Revolution
about = MODX CMS is the Content Management System, framework and platform. http://modx.com/ MODX Revolution http://modx.com/download/
talking_about_count = 45
category = Software
id = 19110642979
link = http://www.facebook.com/modxcms
likes = 2348
cover.cover_id = 10150742956652980
cover.source = http://sphotos-d.ak.fbcdn.net/hphotos-ak-prn1/s720x720/559491_10150742956652980_2095164733_n.jpg
cover.offset_y = 0
```

And allows you to do something like this:

``` php 
Facebook Name: [[!+fb.name]]<br />
Likes: [[!+fb.likes]]
```

which outputs something like this:

``` php 
Facebook Name: MODX
Likes: 2348
```