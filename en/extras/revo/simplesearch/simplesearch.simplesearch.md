---
title: "SimpleSearch.SimpleSearch"
_old_id: "997"
_old_uri: "revo/simplesearch/simplesearch.simplesearch"
---

<div>- [SimpleSearch Snippet](#SimpleSearch.SimpleSearch-SimpleSearchSnippet)
- [Usage](#SimpleSearch.SimpleSearch-Usage)
- [Available Properties](#SimpleSearch.SimpleSearch-AvailableProperties)
- [SimpleSearch Chunks](#SimpleSearch.SimpleSearch-SimpleSearchChunks)
- [Searching Custom Tables](#SimpleSearch.SimpleSearch-SearchingCustomTables)
- [Examples](#SimpleSearch.SimpleSearch-Examples)
- [See Also](#SimpleSearch.SimpleSearch-SeeAlso)
 
</div>SimpleSearch Snippet
--------------------

 This snippet displays search results based on the search criteria sent.

Usage
-----

 Simply place the snippet in the Resource you would like to display search results in.

 ```
<pre class="brush: php">
[[!SimpleSearch]]

```Available Properties
--------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> tpl </td> <td> The chunk that will be used to display the contents of each search result. </td> <td> SearchResult </td> </tr><tr><td> containerTpl </td> <td> The chunk that will be used to wrap all the search results, pagination and message. </td> <td> SearchResults </td> </tr><tr><td> useAllWords </td> <td> If true, will only find results with all the specified search words. </td> <td> 0 </td> </tr><tr><td> maxWords </td> <td> The maximum number of words to include in the search. Only applicable if useAllWords is off. </td> <td> 7 </td> </tr><tr><td> minChars </td> <td> The minimum number of characters to trigger the search. </td> <td> 3 </td> </tr><tr><td> searchStyle </td> <td> To search either with a 'partial' LIKE search, or a relevance-based 'match' search. </td> <td> partial </td> </tr><tr><td> andTerms </td> <td> Whether or not to add a logical AND between words. </td> <td> 1 </td> </tr><tr><td> matchWildcard </td> <td> Enable wildcard search. Set to false to do exact searching on a search term. </td> <td> 1 </td> </tr><tr><td> docFields </td> <td> A comma-separated list of specific Resource fields to search. </td> <td> pagetitle,longtitle,alias,description,introtext,content </td> </tr><tr><td> fieldPotency </td> <td> Score and sort the results (see <https://github.com/splittingred/SimpleSearch/pull/29> for more infos/usage) </td> <td> </td> </tr><tr><td> perPage </td> <td> The number of search results to show per page. </td> <td> 10 </td> </tr><tr><td> showExtract </td> <td> Whether or not to show an extract of the content of each search result. </td> <td> 1 </td> </tr><tr><td> extractSource </td> <td> (new in version 1.9) Allows the user to define where the extract comes from. If the value of this parameter is a resource field name (including TVs if &includeTVs is set) then that resource field is used for the extract. Otherwise the parameter is taken as the name of a Snippet to run. The Snippet is passed the resource array as parameters. If there is no Snippet by that name, then the extract will be empty. </td> <td> content </td> </tr><tr><td> extractLength </td> <td> The number of characters for the content extraction of each search result. </td> <td> 200 </td> </tr><tr><td> extractEllipsis </td> <td> The string used to wrap extract results with. Defaults to an ellipsis. </td> <td> ... </td> </tr><tr><td> includeTVs </td> <td> Indicates if TemplateVar values should be included in the properties available to each resource template. Defaults to 0. Turning this on might make your search slower if you have lots of TVs. </td> <td> 0 </td> </tr><tr><td> processTVs </td> <td> Indicates if TemplateVar values should be rendered as they would on the resource being summarized. Defaults to 0. Some notes:   
 TVs can be accessed by their TV name \[\[+myTV\]\] By default SimpleSearch does not use a prefix, e.g. \[\[+tv.myTV\]\] will NOT render.   
 TVs are processed during indexing for Solr searching, so there is no need to do this here. </td> <td> 0 </td> </tr><tr><td> highlightResults </td> <td> Whether or not to highlight the search term in results. </td> <td> 1 </td> </tr><tr><td> highlightClass </td> <td> The CSS class name to add to highlighted terms in results. </td> <td> sisea-highlight </td> </tr><tr><td> highlightTag </td> <td> The html tag to wrap the highlighted term with in search results. </td> <td> span </td> </tr><tr><td> pageTpl </td> <td> The chunk to use for a pagination link. </td> <td> PageLink </td> </tr><tr><td> currentPageTpl </td> <td> The chunk to use for the current pagination link. </td> <td> CurrentPageLink </td> </tr><tr><td> pagingSeparator </td> <td> The separator to use between pagination links. </td> <td> | </td> </tr><tr><td> ids </td> <td> A comma-separated list of IDs to restrict the search to. </td> <td> </td> </tr><tr><td> idType </td> <td> The type of restriction for the ids parameter. If parents, will add all the children of the IDs in the ids parameter to the search. If documents, will only use the specified IDs in the search. </td> <td> parents </td> </tr><tr><td> exclude </td> <td> A comma-separated list of resource IDs to exclude from search eg. "10,15,19". This will exclude the resources with the ID "10","15" or "19". </td> <td> </td> </tr><tr><td> depth </td> <td> If idtype is set to parents, the depth down the Resource tree that will be searched with the specified IDs. </td> <td> 10 </td> </tr><tr><td> hideMenu </td> <td> Whether or not to return Resources that have hidemenu on. 0 shows only visible Resources, 1 shows only hidden Resources, 2 shows both. </td> <td> 2 </td> </tr><tr><td> contexts </td> <td> The contexts to search. Defaults to the current context if none are explicitly specified. </td> <td> </td> </tr><tr><td> searchIndex </td> <td> The name of the REQUEST parameter that the search will use. </td> <td> search </td> </tr><tr><td> offsetIndex </td> <td> The name of the REQUEST parameter to use for the pagination offset. </td> <td> sisea\_offset </td> </tr><tr><td> placeholderPrefix </td> <td> The prefix for global placeholders set by this snippet. </td> <td> sisea. </td> </tr><tr><td> toPlaceholder </td> <td> Whether to set the output to directly return, or set to a placeholder with this propertys name. </td> <td> </td> </tr><tr><td> urlScheme </td> <td> The URL scheme you want: http, https, full, abs, relative, etc. See the $modx->makeUrl() documentation. This is used when the pagination links are generated. </td> <td> </td> </tr><tr><td> customPackages </td> <td> Set to search custom tables by loading their package. See below for more details. </td> <td> </td> </tr><tr><td> postHooks </td> <td> A comma-separated list of hooks to run that can add faceted sets to the end results. </td> <td> </td> </tr><tr><td> activeFacet </td> <td> The current active facet. Leave this alone unless you want a result to show from a non-standard facet derived through a postHook. </td> <td> default </td> </tr><tr><td> facetLimit </td> <td> The number of non-active-facet results to show on the main results page. </td> <td> 5 </td> </tr><tr><td> sortBy </td> <td> A comma-separated list of Resource fields to sort the results by. Leave blank to sort by relevance and score. </td> <td> </td> </tr><tr><td> sortDir </td> <td> A comma-separated list of directions to sort the results by. Must match the number of items in the sortBy parameter. </td> <td> DESC </td> </tr><tr><td> noResultsTpl </td> <td> The chunk to use when no search results are found. </td> <td> </td></tr></tbody></table>SimpleSearch Chunks
-------------------

 There are 4 chunks that are processed in SimpleSearch. Their corresponding SimpleSearch parameters are:

- [tpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl "SimpleSearch.SimpleSearch.tpl") - The Chunk to use for each result displayed.
- [containerTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl "SimpleSearch.SimpleSearch.containerTpl") - The Chunk that will be used to wrap all the search results, pagination and message.
- [pageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl "SimpleSearch.SimpleSearch.pageTpl") - The Chunk to use for a pagination link.
- [currentPageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl "SimpleSearch.SimpleSearch.currentPageTpl") - The Chunk to use for the current pagination link.

Searching Custom Tables
-----------------------

 Searching custom tables is available in SimpleSearch using the &customPackages property; however, you must have a custom package built for it. The format is:

 ```
<pre class="brush: php">
className:fieldName(s):packageName:packagePath:joinCriteria||class2Name:fieldName(s):package2Name:package2Path:join2Criteria

``` In other words, each custom package is separated by ||. Then, each part of it is separated by colons (:). An example to search [Quip](/extras/revo/quip "Quip") comments:

 ```
<pre class="brush: php">
&customPackages=`QuipComment:body:quip:{core_path}components/quip/model/:QuipComment.resource = modResource.id`

``` Let's break down each part:

- **className** - The class name of the table you want to search. Here, it's QuipComment.
- **fieldName(s)** - A comma-separated list of column names to search. We did 'body', you could also have done 'body,email' or whatever.
- **packageName** - The name of the schema Package to add. This one is called quip.
- **packagePath** - The path to the model/ directory where the package is located.
- **joinCriteria** - The SQL to join the table you want to search and the modResource table. Your table must have some connection to the Resource it's on (otherwise SimpleSearch won't know how to load a URL for it!)

 Once you've added it, it will search those fields as well for data. If it finds it in that table, it will display the result as a link to the Resource you specified in your joinCriteria. In our example, that would be the resource the Quip comment is located on.

Examples
--------

<div class="note"> These examples assume you've already sent the search query with the [SimpleSearchForm](/extras/revo/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm") snippet. </div> Display results, but just show their titles:

 ```
<pre class="brush: php">
[[!SimpleSearch? &showExtract=`0`]]

``` Display all results but only in Resources 1, 3, or 4 - or below those Resources - and highlight tags with a 'strong' tag:

 ```
<pre class="brush: php">
[[!SimpleSearch? &ids=`1,3,4` &highlightTag=`strong`]]

``` Only find search results that use all the words in the query string, and set the results to the placeholder 'results':

 ```
<pre class="brush: php">
[[!SimpleSearch? &useAllWords=`1` &toPlaceholder=`results`]]

```See Also
--------

1. [SimpleSearch.Roadmap](/extras/revo/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch)
  1. [SimpleSearch.SimpleSearch.containerTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
  2. [SimpleSearch.SimpleSearch.currentPageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
  3. [SimpleSearch.SimpleSearch.pageTpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
  4. [SimpleSearch.SimpleSearch.tpl](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
  5. [SimpleSearch.Faceted Search Through PostHooks](/extras/revo/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](/extras/revo/simplesearch/simplesearch.simplesearchform)
  1. [SimpleSearch.SimpleSearchForm.tpl](/extras/revo/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](/extras/revo/simplesearch/simplesearch.solr)