---
title: "Resources"
_old_id: "264"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources"
---

<div>- [What is a Resource?](#Resources-WhatisaResource%3F)
  - [Managing Resources](#Resources-ManagingResources)
- [Resource Fields](#Resources-ResourceFields)
  - [General Resource Fields](#Resources-GeneralResourceFields)
  - [Settings Resource Fields](#Resources-SettingsResourceFields)
  - [Using Resource Fields](#Resources-UsingResourceFields)
  - [Accessing Resource Fields in a Snippet](#Resources-AccessingResourceFieldsinaSnippet)
- [Linking to a Resource](#Resources-LinkingtoaResource)
  - [URL Parameters for Link Tags](#Resources-URLParametersforResourceTags)
  - [URL Schemes in Link Tags](#Resources-URLSchemesinResourceTags)
- [See Also](#Resources-SeeAlso)
 
</div>What is a Resource?
-------------------

 A resource is a representation of a page in MODx. There are different types of Resources, such as documents, weblinks, symlinks, actual files, or many other things. The default Resource type is a Document, and simply represents a webpage on your site.

 There are 4 total types of Resources, and they are Documents, [Weblinks](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/weblink "Weblink"), [Symlinks](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/symlink "Symlink"), and [Static Resources](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/static-resource "Static Resource").

 Each Resource also has a unique ID, or "Resource Identifier". This lets MODx know what Resource to fetch when you are loading a webpage. Also, when you're wanting to link between Resources, you should always use the ID to do so. That way MODx will generate the link and you will not have to worry about changed aliases, content types or anything - MODx will change your links also. Please see the Linking to Resources section below for more information on how to do this.

### Managing Resources

 Resources are shown in the Resources tree in the left-hand navigation of the manager. To edit one, simply click on the page you would like to edit. You can alternatively right-click the Resource and click 'Edit Resource'. This will load the Resource Edit page:

 [![](/download/attachments/bf9f8ccf5036b4f4bf8b248f7748d0c3/resource-edit1_v2.3.png)](/download/attachments/bf9f8ccf5036b4f4bf8b248f7748d0c3/resource-edit1_v2.3.png)

 The content of the Resource can then be edited in the large content field in the bottom area. Other fields related to each Resource can also be edited via the tabs on the top of the page.

Resource Fields
---------------

 Resources come packaged with a list of predetermined fields by default. They are:

### General Resource Fields

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> id </td> <td> The ID of the Resource. </td> </tr><tr><td> template </td> <td> A reference to the [Template](/revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates") that this Resource is using </td> </tr><tr><td> published </td> <td> If the Resource is Published, or viewable on the front-end. </td> </tr><tr><td> pagetitle </td> <td> The title of the Resource. </td> </tr><tr><td> longtitle </td> <td> A longer title of the Resource. </td> </tr><tr><td> description </td> <td> An extended description of the Resource. </td> </tr><tr><td> introtext </td> <td> Also called 'Summary', an introductory excerpt of the Resource's content. Useful for blogs or searching. </td> </tr><tr><td> alias </td> <td> The URL alias to use, if your site is using Friendly URLs. A Resource with alias 'home' and Content Type 'html' would render 'home.html' if it isn't a Container. </td> </tr><tr><td> parent </td> <td> The Parent Resource's ID. </td> </tr><tr><td> link\_attributes </td> <td> Used with menu building snippets to add attributes to links, etc. Can be repurposed for other needs. </td> </tr><tr><td> menutitle </td> <td> The title to show for the Resource when displayed in a menu. </td> </tr><tr><td> menuindex </td> <td> The order index of the Resource in a menu. Higher order means later. </td> </tr><tr><td> hidemenu </td> <td> Also called 'Hide from Menus', if set, this Resource will not show in most Menu or Navigation snippets. </td> </tr><tr><td> content </td> <td> The actual content of the Resource. </td></tr></tbody></table>### Settings Resource Fields

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> isfolder </td> <td> Labeled as 'Container', this specifies whether or not the Resource renders with a / in Friendly URLs instead of its suffix. </td> </tr><tr><td> searchable </td> <td> If the Resource is searchable. </td> </tr><tr><td> cacheable </td> <td> If the Resource is cacheable. </td> </tr><tr><td> createdby </td> <td> The ID of the user who created the Resource. </td> </tr><tr><td> editedby </td> <td> The ID of the last user to edit the Resource. </td> </tr><tr><td> deleted </td> <td> If the Resource is deleted or not. </td> </tr><tr><td> deletedby </td> <td> The ID of the user who deleted the Resource. </td> </tr><tr><td> publishedby </td> <td> The ID of the user who last published the Resource. </td> </tr><tr><td> createdon </td> <td> The date the Resource was created. </td> </tr><tr><td> publishedon </td> <td> The date the Resource was published. </td> </tr><tr><td> editedon </td> <td> The date the Resource was last edited. </td> </tr><tr><td> pub\_date </td> <td> The scheduled date for a Resource to be published. </td> </tr><tr><td> unpub\_date </td> <td> The scheduled date for a Resource to be unpublished. </td></tr></tbody></table>### Using Resource Fields

 Resource fields can be accessed from anywhere by using the [Template Variable](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables "Template Variables") syntax, ie:

 ```
<pre class="brush: php">[[*pagetitle]] // renders the pagetitle.
[[*id]] // renders the Resource's ID
[[*createdby]] // renders the ID of the user who created this Resource

``` They can also have [Output Filters](/revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") applied to them:

 ```
<pre class="brush: php">// Renders a limited version of the introtext field.
// If it is longer than 100 chars, adds an ...
[[*introtext:ellipsis=`100`]]
// Grabs the user who last edited the Resource's username
[[*editedby:userinfo=`username`]]
// Grabs the user who published the Resource's email
[[*publishedby:userinfo=`email`]]

```### Accessing Resource Fields in a Snippet

 Grabbing the Resource Fields in a [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") is quite easy; MODx provides you with the Resource object in any Snippet, via the $modx->resource reference. For example, this example Snippet will return the current page's pagetitle reversed:

 ```
<pre class="brush: php">/* output the current Resource's pagetitle */
$output = $modx->resource->get('pagetitle');
return strrev($output);

```Linking to a Resource
---------------------

 In MODx, links to Resources are dynamically managed via "Link Tags". They look like this:

 ```
<pre class="brush: html">[[~123]]

``` where '123' is the ID of the Resource to link to. You can put these tags anywhere, and MODx will dynamically render the URL for the Resource.

<div class="note"> You can also get the Link Tag by dragging a Resource from the left tree into the content panel. </div> Also see [Named Anchor](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/named-anchor "Named Anchor").

### URL Parameters for Link Tags

 Adding URL parameters in your Link Tag is quite simple in Revolution. Let's say we have Resource ID 42 that resolves to a URL of 'store/items.html'. We want to add a 'tag' parameter to the URL, with a value of 'Snacks' and a 'sort' parameter of 'Taste'. Here's how you'd do it:

 ```
<pre class="brush: html">[[~42? &tag=`Snacks` &sort=`Taste`]]

``` This would render as:

 ```
<pre class="brush: html">	store/items.html?tag=Snacks&sort=Taste

``` Note that those are **backticks** instead of apostrophes.

### URL Schemes in Link Tags

 You can specify the scheme for a Resource in your tag:

 ```
<pre class="brush: html">[[~123? &scheme=`https`]]

``` Would render the URL using 'https' instead of the scheme indicated by the current settings (i.e. system or context settings).

 The available schemes are:

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> -1 </td> <td> (default) URL is relative to site\_url </td> </tr><tr><td> 0 </td> <td> see http </td> </tr><tr><td> 1 </td> <td> see https </td> </tr><tr><td> full </td> <td> Renders the link as an absolute URL, prepended with site\_url </td> </tr><tr><td> abs </td> <td> Renders the link as an absolute URL, prepended with base\_url </td> </tr><tr><td> http </td> <td> Renders the link as an absolute URL, forced to http scheme </td> </tr><tr><td> https </td> <td> Renders the link as an absolute URL, force to https scheme </td></tr></tbody></table>See Also
--------

1. [Content Types](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/content-types)
2. [Named Anchor](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/named-anchor)
3. [Static Resource](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/static-resource)
4. [Symlink](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/symlink)
  1. [Using Resource Symlinks](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/symlink/using-resource-symlinks)
5. [Weblink](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/weblink)