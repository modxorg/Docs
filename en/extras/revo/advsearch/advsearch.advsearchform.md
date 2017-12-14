---
title: "AdvSearch.AdvSearchForm"
_old_id: "772"
_old_uri: "revo/advsearch/advsearch.advsearchform"
---

<div>- [AdvSearchForm Snippet](#AdvSearch.AdvSearchForm-AdvSearchFormSnippet)
- [Usage](#AdvSearch.AdvSearchForm-Usage)
- [Available Properties](#AdvSearch.AdvSearchForm-AvailableProperties)
  - [AdvSearch Features](#AdvSearch.AdvSearchForm-AdvSearchFeatures)
  - [Overall AdvSearch design](#AdvSearch.AdvSearchForm-OverallAdvSearchdesign)
  - [Custom installation](#AdvSearch.AdvSearchForm-Custominstallation)
- [AdvSearchForm Chunks](#AdvSearch.AdvSearchForm-AdvSearchFormChunks)
- [Examples](#AdvSearch.AdvSearchForm-Examples)
- [Errors](#AdvSearch.AdvSearchForm-Errors)
- [See Also](#AdvSearch.AdvSearchForm-SeeAlso)

</div>AdvSearchForm Snippet 
----------------------

This snippet displays a search form for AdvSearch.

Usage 
------

Simply place wherever you want a SearchForm to render, and add the 'landing' property to the call to specify the Resource where the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet call is located (which is where the results will display).

```
<pre class="brush: plain">
[[!AdvSearchForm? &landing=`82`]]

```If you'd like the results to show on the same page, simply place the [AdvSearch](/extras/revo/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet call below the AdvSearchForm call, and don't specify a 'landing' parameter.

Available Properties 
---------------------

### AdvSearch Features 

To set or unset features.

<table><thead><tr><th>Name </th><th>Description </th><th>Default </th></tr></thead><tbody><tr><td>clearDefault </td><td>Clearing default text. Set this to 0 if you wouldn't like the clear default text feature. </td><td>1 </td></tr><tr><td>help </td><td>To add a help link near the search form. Set 1 (displayed) or 0 (hidden). </td><td>1 </td></tr></tbody></table>### Overall AdvSearch design 

To design your own search.

<table><thead><tr><th>Name </th><th>Description </th><th>Default </th></tr></thead><tbody><tr><td>asId </td><td>Unique id for AdvSearch instance. Any combination of characters a-z, underscores, and numbers 0-9. Case sensitive. </td><td>as0 </td></tr><tr><td>landing </td><td>The Resource that the AdvSearch snippet is called on, that will display the results of the search. </td><td></td></tr><tr><td>method </td><td>Whether to send the search over POST or GET. </td><td>GET </td></tr><tr><td>searchIndex </td><td>The name of the REQUEST parameter that the search will use. </td><td>search </td></tr><tr><td>toPlaceholder </td><td>Whether to set the output to directly return, or set to a placeholder with this propertys name. </td><td></td></tr><tr><td>tpl </td><td>The chunk that will be used to display the search form. </td><td>SearchForm </td></tr></tbody></table>### Custom installation 

The parameters that could help you for a custom installation.

<table><thead><tr><th>Name </th><th>Description </th><th>Default </th></tr></thead><tbody><tr><td>addJs </td><td>Set this to 1 if you would like to include the advsearchform.min.js file, 0 if not </td><td>1 </td></tr><tr><td>addCss </td><td>Set this to 1 if you would like to include the advsearch.css file, 0 if not </td><td>1 </td></tr><tr><td>addJQuery </td><td>Set this to 1 if you would like to include or not the jQuery library in the header of your pages automatically </td><td>1 </td></tr><tr><td>jsJQuery </td><td>Url where is located the jquery javascript library </td><td>assets/components/advsearch/js/jquery-1.5.1.min.js </td></tr><tr><td>jsSearchForm </td><td>Url (under assets/) where is located the js library used with the form (help, clearDefault, ...) </td><td>assets/components/advsearch/js/advsearchform.min.js </td></tr></tbody></table>AdvSearchForm Chunks 
---------------------

There is 1 chunk that is processed in AdvSearchForm. Its corresponding AdvSearchForm parameter is:

- [tpl](/extras/revo/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl "Advsearch.AdvSearchForm.tpl") - The Chunk to use for the search form.

Examples 
---------

Display the search form, without but search with POST instead of GET:

```
<pre class="brush: php">
[[AdvSearchForm? &method=`POST`]]

```Set the search form to a 'search.form' placeholder, specify a landing page on Resource 82, and use a custom Chunk called 'MySearchForm' for the form template:

```
<pre class="brush: plain">
[[AdvSearchForm? &tpl=`MySearchForm` &landing=`82` &toPlaceholder=`search.form`]]

<h2>Search</h2>
[[+search.form]]

```Display two search forms, the first one (as0) without the help link and the second one (as1) without the clearDefault feature:

```
<pre class="brush: plain">
[[AdvSearchForm? &help=`0`]]

``````
<pre class="brush: plain">
[[AdvSearchForm? &asId=`as1` &clearDefault=`0`]]

```Errors 
-------

The following error message are possible:

- AdvSearch runs only with charset UTF-8.
- AdvSearch runs only with the multibyte extension on. See Lexicon and language system settings.

See Also 
---------

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