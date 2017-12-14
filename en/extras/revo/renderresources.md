---
title: "renderResources"
_old_id: "699"
_old_uri: "revo/renderresources"
---

<div>- [What is renderResources?](#renderResources-WhatisrenderResources%3F)
- [Requirements](#renderResources-Requirements)
- [History](#renderResources-History)
  - [Download](#renderResources-Download)
- [Usage](#renderResources-Usage)
  - [Available Properties](#renderResources-AvailableProperties)
      - [Templating Properties](#renderResources-TemplatingProperties)
      - [Selection Properties](#renderResources-SelectionProperties)
      - [Other Properties](#renderResources-OtherProperties)
- [Examples](#renderResources-Examples)
- [Using getPage for Pagination](#renderResources-UsinggetPageforPagination)
  - [Examples](#renderResources-Examples)
- [Troubleshooting](#renderResources-Troubleshooting)
- [See Also](#renderResources-SeeAlso)

</div>What is renderResources?
------------------------

A general purpose snippet for rendering the output of a collection of Resources.

Requirements
------------

- MODx Revolution 2.1.0 or later
- PHP 5.1.2 or later

History
-------

renderResources was first written by Jason Coward (opengeek) and released on March 19th, 2012. [Development and bug reports are on Github](https://github.com/opengeek/renderResources).

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/renderresources>

<div class="note">It is NOT a replacement for Ditto, but rather an alternative component that can accomplish some of the things that the more specialized components do, i.e. Ditto, Wayfinder, Breadcrumbs; basically anything that output the properties for a list of Resources (formerly Documents in MODx Evolution).</div>Usage
-----

The renderResources snippet can be called using the tag:

```
<pre class="brush: php">
[[renderResources]]

```Calls without a &tpl property specified simply return the output from each Resource.

<div class="note">renderResources cannot be used with binary Content Types, or with modSymLink or modWebLink Resources. These Resources will be excluded from the selection criteria automatically.</div>### Available Properties

#### Templating Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th><th>Added in version</th></tr><tr><td>tpl</td><td>Name of a chunk serving as a wrapper template for the Resource output. If not provided, the output of the Resource is returned directly.</td><td> </td><td> </td></tr><tr><td>tplOdd</td><td>Name of a chunk serving as a wrapper template for resources with an odd idx value (see idx property)</td><td> </td><td> </td></tr><tr><td>tplFirst</td><td>Name of a chunk serving as a wrapper template for the first resource</td><td> </td><td> </td></tr><tr><td>tplLast</td><td>Name of a chunk serving as a wrapper template for the last resource</td><td> </td><td> </td></tr><tr><td>tpl\_N</td><td>Name of a chunk serving as a wrapper template for the Nth resource, for example &tpl\_4=`tpl4th`</td><td> </td><td> </td></tr><tr><td>tpl\_nN</td><td>Name of a chunk serving as a wrapper template for every Nth resource, for example &tpl\_n4=`tpl4th` would apply to any item divisible by 4</td><td> </td><td> </td></tr><tr><td>outputSeparator</td><td>An optional string to separate each tpl instance</td><td>"\\n"</td><td> </td></tr><tr><td>toPlaceholder   
</td><td>If set, will assign the result to this placeholder instead of outputting it directly.   
</td><td> </td><td> </td></tr><tr><td>toSeparatePlaceholders   
</td><td>If set, will assign EACH result to a separate placeholder named by this param suffixed with a sequential number (starting from 0).   
</td><td> </td><td> </td></tr></tbody></table>#### Selection Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th><th>Added in version</th></tr><tr><td>parents</td><td>Comma-delimited list of ids serving as parents. Use -1 to ignore parents when specifying _resources_ to include.</td><td>current Resource id</td><td> </td></tr><tr><td>resources   
</td><td>Comma-delimited list of ids to include in the results. Prefix an id with a dash to exclude the resource from the result.   
</td><td> </td><td> </td></tr><tr><td>depth</td><td>Integer value indicating depth to search for resources from each parent</td><td>10</td><td> </td></tr><tr><td>tvFilters</td><td>Can be used to filter resources by certain TV values. These are entered as \[(_tvname_)(_operator_)\](_value_). There are two delimiters you can use to combine filter conditions.   
  
You can have "OR" filters using two pipe symbols. An OR filter fetches resources that has one of the listed TV values.   
  
```
<pre class="brush: php">
mytv==somevalue||mytv==othervalue

```You can also use an "and" filter using a comma. This will make sure that all the conditions are met.

```
<pre class="brush: php">
mytv==somevalue,othertv==othervalue

```For advanced filtering you can also group these. It is important to know that conditions are first seperated based on the OR (||) delimiter, and after that on the AND (,) delimiter. So let's take this hypothetical example:

```
<pre class="brush: php">
mytv==foo||mytv==bar,bartv==3||bartv==1

```This will filter resources to meet one of the following conditions:

- mytv is LIKE foo, or:
- mytv is LIKE bar AND bartv is LIKE 3, or:
- bartv is LIKE 1   
  The examples above search for exact values. If you want, you can also use the percentage sign (%) as a wildcard. For example:   
    
  ```
  <pre class="brush: php">
  mytv==%a%
  
  ```Matches any resources that has an "a" in the mytv value.
  
  ```
  <pre class="brush: php">
  mytv==a%
  
  ```Matches any resources that have a mytv value that starts with an a, and anything after that.
  
  ```
  <pre class="brush: php">
  mytv==%a
  
  ```Matches any resources that have a mytv value that ends with an a, but can have anything in front of it.   
    
  Of course you can also combine this with the OR (||) and AND (,) delimiters explained above.
  
  <div class="note">  
  It is important to know that this function **looks at the raw value of a template variable** for a specific resource. This means that **the value has been explicitly set for the resource**, and that it has not been **processed by a template variable output type**. So if you have an "autotag" tv, this means the raw value is a comma delimited list, and it is not split up in tags like you see it in the manager.   
    
    
    
  </div><div class="info">**Available filter operators**  
    
  There are a number of comparison operators for use when creating filter conditions. In addition, when using many of these operators, numeric comparison values are automatically CAST TV values to numeric before comparison. Here is a list of the valid operators:   
  || Filter Operator || SQL Operator || CASTs numerics || Notes ||| <=> | <=> | Yes | _NULL safe equals_ | <table><tbody><tr><td>===</td><td>=</td><td>Yes</td><td> </td></tr><tr><td>!==</td><td>!=</td><td>Yes</td><td> </td></tr><tr><td><></td><td><></td><td>Yes</td><td> </td></tr><tr><td>==</td><td>LIKE</td><td>No</td><td> </td></tr><tr><td>!=</td><td>NOT LIKE</td><td>No</td><td> </td></tr><tr><td><<</td><td><</td><td>Yes</td><td> </td></tr><tr><td><=</td><td><=</td><td>Yes</td><td> </td></tr><tr><td>=<</td><td>=<</td><td>Yes</td><td> </td></tr><tr><td>>></td><td>></td><td>Yes</td><td> </td></tr><tr><td>>=</td><td>>=</td><td>Yes</td><td> </td></tr><tr><td>=></td><td>=></td><td>Yes</td><td> </td><td>  
    
    
  </td></tr></tbody></table></div>

</td><td> </td><td> </td></tr><tr><td>sortby</td><td>[Any Resource Field](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources#Resources-ResourcesResourceFields) (excluding Template Variables) to sort by. Some common fields to sort on are publishedon, menuindex, pagetitle etc, but see the Resources documentation for all fields. Specify fields with the name only, not using the tag syntax. Note that when using fields like template, publishedby and the likes for sorting, it will be sorted on the raw values, so the template or user ID, and NOT their names.   
  
You can also sort randomly by specifying RAND(), like so:   
```
<pre class="brush: php">
&sortby=`RAND()`

```  
This can also be a [JSON](http://json-schema.org/) array to sort on multiple fields, e.g.

```
<pre class="brush: php">
&sortby=`{"publishedon":"ASC","createdon":"DESC"}`

```  
If you want to to sort in a specific order, you can do so by specifying a resource id-list like this:

```
<pre class="brush: php">
&sortby=`FIELD(modResource.id, 4,7,2,5,1 )`

```The same thing is possible if you put the sorted IDs in a template variable, like this:

```
<pre class="brush: php">
&sortby=`FIELD(modResource.id,[[*templateVariable]])`

```</td><td> </td><td> </td></tr><tr><td>publishedon</td><td>  
</td></tr><tr><td>sortbyAlias</td><td>Query alias for sortby field</td><td> </td><td> </td></tr><tr><td>sortbyEscaped</td><td>Escapes the field name specified in sortby</td><td> </td><td> </td></tr><tr><td>sortdir</td><td>Order which to sort by</td><td>DESC</td><td> </td></tr><tr><td>sortbyTV</td><td>Template Variable to sort by</td><td> </td><td> </td></tr><tr><td>sortdirTV</td><td>Order which to sort by when using sortbyTV</td><td>DESC</td><td> </td></tr><tr><td>sortbyTVType   
</td><td>Specify the data type of the sortby TV. Possible values are string, integer, decimal, datetime</td><td>string</td><td> </td></tr><tr><td>limit</td><td>Limits the number of resources returned</td><td>5</td><td> </td></tr><tr><td>offset</td><td>An offset of resources returned by the criteria to skip</td><td>0</td><td> </td></tr><tr><td>where</td><td>A JSON-style expression of criteria to build any additional where clauses from. See below for an example. See <http://rtfm.modx.com/display/xPDO20/xPDOQuery.where></td><td> </td><td> </td></tr><tr><td>context</td><td>Which Context should be searched in. Defaults to the current Context.</td><td> </td><td> </td></tr></tbody></table>#### Other Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th><th>Added in version</th></tr><tr><td>showUnpublished</td><td>If true, will also show Resources if they are unpublished.</td><td>0</td><td> </td></tr><tr><td>showDeleted</td><td>If true, will also show Resources regardless if they are deleted.</td><td>0</td><td> </td></tr><tr><td>showHidden</td><td>If true, will show Resources regardless if they are hidden from the menus.</td><td>0</td><td> </td></tr><tr><td>hideContainers</td><td>If set, will not show any Resources marked as a container (is\_folder).</td><td>0</td><td> </td></tr><tr><td>idx</td><td>You can define the starting idx of the resources, which is an property that is incremented as each resource is rendered</td><td>1</td><td> </td></tr><tr><td>first</td><td>Define the idx which represents the first resource</td><td>1</td><td> </td></tr><tr><td>last</td><td>Define the idx which represents the last resource. Default is # of resources being summarized + first - 1</td><td> </td><td> </td></tr><tr><td>totalVar</td><td>Define the key of a placeholder set by renderResources indicating the total number of Resources that would be selected **not** considering the _limit_ value.</td><td>total</td><td> </td></tr><tr><td>debug</td><td>If true, will send the SQL query to the MODx log.   
</td><td>false</td><td> </td></tr></tbody></table>Examples
--------

Output a list of child Resources of the current Resource, using the 'myRowTpl' chunk:

```
<pre class="brush: php">
[[!renderResources? &parents=`[[*id]]` &tpl=`myRowTpl`]]

```Output all resources beneath the Resource with ID '5', with the exception of resource 10, using the 'myRowTpl' chunk:

```
<pre class="brush: php">
[[!renderResources? &parents=`5` &resources=`-10` &tpl=`myRowTpl`]]

```Output only the resources specified, using the 'myRowTpl' chunk:

```
<pre class="brush: php">
[[!renderResources? &parents=`-1` &resources=`10,11,12` &tpl=`myRowTpl`]]

```Output the top 5 latest published Resources beneath the Resource with ID '5', with tpl 'blogPost':

```
<pre class="brush: php">
[[!renderResources? &parents=`5` &limit=`5` &tpl=`blogPost` &includeContent=`1`]]

```Output a list of child Resources of the current Resource, based on the Resource-template:

```
<pre class="brush: php">
[[!renderResources? &parents=`[[*id]]` &where=`{"template:=":8}` &tpl=`myRowTpl`]]

```Output a list of child Resources of the current Resource, where the Resource-template ID is 1 or 2:

```
<pre class="brush: php">
[[!renderResources? &parents=`[[*id]]` &where=`{"template:=":1, "OR:template:=":2}` &tpl=`myRowTpl`]]

```Output a list of child Resources of the current Resource, where the Resource-template ID is 1, 2 or 3 (you cannot use the same key name more than once):

```
<pre class="brush: php">
[[!renderResources? &parents=`[[*id]]` &where=`{"template:IN":[1,2,3]}` &tpl=`myRowTpl`]]

```Display a message when no results found (equivalent of "empty" parameter in Ditto):

```
<pre class="brush: php">
[[!renderResources:default=`No results found`? &parents=`[[*id]]` &tpl=`myRowTpl`]]

```Using getPage for Pagination
----------------------------

When combined with [getPage](/extras/revo/getpage "getPage"), renderResources allows you to do powerful and flexible pagination on your pages.

### Examples

Grab first 10 Resources - sorted by publishedon - below the Resource ID 17, no more than 2 levels deep, with the tpl 'blogListPost', including the TVs and content:

```
<pre class="brush: php">
[[!getPage?
   &elementClass=`modSnippet`
   &element=`renderResources`

   &parents=`17`
   &depth=`2`
   &limit=`10`
   &pageVarKey=`page`

   &tpl=`blogListPost`
]]
<div class="paging">
<ul class="pageList">
  [[!+page.nav]]
</ul>
</div>

```and the chunk blogListPost:

```
<pre class="brush: php">
<div class="blogPost">
  [[+output]]
  <div class="clear"></div>
</div>
<hr/>

```Troubleshooting
---------------

**Nothing comes up!** Just to be sure, is **renderResources** installed?

See Also
--------

If you want to render properties of Resources rather than the complete output, use [getResources](/extras/revo/getresources "getResources").   
If you only need to get a single field from a foreign resource, try using [getResourceField](/extras/revo/getresourcefield "getResourceField").