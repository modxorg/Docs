---
title: "QuickCrumbs"
_old_id: "695"
_old_uri: "revo/quickcrumbs"
---

<div>- [What is QuickCrumbs](#QuickCrumbs-WhatisQuickCrumbs)
  - [History](#QuickCrumbs-History)
  - [Requirements](#QuickCrumbs-Requirements)
  - [Development & Bug reporting](#QuickCrumbs-Development%26Bugreporting)
- [Usage](#QuickCrumbs-Usage)
- [Available Properties](#QuickCrumbs-AvailableProperties)
  - [Template properties](#QuickCrumbs-Templateproperties)
  - [Crumb Selection properties](#QuickCrumbs-CrumbSelectionproperties)
  - [Other properties](#QuickCrumbs-Otherproperties)
  - [Parent-Titles properties](#QuickCrumbs-ParentTitlesproperties)

</div>What is QuickCrumbs
-------------------

QuickCrumbs is a quick and efficient breadcrumb-generation [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") for MODx Revolution. It supports [Chunks](/revolution/2.x/making-sites-with-modx/structuring-your-site/chunks "Chunks") tpl's for the crumbs, has a configurable separator and much more.

### History

Being developed since October 11, 2010 by [Jason Coward](http://modx.com/extras/author/opengeek).

### Requirements

- MODX Revolution

### Development & Bug reporting

ModDef is currently being developed on Github. That is also the place to **[report bugs](https://github.com/opengeek/quickcrumbs/issues)**, file **feature requests** and **improvements**. You may also fetch the latest commits from the Develop branch.

Github: <https://github.com/opengeek/quickcrumbs>

Usage
-----

The QuickCrumbs snippet can be called using the tag:

```
<pre class="brush: php">
[[QuickCrumbs]]

```Calls without a &tpl property specified will just output an array listing of each resulting Resource and their fields.

Available Properties
--------------------

The following properties are available for the QuickCrumbs Snippet.

### Template properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>tpl</td><td>Name of a Chunk serving as a template for a Resource crumb. **NOTE: If not provided, properties are dumped to output in a pre element for each crumb**</td><td> </td></tr><tr><td>siteStartTpl</td><td>An optional Chunk serving as a template for the site\_start.   
</td><td>Defaults to the \***tpl**\* if not provided.   
</td></tr><tr><td>selfTpl</td><td>An optional Chunk serving as a template for the current Resource crumb.   
</td><td>Defaults to the \***tpl**\* if not provided.   
</td></tr><tr><td>outerTpl</td><td>An optional Chunk serving as a wrapper template for the complete crumbs output.   
</td><td>Defaults to empty, returning the output as is.   
</td></tr></tbody></table>### Crumb Selection properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>fields</td><td>A comma-separate list of fields to select from the resource as placeholders. **NOTE that id, class\_key, and context\_key are always selected.**</td><td>Defaults to 'pagetitle,menutitle,description'</td></tr><tr><td>showSiteStart</td><td>Indicates if a crumb representing the site\_start Resource should be generated.   
</td><td>Defaults to 1 (or true).   
</td></tr><tr><td>showSelf   
</td><td>Indicates if a crumb representing the current Resource should be generated.   
</td><td>Defaults to 1 (or true).</td></tr></tbody></table>### Other properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>separator</td><td>A string to use as a separator between crumbs.   
</td><td>Defaults to `»`   
</td></tr><tr><td>toPlaceholder   
</td><td>If not empty, the output is saved to a placeholder with the specified name instead of returned directly from the Snippet.   
</td><td>Default is empty.   
</td></tr><tr><td>debug   
</td><td>If true, debugging information will be sent to the MODx log.   
</td><td>Defaults to 0 (or false).</td></tr></tbody></table>### Parent-Titles properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>parentTitlesPlaceholder   
</td><td>If not empty, pagetitles of all the parent crumbs are compiled and set as a placeholder with the specified name, for use in the content of your Resource.   
</td><td>Default is empty.   
</td></tr><tr><td>parentTitlesReversed   
</td><td>Indicates if the parent pagetitles should be output in reverse order.   
</td><td>Default is 0 (or false).   
</td></tr><tr><td>titleSeparator   
</td><td>A separator to use in between pagetitles used in the parentTitlesPlaceholder.   
</td><td> </td></tr></tbody></table>