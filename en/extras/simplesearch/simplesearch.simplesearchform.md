---
title: "SimpleSearchForm"
_old_id: "1002"
_old_uri: "revo/simplesearch/simplesearch.simplesearchform"
---

- [SimpleSearchForm Snippet](#SimpleSearch.SimpleSearchForm-SimpleSearchFormSnippet)
- [Usage](#SimpleSearch.SimpleSearchForm-Usage)
- [Available Properties](#SimpleSearch.SimpleSearchForm-AvailableProperties)
- [SimpleSearchForm Chunks](#SimpleSearch.SimpleSearchForm-SimpleSearchFormChunks)
- [Examples](#SimpleSearch.SimpleSearchForm-Examples)
- [Errors](#SimpleSearch.SimpleSearchForm-Errors)
  - [SimpleSearchForm tpl:](#SimpleSearch.SimpleSearchForm-SimpleSearchFormtpl%3A)
  - [SimpleSearch Snippet call:](#SimpleSearch.SimpleSearchForm-SimpleSearchSnippetcall%3A)
- [See Also](#SimpleSearch.SimpleSearchForm-SeeAlso)



## SimpleSearchForm Snippet

This snippet displays a search form for SimpleSearch.

## Usage

Simply place wherever you want a SearchForm to render, and add the 'landing' property to the call to specify the Resource where the [SimpleSearch](/extras/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet call is located (which is where the results will display).

``` php 
[[!SimpleSearchForm? &landing=`123`]]
```

If you'd like the results to show on the same page, simply place the [SimpleSearch](/extras/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch") snippet call below the SimpleSearchForm call, and don't specify a 'landing' parameter.

## Available Properties

| Name          | Description                                                                                           | Default    |
| ------------- | ----------------------------------------------------------------------------------------------------- | ---------- |
| tpl           | The chunk that will be used to display the search form.                                               | SearchForm |
| landing       | The Resource that the SimpleSearch snippet is called on, that will display the results of the search. |            |
| searchIndex   | The name of the REQUEST parameter that the search will use.                                           | search     |
| method        | Whether to send the search over POST or GET.                                                          | GET        |
| toPlaceholder | Whether to set the output to directly return, or set to a placeholder with this propertys name.       |            |

## SimpleSearchForm Chunks

There is 1 chunk that is processed in SimpleSearchForm. Its corresponding SimpleSearchForm parameter is:

- [tpl](/extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl "SimpleSearch.SimpleSearchForm.tpl") - The Chunk to use for the search form.

## Examples

Display the search form, but search with POST instead of GET:

``` php 
[[SimpleSearchForm? &method=`POST`]]
```

Set the search form to a 'search.form' placeholder, specify a landing page on Resource 123, and use a custom Chunk called 'MySearchForm' for the form template:

``` php 
[[SimpleSearchForm? &tpl=`MySearchForm` &landing=`123` &toPlaceholder=`search.form`]]

<h2>Search</h2>
[[+search.form]]
```

Note that with current version (1.0.0) there seems to be a bug where if you ACTUALLY have a Chunk named "seachForm", its contents will be ignored in favor of the default search form.

## Errors

If you get an error like the following after submitting a search:

``` php 
There were no search results for the search "". Please try using more general terms to get more results.
```

Then that probably means that the **SimpleSearch** isn't looking in the right place in the $_POST or $\_GET array for your search term. If you created a custom **&tpl** for your **SimpleSearchForm** tpl, make sure that the name used for your search term variable is properly identified in your corresponding **SimpleSearch** Snippet call, e.g. note here how **my\_custom\_search\_field** is used in the **SimpleSearchForm** tpl \_and_ it's specified in the **&searchIndex** parameter of the **SimpleSearch** call:

### SimpleSearchForm tpl:

``` php 
<form id="my_id" action="[[~[[+landing:default=`[[*id]]`]]]]" method="[[+method:default=`get`]]">
        <input id="searchField" class="my_class" type="text" name="my_custom_search_field" value="[[+searchValue:default=`Search the site`]]"/>
        <input id="searchIcon" class="utilityButton" type="image" alt="Search" src="/assets/templates/my/images/searchButton.png">
        <input type="hidden" name="id" value="[[+landing:default=[[*id]]]]" />
</form>
```

### SimpleSearch Snippet call:

``` php 
[[!SimpleSearch? &searchIndex=`my_custom_search_field`]]
```

## See Also

1. [SimpleSearch.Roadmap](/extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](/extras/simplesearch/simplesearch.simplesearch)
  1. [SimpleSearch.SimpleSearch.containerTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
  2. [SimpleSearch.SimpleSearch.currentPageTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
  3. [SimpleSearch.SimpleSearch.pageTpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
  4. [SimpleSearch.SimpleSearch.tpl](/extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
  5. [SimpleSearch.Faceted Search Through PostHooks](/extras/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](/extras/simplesearch/simplesearch.simplesearchform)
  1. [SimpleSearch.SimpleSearchForm.tpl](/extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](/extras/simplesearch/simplesearch.solr)