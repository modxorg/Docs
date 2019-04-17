---
title: "BreadCrumb"
_old_id: "610"
_old_uri: "revo/breadcrumb/"
---

## What is BreadCrumb?

 Breadcrumb is a snippet for MODx Revolution, inspired by the [Breadcrumbs](extras/breadcrumbs "Breadcrumbs") snippet.

 As the original [Breadcrumbs](extras/breadcrumbs "Breadcrumbs"), this snippet will create a breadcrumb navigation (no kidding !! ) but also add some new features like template properties or specific resource ID property.

### Requirements

- MODx Revolution 2.0.x or later
- PHP5 or later

### Public Releases

 | Version     | Date              | Author              | Product    |
 | ----------- | ----------------- | ------------------- | ---------- |
 | 1.4.3-pl    | March 7, 2015     | ben\_omycode & Jako | Revolution |
 | 1.4.2-pl    | August 12, 2014   | ben\_omycode        | Revolution |
 | 1.4.1-pl    | August 7, 2014    | ben\_omycode        | Revolution |
 | 1.4.0-pl    | August 6, 2014    | ben\_omycode        | Revolution |
 | 1.3.2-beta1 | December 11, 2012 | ben\_omycode        | Revolution |
 | 1.3.1-pl    | November 16, 2012 | ben\_omycode        | Revolution |
 | 1.3.0-pl    | August 28, 2012   | ben\_omycode        | Revolution |
 | 1.2.0-pl    | August 22, 2012   | ben\_omycode        | Revolution |
 | 1.1.0-pl    | April 24, 2012    | ben\_omycode        | Revolution |
 | 1.0.0-pl    | February 6, 2012  | ben\_omycode        | Revolution |
 | 1.0.0-beta3 | November 19, 2011 | ben\_omycode        | Revolution |
 | 1.0.0-beta2 | November 18, 2011 | ben\_omycode        | Revolution |

### Download

 It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/breadcrumb>

### Support, Comments, Development and Bug Reporting

 **Github** : <https://github.com/benjamin-vauchel/breadcrumb>
**Support/Comments** : <http://forums.modx.com/thread/71902/support-comments-for-breadcrumb>

## Usage

 The BreadCrumb snippet can be called using the tag :

 ``` php
[[BreadCrumb]]
```

### Breadcrumb properties

 | Name                 | Description                                                                                                                                                                                                                                     | Default             | Version     |
 | -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------- | ----------- |
 | from                 | Resource ID from which breadcrumb is created                                                                                                                                                                                                    | 0                   | 1.1.0-pl    |
 | to                   | Resource ID whose breadcrumb is created                                                                                                                                                                                                         | current resource ID | 1.1.0-pl    |
 | exclude              | Comma separated list of resources to exclude from breadcumb                                                                                                                                                                                     |                     | 1.4.0-pl    |
 | maxCrumbs            | Max crumbs shown in breadcrumb. Max delimiter template can be customize with property maxCrumbTpl                                                                                                                                               | 100                 |             |
 | showHidden           | Show hidden resources in breadcrumb                                                                                                                                                                                                             | 1                   |             |
 | showContainer        | Show container resources in breadcrumb                                                                                                                                                                                                          | 1                   |             |
 | showUnPub            | Show unpublished resources in breadcrumb                                                                                                                                                                                                        | 1                   |             |
 | showCurrentCrumb     | Show current resource as a crumb                                                                                                                                                                                                                | 1                   |             |
 | showBreadCrumbAtHome | Show BreadCrumb on the home page                                                                                                                                                                                                                | 1                   |             |
 | showHomeCrumb        | Show the home page as a crumb. Since 1.4.0-pl, the home crumb usage was simplified. The &showHomeCrumb=1 property adds the home crumb at the start of breadcrumb and &showHomeCrumb=0 hides it if present.                                      | 1                   |             |
 | useWebLinkUrl        | Use the weblink url instead of the url to the weblink                                                                                                                                                                                           | 1                   | 1.0.0-beta3 |
 | direction            | Direction or breadcrumb : Left To Right (ltr) or Right To Left (rtl) for Arabic language for example                                                                                                                                            | ltr                 |             |
 | scheme               | Format for how URLs are generated. Possible values are (based on makeURL API call : [http://rtfm.modx.com/display/revolution20/modX.makeUrl](developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl")): |
- -1 : (default value) URL is relative to site\_url
- 0 : see http
- 1 : see https
- full : URL is absolute, prepended with site\_url from config
- abs : URL is absolute, prepended with base\_url from config
- http : URL is absolute, forced to http scheme
- https : URL is absolute, forced to https scheme | modx link\_tag\_scheme setting | 1.2.0-pl |

### Templating properties

 @CODE no longer supported since 1.4.0-pl. Use @INLINE instead.

 | Name             | Description                                                                                                                                | Default                                                                                                    | Version     |
 | ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------ | ---------------------------------------------------------------------------------------------------------- | ----------- |
 | containerTpl     | Name of the chunk containing the template for the container of the breadcrumb. It also can be file path (@FILE ) or chunk code (@INLINE ). | cf [BreadCrumb.containerTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.containertpl)          |             |
 | homeCrumbTpl     | Name of the chunk containing the template for the current crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).               | cf [BreadCrumb.homeCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.homecrumbtpl)          | 1.4.0-pl    |
 | currentCrumbTpl  | Name of the chunk containing the template for the current crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).               | cf [BreadCrumb.currentCrumbTpl](extras/breadcrumb/breadcrumb.currentcrumbtpl "BreadCrumb.currentCrumbTpl") |             |
 | linkCrumbTpl     | Name of the chunk containing the template for the default crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).               | cf [BreadCrumb.linkCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.linkcrumbtpl)          |             |
 | categoryCrumbTpl | Name of the chunk containing the template for categories crumbs. Can be file (@FILE ) or code (@INLINE ).                                  | cf [BreadCrumb.categoryCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.categorycrumbtpl)  | 1.3.2-beta1 |
 | maxCrumbTpl      | Name of the chunk containing the template for the max delimiter crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).         | cf [BreadCrumb.maxCrumbTpl](extras/breadcrumb/breadcrumb.maxcrumbtpl "BreadCrumb.maxCrumbTpl")             |             |

### Examples

 Show the breadcrumb of the current resource

 ``` php
[[BreadCrumb]]

```

 Show the breadcrumb of the resource whose ID is 72

 ``` php
[[BreadCrumb? &to=`72`]]

```

 Show home crumb at the start of breadcrumb

 ``` php
[[BreadCrumb? &showHomeCrumb=`1`]]

```

 Show the breadcrumb of the resource whose ID is 72 from it's level 2 parent

 ``` php
[[BreadCrumb? &from=`[[UltimateParent? &topLevel=`2`]]` &to=`72`]]

```

 Change the direction of the breadcrumb : rtl (Right To Left) or ltr (Left To Right)

 ``` php
[[BreadCrumb? &direction=`rtl`]]

```

 Exclude some resources

 ``` php
[[BreadCrumb? &exclude=`23,135`]]

```

 Use custom templates

 ``` php
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl`]]
[[BreadCrumb? &linkCrumbTpl=`@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>`]]
[[BreadCrumb? &linkCrumbTpl=`@FILE [[++assets_path]]my_link_crumb_tpl.html`]]

```

## Migrate from Breadcrumbs snippet

 Once again, BreadCrumb was inspired by the [Breadcrumbs](extras/breadcrumbs "Breadcrumbs") snippet. Some of [Breadcrumbs](extras/breadcrumbs "Breadcrumbs") properties have been removed but you still can do the same things with BreadCrumb ... just in a different way.

 | Removed Breadcrumb properties | Previous Breadcrumbs usage | New BreadCrumb usage |
 | ----------------------------- | -------------------------- | -------------------- |
 | crumbSeparator                | Tag :                      |
``` php
[[Breadcrumbs? &crumbSeparator=`>`]]

``` | Use CSS : ``` php
#breadcrumb li + li:before{
  content:  '>';
  margin:   0 2px;
}

``` |
| currentAsLink | Tag : ``` php
[[Breadcrumbs? ¤tAsLink=`1`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? ¤tCrumbTpl=`myCurrentCrumbTpl`]]
```

 Chunk _myCurrentCrumbTpl_ :

 ``` php
<li><a href="[[+link]]">[[+pagetitle]]</a></li>
``` |
| descField | Tag : ``` php
[[Breadcrumbs? &descField=`longtitle`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` ¤tCrumbTpl=`myCurrentCrumbTpl`]]
```

 Chunks _myLinkCrumbTpl_ and _myCurrentCrumbTpl_ :

 ``` php
<li><a href="[[+link]]" title="[[+longtitle]]">[[+pagetitle]]</a></li>
``` |
| homeCrumbDescription | Tag : ``` php
[[Breadcrumbs? &homeCrumbDescription=`Home`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? &containerTpl=`myContainerTpl`]]
```

 Chunks _myContainerTpl_ :

 ``` php
<ul>
  <li><a href="[[++site_url]]">Home</a></li>
  [[+crumbs]]
</ul>
``` |
| homeCrumbTitle | Tag : ``` php
[[Breadcrumbs? &homeCrumbTitle=`Home`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? &containerTpl=`myContainerTpl`]]
```

 Chunks _myContainerTpl_ :

 ``` php
<ul>
  <li><a href="[[++site_url]]" title="Home">Home</a></li>
  [[+crumbs]]
</ul>
``` |
| maxDelimiter | Tag : ``` php
[[Breadcrumbs? &maxDelimiter=`(...)`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? &maxCrumbTpl=`myMaxCrumbTpl`]]
```

 Chunk _myMaxCrumbTpl_ :

 ``` php
<li>(...)</li>
``` |
| titleField | Tag : ``` php
[[Breadcrumbs? &titleField=`menutitle`]]
``` | Use template :  Tag :

 ``` php
[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` ¤tCrumbTpl=`myCurrentCrumbTpl`]]
```

 Chunk _myLinkCrumbTpl_ and _myCurrentCrumbTpl_ :

 ``` php
<li><a href="[[+link]]">[[+menutitle]]</a></li>
``` |
