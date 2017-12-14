---
title: "SimpleSearch"
_old_id: "711"
_old_uri: "revo/simplesearch"
---

- [What is SimpleSearch?](#SimpleSearch-WhatisSimpleSearch%3F)
- [Requirements](#SimpleSearch-Requirements)
- [History](#SimpleSearch-History)
  - [Download](#SimpleSearch-Download)
  - [Development and Bug Reporting](#SimpleSearch-DevelopmentandBugReporting)
- [Usage](#SimpleSearch-Usage)
- [Examples](#SimpleSearch-Examples)
- [See Also](#SimpleSearch-SeeAlso)

 What is SimpleSearch? 
-----------------------

 SimpleSearch is a simple search component for MODx Revolution. It supports searching Resource content and TV content.

 Requirements 
--------------

- MODx Revolution 2.0.0-RC-2 or later
- PHP5 or later

 History 
---------

 SimpleSearch was written by [Shaun McCormick](/display/~splittingred) as a simple search component, and first released on June 2nd, 2010. It is loosely based on AjaxSearch for MODx Evolution by KyleJ/coroico, without the Ajax functionality.

###  Download 

 It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/683>

###  Development and Bug Reporting 

 SimpleSearch is stored and developed in GitHub, and can be found here:<http://github.com/modxcms/SimpleSearch>

 Bugs can be filed here: <http://github.com/modxcms/SimpleSearch/issues>

 Usage 
-------

 SimpleSearch has 2 snippets - one to display a form ("SimpleSearchForm"), and the other to display search results ("SimpleSearch").

- [SimpleSearch](/extras/revo/simplesearch/simplesearch.simplesearch "SimpleSearch.SimpleSearch")
- [SimpleSearchForm](/extras/revo/simplesearch/simplesearch.simplesearchform "SimpleSearch.SimpleSearchForm")

 Examples 
----------

 Display a search form, and below it, the results:

```
<pre class="brush: php">[[!SimpleSearchForm]]

<h2>Results</h2>
[[!SimpleSearch]]

``` Display a Search form that sends you to a results page in Resource 123 (which has the SimpleSearch call in it):

```
<pre class="brush: php">[[!SimpleSearchForm? &landing=`123`]]

``` See Also 
----------

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