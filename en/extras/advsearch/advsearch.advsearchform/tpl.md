---
title: "Advsearch.AdvSearchForm.tpl"
_old_id: "773"
_old_uri: "revo/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl"
---

## AdvSearchForm's tpl Chunk 

A Chunk named "**AdvSearchForm**" is provided with AdvSearch. This Chunk name is set as &tpl property on the [AdvSearchForm](/extras/revo/advsearch/advsearch.advsearchform "AdvSearch.AdvSearchForm") snippet.

## Default Value 

``` html 
<form class="advsea-search-form" action="[[~[[+landing]]]]" method="[[+method]]">
  <fieldset>
    <input type="hidden" name="id" value="[[+landing]]" />
    <input type="hidden" name="asId" value="[[+asId]]" />
    [[+helpLink]]<input type="text" id="[[+asId]]_search" name="[[+searchIndex]]" value="[[+searchValue]]" />
    <input type="submit" name="sub" value="[[%advsearch.search? &namespace=`advsearch` &topic=`default`]]" />
  </fieldset>
</form>
[[+resultsWindow]]
```

## Available Placeholders 

| Name | Description |
|------|-------------|
| asId | AdvSearch identifier. This placeholder is required in the search form template to distinguish advSearch instances. |
| helpLink | Where is displayed the link for opening the advanced search help |
| landing | The id of the resource to show search results on. Defaults to the current Resource. |
| method | Whether to submit over GET or POST. Defaults to GET. |
| searchValue | The default or current search value. |
| searchIndex | The REQUEST var used for the search parameter. |
| resultsWindow | div section where will be attached the search results window. (ajax mode) |

## Search form customization 

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