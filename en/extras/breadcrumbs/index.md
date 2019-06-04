---
title: "Breadcrumbs"
_old_id: "611"
_old_uri: "revo/breadcrumbs"
---

## What is Breadcrumbs?

Breadcrumbs is a simple navigation trail [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODX Revolution. With it, you can easily add a simple breadcrumb trail anywhere in your pages.

## Requirements

- MODX Revolution 2.0.0-beta5 or later
- PHP5 or later

## History

Breadcrumbs has been around since the start of MODX 0.9.1, or MODX Evolution, with its first release on June 30th, 2006. It has had many different authors since its inception.

### Public Releases

| Version    | Date                | Author       | Product    |
| ---------- | ------------------- | ------------ | ---------- |
| 1.1-beta3  | November 23rd, 2009 | splittingred | Revolution |
| 1.1-beta2  | November 5th, 2009  | splittingred | Revolution |
| 1.1-beta1  | May 21st, 2009      | splittingred | Revolution |
| 1.0-alpha4 | April 21st, 2009    | splittingred | Revolution |
| 1.0-alpha3 | March 24th, 2009    | splittingred | Revolution |
| 1.0.1      | April 25th, 2008    | jaredc       | Evolution  |
| 1.0.0      | April 22nd, 2008    | jaredc       | Evolution  |
| 0.9g       | March 26th, 2008    | webe         | Evolution  |
| 0.9f       | January 17th, 2008  | jaredc       | Evolution  |
| 0.9e       | January 11th, 2008  | jaredc       | Evolution  |
| 0.9d       | July 12th, 2006     | jaredc       | Evolution  |
| 0.91       | July 10th, 2006     | tillda       | Evolution  |
| 0.9c       | June 30th, 2006     | jaredc       | Evolution  |

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/54>

## Usage

The Breadcrumbs snippet can be called using the tags:

``` php
[[Breadcrumbs]]
```

### Breadcrumbs Properties

| Name                 | Description                                                                                                                                                                                                                                                                                                                                                                                                 | Default     |
| -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------- |
| crumbSeparator       | Define what you want between the crumbs.                                                                                                                                                                                                                                                                                                                                                                    | »           |
| currentAsLink        | If you want the current page crumb to be a link (to itself) "1" for true, "0" for false (without quotes)                                                                                                                                                                                                                                                                                                    | 1           |
| descField            | To change default page field to be used as a breadcrumb description, default is description. Falls back to pagetitle if description is empty.                                                                                                                                                                                                                                                               | description |
| homeCrumbDescription | In case you want to have a custom description of the home link. Defaults to title of home link.                                                                                                                                                                                                                                                                                                             | Home        |
| homeCrumbTitle       | Just in case you want to have a home link, but want to call it something else.                                                                                                                                                                                                                                                                                                                              | Home        |
| maxCrumbs            | Max number of elements to have in a path. 100 is an arbitrary high number. If you make it smaller, like say 2, but you are 5 levels deep, it will appear as: Home > ... > Level 4 > Level 5 It should be noted that "Home" and the current page do not count. Each of these are configured separately.                                                                                                      | 100         |
| maxDelimiter         | The string that will show if the maximum number of breadcrumbs has been shown.                                                                                                                                                                                                                                                                                                                              | ...         |
| pathThruUnPub        | When your path includes an unpublished folder, setting this to true will show all resources in path EXCEPT the unpublished. Example path (unpublished in caps): home > news > CURRENT > SPORTS > skiiing > article $pathThruUnPub = true would give you this: home > news > skiiing > article $pathThruUnPub = false would give you this: home > skiiing > article (assuming you have home crumb turned on) | 1           |
| respectHidemenu      | If true, will hide items in the breadcrumbs that are set to be hidden in menus.                                                                                                                                                                                                                                                                                                                             | 1           |
| showCrumbsAtHome     | You can use this to toggle the breadcrumbs on the home page.                                                                                                                                                                                                                                                                                                                                                | 0           |
| showCurrentCrumb     | Show the current page in path.                                                                                                                                                                                                                                                                                                                                                                              | 1           |
| showHomeCrumb        | Would you like your crumb string to start with a link to home? Some would not because a home link is usually found in the site logo or elsewhere in the navigation scheme.                                                                                                                                                                                                                                  | 1           |
| titleField           | To change default page field to be used as a breadcrumb title. Defaults to pagetitle.                                                                                                                                                                                                                                                                                                                       | pagetitle   |

### Breadcrumbs Classes

The output is an unordered list with microdata (see <http://diveintohtml5.info/extensibility.html> for more information) that can be styled using the following class names.

| Classname       | Description                                                                       |
| --------------- | --------------------------------------------------------------------------------- |
| B\_crumbBox     | Span that surrounds all crumb output                                              |
| B\_hideCrumb    | Span surrounding the "..." if there are more crumbs than will be shown            |
| B\_currentCrumb | Span or A tag surrounding the current crumb                                       |
| B\_firstCrumb   | Span that always surrounds the first crumb, whether it is "home" or not           |
| B\_lastCrumb    | Span surrounding last crumb, whether it is the current page or not .              |
| B\_crumb        | Class given to each A tag surrounding the intermediate crumbs (not home, or hide) |
| B\_homeCrumb    | Class given to the home crumb                                                     |

## Examples

Show breadcrumbs with a pipeline | for a separator.

``` php
[[Breadcrumbs? &crumbSeparator=`|`]]
```

In MODX Revolution 2.2, the &respectHidemenu property value must be given as `0` or `1` rather than `true` or `false`. I haven't tested this in other versions, but the 2.2 site I'm working on now would not adhere to the property's settings using `true` or `false`.
