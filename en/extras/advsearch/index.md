---
title: "AdvSearch"
_old_id: "600"
_old_uri: "revo/advsearch"
---

## What is AdvSearch?

 AdvSearch is an advanced search component for MODX Revolution. It allows search in dynamic contents (by using Zend Lucene search class), setting up of faceted search and searching in custom packages.
 It doesn't support the ajax functionality for the moment.

## Requirements

- MODX Revolution 2.0.8 or later
- PHP5 or later
- UTF-8 charset
- php multi-bytes setting ON
- Zend Search class from Zend library (See installation chapter)
- Jquery 1.5.1 (provided with AdvSearch)

## History

 AdvSearch was written by [Coroico](/display/~coroico) and first released on August 14th, 2011. It is loosely based on AjaxSearch for MODx Evolution by KyleJ/Coroico, minus dynamic content search based on Zend search library.

### Download

 It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/advsearch>

 Before to run the first search with AdvSearch, you need to install the Zend Search library first. See installation chapter below.

### Development and Bug Reporting

 AdvSearch is stored and developed in GitHub, and can be found here:<http://github.com/coroico/AdvSearch>

 Bugs can be filed here: <http://github.com/coroico/AdvSearch/issues>

## Installation of the Zend Search class

 Even if AdvSearch addon is fully installable through the package management, the first time you install AdvSearch you need to install the Zend Search class.
 This installation is done only one time and will be valid for all the following re-installation of the addon.

- go to the Zend Framework download page at <http://framework.zend.com/download/latest/>
- register you and download the free Zend Framework. Minimal release is enough.
- if you haven’t a folder for libraries under assets/ create a folder libraries/ under assets/
- unzip you Zend package under the assets/libraries/ folder. This should create a subdirectory named "Zend" (assets/libraries/Zend)
- in this directory only the "search" directory and the "Exception.php" files are required. You could remove all the others files and directories.
- at the end you should have only the "Search" folder and the "Exception.php" file.

## Usage

 AdvSearch has mainly 2 snippets - one to display a form ("AdvSearchForm") and the other to display search results ("AdvSearch").
 A third snippet ("AdvSearchHelp") is used to display a help window for the presentation of the query syntax.

- [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm")
- [AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp "AdvSearch.AdvSearchHelp")
- [AdvSearch](extras/advsearch/advsearch.advsearch "AdvSearch.AdvSearch")

 All the templates used by default to set up the form and display the results are provided as chunks. These chunks are installed through the package management.

## Examples

 Display a search form, and below it, the results:

``` php
[[!AdvSearchForm]]

<h2>Results</h2>
[[!AdvSearch]]
```

 Display a Search form that sends you to a results page in Resource 82 (which has the AdvSearch call in it):

``` php
[[!AdvSearchForm? &landing=`82`]]
```

## See Also

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch.advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
    2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)
