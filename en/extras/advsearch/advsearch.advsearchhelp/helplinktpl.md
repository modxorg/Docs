---
title: "helplinkTpl"
_old_id: "775"
_old_uri: "revo/advsearch/advsearch.advsearchhelp/advsearch.advsearchhelp.helplinktpl"
---

## AdvSearch's helplinkTpl Chunk

A Chunk named "**helpLink**" is provided with AdvSearch. This Chunk name is used to set up the help link.

## Default Value

``` php
<a id="[[+asId]]_helplink" title="[[%advsearch.help_title? &namespace=`advsearch` &topic=`default`]]" href="[[+helpId]]" class="advsea-helplink"><span>help</span></a>
```

## Available Placeholders

| Name   | Description                      |
| ------ | -------------------------------- |
| helpId | The url target for the help link |

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
