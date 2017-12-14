---
title: "Advsearch.AdvSearchForm.tpl"
_old_id: "773"
_old_uri: "revo/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl"
---

AdvSearchForm's tpl Chunk 
--------------------------

A Chunk named "**AdvSearchForm**" is provided with AdvSearch. This Chunk name is set as &tpl property on the [AdvSearchForm](/extras/revo/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm") snippet.

Default Value 
--------------

```
<pre class="brush: html">
<form class="advsea-search-form" action="[[~[[+landing]]]]" method="[[+method]]">
  <fieldset>
    <input type="hidden" name="id" value="[[+landing]]" />
    <input type="hidden" name="asId" value="[[+asId]]" />
    [[+helpLink]]<input type="text" id="[[+asId]]_search" name="[[+searchIndex]]" value="[[+searchValue]]" />
    <input type="submit" name="sub" value="[[%advsearch.search? &namespace=`advsearch` &topic=`default`]]" />
  </fieldset>
</form>
[[+resultsWindow]]

```Available Placeholders 
-----------------------

<table><thead><tr><th>Name </th><th>Description </th></tr></thead><tbody><tr><td>asId </td><td>AdvSearch identifier. This placeholder is required in the search form template to distinguish advSearch instances. </td></tr><tr><td>helpLink </td><td>Where is displayed the link for opening the advanced search help </td></tr><tr><td>landing </td><td>The id of the resource to show search results on. Defaults to the current Resource. </td></tr><tr><td>method </td><td>Whether to submit over GET or POST. Defaults to GET. </td></tr><tr><td>searchValue </td><td>The default or current search value. </td></tr><tr><td>searchIndex </td><td>The REQUEST var used for the search parameter. </td></tr><tr><td>resultsWindow </td><td>div section where will be attached the search results window. (ajax mode) </td></tr></tbody></table>Search form customization 
--------------------------

The searchForm chunk should contain:

- an action: action="\[\[~\[\[+landing\]\]\]\]"
- a method: method="\[\[+method\]\]"
- a hidden input field named asId: <input type="hidden" name="asId" value="\[\[+asId\]\]"> for the form instance
- a hidden input field named id: <input type="hidden" name="id" value="\[\[+landing\]\]"> with the landing page id
- a submit input field named "sub".

and possibly:

- an input text field: <input type="text" id="\[\[+asId\]\]\_search" name="\[\[+searchIndex\]\]" value="\[\[+searchValue\]\]" />   
  For a form without a search input field, simply remove this line from the form.

- the help link: \[\[+helpLink\]\]   
  To hide the help link use the &help parameter to remove the placeholder altogether.