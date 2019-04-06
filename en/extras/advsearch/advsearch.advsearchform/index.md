---
title: "AdvSearchForm"
_old_id: "772"
_old_uri: "revo/advsearch/advsearch.advsearchform"
---

## AdvSearchForm Snippet 

This snippet displays a search form for AdvSearch.

## Usage 

Simply place wherever you want a SearchForm to render, and add the 'landing' property to the call to specify the Resource where the [AdvSearch](/extras/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet call is located (which is where the results will display).

``` php 
[[!AdvSearchForm? &landing=`82`]]
```

If you'd like the results to show on the same page, simply place the [AdvSearch](/extras/advsearch/advsearch.advsearch "AdvSearch.AdvSearch") snippet call below the AdvSearchForm call, and don't specify a 'landing' parameter.

## Available Properties 

### AdvSearch Features 

To set or unset features.

| Name         | Description                                                                               | Default |
| ------------ | ----------------------------------------------------------------------------------------- | ------- |
| clearDefault | Clearing default text. Set this to 0 if you wouldn't like the clear default text feature. | 1       |
| help         | To add a help link near the search form. Set 1 (displayed) or 0 (hidden).                 | 1       |

### Overall AdvSearch design 

To design your own search.

| Name          | Description                                                                                                        | Default    |
| ------------- | ------------------------------------------------------------------------------------------------------------------ | ---------- |
| asId          | Unique id for AdvSearch instance. Any combination of characters a-z, underscores, and numbers 0-9. Case sensitive. | as0        |
| landing       | The Resource that the AdvSearch snippet is called on, that will display the results of the search.                 |            |
| method        | Whether to send the search over POST or GET.                                                                       | GET        |
| searchIndex   | The name of the REQUEST parameter that the search will use.                                                        | search     |
| toPlaceholder | Whether to set the output to directly return, or set to a placeholder with this propertys name.                    |            |
| tpl           | The chunk that will be used to display the search form.                                                            | SearchForm |

### Custom installation 

The parameters that could help you for a custom installation.

| Name         | Description                                                                                                    | Default                                             |
| ------------ | -------------------------------------------------------------------------------------------------------------- | --------------------------------------------------- |
| addJs        | Set this to 1 if you would like to include the advsearchform.min.js file, 0 if not                             | 1                                                   |
| addCss       | Set this to 1 if you would like to include the advsearch.css file, 0 if not                                    | 1                                                   |
| addJQuery    | Set this to 1 if you would like to include or not the jQuery library in the header of your pages automatically | 1                                                   |
| jsJQuery     | Url where is located the jquery javascript library                                                             | assets/components/advsearch/js/jquery-1.5.1.min.js  |
| jsSearchForm | Url (under assets/) where is located the js library used with the form (help, clearDefault, ...)               | assets/components/advsearch/js/advsearchform.min.js |

## AdvSearchForm Chunks 

There is 1 chunk that is processed in AdvSearchForm. Its corresponding AdvSearchForm parameter is:

- [tpl](/extras/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl "Advsearch.AdvSearchForm.tpl") - The Chunk to use for the search form.

## Examples 

Display the search form, without but search with POST instead of GET:

``` php 
[[AdvSearchForm? &method=`POST`]]
```

Set the search form to a 'search.form' placeholder, specify a landing page on Resource 82, and use a custom Chunk called 'MySearchForm' for the form template:

``` php 
[[AdvSearchForm? &tpl=`MySearchForm` &landing=`82` &toPlaceholder=`search.form`]]

<h2>Search</h2>
[[+search.form]]
```

Display two search forms, the first one (as0) without the help link and the second one (as1) without the clearDefault feature:

``` php 
[[AdvSearchForm? &help=`0`]]
```

``` php 
[[AdvSearchForm? &asId=`as1` &clearDefault=`0`]]
```

## Errors 

The following error message are possible:

- AdvSearch runs only with charset UTF-8.
- AdvSearch runs only with the multibyte extension on. See Lexicon and language system settings.

## See Also 

1. [AdvSearch.AdvSearch](/extras/advsearch/advsearch.advsearch)
    1. [AdvSearch.AdvSearch.containerTpl](/extras/advsearch/advsearch.advsearch/advsearch.advsearch.containertpl)
    2. [Advsearch.AdvSearch.extractTpl](/extras/advsearch/advsearch.advsearch/advsearch.advsearch.extracttpl)
    3. [AdvSearch.Advsearch.paging1Tpl](/extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging1tpl)
    4. [AdvSearch.AdvSearch.paging0Tpl](/extras/advsearch/advsearch.advsearch/advsearch.advsearch.paging0tpl)
    5. [AdvSearch.AdvSearch.tpl](/extras/advsearch/advsearch.advsearch/advsearch.advsearch.tpl)
2. [AdvSearch.AdvSearchForm](/extras/advsearch/advsearch.advsearchform)
    1. [Advsearch.AdvSearchForm.tpl](/extras/advsearch/advsearch.advsearchform/advsearch.advsearchform.tpl)
3. [AdvSearch.AdvSearchHelp](/extras/advsearch/advsearch.advsearchhelp)
    1. [AdvSearch.AdvSearchHelp.helplinkTpl](/extras/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl)
