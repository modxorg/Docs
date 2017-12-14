---
title: "BreadCrumb"
_old_id: "610"
_old_uri: "revo/breadcrumb/"
---

<div>- [What is BreadCrumb?](#BreadCrumb-WhatisBreadCrumb%3F)
  - [Requirements](#BreadCrumb-Requirements)
  - [Public Releases](#BreadCrumb-PublicReleases)
  - [Download](#BreadCrumb-Download)
  - [Support, Comments, Development and Bug Reporting](#BreadCrumb-Support%2CComments%2CDevelopmentandBugReporting)
- [Usage](#BreadCrumb-Usage)
  - [Breadcrumb properties](#BreadCrumb-Breadcrumbproperties)
  - [Templating properties](#BreadCrumb-Templatingproperties)
  - [Examples](#BreadCrumb-Examples)
- [Migrate from Breadcrumbs snippet](#BreadCrumb-MigratefromBreadcrumbssnippet)
- [See Also](#BreadCrumb-SeeAlso)

</div>What is BreadCrumb?
-------------------

 Breadcrumb is a snippet for MODx Revolution, inspired by the [Breadcrumbs](/extras/revo/breadcrumbs "Breadcrumbs") snippet.

 As the original [Breadcrumbs](/extras/revo/breadcrumbs "Breadcrumbs"), this snippet will create a breadcrumb navigation (no kidding !! ) but also add some new features like template properties or specific resource ID property.

### Requirements

- MODx Revolution 2.0.x or later
- PHP5 or later

### Public Releases

 <table><tbody><tr><th> Version </th> <th> Date </th> <th> Author </th> <th> Product </th> </tr><tr><td>1.4.3-pl</td> <td>March 7, 2015</td> <td>ben\_omycode & Jako</td> <td>Revolution</td> </tr><tr><td>1.4.2-pl</td> <td>August 12, 2014</td> <td>ben\_omycode</td> <td>Revolution</td> </tr><tr><td>1.4.1-pl</td> <td>August 7, 2014</td> <td>ben\_omycode</td> <td>Revolution</td> </tr><tr><td> 1.4.0-pl </td> <td> August 6, 2014 </td> <td> ben\_omycode </td> <td> Revolution </td> </tr><tr><td> 1.3.2-beta1 </td> <td> December 11, 2012 </td> <td> ben\_omycode </td> <td> Revolution </td> </tr><tr><td> 1.3.1-pl </td> <td> November 16, 2012 </td> <td> ben\_omycode </td> <td> Revolution </td> </tr><tr><td> 1.3.0-pl </td> <td> August 28, 2012 </td> <td> ben\_omycode </td> <td> Revolution </td> </tr><tr><td> 1.2.0-pl </td> <td> August 22, 2012 </td> <td> ben\_omycode </td> <td> Revolution </td> </tr><tr><td> 1.1.0-pl   
</td> <td> April 24, 2012   
</td> <td> ben\_omycode   
</td> <td> Revolution   
</td> </tr><tr><td> 1.0.0-pl   
</td> <td> February 6, 2012   
</td> <td> ben\_omycode   
</td> <td> Revolution   
</td> </tr><tr><td> 1.0.0-beta3   
</td> <td> November 19, 2011   
</td> <td> ben\_omycode   
</td> <td> Revolution </td> </tr><tr><td> 1.0.0-beta2 </td> <td> November 18, 2011 </td> <td> ben\_omycode </td> <td> Revolution </td></tr></tbody></table>### Download

 It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/breadcrumb>

### Support, Comments, Development and Bug Reporting

 **Github** : <https://github.com/benjamin-vauchel/breadcrumb>   
**Support/Comments** : <http://forums.modx.com/thread/71902/support-comments-for-breadcrumb>

Usage
-----

 The BreadCrumb snippet can be called using the tag :

 ```
<pre class="brush: php">[[BreadCrumb]]

```### Breadcrumb properties

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> <th> Version   
</th> </tr><tr><td> from   
</td> <td> Resource ID from which breadcrumb is created   
</td> <td> 0   
</td> <td> 1.1.0-pl   
</td> </tr><tr><td> to   
</td> <td> Resource ID whose breadcrumb is created </td> <td> current resource ID </td> <td> 1.1.0-pl   
</td> </tr><tr><td> exclude </td> <td> Comma separated list of resources to exclude from breadcumb </td> <td> </td> <td> 1.4.0-pl </td> </tr><tr><td> maxCrumbs </td> <td> Max crumbs shown in breadcrumb. Max delimiter template can be customize with property maxCrumbTpl </td> <td> 100 </td> <td> </td> </tr><tr><td> showHidden </td> <td> Show hidden resources in breadcrumb </td> <td> 1 </td> <td> </td> </tr><tr><td> showContainer </td> <td> Show container resources in breadcrumb </td> <td> 1 </td> <td> </td> </tr><tr><td> showUnPub </td> <td> Show unpublished resources in breadcrumb </td> <td> 1 </td> <td> </td> </tr><tr><td> showCurrentCrumb </td> <td> Show current resource as a crumb </td> <td> 1 </td> <td> </td> </tr><tr><td> showBreadCrumbAtHome </td> <td> Show BreadCrumb on the home page </td> <td> 1 </td> <td> </td> </tr><tr><td> showHomeCrumb </td> <td> Show the home page as a crumb. Since 1.4.0-pl, the home crumb usage was simplified. The &showHomeCrumb=1 property adds the home crumb at the start of breadcrumb and &showHomeCrumb=0 hides it if present. </td> <td> 1   
</td> <td> </td> </tr><tr><td> useWebLinkUrl </td> <td> Use the weblink url instead of the url to the weblink   
</td> <td> 1   
</td> <td> 1.0.0-beta3   
</td> </tr><tr><td> direction </td> <td> Direction or breadcrumb : Left To Right (ltr) or Right To Left (rtl) for Arabic language for example </td> <td> ltr   
</td> <td> </td> </tr><tr><td> scheme </td> <td> Format for how URLs are generated. Possible values are (based on makeURL API call : [http://rtfm.modx.com/display/revolution20/modX.makeUrl](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl")):   
- -1 : (default value) URL is relative to site\_url
- 0 : see http
- 1 : see https
- full : URL is absolute, prepended with site\_url from config
- abs : URL is absolute, prepended with base\_url from config
- http : URL is absolute, forced to http scheme
- https : URL is absolute, forced to https scheme
 
</td> <td> modx link\_tag\_scheme setting </td> <td> 1.2.0-pl   
</td></tr></tbody></table>### Templating properties

 @CODE no longer supported since 1.4.0-pl. Use @INLINE instead.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> <th> Version </th> </tr><tr><td> containerTpl

 </td> <td> Name of the chunk containing the template for the container of the breadcrumb. It also can be file path (@FILE ) or chunk code (@INLINE ).

 </td> <td> cf [BreadCrumb.containerTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.containertpl)

 </td> <td> </td> </tr><tr><td> homeCrumbTpl </td> <td> Name of the chunk containing the template for the current crumb. It also can be file path (@FILE ) or chunk code (@INLINE ). </td> <td> cf [BreadCrumb.homeCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.homecrumbtpl) </td> <td> 1.4.0-pl </td> </tr><tr><td> currentCrumbTpl

 </td> <td> Name of the chunk containing the template for the current crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).

 </td> <td> cf [BreadCrumb.currentCrumbTpl](/extras/revo/breadcrumb/breadcrumb.currentcrumbtpl "BreadCrumb.currentCrumbTpl") </td> <td> </td> </tr><tr><td> linkCrumbTpl

 </td> <td> Name of the chunk containing the template for the default crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).

 </td> <td> cf [BreadCrumb.linkCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.linkcrumbtpl) </td> <td> </td> </tr><tr><td> categoryCrumbTpl </td> <td> Name of the chunk containing the template for categories crumbs. Can be file (@FILE ) or code (@INLINE ). </td> <td> cf [BreadCrumb.categoryCrumbTpl](http://rtfm.modx.com/extras/revo/breadcrumb/breadcrumb.categorycrumbtpl) </td> <td> 1.3.2-beta1 </td> </tr><tr><td> maxCrumbTpl

 </td> <td> Name of the chunk containing the template for the max delimiter crumb. It also can be file path (@FILE ) or chunk code (@INLINE ).

 </td> <td> cf [BreadCrumb.maxCrumbTpl](/extras/revo/breadcrumb/breadcrumb.maxcrumbtpl "BreadCrumb.maxCrumbTpl") </td> <td> </td></tr></tbody></table>### Examples

 Show the breadcrumb of the current resource

 ```
<pre class="brush: php">[[BreadCrumb]]

``` Show the breadcrumb of the resource whose ID is 72

 ```
<pre class="brush: php">[[BreadCrumb? &to=`72`]]

``` Show home crumb at the start of breadcrumb

 ```
<pre class="brush: php">[[BreadCrumb? &showHomeCrumb=`1`]]

``` Show the breadcrumb of the resource whose ID is 72 from it's level 2 parent

 ```
<pre class="brush: php">[[BreadCrumb? &from=`[[UltimateParent? &topLevel=`2`]]` &to=`72`]]

``` Change the direction of the breadcrumb : rtl (Right To Left) or ltr (Left To Right)

 ```
<pre class="brush: php">[[BreadCrumb? &direction=`rtl`]]

``` Exclude some resources

 ```
<pre class="brush: php">[[BreadCrumb? &exclude=`23,135`]]

``` Use custom templates

 ```
<pre class="brush: php">[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl`]]
[[BreadCrumb? &linkCrumbTpl=`@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>`]]
[[BreadCrumb? &linkCrumbTpl=`@FILE [[++assets_path]]my_link_crumb_tpl.html`]]

```Migrate from Breadcrumbs snippet
--------------------------------

 Once again, BreadCrumb was inspired by the [Breadcrumbs](/extras/revo/breadcrumbs "Breadcrumbs") snippet. Some of [Breadcrumbs](/extras/revo/breadcrumbs "Breadcrumbs") properties have been removed but you still can do the same things with BreadCrumb ... just in a different way.

 <table><tbody><tr><th> Removed Breadcrumb properties </th> <th> Previous Breadcrumbs usage   
</th> <th> New BreadCrumb usage </th> </tr><tr><td> crumbSeparator </td> <td> Tag :   
```
<pre class="brush: php">[[Breadcrumbs? &crumbSeparator=`>`]]
		
```</td> <td> Use CSS : ```
<pre class="brush: php">#breadcrumb li + li:before{
  content:  '>';
  margin:   0 2px;
}
		
```</td></tr><tr><td> currentAsLink </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? ¤tAsLink=`1`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? ¤tCrumbTpl=`myCurrentCrumbTpl`]]
		
``` Chunk _myCurrentCrumbTpl_ :

 ```
<pre class="brush: php"><li><a href="[[+link]]">[[+pagetitle]]</a></li>
		
```</td></tr><tr><td> descField </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? &descField=`longtitle`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` ¤tCrumbTpl=`myCurrentCrumbTpl`]]
		
``` Chunks _myLinkCrumbTpl_ and _myCurrentCrumbTpl_ :

 ```
<pre class="brush: php"><li><a href="[[+link]]" title="[[+longtitle]]">[[+pagetitle]]</a></li>
		
```</td></tr><tr><td> homeCrumbDescription </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? &homeCrumbDescription=`Home`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? &containerTpl=`myContainerTpl`]]
		
``` Chunks _myContainerTpl_ :

 ```
<pre class="brush: php"><ul>
  <li><a href="[[++site_url]]">Home</a></li>
  [[+crumbs]]
</ul>
		
```</td></tr><tr><td> homeCrumbTitle </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? &homeCrumbTitle=`Home`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? &containerTpl=`myContainerTpl`]]
		
``` Chunks _myContainerTpl_ :

 ```
<pre class="brush: php"><ul>
  <li><a href="[[++site_url]]" title="Home">Home</a></li>
  [[+crumbs]]
</ul>
		
```</td></tr><tr><td> maxDelimiter </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? &maxDelimiter=`(...)`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? &maxCrumbTpl=`myMaxCrumbTpl`]]
		
``` Chunk _myMaxCrumbTpl_ :

 ```
<pre class="brush: php"><li>(...)</li>
		
```</td></tr><tr><td> titleField </td> <td> Tag : ```
<pre class="brush: php">[[Breadcrumbs? &titleField=`menutitle`]]
		
```</td><td> Use template :  Tag :

 ```
<pre class="brush: php">[[BreadCrumb? &linkCrumbTpl=`myLinkCrumbTpl` ¤tCrumbTpl=`myCurrentCrumbTpl`]]
		
``` Chunk _myLinkCrumbTpl_ and _myCurrentCrumbTpl_ :

 ```
<pre class="brush: php"><li><a href="[[+link]]">[[+menutitle]]</a></li>
		
```</td></tr></tbody></table>