---
title: "Wayfinder"
_old_id: "734"
_old_uri: "revo/wayfinder"
---

<div>- [History](https://docs.modx.com/extras/revo/wayfinder#Wayfinder-History)
  - [Version history](/extras/revo/wayfinder#Wayfinder-Versionhistory)
- [Installation](/extras/revo/wayfinder#Wayfinder-Installation)
  - [Downloads](/extras/revo/wayfinder#Wayfinder-Downloads)
  - [Evolution (and before)](/extras/revo/wayfinder#Wayfinder-Evolution%28andbefore%29)
  - [Revolution](/extras/revo/wayfinder#Wayfinder-Revolution)
- [Getting started](/extras/revo/wayfinder#Wayfinder-Gettingstarted)
- [Parameters](/extras/revo/wayfinder#Wayfinder-Parameters)
  - [General Parameters](/extras/revo/wayfinder#Wayfinder-GeneralParameters)
  - [Template Parameters](/extras/revo/wayfinder#Wayfinder-TemplateParameters)
  - [CSS Class Name Parameters](/extras/revo/wayfinder#Wayfinder-CSSClassNameParameters)
  - [Code-Embedding Parameters](/extras/revo/wayfinder#Wayfinder-CodeEmbeddingParameters)
  - [Default values in Revolution](/extras/revo/wayfinder#Wayfinder-DefaultvaluesinRevolution)
- [Examples](/extras/revo/wayfinder#Wayfinder-Examples)
  - [The Minimum Wayfinder Call](/extras/revo/wayfinder#Wayfinder-TheMinimumWayfinderCall)
  - [Replacing DropMenu with Wayfinder](/extras/revo/wayfinder#Wayfinder-ReplacingDropMenuwithWayfinder)
 
</div> [Wayfinder](/extras/revo/wayfinder "Wayfinder") is a [Snippet](/revolution/2.x/making-sites-with-modx/structuring-your-site/using-snippets "Snippets") by **kylej** that scans a specified portion of the MODX document tree, finds all documents that satisfy a certain criteria (determined by the Parameters), and outputs a formatted list of those documents. The formatting of the output is template-driven, and can contain any combination of HTML, CSS and JavaScript, yielding an enormous degree of flexibility.

 _Wayfinder's_ primary purpose is to generate navigational menus that automatically update to reflect changes made to the document tree, but it can be used for other purposes as well.

 Since you can make multiple calls to _Wayfinder_ on a single page, and each call can specify a different section of the document tree, you can have multiple navigational menus or document lists on a single page. For example you may wish to have a main menu at the top of the page, then along the sides have secondary menus for products, services, teams, roles, etc. Each pertaining to a different section of the document tree.

 Please note that since the release of Revolution there are two types of Wayfinder snippets available, one for each version. For clarity, this page uses the Evolution syntax when showing examples. Generally speaking the functionality between the two versions are the same, and so are the parameters. Mind that in Revolution, snippets must be called with \[\[Wayfinder? &...\]\] instead of \[!Wayfinder? &...!\].

 For Wayfinder discussions on the MODX forums see <http://modxcms.com/forums/index.php/board,182.0.html>.

 In case you want to read _everything_ about Wayfinder, there's a 148 page ebook written by Kongondo to be found on the forum which covers all aspects about Wayfinder. [Read about it here](http://modxcms.com/forums/index.php/topic,34176.0.html).

 History 
---------

 _Wayfinder_ has been totally re-factored from the original DropMenu navigation builder to make it easier to create custom navigation by using [Chunks](/revolution/2.x/making-sites-with-modx/structuring-your-site/chunks "Chunks") as output templates. By using templates, many of the parameters are no longer needed for flexible output including tables, unordered- or ordered-lists (ULs or OLs), definition lists (DLs) or in any other format you desire.

###  Version history 

 <table><tbody><tr><th> Version   
</th> <th> Released   
</th> <th> MODX version   
</th> <th> Notes   
</th> </tr><tr><td> 0.9 beta 1/2/3   
</td> <td> Aug/Sept 2006   
</td> <td> 0.9.2.1   
</td> <td> Initial release   
</td> </tr><tr><td> 1.0   
</td> <td> Oct 23, 2006   
</td> <td> 0.9.2.1   
</td> <td> </td> </tr><tr><td> 1.0.1   
</td> <td> Nov 07, 2006   
</td> <td> 0.9.2.1 - 0.9.5   
</td> <td> </td> </tr><tr><td> 2.0   
</td> <td> Feb 27, 2007   
</td> <td> 0.9.5 +   
</td> <td> Current release for Evolution   
</td> </tr><tr><td> 2.1.1 beta 1   
</td> <td> May 21, 2009   
</td> <td> 2.0.0-beta 1   
</td> <td> </td> </tr><tr><td> 2.1.1 beta 2   
</td> <td> Oct 20, 2009   
</td> <td> 2.0.0-beta 4   
</td> <td> </td> </tr><tr><td> 2.1.1 beta 4   
</td> <td> Nov 05, 2009   
</td> <td> 2.0.0-beta 5 +   
</td> <td>   
</td> </tr><tr><td> 2.3.1 </td> <td> May 18, 2011 </td> <td> 2.0+ </td> <td>   
</td> </tr><tr><td> 2.3.2   
</td> <td> Sept 20, 2011   
</td> <td> 2.0+   
</td> <td> </td> </tr><tr><td> 2.3.3   
</td> <td> Oct 31, 2011   
</td> <td> 2.0+   
</td> <td> Current release for Revolution </td></tr></tbody></table> Installation 
--------------

###  Downloads 

- Download the [latest version of Wayfinder for Revolution](http://modx.com/extras/package/wayfinder) from the [MODX Extras Repository](http://www.modx.com/extras), or install via Package Management.
- Download [version 2.0 for Evolution](http://www.muddydogpaws.com/development/wayfinder/download.html) from MuddyDogPaws.

###  Evolution (and before) 

 MODX version 0.9.5-1.0 includes Wayfinder by default in the installer. To add Wayfinder to an older version of MODX or to upgrade to a newer version of Wayfinder in **Evolution**:

1. Download the neccesary files from the link above.
2. Create a new snippet in your MODX Manager (Elements -> Manage Elements -> Snippets) and name if Wayfinder.
3. Copy the contents of <ins>snippet.wayfinder.tpl.php</ins> to the snippet contents.
4. Create a new folder in your file system under /assets/snippets/ and call it wayfinder.
5. Copy the file wayfinder.inc.php to the new folder.

###  Revolution 

 In MODX Revolution, Wayfinder can be downloaded via [Package Management](/revolution/2.x/administering-your-site/installing-a-package "Package Management"). Simply load Package Management, click "Download Extras", go to Navigation -> Wayfinder and download the latest version. Then right click in your Packages grid, and click Install. After it installs, you're finished and good to go.

 Getting started 
-----------------

 The minimum Wayfinder snippet call:

 ```
<pre class="brush: php">
[[Wayfinder? &startId=`0`&level=`1`]]

``` will output the HTML for a multi-level, unordered list of the entire document tree (with certain exceptions), where each list item is a link to a corresponding document in the MODX document tree.

 See [Wayfinder Introductory Examples](/extras/revo/wayfinder/wayfinder-introductory-examples "Wayfinder Introductory Examples") for some thorough examples comparing Wayfinder snippet calls to HTML output.

 Parameters 
------------

###  General Parameters 

 <table><tbody><tr><th> Parameter </th> <th> Description   
</th> <th> Default   
</th> </tr><tr><td> &startId   
</td> <td> The starting point (document ID) for the menu to list documents from. Specify 0 to start from the site root.   
</td> <td> current docId   
</td> </tr><tr><td> &displayStart   
</td> <td> Show the document as referenced by &startId in the menu.   
</td> <td> 0   
</td> </tr><tr><td> &level   
</td> <td> Depth (number of levels) to build the menu from. '0' goes through all levels.   
</td> <td> 0   
</td> </tr><tr><td> &limit   
</td> <td> The limit parameter causes Wayfinder to only process the number of items specified per level.   
</td> <td> 0   
</td> </tr><tr><td> &ignoreHidden   
</td> <td> Ignore the "Show in menu" checkbox for documents, and include them in the menu anyway.   
</td> <td> 0   
</td> </tr><tr><td> &ph   
</td> <td> Name of a placeholder to set with the output results, instead of directly returning the output.   
</td> <td> 0   
</td> </tr><tr><td> &debug   
</td> <td> Set to '1' to enable debug mode for extra troubleshooting.   
</td> <td> 0   
</td> </tr><tr><td> &hideSubMenus   
</td> <td> Set to '1' to only output the active submenu.   
</td> <td> 0   
</td> </tr><tr><td> &removeNewLines   
</td> <td> Set to '1' to remove newline characters from the output.   
</td> <td> 0   
</td> </tr><tr><td> &textOfLinks   
</td> <td> The field to get the actual link text from. Possible values: _menutitle, id, pagetitle, description, parent, alias, longtitle, introtext_ </td> <td> menutitle   
</td> </tr><tr><td> &titleOfLinks   
</td> <td> The field to get the link title from. Possible values: _menutitle, id, pagetitle, description, parent, alias, longtitle, introtext_ </td> <td> pagetitle   
</td> </tr><tr><td> &rowIdPrefix   
</td> <td> If set, this parameter creates a unique ID for each item. The value will be _rowIdPrefix_ + _docId_.   
</td> <td> 0   
</td> </tr><tr><td> &useWeblinkUrl   
</td> <td> When set to 1, the link specified in a weblink document will be output to the placeholder \[ <ins>wf.link</ins>\] instead of the link to the weblink.   
</td> <td> 1   
</td> </tr><tr><td> &includeDocs </td> <td> Comma separated list of document IDs to be included in the menu. </td> <td> </td> </tr><tr><td> &excludeDocs   
</td> <td> Comma seperated list of document IDs to be excluded from the menu.   
</td> <td> 0   
</td> </tr><tr><td> &cacheResults   
</td> <td> caches queries for faster loading ( _added in 2.2.0-rc1_) </td> <td> </td> </tr><tr><td> &cacheTime </td> <td> The number of seconds to store the cached menu, if cacheResults is 1. Set to 0 to store indefinitely until cache is manually cleared. </td> <td> 3600 </td> </tr><tr><td> &contexts   
</td> <td> Contexts to use for building the menu. Defaults to the current context. ( _added in 2.2.0-rc1_)   
</td> <td> </td> </tr><tr><td> &startIdContext   
</td> <td> ( _added in 2.2.0-rc1_)   
</td> <td> </td> </tr><tr><td> &config </td> <td> external php file to configure Wayfinder ( _see core/components/wayfinder/configs for examples_) </td> <td> </td> </tr><tr><td> &scheme   
</td> <td> format for how URLs are generated. Possible values are (based on makeURL API call):   
- -1 : (default value) URL is relative to site\_url
- 0 : see http
- 1 : see https
- full : URL is absolute, prepended with site\_url from config
- abs : URL is absolute, prepended with base\_url from config
- http : URL is absolute, forced to http scheme
- https : URL is absolute, forced to https scheme (_added in 2.3.1-pl_)
 
</td> <td> -1 </td> </tr><tr><td> &sortBy </td> <td> Which field to sort by e.g. 'published' </td> <td> </td> </tr><tr><td> &sortOrder </td> <td> The sorting order, 'ASC' or 'DESC' </td> <td> </td> </tr><tr><td> &where   
</td> <td> JSON style filtering option. For example when trying to hide blog or news from the Articles addon: &where=`\[{"class\_key:!=": "Article"}\]` </td> <td> </td> </tr><tr><td> &hereId </td> <td> Define the current ID to use for the snippet. Use a value of \[\[\*id\]\] if the template specified by hereTpl and activeRowParentTpl is not applied correctly to the menu item. </td> <td> iterated ID </td> </tr><tr><td> &hereTpl </td> <td> The hereTpl template is used when the current item is displayed in the menu.   
</td> <td> </td></tr></tbody></table>###  Template Parameters 

 These parameters specify the chunks that contain the templates that will drive the generation of Wayfinder's output.

 With the current version of WayFinder in Revolution, you can access your own custom TVs by using a placeholder _without_ the 'wf.' prefix, e.g. \[\[+my\_TV\]\]

 As of this writing, only the raw TV value will be returned: it will not be formatted. E.g. if your TV is an image, normal use of the TV inside your template would return the full image tag, but inside of a WayFinder tpl, only the path to the image will be returned.

 If you want MODX 2.x to process a TV (e.g. an image TV with a base path/url as an input option (since MODX 2.1.x) or with an _@inherit_ value) you might do that by calling a snippet within the wayfinder row template (_&rowTpl_). Let's say, your image TV is named _icon_. Normally you would use some code thing like this:

 ```
<pre class="brush: php">
... <img src="[[+icon]]" /> ...

``` But it will not get you the fully processes TV. Just change your code to this:

 ```
<pre class="brush: php">
... <img src="[[processTV? &myId=`[[+id]]` &myTV=`icon` ]]" /> ...

``` Within the snippet _processTV_ you place this php-code:

 ```
<pre class="brush: php">
<?php
$doc = $modx->getObject('modResource', $myId);
return $doc->getTVValue($myTV);

``` As a result the full processed image TV is returned.

 **_&outerTpl_**

 Name of the chunk containing the template for the outer most container; if not included, a string including "

 \[\[+wf.wrapper\]\] 
 " is assumed

 Available placeholders are:

- wf.classes - outputs relevant classes (including class=" ")
- wf.classnames - outputs relevant classes (without class=" ")
- wf.wrapper - outputs inner (row) contents. This placeholder is required.

 Please note that you will need to wrap the placeholders with the relevant tags.

 ```
<pre class="brush: php">
Evolution: [+wf._____+]
Revolution: [[+wf._____]]

``` Example of an &outerTpl chunk (Evo):

 ```
<pre class="brush: php">
<ul id="topnav"[+wf.classes+]>[+wf.wrapper+]</ul>

``` Revo:

 ```
<pre class="brush: php">
<ul id="topnav"[[+wf.classes]]>[[+wf.wrapper]]</ul>

``` The following table shows other parameters to change your output, that use the same placeholders as the &outerTpl parameter.

 <table><tbody><tr><th> Parameter </th> <th> Description   
</th> </tr><tr><td> &innerTpl   
</td> <td> Name of the chunk containing the template for any subfolders listed in the menu.   
</td></tr></tbody></table> **_&rowTpl_**

 Name of the chunk containing the template for the regular row items.   
 Available placeholders are:

- wf.classes - outputs relevant classes (including class=" ")
- wf.classnames - outputs relevant classes (without class=" ")
- wf.link - the href value for your link
- wf.title - the title text for the link, from the field as specified in the &titleOfLinks parameter
- wf.linktext - the text for the actual link, from the field as specified in the &textOfLinks parameter
- wf.wrapper - outputs inner contents such as submenus
- wf.id - outputs a unique ID attribute. You will need to specify the &rowIdPrefix parameter in order for this placeholder to receive a value. The value is your prefix + the docId.
- wf.attributes - outputs the link attributes of the current item
- wf.docid - the document identifier for the current item
- wf.description - the current item's description
- wf.level - the current depth of item (added in v2.3.3)

 Please note that you will need to wrap the placeholders with the relevant tags.

 ```
<pre class="brush: php">
Evolution: [+wf._____+]
Revolution: [[+wf._____]]

``` Since version 2.3.0 you can use placeholders for all fields of a Resource, such as \[\[+introtext\]\], \[\[+menutitle\]\], \[\[+published\]\], etc.   
 Since version 2.3.2 placeholder \[\[+protected\]\] is added that is 1 if Resource is protected by a [Resource Group](/revolution/2.x/administering-your-site/security/resource-groups).

 Examples of a &rowTpl (or related) chunk:

 ```
<pre class="brush: php">
<li[+wf.id+][+wf.classes+]><a href="[+wf.link+]" title="[+wf.title+]" [+wf.attributes+]>[+wf.linktext+]</a>[+wf.wrapper+]</li>

``` ```
<pre class="brush: php">
<li><a href="[+wf.link+]">[+wf.linktext+]</a> - [+wf.description+]  [+wf.wrapper+]</li>

``` Revo:

 ```
<pre class="brush: php">
<li[[+wf.id]][[+wf.classes]]><a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>[[+wf.wrapper]]</li>

``` ```
<pre class="brush: php">
<li><a href="[[+wf.link]]">[[+wf.linktext]]</a> - [[+wf.description]]  [[+wf.wrapper]]</li>

``` The following table shows other parameters to change your output, that use the same placeholders as the &rowTpl parameter.

 <table><tbody><tr><th> Parameter </th> <th> Description   
</th> </tr><tr><td> &startItemTpl   
</td> <td> Name of the chunk containing the template for the start item, if enabled via the &displayStart parameter. Note: the default template shows the start item but does not link it. If you do not need a link, a class can be applied to the default template using the parameter &firstClass=`className`. </td> </tr><tr><td> &parentRowHereTpl   
</td> <td> Name of the chunk containing the template for the current document if it is a container and has children. Remember the \[ <ins>wf.wrapper</ins>\] placeholder to output the children documents.   
</td> </tr><tr><td> &parentRowTpl   
</td> <td> Name of the chunk containing the template for any document that is a container and has children. Remember the \[ <ins>wf.wrapper</ins>\] placeholder to output the children documents.   
</td> </tr><tr><td> &hereTpl   
</td> <td> Name of the chunk containing the template for the current document.   
</td> </tr><tr><td> &innerTpl </td> <td> Name of the chunk containing the template for each submenu. If no innerTpl is specified the outerTpl is used in its place. </td> </tr><tr><td> &innerRowTpl   
</td> <td> Name of the chunk containing the template for the row items in a subfolder.   
</td> </tr><tr><td> &innerHereTpl   
</td> <td> Name of the chunk containing the template for the current document if it is in a subfolder.   
</td> </tr><tr><td> &activeParentRowTpl   
</td> <td> Name of the chunk containing the template for items that are containers, have children and are currently active in the tree.   
</td> </tr><tr><td> &categoryFoldersTpl   
</td> <td> Name of the chunk containing the template for category folders. Category folders are determined by setting the template to blank or by setting the link attributes field to rel="category".   
</td></tr></tbody></table><div class="warning"> &parentRow and &activeParentRow require that the parent resource's "Container" setting is checked. </div> Example of how &startItemTpl could be used:

 ```
<pre class="brush: php">
<h2 class="menustart"><a href="[+wf.link+]">[+wf.linktext+]</a></h2>[+wf.wrapper+]

```###  CSS Class Name Parameters 

 You can use CSS to control the appearance (and in some cases the behavior) of various portions of the generated output. But it's up to you to tell Wayfinder the CSS classnames you want to use, and which portions of the generated output you want them associated with.

 <table><tbody><tr><th> Parameter </th> <th> Description   
</th> <th> Default   
</th> </tr><tr><td> &firstClass   
</td> <td> CSS class for the first item at a given menu level.   
</td> <td> </td> </tr><tr><td> &lastClass   
</td> <td> CSS class for the last item at a given menu level.   
</td> <td> last   
</td> </tr><tr><td> &hereClass   
</td> <td> CSS class for the items showing where you are, all the way up the chain.   
</td> <td> active   
</td> </tr><tr><td> &selfClass   
</td> <td> CSS class for the current item.   
</td> <td> </td> </tr><tr><td> &parentClass   
</td> <td> CSS class for menu items that are a container and have children.   
</td> <td> parent   
</td> </tr><tr><td> &rowClass   
</td> <td> CSS class denoting each output row   
</td> <td> </td> </tr><tr><td> &levelClass   
</td> <td> CSS class denoting every output row level. The level number will be added to the specified class (level1, level2, level3 etc if you specified 'level').   
</td> <td> </td> </tr><tr><td> &outerClass   
</td> <td> CSS class for the outer template.   
</td> <td> </td> </tr><tr><td> &innerClass   
</td> <td> CSS class for the inner template   
</td> <td> </td> </tr><tr><td> &webLinkClass   
</td> <td> CSS class for weblink items.   
</td> <td> </td></tr></tbody></table> **Example**   
 Simply specify the class parameters in the snippet to add the classnames to the output.

 For example, adding &levelClass=`level` will result in

 ```
<pre class="brush: php">
<li class="level2">

```###  Code-Embedding Parameters 

 If the generated output of a Wayfinder call requires the presence of certain CSS or JavaScript, you can store the CSS in one chunk and the JavaScript in another, then use these parameters to have Wayfinder copy one or both chunks into the HEAD section of the webpage in which the Wayfinder call is made.

 <table><tbody><tr><th> Parameter   
</th> <th> Description   
</th> </tr><tr><td> &cssTpl   
</td> <td> Name of a chunk containing the CSS you would like added to the page when the Wayfinder call is present.   
</td> </tr><tr><td> &jsTpl   
</td> <td> Name of a chunk containing the JavaScript you would like added to the page when the Wayfinder call is present.   
</td></tr></tbody></table>###  Default values in Revolution 

 <table><tbody><tr><th> Parameter </th> <th> Default value </th> </tr><tr><td> &outerTpl </td> <td> ```
<pre class="brush: php">
<ul[[+wf.classes]]>[[+wf.wrapper]]</ul>
		
``` </td> </tr><tr><td> &rowTpl </td> <td> ```
<pre class="brush: php">
<li[[+wf.id]][[+wf.classes]]><a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>[[+wf.wrapper]]</li>
		
``` </td> </tr><tr><td> &startItemTpl </td> <td> ```
<pre class="brush: php">
<h2[[+wf.id]][[+wf.classes]]>[[+wf.linktext]]</h2>[[+wf.wrapper]]
		
``` </td></tr></tbody></table>###  

 Examples 
----------

 See [Wayfinder Introductory Examples](/extras/revo/wayfinder/wayfinder-introductory-examples "Wayfinder Introductory Examples") for some thorough examples comparing Wayfinder snippet calls to HTML output.

###  The Minimum Wayfinder Call 

 The snippet call:

 ```
<pre class="brush: php">
[[Wayfinder? &startId=`0`]]

``` will output the HTML for a multi-level, unordered list of the entire document tree (with certain exceptions), where each list item is a link to a corresponding document in the ModX document tree.

###  Replacing DropMenu with Wayfinder 

 Some older templates may use the deprecated DropMenu snippet instead of WayFinder. The DropMenu snippet is not included in MODX 0.9.5 or above.   
 These templates can often be easily updated to use Wayfinder by replacing the call to DropMenu as follows:

 Example DropMenu call in template file:

 ```
<pre class="brush: php">
[[DropMenu?startDoc=`0`&levelLimit=`1` ]]

``` Can be replaced by

 ```
<pre class="brush: php">
[[Wayfinder? &startId=`0`&level=`1`]]

```