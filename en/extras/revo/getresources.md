---
title: "getResources"
_old_id: "654"
_old_uri: "revo/getresources"
---

<div>- [What is getResources?](#getResources-WhatisgetResources%3F)
- [Requirements](#getResources-Requirements)
- [History](#getResources-History)
  - [Download](#getResources-Download)
- [Usage](#getResources-Usage)
  - [Available Properties](#getResources-AvailableProperties)
      - [Templating Properties](#getResources-TemplatingProperties)
      - [Selection Properties](#getResources-SelectionProperties)
      - [Other Properties](#getResources-OtherProperties)
  - [Available Placeholders](#getResources-AvailablePlaceholders)
- [Examples](#getResources-Examples)
- [Displaying Template Variables with getResources](#getResources-DisplayingTemplateVariableswithgetResources)
- [Using getPage for Pagination](#getResources-UsinggetPageforPagination)
  - [Examples](#getResources-Examples)
- [Troubleshooting](#getResources-Troubleshooting)
  - [Nothing Happens](#getResources-NothingHappens)
  - [Array of Attributes is Dumped](#getResources-ArrayofAttributesisDumped)
  - [The same resource is output multiple times _(1.2.2 and prior releases)_](#getResources-Thesameresourceisoutputmultipletimes%281.2.2andpriorreleases%29)
  - [The Content isn't There](#getResources-TheContentisn%27tThere)
  - [Caching problems using tpl, tpl\_N, tpl\_nN, tplFirst, tplLast or tplOdd](#getResources-Cachingproblemsusingtpl%2CtplN%2CtplnN%2CtplFirst%2CtplLastortplOdd)
- [See Also](#getResources-SeeAlso)

</div> What is getResources? 
-----------------------

 A general purpose Resource listing and summarization snippet.

 Requirements 
--------------

- MODX Revolution 2.0.0-beta5 or later
- PHP5 or later

 History 
---------

 getResources was first written by Jason Coward (opengeek) and released on June 30th, 2009.

###  Download 

 It can be downloaded from within the MODX Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/552>

<div class="note"> It is NOT a replacement for Ditto, but rather an alternative component that can accomplish some of the things that the more specialized components do, i.e. Ditto, Wayfinder, Breadcrumbs; basically anything that output the properties for a list of Resources (formerly Documents in MODX Evolution). </div><div class="info"> Documentation and tutorials on Russian can be found here: <http://modx.by/docs/modx-add-ons/getresources/></div> Usage 
-------

 The getResources snippet can be called using the tag:

 ```
<pre class="brush: php">    [[getResources]]

``` Prior to version 1.6.1-pl, calls without the &tpl property specified will output an array of each Resource in the result set, and its fields. Since version 1.6.1-pl this behaviour has changed and you will have to use "&debug=`1`" to get the full result:

 ```
<pre class="brush: php">    [[getResources? &debug=`1`]] [[getResources? &parents=`choose_an_id` &debug=`1`]]

```###  Available Properties 

####  Templating Properties 

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Added in version </th> </tr><tr><td> tpl </td> <td> Name of a chunk serving as a resource template. If not provided, properties are dumped to output for each resource </td> <td> </td> <td> </td> </tr><tr><td> tplOdd </td> <td> Name of a chunk serving as resource template for resources with an odd idx value (see idx property) </td> <td> </td> <td> </td> </tr><tr><td> tplFirst </td> <td> Name of a chunk serving as resource template for the first resource </td> <td> </td> <td> </td> </tr><tr><td> tplLast </td> <td> Name of a chunk serving as resource template for the last resource </td> <td> </td> <td> </td> </tr><tr><td> tpl\_N </td> <td> Name of a chunk serving as resource template for the Nth resource, for example &tpl\_4=`tpl4th` </td> <td> </td> <td> </td> </tr><tr><td> tpl\_nN </td> <td> Name of a chunk serving as resource template for every Nth resource, for example &tpl\_n4=`tpl4th` would apply to any item divisible by 4 </td> <td> </td> <td> 1.4.1 </td> </tr><tr><td> tplCondition </td> <td> Defines a field of the resource to evaluate against keys defined in the &conditionalTpls property. Must be a resource field; does not work with Template Variables. </td> <td> </td> <td> 1.5.0 </td> </tr><tr><td> conditionalTpls </td> <td> A JSON object defining a map of field values and the associated tpl Chunks to use when the field defined by &tplCondition matches the value _:_ &conditionalTpls=`{"1":"tplA","2":"tplB","3":"tplC"}`  
_\[NOTE: tplOdd, tplFirst, tplLast, \* and tpl\_{n} will take precedence over any defined conditionalTpls\]_  </td> <td> </td> <td> 1.5.0 </td> </tr><tr><td> tplPath </td> <td> An optional directory to look for file-based chunks when using @FILE </td> <td> _assets\_path_+ "elements/chunks/" </td> <td> </td> </tr><tr><td> tplWrapper </td> <td> Name of a chunk serving as a wrapper template for the output \[NOTE: Does not work with toSeparatePlaceholders\]. The placeholder where the items are inserted is \[\[+output\]\]. </td> <td> </td> <td> 1.6.0   
</td> </tr><tr><td> wrapIfEmpty </td> <td> If true, will output the wrapper specified in &tplWrapper even if the output is empty. </td> <td> false </td> <td> 1.6.0   
</td> </tr><tr><td> outputSeparator </td> <td> An optional string to separate each tpl instance </td> <td> "\\n" </td> <td> </td> </tr><tr><td> toPlaceholder </td> <td> If set, will assign the result to this placeholder instead of outputting it directly. </td> <td> </td> <td> </td> </tr><tr><td> toSeparatePlaceholders </td> <td> If set, will assign EACH result to a separate placeholder named by this param suffixed with a sequential number (starting from 0). </td> <td> </td> <td> 1.3.0 </td></tr></tbody></table><div class="tip"> **@FILE and @INLINE tpls**   
 You can prefix any tpl property with @FILE or @INLINE to use a file-based chunk or inline markup respectively. - **@FILE**— This prefix allows you to provide a file instead of a Chunk in the database as the tpl. The path and filename you specify will by default, unless you specify a custom _tplPath_property, searche for the @FILE tpl relative to your configured assets\_path + "elements/chunks/".

- **@INLINE**— This prefix allows you to provide markup to use for your tpl directly in the property value. It is recommended you use this only when specifying the tpl\* properties in a <span class="error">\[Property Set\]</span>, otherwise any placeholders in your inline markup may be evaluated before the content gets passed to getResources, since cacheable nested tags in MODX Revolution are evaluated before processing of the containing tag begins. This must be followed by a space, e.g. "@INLINE
- \[\[+pagetitle\]\]
 " 
</div>####  Selection Properties 

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Added in version </th> </tr><tr><td> parents </td> <td> Comma-delimited list of ids serving as parents. Use -1 to ignore parents when specifying _resources_to include. If this is not done, getResources assumes &parents as the current resource and reads its children from there (plus the resources given in &resources = unexpected results). </td> <td> current Resource id </td> <td> </td> </tr><tr><td> resources </td> <td> Comma-delimited list of ids to include in the results. Prefix an id with a dash to exclude the resource from the result. </td> <td> </td> <td> </td> </tr><tr><td> depth </td> <td> Integer value indicating depth to search for resources from each parent. First level of resources beneath parent is depth </td> <td> 10 </td> <td> </td> </tr><tr><td> tvFilters </td> <td> Can be used to filter resources by certain TV values. These are entered as \[( _tvname_)( _operator_)\]( _value_). There are two delimiters you can use to combine filter conditions.  You can have "OR" filters using two pipe symbols. An OR filter fetches resources that has one of the listed TV values.

 ```
<pre class="brush: php">                    mytv==somevalue||mytv==othervalue
		
``` You can also use an "and" filter using a comma. This will make sure that all the conditions are met.

 ```
<pre class="brush: php">                    mytv==somevalue,othertv==othervalue
		
``` For advanced filtering you can also group these. It is important to know that conditions are first separated based on the OR (||) delimiter, and after that on the AND (,) delimiter. So let's take this hypothetical example:

 ```
<pre class="brush: php">                    mytv==foo||mytv==bar,bartv==3||bartv==1
		
``` This will filter resources to meet one of the following conditions:

- mytv is LIKE foo, or
- mytv is LIKE bar AND bartv is LIKE 3, or
- bartv is LIKE 1   
   The examples above search for exact values. You can also use the percentage sign (%) as a wildcard. For example:
 
```
<pre class="brush: php">                    mytv==%a%
		
``` Matches any resources that has an "a" in the mytv value.

 ```
<pre class="brush: php">                    mytv==a%
		
``` Matches any resources that have a mytv value that starts with an "a"

 ```
<pre class="brush: php">                    mytv==%a
		
``` Matches any resources that have a mytv value that ends with an "a".

 You can also combine this with the OR (||) and AND (,) delimiters explained above.

<div class="note"> It is important to know that this function **looks at the raw value of a template variable**for a specific resource. This means that **the value has been explicitly set for the resource**, and that it has not been **processed by a template variable output type**( **or is the default value** _in releases prior to 1.4.2-pl; this release adds support for filtering that includes default values_). So if you have an "autotag" tv, this means the raw value is a comma delimited list, and it is not split up in tags like you see it in the manager. </div><div class="info"> **New filter operators available in 1.4.2-pl**   
 Starting with release 1.4.2-pl of getResources, there are a number of new comparison operators for use when creating filter conditions. In addition, when using many of these new operators, numeric comparison values are automatically CAST TV values to numeric before comparison. Here is a list of the valid operators: <table><tbody><tr><th> Filter Operator </th> <th> SQL Operator </th> <th> CASTs numerics </th> <th> Notes </th> </tr><tr><td> <=> </td> <td> <=> </td> <td> Yes </td> <td> _NULL safe equals_ </td> </tr><tr><td> === </td> <td> = </td> <td> Yes </td> <td> </td> </tr><tr><td> !== </td> <td> != </td> <td> Yes </td> <td> </td> </tr><tr><td> <> </td> <td> <> </td> <td> Yes </td> <td> </td> </tr><tr><td> == </td> <td> LIKE </td> <td> No </td> <td> </td> </tr><tr><td> != </td> <td> NOT LIKE </td> <td> No </td> <td> </td> </tr><tr><td> << </td> <td> < </td> <td> Yes </td> <td> </td> </tr><tr><td> <= </td> <td> <= </td> <td> Yes </td> <td> </td> </tr><tr><td> =< </td> <td> =< </td> <td> Yes </td> <td> </td> </tr><tr><td> >> </td> <td> > </td> <td> Yes </td> <td> </td> </tr><tr><td> >= </td> <td> >= </td> <td> Yes </td> <td> </td> </tr><tr><td> => </td> <td> => </td> <td> Yes </td> <td> </td> </tr><tr></tr></tbody></table></div></td><td> </td><td> </td></tr><tr><td> sortby </td><td> [Any Resource Field](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources#Resources-ResourcesResourceFields) (_excluding Template Variables. See below for the 'sortbyTV' property_). Some common fields to sort on are publishedon, menuindex, pagetitle etc, but see the Resources documentation for all fields. Specify fields with the name only, not using the tag syntax. Note that when using fields like template, publishedby and the likes for sorting, it will be sorted on the raw values, so the template or user ID, and NOT their names.  
  
 You can also sort randomly by specifying RAND(), like so: ```
<pre class="brush: php">                    &sortby=`RAND()`
		
``` From version 1.3.0 this can also be a [JSON](http://json-schema.org/) array to sort on multiple fields, e.g.

 ```
<pre class="brush: php">                    &sortby=`{"publishedon":"ASC","createdon":"DESC"}`
		
``` To sort in a specific order, specify a resource id-list, e.g.

 ```
<pre class="brush: php">                    &sortby=`FIELD(modResource.id, 4,7,2,5,1 )`
		
``` The same thing is possible if you put the sorted IDs in a template variable, like this:

 ```
<pre class="brush: php">                    &sortby=`FIELD(modResource.id,[[*templateVariable]])`
		
```In some cases you need to (somewhat counterintuitively) specify the sort direction as well:

 ```
<pre class="brush: php"> 
&sortby=`FIELD(modResource.id, 4,7,2,5,1 )` &sortdir=`ASC`

``` </td><td> createdon </td><td> </td></tr><tr><td> publishedon </td><td> Modified in 1.3.0 </td><td> </td><td> </td></tr><tr><td> sortbyAlias </td><td> Query alias for sortby field </td><td> </td><td> </td></tr><tr><td> sortbyEscaped </td><td> Escapes the field name specified in sortby </td><td> </td><td> </td></tr><tr><td> sortdir </td><td> Order which to sort by </td><td> DESC </td><td> </td></tr><tr><td> sortbyTV </td><td> Template Variable to sort by </td><td> </td><td> 1.2.0 </td></tr><tr><td> sortdirTV </td><td> Order which to sort by when using sortbyTV </td><td> DESC </td><td> 1.2.0 </td></tr><tr><td> sortbyTVType </td><td> Specify the data type of the sortby TV. Possible values are string, integer, decimal, datetime </td><td> string </td><td> 1.3.0 </td></tr><tr><td> limit </td><td> Limits the number of resources returned. Use `0` for unlimited results. </td><td> 5 </td><td> </td></tr><tr><td> offset </td><td> An offset of resources returned by the criteria to skip </td><td> 0 </td><td> </td></tr><tr><td> where </td><td> A JSON-style expression of criteria to build any additional where clauses from. See below for an example. See [display/xPDO20/xPDOQuery.where](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.where) </td><td> </td><td> </td></tr><tr><td> context </td><td> Comma-delimited list of context keys to limit results by; if empty, contexts for all specified parents will be used (all contexts if 0 is specified) </td><td> </td><td></td></tr></tbody></table>####  Other Properties 

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Added in version </th> </tr><tr><td> showUnpublished </td> <td> If true, will also show Resources if they are unpublished. </td> <td> 0 </td> <td> </td> </tr><tr><td> showDeleted </td> <td> If true, will also show Resources regardless if they are deleted. </td> <td> 0 </td> <td> </td> </tr><tr><td> showHidden </td> <td> If true, will show Resources regardless if they are hidden from the menus. </td> <td> 0 </td> <td> </td> </tr><tr><td> hideContainers </td> <td> If set, will not show any Resources marked as a container (isfolder). </td> <td> 0 </td> <td> </td> </tr><tr><td> includeContent </td> <td> Indicates if the content of each resource should be returned in the results </td> <td> 0 </td> <td> </td> </tr><tr><td> includeTVs </td> <td> Indicates if TemplateVar values should be included in the properties available to each resource template </td> <td> 0 </td> <td> </td> </tr><tr><td> includeTVList </td> <td> An optional comma-delimited list of TemplateVar names to include explicitly if includeTVs is 1 </td> <td> </td> <td> 1.4.0 </td> </tr><tr><td> prepareTVs </td> <td> Prepares media source-dependant TemplateVar values. </td> <td> 1 </td> <td> 1.5.0 </td> </tr><tr><td> prepareTVList </td> <td> Limits the TVs that are prepared to those specified by name in a comma-delimited list </td> <td> </td> <td> 1.5.0 </td> </tr><tr><td> processTVs </td> <td> Indicates if TemplateVar values should be rendered as they would on the resource being summarized. TemplateVars must be included (see includeTVs/includeTVList) to be processed. </td> <td> 0 </td> <td> </td> </tr><tr><td> processTVList </td> <td> An optional comma-delimited list of TemplateVar names to process explicitly. TemplateVars specified here must be included via includeTVs/includeTVList </td> <td> </td> <td> 1.4.0 </td> </tr><tr><td> tvPrefix </td> <td> The prefix for TemplateVar properties </td> <td> tv. </td> <td> </td> </tr><tr><td> idx </td> <td> You can define the starting idx of the resources, which is an property that is incremented as each resource is rendered </td> <td> 1 </td> <td> </td> </tr><tr><td> first </td> <td> Define the idx which represents the first resource </td> <td> 1 </td> <td> </td> </tr><tr><td> last </td> <td> Define the idx which represents the last resource. Default is # of resources being summarized + first - 1 </td> <td> </td> <td> </td> </tr><tr><td> totalVar </td> <td> Define the key of a placeholder set by getResources indicating the total number of Resources that would be selected **not**considering the _limit_value. </td> <td> total </td> <td> </td> </tr><tr><td> debug </td> <td> If true, will send the SQL query to the MODX log. </td> <td> false </td> <td> </td></tr></tbody></table>###  Available Placeholders 

 The placeholders available to your getResources formatting Chunks are mostly dependent on the resources that you are iterating over.

 See [All Tags](/revolution/2.x/making-sites-with-modx/commonly-used-template-tags#CommonlyUsedTemplateTags-CommonlyUsedTemplateTagsAllTags) on the "Commonly Used Template Tags" page – that lists the properties available to all resources.

 If your resource has template variables, those will have corresponding placeholders (remember the placeholders will use the prefix defined by the **&tvPrefix**parameter).

 In addition there are the following placeholders:

 <table><tbody><tr><th> Placeholder </th> <th> Description </th> </tr><tr><td> \[\[+idx\]\] </td> <td> Increases with each iteration, starting with 1 (or the value set by the **&idx**parameter) </td></tr></tbody></table> Examples 
----------

 Also see the [Examples](/extras/revo/getresources/getresources.examples "getResources.Examples") sub section of this documentation for more detailed examples and tutorials.

 Output a list of child Resources of the current Resource, using the 'myRowTpl' chunk:

 ```
<pre class="brush: php">    [[!getResources? &parents=`[[*id]]` &tpl=`myRowTpl`]]

``` Output all resources beneath the Resource with ID '5', with the exception of resource 10, using the 'myRowTpl' chunk:

 ```
<pre class="brush: php">    [[!getResources? &parents=`5` &resources=`-10` &tpl=`myRowTpl`]]

``` Output only the resources specified, using the 'myRowTpl' chunk:

 ```
<pre class="brush: php">    [[!getResources? &parents=`-1` &resources=`10,11,12` &tpl=`myRowTpl`]]

``` Output the top 5 latest published Resources beneath the Resource with ID '5', with tpl 'blogPost':

 ```
<pre class="brush: php">    [[!getResources? &parents=`5` &limit=`5` &tpl=`blogPost` &includeContent=`1`]]

``` Output a list of child Resources of the current Resource, based on the Resource-template:

 ```
<pre class="brush: php">    [[!getResources? &parents=`[[*id]]` &where=`{"template:=":8}` &tpl=`myRowTpl`]]

``` Output a list of child Resources of the current Resource, where the Resource-template ID is 1 or 2:

 ```
<pre class="brush: php">    [[!getResources? &parents=`[[*id]]` &where=`{"template:=":1, "OR:template:=":2}` &tpl=`myRowTpl`]]

``` Output a list of child Resources of the current Resource, where the Resource-template ID is 1, 2 or 3 (you cannot use the same key name more than once):

 ```
<pre class="brush: php">    [[!getResources? &parents=`[[*id]]` &where=`{"template:IN":[1,2,3]}` &tpl=`myRowTpl`]]

``` Display a message when no results found (equivalent of "empty" parameter in Ditto):

 ```
<pre class="brush: php">    [[!getResources:default=`No results found`? &parents=`[[*id]]` &tpl=`myRowTpl`]]

``` Example using an inline Tpl

 ```
<pre class="brush: php">    [[!getResources? &tpl=`@INLINE <li title="[[+longtitle]]">[[+pagetitle]]</li>`]]

``` Wrapping a getResources result in other markup ( <del>like an &outerTpl property, which doesn't exist for getResources</del>from version 1.6.0 you can still do it like that or use the &tplWrapper property).

 ```
<pre class="brush: php">    [[getResources? ... &toPlaceholder=`results`]] [[+results:notempty=`<ol>[[+results]]</ol>`]]

``` Displaying Template Variables with getResources 
-------------------------------------------------

 To reduce retrieval time, getResources does not get TV values by default. If you want to display TVs, you should include the following parameters:

 ```
<pre class="brush: php">    &includeTVs=`1` &processTVs=`1`

``` You also need to either prefix all TVs with tv. or use this parameter in your snippet tag:

 ```
<pre class="brush: php">    &tvPrefix=``

``` In the Tpl chunk you use to display the getResources output, use a placeholder tag like this (but with the name of your TV):

 ```
<pre class="brush: php">    [[+tv.my_tv]]

``` Using getPage for Pagination 
------------------------------

 When combined with [getPage](/extras/revo/getpage "getPage"), getResources allows you to do powerful and flexible pagination on your pages.

###  Examples 

 Grab first 10 Resources - sorted by publishedon - below the Resource ID 17, no more than 2 levels deep, with the tpl 'blogListPost', including the TVs and content:

 ```
<pre class="brush: php">    [[!getPage? &elementClass=`modSnippet` &element=`getResources` &parents=`17` &depth=`2` &limit=`10` &pageVarKey=`page` &includeTVs=`1` &includeContent=`1` &tpl=`blogListPost` ]] <div class="paging"> <ul class="pageList"> [[!+page.nav]] </ul> </div>

``` and the chunk blogListPost:

 ```
<pre class="brush: php">    <div class="blogPost"> <div class="date">[[+publishedon:strtotime:date=`%b %d %Y`]]</div> <h2><a href="[[~[[+id]]]]" title="[[+pagetitle]]">[[+pagetitle]]</a></h2> <p class="author"><strong>Author:</strong> <span class="author">[[+createdby:userinfo=`username`]]</span></p> <p class="summary">[[+introtext]]</p> <p class="readmore"><a href="[[~[[+id]]]]"><span>Read more</span></a></p> <div class="clear"></div> </div> <hr/>

``` Troubleshooting 
-----------------

###  Nothing Happens 

 Before you go banging your head on a wall, have you checked to make sure that this extra is actually installed on your site?

###  Array of Attributes is Dumped 

 **You forgot to include the `&tpl` parameter**. Without the **&tpl**parameter, the Snippet will retrieve the specified resources, but you didn't tell it how to format them. Be sure you include the **&tpl**parameter in your Snippet call, e.g.

 ```
<pre class="brush: php">    [[!getResources? &parents=`5` &limit=`5` &tpl=`blogPost`]]

``` **OR**

 **You misspelled the chunk name.**Perhaps you DO have a **&tpl**specified, but does that chunk actually exist? If you name a chunk that does not exist, getResources will not know how to format your results.

 **OR**

 Even though you have correctly specified the **&tpl**parameter, you may have inadvertently forgotten the ampersand on one of your _other_parameters. E.g. **limit=`5`**will cause the Snippet call to fail and the attributes to be dumped. The correct format should be **&limit=`5`**

###  The same resource is output multiple times _(1.2.2 and prior releases)_

 If you see the same resource listed multiple times, then try omitting the **&sortbyTV**parameter.

###  The Content isn't There 

 You are retrieving the correct resources and you are seeing _some_of the results formatting correctly, but your \[\[+content\]\] placeholders don't contain anything. What's going on? You must include the **&includeContent=`1`**argument to get the content.

###  Caching problems using tpl, tpl\_N, tpl\_nN, tplFirst, tplLast or tplOdd 

 If you are using this parameters you may have thought about reusing your tpl chunk to avoid repeating code. For example:

 Generic Tpl Chunk: \[\[$GenericTplChunk\]\]

 ```
<pre class="brush: php">    <div>Hi [[+pagetitle]]</div>

``` Fourth Tpl Chunk ( tpl\_nN): \[\[$4thTplChunk\]\]

 ```
<pre class="brush: php">    <div class="highlight">[[$GenericTplChunk]]</div>

``` If you have problems with this, having blank or strange results, is due to MODX caching. Calling the chunk uncached won't work. You have to use a trick: a dummy tag when calling the generic chunk.

 ```
<pre class="brush: php">    <div class="highlight">[[$GenericTplChunk? &idx=`[[+idx]]` ]]</div>

``` Note: You don't need to call the chunk uncached.

 Seen at: <http://forums.modx.com/thread/43748/chunk-inside-getresources-template-not-processed-correctly>

 See Also 
----------

 If you only need to get a single field from a foreign resource, try using [getResourceField](/extras/revo/getresourcefield "getResourceField").