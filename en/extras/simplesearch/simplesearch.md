---
title: "SimpleSearch"
_old_id: "997"
_old_uri: "revo/simplesearch/simplesearch.simplesearch"
---

## SimpleSearch Snippet

This snippet displays search results based on the search criteria sent.

## Usage

Simply place the snippet in the Resource you would like to display search results in.

``` php
[[!SimpleSearch]]
```

## Available Properties

| Name            | Description                                                                                                                                                                                                                                                                                                                                                                                                                 | Default                                                 |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------- |
| tpl             | The chunk that will be used to display the contents of each search result.                                                                                                                                                                                                                                                                                                                                                  | SearchResult                                            |
| containerTpl    | The chunk that will be used to wrap all the search results, pagination and message.                                                                                                                                                                                                                                                                                                                                         | SearchResults                                           |
| useAllWords     | If true, will only find results with all the specified search words.                                                                                                                                                                                                                                                                                                                                                        | 0                                                       |
| maxWords        | The maximum number of words to include in the search. Only applicable if useAllWords is off.                                                                                                                                                                                                                                                                                                                                | 7                                                       |
| minChars        | The minimum number of characters to trigger the search.                                                                                                                                                                                                                                                                                                                                                                     | 3                                                       |
| searchStyle     | To search either with a 'partial' LIKE search, or a relevance-based 'match' search.                                                                                                                                                                                                                                                                                                                                         | partial                                                 |
| andTerms        | Whether or not to add a logical AND between words.                                                                                                                                                                                                                                                                                                                                                                          | 1                                                       |
| matchWildcard   | Enable wildcard search. Set to false to do exact searching on a search term.                                                                                                                                                                                                                                                                                                                                                | 1                                                       |
| docFields       | A comma-separated list of specific Resource fields to search.                                                                                                                                                                                                                                                                                                                                                               | pagetitle,longtitle,alias,description,introtext,content |
| fieldPotency    | Score and sort the results (see <https://github.com/splittingred/SimpleSearch/pull/29> for more infos/usage)                                                                                                                                                                                                                                                                                                                |                                                         |
| perPage         | The number of search results to show per page.                                                                                                                                                                                                                                                                                                                                                                              | 10                                                      |
| showExtract     | Whether or not to show an extract of the content of each search result.                                                                                                                                                                                                                                                                                                                                                     | 1                                                       |
| extractSource   | (new in version 1.9) Allows the user to define where the extract comes from. If the value of this parameter is a resource field name (including TVs if &includeTVs is set) then that resource field is used for the extract. Otherwise the parameter is taken as the name of a Snippet to run. The Snippet is passed the resource array as parameters. If there is no Snippet by that name, then the extract will be empty. | content                                                 |
| extractLength   | The number of characters for the content extraction of each search result.                                                                                                                                                                                                                                                                                                                                                  | 200                                                     |
| extractEllipsis | The string used to wrap extract results with. Defaults to an ellipsis.                                                                                                                                                                                                                                                                                                                                                      | ...                                                     |
| includeTVs      | Indicates if TemplateVar values should be included in the properties available to each resource template. Defaults to 0. Turning this on might make your search slower if you have lots of TVs.                                                                                                                                                                                                                             | 0                                                       |
| includeTVList   | An optional comma-delimited list of TemplateVar names to include explicitly if includeTVs is 1.                                                                                                                                                                                                                                                                                                                             |                                                         |
| process TVs     | Indicates if TemplateVar values should be rendered as they would on the resource being summarized. Defaults to 0. Some notes:                                                                                                                                                                                                                                                                                               |
TVs can be accessed by their TV name `[[+myTV]]` By default SimpleSearch does not use a prefix, e.g. `[[+tv.myTV]]` will NOT render.
TVs are processed during indexing for Solr searching, so there is no need to do this here. | 0 |
| highlightResults | Whether or not to highlight the search term in results. | 1 |
| highlightClass | The CSS class name to add to highlighted terms in results. | simplesearch-highlight |
| highlightTag | The html tag to wrap the highlighted term with in search results. | span |
| pageTpl | The chunk to use for a pagination link. | PageLink |
| currentPageTpl | The chunk to use for the current pagination link. | CurrentPageLink |
| pagingSeparator | The separator to use between pagination links. | | |
| ids | A comma-separated list of IDs to restrict the search to. |  |
| idType | The type of restriction for the ids parameter. If parents, will add all the children of the IDs in the ids parameter to the search. If documents, will only use the specified IDs in the search. | parents |
| exclude | A comma-separated list of resource IDs to exclude from search eg. "10,15,19". This will exclude the resources with the ID "10","15" or "19". |  |
| depth | If idtype is set to parents, the depth down the Resource tree that will be searched with the specified IDs. | 10 |
| hideMenu | Whether or not to return Resources that have hidemenu on. 0 shows only visible Resources, 1 shows only hidden Resources, 2 shows both. | 2 |
| contexts | The contexts to search. Defaults to the current context if none are explicitly specified. |  |
| searchIndex | The name of the REQUEST parameter that the search will use. | search |
| offsetIndex | The name of the REQUEST parameter to use for the pagination offset. | simplesearch\_offset |
| placeholderPrefix | The prefix for global placeholders set by this snippet. | simplesearch. |
| toPlaceholder | Whether to set the output to directly return, or set to a placeholder with this propertys name. |  |
| urlScheme | The URL scheme you want: http, https, full, abs, relative, etc. See the $modx->makeUrl() documentation. This is used when the pagination links are generated. |  |
| customPackages | Set to search custom tables by loading their package. See below for more details. |  |
| postHooks | A comma-separated list of hooks to run that can add faceted sets to the end results. |  |
| activeFacet | The current active facet. Leave this alone unless you want a result to show from a non-standard facet derived through a postHook. | default |
| facetLimit | The number of non-active-facet results to show on the main results page. | 5 |
| sortBy | A comma-separated list of Resource fields to sort the results by. Leave blank to sort by relevance and score. |  |
| sortDir | A comma-separated list of directions to sort the results by. Must match the number of items in the sortBy parameter. | DESC |
| noResultsTpl | The chunk to use when no search results are found. |  |

## SimpleSearch Chunks

There are 4 chunks that are processed in SimpleSearch. Their corresponding SimpleSearch parameters are:

- [tpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl "SimpleSearch.SimpleSearch.tpl") - The Chunk to use for each result displayed.
- [containerTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl "SimpleSearch.SimpleSearch.containerTpl") - The Chunk that will be used to wrap all the search results, pagination and message.
- [pageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl "SimpleSearch.SimpleSearch.pageTpl") - The Chunk to use for a pagination link.
- [currentPageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl "SimpleSearch.SimpleSearch.currentPageTpl") - The Chunk to use for the current pagination link.

## Searching Custom Tables

Searching custom tables is available in SimpleSearch using the &customPackages property; however, you must have a custom package built for it. The format is:

``` php
className:fieldName(s):packageName:packagePath:joinCriteria||class2Name:fieldName(s):package2Name:package2Path:join2Criteria
```

In other words, each custom package is separated by ||. Then, each part of it is separated by colons (:). An example to search [Quip](extras/quip "Quip") comments:

``` php
&customPackages=`quipComment:body:quip:{core_path}components/quip/model/:quipComment.resource = modResource.id`
```

Let's break down each part:

- **className** - The class name of the table you want to search. Here, it's QuipComment.
- **fieldName(s)** - A comma-separated list of column names to search. We did 'body', you could also have done 'body,email' or whatever.
- **packageName** - The name of the schema Package to add. This one is called quip.
- **packagePath** - The path to the model/ directory where the package is located.
- **joinCriteria** - The SQL to join the table you want to search and the modResource table. Your table must have some connection to the Resource it's on (otherwise SimpleSearch won't know how to load a URL for it!)

Once you've added it, it will search those fields as well for data. If it finds it in that table, it will display the result as a link to the Resource you specified in your joinCriteria. In our example, that would be the resource the Quip comment is located on.

## Examples

These examples assume you've already sent the search query with the [SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm") snippet.

Display results, but just show their titles:

``` php
[[!SimpleSearch? &showExtract=`0`]]
```

Display all results but only in Resources 1, 3, or 4 - or below those Resources - and highlight tags with a 'strong' tag:

``` php
[[!SimpleSearch? &ids=`1,3,4` &highlightTag=`strong`]]
```

Only find search results that use all the words in the query string, and set the results to the placeholder 'results':

``` php
[[!SimpleSearch? &useAllWords=`1` &toPlaceholder=`results`]]
```

## See Also

1. [SimpleSearch.Roadmap](extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch.simplesearch)
    1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
    2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
    3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
    4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
    5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
    1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)
