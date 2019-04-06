---
title: "AdvSearch"
_old_id: "766"
_old_uri: "revo/advsearch/advsearch.advsearch"
---

## AdvSearch Snippet 

 This snippet displays search results based on the search criteria sent.

## Usage 

 Simply place the snippet in the Resource you would like to display search results in.

 ``` php 
[[!AdvSearch]]
```

## Available Properties 

### Design the query 

 To specify where to do the search and which results you want.

 | Name           | Description                                                                                                                                  | Default                                                 |
 | -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------- |
 | contexts       | The contexts to search.                                                                                                                      | web                                                     |
 | fields         | A comma separated list of fields available with search results.                                                                              | pagetitle,longtitle,alias,description,introtext,content |
 | hideContainers | Search in container resources. 0 : search in all resources. 1 : will not search in any resources marked as a container.                      | 0                                                       |
 | hideMenu       | Whether or not to return Resources that have hidemenu on. 0 : shows only visible Resources, 1 : shows only hidden Resources, 2 : shows both. | 2                                                       |
 | ids            | A comma-separated list of IDs to restrict the search to. Use GetIds addon to specify complex id list.                                        |                                                         |
 | parents        | A comma-separated list of parents' IDs to restrict the search to the children of these particular containers.                                |                                                         |
 | includeTVs     | A comma separated list of TV names to include TV values as results.                                                                          |                                                         |
 | queryHook      | A queryHook snippet name to change the default query.                                                                                        |                                                         |
 | withFields     | A comma separated list of fields where to do the search.                                                                                     | pagetitle,longtitle,alias,description,introtext,content |
 | withTVs        | A comma separated list of TV names where to do the search. TV values are added as results.                                                   |                                                         |

### Organize the search results 

 To sort and limit the search results.

 | Name         | Description                                                                                                                                                                                                     | Default        |
 | ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------- |
 | fieldPotency | Score and sort the results. Comma separated list of couples "field : potency".                                                                                                                                  | createdon      |
 | perPage      | The number of search results to show per page.                                                                                                                                                                  | 10             |
 | sortby       | Comma separated list of couple "field \[ASC\]" to sort by.                                                                                                                                                      | createdon DESC |
 | showExtract  | Show the search terms highlighted in one or several extracts. String as "n : comma separated list of fields". n : maximum number of extracts by result. The search term is searched in the concatenated fields. | 1:content      |

### Design the page results 

 To style the look and feel of your page results.

 | Name              | Description                                                                                     | Default                 |
 | ----------------- | ----------------------------------------------------------------------------------------------- | ----------------------- |
 | containerTpl      | The chunk that will be used to wrap all the search results, pagination and message.             | SearchResults           |
 | tpl               | The chunk that will be used to display the contents of each search result.                      | AdvSearchResult         |
 | pagingType        | Type of pagination. type 0 or 1                                                                 | 1                       |
 | pageTpl           | The chunk to use for a pagination link.                                                         | PageLink                |
 | paging1Tpl        | The chunk to use for the paging type 1                                                          | Paging1                 |
 | paging0Tpl        | The chunk to use for the paging type 0                                                          | Paging0                 |
 | currentPageTpl    | The chunk to use for the current pagination link. (Paging type 0)                               | CurrentPageLink         |
 | pagingSeparator   | The separator to use between pagination links. (Paging type 0)                                  |                         |  |
 | extractEllipsis   | The string used to wrap extract results with. Defaults to an ellipsis.                          | ...                     |
 | extractLength     | The number of characters for the content extraction of each search result.                      | 200                     |
 | extractTpl        | The chunk that will be used to wrap each extract.                                               | Extract                 |
 | highlightClass    | The CSS class name to add to highlighted terms in results.                                      | advsea-highlight        |
 | highlightResults  | Whether or not to highlight the search term in results.                                         | 1                       |
 | highlightTag      | The html tag to wrap the highlighted term with in search results.                               | span                    |
 | placeholderPrefix | prefix of global placeholders.                                                                  | advsearch (since 2.0.0) |
 | toPlaceholder     | Whether to set the output to directly return, or set to a placeholder with this propertys name. |                         |

### Overall AdvSearch design 

 To design your own search

 | Name        | Description                                                                                                               | Default |
 | ----------- | ------------------------------------------------------------------------------------------------------------------------- | ------- |
 | asId        | Unique id for AdvSearch instance. Any combination of characters a-z, underscores, and numbers 0-9. Case sensitive.        | as0     |
 | engine      | Search engine selected among 'mysql' , 'zend' or 'all'. 'Zend' or 'all' mode request a repository with indexed resources. | mysql   |
 | init        | defines if the search display all the results or none when the page is loaded at the first time. 'all' or 'none'          | none    |
 | maxWords    | The maximum number of words to include in the search.                                                                     | 20      |
 | method      | Whether to send the search over POST or GET.                                                                              | GET     |
 | minChars    | Minimum number of characters to require for a word to be valid for searching.                                             | 3       |
 | offsetIndex | The name of the REQUEST parameter to use for the pagination offset.                                                       | offset  |
 | output      | output type. 'json' or 'html' Json output provides results as a json object.                                              | html    |
 | searchIndex | The name of the REQUEST parameter that the search will use.                                                               | search  |
 | urlScheme   | Indicates in what format the URL is generated. -1, 0, 1, full, abs, http, https                                           | -1      |

### Custom installation 

 The parameters that could help you for a custom installation.

 | Name         | Description                                                            | Default    |
 | ------------ | ---------------------------------------------------------------------- | ---------- |
 | docindexPath | the path under assets/files/ where are located Lucene document indexes | docindex/  |
 | libraryPath  | The path under assets/ where are located the Zend library              | libraries/ |

## AdvSearch Chunks 

 There are several chunks that are processed in AdvSearch. Their corresponding AdvSearch parameters are:

- [tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.tpl "AdvSearch.AdvSearch.tpl") - **AdvSearchResult** : The Chunk to use for each result displayed.
- [containerTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl "AdvSearch.AdvSearch.containerTpl") - **AdvSearchResults** : The Chunk that will be used to wrap all the search results, pagination and message.

 Depending the paging type: 
 Paging type 1:

- [paging1Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl "AdvSearch.Advsearch.paging1Tpl") - **Paging1** : The Chunk to use for the pagination type 1.

 Paging type 0:

- [paging0Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **Paging0** : The Chunk that will be used to wrap all paging type 0 elements.
- [pageTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **PageLink** : The Chunk to use for a pagination link.
- [currentPageTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl "AdvSearch.AdvSearch.paging0Tpl") - **CurrentPageLink** : The Chunk to use for the current pagination link.

## Examples 

 These examples assume you've already sent the search query with the [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm") snippet. 

 Display results, but just show their titles:

 ``` php 
[[!AdvSearch? &showExtract=`0`]]
```

 Display all results but only in children Resources of 15 and hide possible container Resources - and highlight tags with a 'strong' tag:

 ``` php 
[[!AdvSearch? &ids=`[[!GetIds? &ids=`c15`]]` &hideContainers=`1` &highlightTag=`strong`]]
```

 Do a search in the field 'introtext' and in the tv named 'mytv'. Display as results the fields 'pagetitle', 'longtitle' and 'introtext'. Setup an extract with the 'introtext' field. Show a maximum of 2 extracts by result. And finally set the results to the placeholder 'results':

 ``` php 
[[!AdvSearch? &withFields=`introtext` &withTVs=`mytv` &fields=`pagetitle,introtext` &showExtract=`2:introtext` &toPlaceholder=`results`]]
```

## See Also 

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch.advsearch)
  1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
  2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
  3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
  4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
  5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
  6. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
  7. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)