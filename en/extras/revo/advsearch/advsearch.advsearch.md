---
title: "AdvSearch.AdvSearch"
_old_id: "766"
_old_uri: "revo/advsearch/advsearch.advsearch"
---

<div>- [AdvSearch Snippet](#AdvSearch.AdvSearch-AdvSearchSnippet)
- [Usage](#AdvSearch.AdvSearch-Usage)
- [Available Properties](#AdvSearch.AdvSearch-AvailableProperties)
  - [Design the query](#AdvSearch.AdvSearch-Designthequery)
  - [Organize the search results](#AdvSearch.AdvSearch-Organizethesearchresults)
  - [Design the page results](#AdvSearch.AdvSearch-Designthepageresults)
  - [Overall AdvSearch design](#AdvSearch.AdvSearch-OverallAdvSearchdesign)
  - [Custom installation](#AdvSearch.AdvSearch-Custominstallation)
- [AdvSearch Chunks](#AdvSearch.AdvSearch-AdvSearchChunks)
- [Examples](#AdvSearch.AdvSearch-Examples)
- [See Also](#AdvSearch.AdvSearch-SeeAlso)

</div> AdvSearch Snippet 
-------------------

 This snippet displays search results based on the search criteria sent.

 Usage 
-------

 Simply place the snippet in the Resource you would like to display search results in.

 ```
<pre class="brush: php">[[!AdvSearch]]

``` Available Properties 
----------------------

###  Design the query 

 To specify where to do the search and which results you want.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> contexts </td> <td> The contexts to search. </td> <td> web </td> </tr><tr><td> fields </td> <td> A comma separated list of fields available with search results. </td> <td> pagetitle,longtitle,alias,description,introtext,content </td> </tr><tr><td> hideContainers </td> <td> Search in container resources. 0 : search in all resources. 1 : will not search in any resources marked as a container. </td> <td> 0 </td> </tr><tr><td> hideMenu </td> <td> Whether or not to return Resources that have hidemenu on. 0 : shows only visible Resources, 1 : shows only hidden Resources, 2 : shows both. </td> <td> 2 </td> </tr><tr><td> ids </td> <td> A comma-separated list of IDs to restrict the search to. Use GetIds addon to specify complex id list. </td> <td> </td> </tr><tr><td> parents </td> <td> A comma-separated list of parents' IDs to restrict the search to the children of these particular containers. </td> <td> </td> </tr><tr><td> includeTVs </td> <td> A comma separated list of TV names to include TV values as results. </td> <td> </td> </tr><tr><td> queryHook </td> <td> A queryHook snippet name to change the default query. </td> <td> </td> </tr><tr><td> withFields </td> <td> A comma separated list of fields where to do the search. </td> <td> pagetitle,longtitle,alias,description,introtext,content </td> </tr><tr><td> withTVs </td> <td> A comma separated list of TV names where to do the search. TV values are added as results. </td> <td> </td></tr></tbody></table>###  Organize the search results 

 To sort and limit the search results.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> fieldPotency </td> <td> Score and sort the results. Comma separated list of couples "field : potency". </td> <td> createdon </td> </tr><tr><td> perPage </td> <td> The number of search results to show per page. </td> <td> 10 </td> </tr><tr><td> sortby </td> <td> Comma separated list of couple "field \[ASC\]" to sort by. </td> <td> createdon DESC </td> </tr><tr><td> showExtract </td> <td> Show the search terms highlighted in one or several extracts. String as "n : comma separated list of fields". n : maximum number of extracts by result. The search term is searched in the concatenated fields. </td> <td> 1:content </td></tr></tbody></table>###  Design the page results 

 To style the look and feel of your page results.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> containerTpl </td> <td> The chunk that will be used to wrap all the search results, pagination and message. </td> <td> SearchResults </td> </tr><tr><td> tpl </td> <td> The chunk that will be used to display the contents of each search result. </td> <td> AdvSearchResult </td> </tr><tr><td> pagingType </td> <td> Type of pagination. type 0 or 1 </td> <td> 1 </td> </tr><tr><td> pageTpl </td> <td> The chunk to use for a pagination link. </td> <td> PageLink </td> </tr><tr><td> paging1Tpl </td> <td> The chunk to use for the paging type 1 </td> <td> Paging1 </td> </tr><tr><td> paging0Tpl </td> <td> The chunk to use for the paging type 0 </td> <td> Paging0 </td> </tr><tr><td> currentPageTpl </td> <td> The chunk to use for the current pagination link. (Paging type 0) </td> <td> CurrentPageLink </td> </tr><tr><td> pagingSeparator </td> <td> The separator to use between pagination links. (Paging type 0) </td> <td> | </td> </tr><tr><td> extractEllipsis </td> <td> The string used to wrap extract results with. Defaults to an ellipsis. </td> <td> ... </td> </tr><tr><td> extractLength </td> <td> The number of characters for the content extraction of each search result. </td> <td> 200 </td> </tr><tr><td> extractTpl </td> <td> The chunk that will be used to wrap each extract. </td> <td> Extract </td> </tr><tr><td> highlightClass </td> <td> The CSS class name to add to highlighted terms in results. </td> <td> advsea-highlight </td> </tr><tr><td> highlightResults </td> <td> Whether or not to highlight the search term in results. </td> <td> 1 </td> </tr><tr><td> highlightTag </td> <td> The html tag to wrap the highlighted term with in search results. </td> <td> span </td> </tr><tr><td> placeholderPrefix </td> <td> prefix of global placeholders. </td> <td> advsearch (since 2.0.0)</td> </tr><tr><td> toPlaceholder </td> <td> Whether to set the output to directly return, or set to a placeholder with this propertys name. </td> <td> </td></tr></tbody></table>###  Overall AdvSearch design 

 To design your own search

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> asId </td> <td> Unique id for AdvSearch instance. Any combination of characters a-z, underscores, and numbers 0-9. Case sensitive. </td> <td> as0 </td> </tr><tr><td> engine </td> <td> Search engine selected among 'mysql' , 'zend' or 'all'. 'Zend' or 'all' mode request a repository with indexed resources. </td> <td> mysql </td> </tr><tr><td> init </td> <td> defines if the search display all the results or none when the page is loaded at the first time. 'all' or 'none' </td> <td> none </td> </tr><tr><td> maxWords </td> <td> The maximum number of words to include in the search. </td> <td> 20 </td> </tr><tr><td> method </td> <td> Whether to send the search over POST or GET. </td> <td> GET </td> </tr><tr><td> minChars </td> <td> Minimum number of characters to require for a word to be valid for searching. </td> <td> 3 </td> </tr><tr><td> offsetIndex </td> <td> The name of the REQUEST parameter to use for the pagination offset. </td> <td> offset </td> </tr><tr><td> output </td> <td> output type. 'json' or 'html' Json output provides results as a json object. </td> <td> html </td> </tr><tr><td> searchIndex </td> <td> The name of the REQUEST parameter that the search will use. </td> <td> search </td> </tr><tr><td> urlScheme </td> <td> Indicates in what format the URL is generated. -1, 0, 1, full, abs, http, https </td> <td> -1 </td></tr></tbody></table>###  Custom installation 

 The parameters that could help you for a custom installation.

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> docindexPath </td> <td> the path under assets/files/ where are located Lucene document indexes </td> <td> docindex/ </td> </tr><tr><td> libraryPath </td> <td> The path under assets/ where are located the Zend library </td> <td> libraries/ </td></tr></tbody></table> AdvSearch Chunks 
------------------

 There are several chunks that are processed in AdvSearch. Their corresponding AdvSearch parameters are:

- [tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.tpl "AdvSearch.AdvSearch.tpl") - **AdvSearchResult** : The Chunk to use for each result displayed.
- [containerTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl "AdvSearch.AdvSearch.containerTpl") - **AdvSearchResults** : The Chunk that will be used to wrap all the search results, pagination and message.

 Depending the paging type:   
 Paging type 1:

- [paging1Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl "AdvSearch.Advsearch.paging1Tpl") - **Paging1** : The Chunk to use for the pagination type 1.

 Paging type 0:

- [paging0Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **Paging0** : The Chunk that will be used to wrap all paging type 0 elements.
- [pageTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **PageLink** : The Chunk to use for a pagination link.
- [currentPageTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **CurrentPageLink** : The Chunk to use for the current pagination link.

 Examples 
----------

<div class="note"> These examples assume you've already sent the search query with the [AdvSearchForm](/extras/revo/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm") snippet. </div> Display results, but just show their titles:

 ```
<pre class="brush: php">[[!AdvSearch? &showExtract=`0`]]

``` Display all results but only in children Resources of 15 and hide possible container Resources - and highlight tags with a 'strong' tag:

 ```
<pre class="brush: php">[[!AdvSearch? &ids=`[[!GetIds? &ids=`c15`]]` &hideContainers=`1` &highlightTag=`strong`]]

``` Do a search in the field 'introtext' and in the tv named 'mytv'. Display as results the fields 'pagetitle', 'longtitle' and 'introtext'. Setup an extract with the 'introtext' field. Show a maximum of 2 extracts by result. And finally set the results to the placeholder 'results':

 ```
<pre class="brush: php">[[!AdvSearch? &withFields=`introtext` &withTVs=`mytv` &fields=`pagetitle,introtext` &showExtract=`2:introtext` &toPlaceholder=`results`]]

``` See Also 
----------

1. [AdvSearch.AdvSearch](/extras/revo/advsearch/advsearch.advsearch)
  1. [AdvSearch.AdvSearch.containerTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
  2. [Advsearch.AdvSearch.extractTpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
  3. [AdvSearch.Advsearch.paging1Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
  4. [AdvSearch.AdvSearch.paging0Tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
  5. [AdvSearch.AdvSearch.tpl](/extras/revo/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](/extras/revo/advsearch/advsearch.advsearchform)
  1. [Advsearch.AdvSearchForm.tpl](/extras/revo/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](/extras/revo/advsearch/advsearch.advsearchhelp)
  1. [AdvSearch.AdvSearchHelp.helplinkTpl](/extras/revo/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)