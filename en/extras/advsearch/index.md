---
title: "AdvSearch"
_old_id: "600"
_old_uri: "revo/advsearch"
---

## What is AdvSearch?

AdvSearch is an advanced search Extra for MODX Revolution. It supports MySQL search, optional Zend Lucene indexing for dynamic content, faceted search, and search in custom packages.

## Requirements

- MODX Revolution 2.0.8 or later (package docs also mention 2.1+)
- PHP with multibyte string support enabled (`use_multibyte` / mbstring)
- UTF-8 charset
- jQuery (shipped with AdvSearch; current package trees use a newer build than the old 1.5.1 note)
- For `&engine=` `zend` or `all` only: the ZendSearch Lucene library (see below)

MySQL-only search (`&engine=` `mysql`, the default) does not need ZendSearch.

## History

AdvSearch was written by [Coroico](https://github.com/coroico) and first released on August 14th, 2011. It is loosely based on AjaxSearch by KyleJ/Coroico, with optional Lucene indexing via ZendSearch.

### Download

Install from the Manager via [Package Management](developing-in-modx/advanced-development/package-management), or download from the Extras repository: <https://modx.com/extras/package/advsearch>

If you plan to use the Zend Lucene engine, install ZendSearch before you index or search with that engine (see below).

### Development and Bug Reporting

Source and issues live on GitHub: <https://github.com/coroico/AdvSearch>

## Installation of ZendSearch (Lucene engine)

Zend Framework became the [Laminas Project](https://getlaminas.org/). Laminas did **not** take over the Lucene search component. There is no official `laminas-search` drop-in for AdvSearch.

Current AdvSearch (see `advsearch.zend.controller.class.php` on the [Development](https://github.com/coroico/AdvSearch) branch) loads Composer’s autoloader at:

`{libraryPath}ZendSearch/vendor/autoload.php`

By default `libraryPath` resolves to `core/components/advsearch/libraries/` (override with the AdvSearch `&libraryPath` property if you keep libraries elsewhere). After install you need this file:

`core/components/advsearch/libraries/ZendSearch/vendor/autoload.php`

AdvSearch then uses the `\ZendSearch\Lucene\` PHP API.

### Install with Composer (recommended)

On the server, from your MODX root (adjust the path if your Extra lives elsewhere):

``` bash
mkdir -p core/components/advsearch/libraries/ZendSearch
cd core/components/advsearch/libraries/ZendSearch
composer require handcraftedinthealps/zendsearch
```

[`handcraftedinthealps/zendsearch`](https://github.com/handcraftedinthealps/ZendSearch) is a maintained fork of the abandoned [`zendframework/zendsearch`](https://github.com/zendframework/ZendSearch) package. It keeps the `\ZendSearch\` namespace AdvSearch expects and targets modern PHP.

You can use `composer require zendframework/zendsearch` instead if you accept the abandoned upstream package and its older dependency constraints.

Confirm the autoloader exists, then set `&engine=` to `zend` or `all` on your AdvSearch calls and build the Lucene index with AdvSearch’s indexation tools.

### Why not full Laminas?

Laminas replaced most Zend Framework components. ZendSearch Lucene was already unmaintained and was not migrated. Dropping a generic Laminas release into `assets/libraries/Zend` (the old docs path) will not satisfy AdvSearch’s current loader.

## Usage

AdvSearch has mainly 2 snippets - one to display a form ("AdvSearchForm") and the other to display search results ("AdvSearch").
A third snippet ("AdvSearchHelp") is used to display a help window for the presentation of the query syntax.

- [AdvSearchForm](extras/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm")
- [AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp "AdvSearch.AdvSearchHelp")
- [AdvSearch](extras/advsearch/advsearch "AdvSearch.AdvSearch")

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

1. [AdvSearch.AdvSearch](extras/advsearch/advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](extras/advsearch/advsearch/containertpl)
    2. [Advsearch.AdvSearch.extractTpl](extras/advsearch/advsearch/extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](extras/advsearch/advsearch/paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](extras/advsearch/advsearch/paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](extras/advsearch/advsearch/tpl)
2. [AdvSearch.AdvSearchForm](extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](extras/advsearch/advsearch.advsearchform/tpl)
3. [AdvSearch.AdvSearchHelp](extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](extras/advsearch/advsearch.advsearchhelp/helplinktpl)
