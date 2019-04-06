---
title: "getResources"
_old_id: "654"
_old_uri: "revo/getresources"
---

## What is getResources? 

 A general purpose Resource listing and summarization snippet.

## Requirements 

- MODX Revolution 2.0.0-beta5 or later
- PHP5 or later

## History 

 getResources was first written by Jason Coward (opengeek) and released on June 30th, 2009.

### Download 

 It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/552>

 It is NOT a replacement for Ditto, but rather an alternative component that can accomplish some of the things that the more specialized components do, i.e. Ditto, Wayfinder, Breadcrumbs; basically anything that output the properties for a list of Resources (formerly Documents in MODX Evolution). 

 Documentation and tutorials on Russian can be found here: <http://modx.by/docs/modx-add-ons/getresources/>

## Usage 

 The getResources snippet can be called using the tag:

``` php 
[[getResources]]
```

 Prior to version 1.6.1-pl, calls without the &tpl property specified will output an array of each Resource in the result set, and its fields. Since version 1.6.1-pl this behaviour has changed and you will have to use "&debug=`1`" to get the full result:

``` php 
[[getResources? &debug=`1`]] [[getResources? &parents=`choose_an_id` &debug=`1`]]
```

### Available Properties 

#### Templating Properties 

 | Name                                                                                                         | Description                                                                                                                                                                                           | Default Value                      | Added in version |
 | ------------------------------------------------------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------- | ---------------- |
| tpl                                                                                                          | Name of a chunk serving as a resource template. If not provided, properties are dumped to output for each resource                                                                                    |                                    |                  |
| tplOdd                                                                                                       | Name of a chunk serving as resource template for resources with an odd idx value (see idx property)                                                                                                   |                                    |                  |
| tplFirst                                                                                                     | Name of a chunk serving as resource template for the first resource                                                                                                                                   |                                    |                  |
| tplLast                                                                                                      | Name of a chunk serving as resource template for the last resource                                                                                                                                    |                                    |                  |
| tpl\_N                                                                                                       | Name of a chunk serving as resource template for the Nth resource, for example &tpl\_4=`tpl4th`                                                                                                       |                                    |                  |
| tpl\_nN                                                                                                      | Name of a chunk serving as resource template for every Nth resource, for example &tpl\_n4=`tpl4th` would apply to any item divisible by 4                                                             |                                    | 1.4.1            |
| tplCondition                                                                                                 | Defines a field of the resource to evaluate against keys defined in the &conditionalTpls property. Must be a resource field; does not work with Template Variables.                                   |                                    | 1.5.0            |
| conditionalTpls                                                                                              | A JSON object defining a map of field values and the associated tpl Chunks to use when the field defined by &tplCondition matches the value _:_ &conditionalTpls=`{"1":"tplA","2":"tplB","3":"tplC"}` _\[NOTE: tplOdd, tplFirst, tplLast, \* and tpl\_{n} will take precedence over any defined conditionalTpls\]_ |  |    1.5.0                              |
| tplPath                                                                                                      | An optional directory to look for file-based chunks when using @FILE                                                                                                                                  | _assets\_path_+ "elements/chunks/" |                  |
| tplWrapper                                                                                                   | Name of a chunk serving as a wrapper template for the output \[NOTE: Does not work with toSeparatePlaceholders\]. The placeholder where the items are inserted is \[\[+output\]\].                    |                                    | 1.6.0            |
| wrapIfEmpty                                                                                                  | If true, will output the wrapper specified in &tplWrapper even if the output is empty.                                                                                                                | false                              | 1.6.0            |
| outputSeparator                                                                                              | An optional string to separate each tpl instance (delimiter)                                                                                                                                          | "\\n"                              |                  |
| toPlaceholder                                                                                                | If set, will assign the result to this placeholder instead of outputting it directly.                                                                                                                 |                                    |                  |
| toSeparatePlaceholders                                                                                       | If set, will assign EACH result to a separate placeholder named by this param suffixed with a sequential number (starting from 0).                                                                    |                                    | 1.3.0            |

About **@FILE and @INLINE tpls**:

You can prefix any tpl property with @FILE or @INLINE to use a file-based chunk or inline markup respectively. 

- **@FILE**— This prefix allows you to provide a file instead of a Chunk in the database as the tpl. The path and filename you specify will by default, unless you specify a custom `tplPath` property, search for the @FILE tpl relative to your configured `assets_path` + `elements/chunks/`.
- **@INLINE**— This prefix allows you to provide markup to use for your tpl directly in the property value. It is recommended you use this only when specifying the tpl\* properties in a \[Property Set\], otherwise any placeholders in your inline markup may be evaluated before the content gets passed to getResources, since cacheable nested tags in MODX Revolution are evaluated before processing of the containing tag begins. This must be followed by a space, e.g. `@INLINE [[+pagetitle]]`

#### Selection Properties 

| Name | Description | Default Value | Added in version |
| ---- | ----------- | ------------- | ---------------- |
| parents | Comma-delimited list of ids serving as parents. Use -1 to ignore parents when specifying _resources_to include. If this is not done, getResources assumes &parents as the current resource and reads its children from there (plus the resources given in &resources = unexpected results). | current Resource id |  |
| resources | Comma-delimited list of ids to include in the results. Prefix an id with a dash to exclude the resource from the result. |  |  |
| depth | Integer value indicating depth to search for resources from each parent. First level of resources beneath parent is depth | 10 |  |
| tvFilters | Can be used to filter resources by certain TV values. These are entered as \[( _tvname_)( _operator_)\]( _value_). There are two delimiters you can use to combine filter conditions.  You can have "OR" filters using two pipe symbols. An OR filter fetches resources that has one of the listed TV values. See below for more information. | | |
| sortby | [Any Resource Field](making-sites-with-modx/structuring-your-site/resources#Resources-ResourcesResourceFields) (_excluding Template Variables. See below for the 'sortbyTV' property_). Some common fields to sort on are publishedon, menuindex, pagetitle etc, but see the Resources documentation for all fields. Specify fields with the name only, not using the tag syntax. Note that when using fields like template, publishedby and the likes for sorting, it will be sorted on the raw values, so the template or user ID, and NOT their names. See below for more information. | createdon | |
| publishedon | Modified in 1.3.0 |  |
| sortbyAlias | Query alias for sortby field |  |
| sortbyEscaped | Escapes the field name specified in sortby |  |
| sortdir | Order which to sort by | DESC |
| sortbyTV | Template Variable to sort by |  | 1.2.0 |
| sortdirTV | Order which to sort by when using sortbyTV | DESC | 1.2.0 |
| sortbyTVType | Specify the data type of the sortby TV. Possible values are string, integer, decimal, datetime | string | 1.3.0 |
| limit | Limits the number of resources returned. Use `0` for unlimited results. | 5 |
| offset | An offset of resources returned by the criteria to skip | 0 |
| where | A JSON-style expression of criteria to build any additional where clauses from. See below for an example. See [display/xPDO20/xPDOQuery.where](xpdo/class-reference/xpdoquery/xpdoquery.where) |  |
| context | Comma-delimited list of context keys to limit results by; if empty, contexts for all specified parents will be used (all contexts if 0 is specified) |  |

##### Using `&tvFilters`

For the `&tvFilters`, the value may look like this:

``` php 
   mytv==somevalue||mytv==othervalue
```

You can also use an "and" filter using a comma. This will make sure that all the conditions are met.

``` php 
   mytv==somevalue,othertv==othervalue
```

For advanced filtering you can also group these. It is important to know that conditions are first separated based on the OR (||) delimiter, and after that on the AND (,) delimiter. So let's take this hypothetical example:

``` php 
   mytv==foo||mytv==bar,bartv==3||bartv==1
```

This will filter resources to meet one of the following conditions:

- mytv is LIKE foo, or
- mytv is LIKE bar AND bartv is LIKE 3, or
- bartv is LIKE 1 

The examples above search for exact values. You can also use the percentage sign (%) as a wildcard. For example:

``` php 
   mytv==%a%
```

Matches any resources that has an "a" in the mytv value.

``` php 
   mytv==a%	
```

Matches any resources that have a mytv value that starts with an "a"

``` php 
   mytv==%a	
```

Matches any resources that have a mytv value that ends with an "a".

You can also combine this with the OR (||) and AND (,) delimiters explained above.

It is important to know that this function **looks at the raw value of a template variable**for a specific resource. This means that **the value has been explicitly set for the resource**, and that it has not been **processed by a template variable output type** (**or is the default value** _in releases prior to 1.4.2-pl; this release adds support for filtering that includes default values_). So if you have an "autotag" tv, this means the raw value is a comma delimited list, and it is not split up in tags like you see it in the manager. 

**New filter operators available in 1.4.2-pl**:
 
Starting with release 1.4.2-pl of getResources, there are a number of new comparison operators for use when creating filter conditions. In addition, when using many of these new operators, numeric comparison values are automatically CAST TV values to numeric before comparison. 

Here is a list of the valid operators: 

| Filter Operator | SQL Operator | CASTs numerics | Notes |
| --------------- | ------------ | -------------- | ----- |
| <=>                                                                                                                                                                                                                                                                                                                          | <=>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       | Yes          | _NULL safe equals_ |
| ===                                                                                                                                                                                                                                                                                                                          | =                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | Yes          |                    |
| !==                                                                                                                                                                                                                                                                                                                          | !=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    |
| <>                                                                                                                                                                                                                                                                                                                           | <>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    |
| ==                                                                                                                                                                                                                                                                                                                           | LIKE                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | No           |                    |
| !=                                                                                                                                                                                                                                                                                                                           | NOT LIKE                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  | No           |                    |
| <<                                                                                                                                                                                                                                                                                                                           | <                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | Yes          |                    |
| <=                                                                                                                                                                                                                                                                                                                           | <=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    |
| =<                                                                                                                                                                                                                                                                                                                           | =<                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    |
| >>                                                                                                                                                                                                                                                                                                                           | >                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | Yes          |                    |
| >=                                                                                                                                                                                                                                                                                                                           | >=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    |
| =>                                                                                                                                                                                                                                                                                                                           | =>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Yes          |                    | 

##### Using &sortby

It's possible to pass any resource field as sort value, such as `pagetitle`, `alias`, `publishedon`, `menuindex`, etc.

You can sort randomly by specifying RAND(), like so:

``` php 
&sortby=`RAND()`
```

From version 1.3.0 this can also be a [JSON](http://json-schema.org/) array to sort on multiple fields, e.g.

``` php 
&sortby=`{"publishedon":"ASC","createdon":"DESC"}`
```

To sort in a specific order, specify a resource id-list, e.g.

``` php 
&sortby=`FIELD(modResource.id, 4,7,2,5,1 )`
```

The same thing is possible if you put the sorted IDs in a template variable, like this:

``` php 
&sortby=`FIELD(modResource.id,[[*templateVariable]])`
```

In some cases you need to (somewhat counterintuitively) specify the sort direction as well:

``` php 
&sortby=`FIELD(modResource.id, 4,7,2,5,1 )` &sortdir=`ASC`
```

#### Other Properties 

| Name            | Description                                                                                                                                                                      | Default Value | Added in version |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| showUnpublished | If true, will also show Resources if they are unpublished.                                                                                                                       | 0             |                  |
| showDeleted     | If true, will also show Resources regardless if they are deleted.                                                                                                                | 0             |                  |
| showHidden      | If true, will show Resources regardless if they are hidden from the menus.                                                                                                       | 0             |                  |
| hideContainers  | If set, will not show any Resources marked as a container (isfolder).                                                                                                            | 0             |                  |
| includeContent  | Indicates if the content of each resource should be returned in the results                                                                                                      | 0             |                  |
| includeTVs      | Indicates if TemplateVar values should be included in the properties available to each resource template                                                                         | 0             |                  |
| includeTVList   | An optional comma-delimited list of TemplateVar names to include explicitly if includeTVs is 1                                                                                   |               | 1.4.0            |
| prepareTVs      | Prepares media source-dependant TemplateVar values.                                                                                                                              | 1             | 1.5.0            |
| prepareTVList   | Limits the TVs that are prepared to those specified by name in a comma-delimited list                                                                                            |               | 1.5.0            |
| processTVs      | Indicates if TemplateVar values should be rendered as they would on the resource being summarized. TemplateVars must be included (see includeTVs/includeTVList) to be processed. | 0             |                  |
| processTVList   | An optional comma-delimited list of TemplateVar names to process explicitly. TemplateVars specified here must be included via includeTVs/includeTVList                           |               | 1.4.0            |
| tvPrefix        | The prefix for TemplateVar properties                                                                                                                                            | tv.           |                  |
| idx             | You can define the starting idx of the resources, which is an property that is incremented as each resource is rendered                                                          | 1             |                  |
| first           | Define the idx which represents the first resource                                                                                                                               | 1             |                  |
| last            | Define the idx which represents the last resource. Default is # of resources being summarized + first - 1                                                                        |               |                  |
| totalVar        | Define the key of a placeholder set by getResources indicating the total number of Resources that would be selected **not**considering the _limit_value.                         | total         |                  |
| debug           | If true, will send the SQL query to the MODX log.                                                                                                                                | false         |                  |

### Available Placeholders 

The placeholders available to your getResources formatting Chunks are mostly dependent on the resources that you are iterating over.

See [All Tags](making-sites-with-modx/commonly-used-template-tags#CommonlyUsedTemplateTags-CommonlyUsedTemplateTagsAllTags) on the "Commonly Used Template Tags" page – that lists the properties available to all resources.

If your resource has template variables, those will have corresponding placeholders (remember the placeholders will use the prefix defined by the **&tvPrefix**parameter).

In addition there are the following placeholders:

| Placeholder  | Description                                                                                |
| ------------ | ------------------------------------------------------------------------------------------ |
| \[\[+idx\]\] | Increases with each iteration, starting with 1 (or the value set by the `&idx` parameter) |

## Examples 

Also see the [Examples](extras/getresources/getresources.examples "getResources.Examples") sub section of this documentation for more detailed examples and tutorials.

Output a list of child Resources of the current Resource, using the 'myRowTpl' chunk:

``` php 
[[getResources? &parents=`[[*id]]` &tpl=`myRowTpl`]]
```

Output all resources beneath the Resource with ID '5', with the exception of resource 10, using the 'myRowTpl' chunk:

``` php 
[[getResources? &parents=`5` &resources=`-10` &tpl=`myRowTpl`]]
```

Output only the resources specified, using the 'myRowTpl' chunk:

``` php 
[[getResources? &parents=`-1` &resources=`10,11,12` &tpl=`myRowTpl`]]
```

Output the top 5 latest published Resources beneath the Resource with ID '5', with tpl 'blogPost':

``` php 
[[getResources? &parents=`5` &limit=`5` &tpl=`blogPost` &includeContent=`1`]]
```

Output a list of child Resources of the current Resource, based on the Resource-template:

``` php 
[[getResources? &parents=`[[*id]]` &where=`{"template:=":8}` &tpl=`myRowTpl`]]
```

Output a list of child Resources of the current Resource, where the Resource-template ID is 1 or 2:

``` php 
[[getResources? &parents=`[[*id]]` &where=`{"template:=":1, "OR:template:=":2}` &tpl=`myRowTpl`]]
```

Output a list of child Resources of the current Resource, where the Resource-template ID is 1, 2 or 3 (you cannot use the same key name more than once):

``` php 
[[getResources? &parents=`[[*id]]` &where=`{"template:IN":[1,2,3]}` &tpl=`myRowTpl`]]
```

Display a message when no results found (equivalent of "empty" parameter in Ditto):

``` php 
[[getResources:default=`No results found`? &parents=`[[*id]]` &tpl=`myRowTpl`]]
```

Example using an inline Tpl

``` php 
[[getResources? &tpl=`@INLINE <li title="[[+longtitle]]">[[+pagetitle]]</li>`]]
```

Wrapping a getResources result in other markup (like an &outerTpl property, which doesn't exist for getResources from version 1.6.0 you can still do it like that or use the &tplWrapper property).

``` php 
[[getResources? ... &toPlaceholder=`results`]]
[[+results:notempty=`<ol>[[+results]]</ol>`]]
```

## Displaying Template Variables with getResources 

To reduce retrieval time, getResources does not get TV values by default. If you want to display TVs, you should include the following parameters:

``` php 
&includeTVs=`1` &processTVs=`1`
```

You also need to either prefix all TVs with tv. or use this parameter in your snippet tag:

``` php 
&tvPrefix=``
```

In the Tpl chunk you use to display the getResources output, use a placeholder tag like this (but with the name of your TV):

``` php 
[[+tv.my_tv]]
```

## Using getPage for Pagination 

When combined with [getPage](extras/getpage "getPage") (or pdoPage), getResources allows you to do powerful and flexible pagination on your pages.

### Examples 

Grab first 10 Resources - sorted by publishedon - below the Resource ID 17, no more than 2 levels deep, with the tpl 'blogListPost', including the TVs and content:

``` php 
[[!getPage? 
    &elementClass=`modSnippet` 
    &element=`getResources` 
    &parents=`17` 
    &depth=`2` 
    &limit=`10` 
    &pageVarKey=`page` 
    &includeTVs=`1` 
    &includeContent=`1` 
    &tpl=`blogListPost`
]]
<div class="paging">
    <ul class="pageList">
        [!+page.nav]]
    </ul>
</div>
```

and the chunk blogListPost:

``` html 
<div class="blogPost">
    <div class="date">[[+publishedon:strtotime:date=`%b %d %Y`]]</div>
    <h2><a href="[[~[[+id]]]]" title="[[+pagetitle]]">[[+pagetitle]]</a></h2>
    <p class="author">
        <strong>Author:</strong>
        <span class="author">[[+createdby:userinfo=`username`]]</span>
    </p>
    <p class="summary">[[+introtext]]</p>
    <p class="readmore">
        <a href="[[~[[+id]]]]"><span>Read more</span></a>
    </p>
    <div class="clear"></div>
</div>
<hr/>
```

## Troubleshooting 

### Nothing Happens 

Before you go banging your head on a wall, have you checked to make sure that this extra is actually installed on your site?

### Array of Attributes is Dumped 

**You forgot to include the `&tpl` parameter**. Without the `&tpl` parameter, the Snippet will retrieve the specified resources, but you didn't tell it how to format them. Be sure you include the `&tpl` parameter in your Snippet call, e.g.

``` php 
[[!getResources? &parents=`5` &limit=`5` &tpl=`blogPost`]]
```

Or, perhaps **you misspelled the chunk name.** Perhaps you DO have a `&tpl` specified, but does that chunk actually exist? If you name a chunk that does not exist, getResources will not know how to format your results.

Or, even though you have correctly specified the `&tpl` parameter, you may have inadvertently forgotten the ampersand on one of your _other_parameters. E.g.

```
limit=`5`
```

will cause the Snippet call to fail and the attributes to be dumped. The correct format should be

```
&limit=`5`
```

### The same resource is output multiple times _(1.2.2 and prior releases)_

If you see the same resource listed multiple times, then try omitting the `&sortbyTV` parameter.

### The Content isn't There 

You are retrieving the correct resources and you are seeing _some_of the results formatting correctly, but your `[[+content]]` placeholders don't contain anything. What's going on? You must include the **&includeContent=`1`** argument to get the content.

### Caching problems using tpl, tpl\_N, tpl\_nN, tplFirst, tplLast or tplOdd 

If you are using this parameters you may have thought about reusing your tpl chunk to avoid repeating code. For example:

Generic Tpl Chunk: \[\[$GenericTplChunk\]\]

``` php 
<div>Hi [[+pagetitle]]</div>
```

Fourth Tpl Chunk ( tpl\_nN): \[\[$4thTplChunk\]\]

``` php 
<div class="highlight">[[$GenericTplChunk]]</div>
```

If you have problems with this, having blank or strange results, is due to MODX caching. Calling the chunk uncached won't work. You have to use a trick: a dummy tag when calling the generic chunk.

``` php 
<div class="highlight">[[$GenericTplChunk? &idx=`[[+idx]]` ]]</div>
```

Note: You don't need to call the chunk uncached.

Seen at: <http://forums.modx.com/thread/43748/chunk-inside-getresources-template-not-processed-correctly>

## See Also 

If you only need to get a single field from a foreign resource, try using [getResourceField](/extras/getresourcefield "getResourceField").
