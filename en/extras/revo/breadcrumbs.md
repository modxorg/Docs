---
title: "Breadcrumbs"
_old_id: "611"
_old_uri: "revo/breadcrumbs"
---

<div>- [What is Breadcrumbs?](#Breadcrumbs-WhatisBreadcrumbs%3F)
- [Requirements](#Breadcrumbs-Requirements)
- [History](#Breadcrumbs-History)
  - [Public Releases](#Breadcrumbs-PublicReleases)
  - [Download](#Breadcrumbs-Download)
- [Usage](#Breadcrumbs-Usage)
  - [Breadcrumbs Properties](#Breadcrumbs-BreadcrumbsProperties)
  - [Breadcrumbs Classes](#Breadcrumbs-BreadcrumbsClasses)
- [Examples](#Breadcrumbs-Examples)

</div>What is Breadcrumbs?
--------------------

Breadcrumbs is a simple navigation trail [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") for MODx Revolution. With it, you can easily add a simple breadcrumb trail anywhere in your pages.

Requirements
------------

- MODx Revolution 2.0.0-beta5 or later
- PHP5 or later

History
-------

Breadcrumbs has been around since the start of MODx 0.9.1, or MODx Evolution, with its first release on June 30th, 2006. It has had many different authors since its inception.

### Public Releases

<table><tbody><tr><th>Version</th> <th>Date</th> <th>Author</th> <th>Product</th> </tr><tr><td>1.1-beta3</td> <td>November 23rd, 2009</td> <td>splittingred</td> <td>Revolution</td> </tr><tr><td>1.1-beta2</td> <td>November 5th, 2009</td> <td>splittingred</td> <td>Revolution</td> </tr><tr><td>1.1-beta1</td> <td>May 21st, 2009</td> <td>splittingred</td> <td>Revolution</td> </tr><tr><td>1.0-alpha4</td> <td>April 21st, 2009</td> <td>splittingred</td> <td>Revolution</td> </tr><tr><td>1.0-alpha3</td> <td>March 24th, 2009</td> <td>splittingred</td> <td>Revolution</td> </tr><tr><td>1.0.1</td> <td>April 25th, 2008</td> <td>jaredc</td> <td>Evolution</td> </tr><tr><td>1.0.0</td> <td>April 22nd, 2008</td> <td>jaredc</td> <td>Evolution</td> </tr><tr><td>0.9g</td> <td>March 26th, 2008</td> <td>webe</td> <td>Evolution</td> </tr><tr><td>0.9f</td> <td>January 17th, 2008</td> <td>jaredc</td> <td>Evolution</td> </tr><tr><td>0.9e</td> <td>January 11th, 2008</td> <td>jaredc</td> <td>Evolution</td> </tr><tr><td>0.9d</td> <td>July 12th, 2006</td> <td>jaredc</td> <td>Evolution</td> </tr><tr><td>0.91</td> <td>July 10th, 2006</td> <td>tillda</td> <td>Evolution</td> </tr><tr><td>0.9c</td> <td>June 30th, 2006</td> <td>jaredc</td> <td>Evolution</td></tr></tbody></table>### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/54>

Usage
-----

The Breadcrumbs snippet can be called using the tags:

```
<pre class="brush: php">[[Breadcrumbs]]

```### Breadcrumbs Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default</th> </tr><tr><td>crumbSeparator</td> <td>Define what you want between the crumbs.</td> <td>»</td> </tr><tr><td>currentAsLink</td> <td>If you want the current page crumb to be a link (to itself) "1" for true, "0" for false (without quotes)</td> <td>1  
</td> </tr><tr><td>descField</td> <td>To change default page field to be used as a breadcrumb description, default is description. Falls back to pagetitle if description is empty.</td> <td>description</td> </tr><tr><td>homeCrumbDescription</td> <td>In case you want to have a custom description of the home link. Defaults to title of home link.</td> <td>Home</td> </tr><tr><td>homeCrumbTitle</td> <td>Just in case you want to have a home link, but want to call it something else.</td> <td>Home</td> </tr><tr><td>maxCrumbs</td> <td>Max number of elements to have in a path. 100 is an arbitrary high number. If you make it smaller, like say 2, but you are 5 levels deep, it will appear as: Home > ... > Level 4 > Level 5 It should be noted that "Home" and the current page do not count. Each of these are configured separately.</td> <td>100</td> </tr><tr><td>maxDelimiter</td> <td>The string that will show if the maximum number of breadcrumbs has been shown.</td> <td>...</td> </tr><tr><td>pathThruUnPub</td> <td>When your path includes an unpublished folder, setting this to true will show all resources in path EXCEPT the unpublished. Example path (unpublished in caps): home > news > CURRENT > SPORTS > skiiing > article $pathThruUnPub = true would give you this: home > news > skiiing > article $pathThruUnPub = false would give you this: home > skiiing > article (assuming you have home crumb turned on)</td> <td>1  
</td> </tr><tr><td>respectHidemenu</td> <td>If true, will hide items in the breadcrumbs that are set to be hidden in menus.</td> <td>1  
</td> </tr><tr><td>showCrumbsAtHome</td> <td>You can use this to toggle the breadcrumbs on the home page.</td> <td>0</td> </tr><tr><td>showCurrentCrumb</td> <td>Show the current page in path.</td> <td>1</td> </tr><tr><td>showHomeCrumb</td> <td>Would you like your crumb string to start with a link to home? Some would not because a home link is usually found in the site logo or elsewhere in the navigation scheme.</td> <td>1</td> </tr><tr><td>titleField</td> <td>To change default page field to be used as a breadcrumb title. Defaults to pagetitle.</td> <td>pagetitle</td></tr></tbody></table>### Breadcrumbs Classes

The output is an unordered list with microdata (see <http://diveintohtml5.info/extensibility.html> for more information) that can be styled using the following class names.

<table><tbody><tr><th>Classname</th> <th>Description</th> </tr><tr><td>B\_crumbBox</td> <td>Span that surrounds all crumb output</td> </tr><tr><td>B\_hideCrumb</td> <td>Span surrounding the "..." if there are more crumbs than will be shown</td> </tr><tr><td>B\_currentCrumb</td> <td>Span or A tag surrounding the current crumb</td> </tr><tr><td>B\_firstCrumb</td> <td>Span that always surrounds the first crumb, whether it is "home" or not</td> </tr><tr><td>B\_lastCrumb</td> <td>Span surrounding last crumb, whether it is the current page or not .</td> </tr><tr><td>B\_crumb</td> <td>Class given to each A tag surrounding the intermediate crumbs (not home, or hide)</td> </tr><tr><td>B\_homeCrumb</td> <td>Class given to the home crumb</td></tr></tbody></table>Examples
--------

Show breadcrumbs with a pipeline | for a separator.

```
<pre class="brush: php">[[Breadcrumbs? &crumbSeparator=`|`]]

```In MODX Revolution 2.2, the &respectHidemenu property value must be given as `0` or `1` rather than `true` or `false`. I haven't tested this in other versions, but the 2.2 site I'm working on now would not adhere to the property's settings using `true` or `false`.