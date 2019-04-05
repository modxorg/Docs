---
title: "AdvSearchHelp"
_old_id: "774"
_old_uri: "revo/advsearch/advsearch.advsearchhelp"
---

- [AdvSearchHelp Snippet](#advsearchhelp-snippet)
- [Usage](#usage)
- [Help window content](#help-window-content)
- [See Also](#see-also)



## AdvSearchHelp Snippet 

This snippet is used to set up the help content. 
The default English content presents the minimal query syntax supported by the release for mysql and zend engines.

## Usage 

The help is provided by an ajax request to a resource named "AdvSearch Help" which call the AdvSearchHelp snippet.

``` plain 
[[!AdvSearchHelp]]
```

The "AdvSearch Help" resource is created with the package installation. 
You could move the "AdvSearch Help" resource in the MODx resource tree but as the resource is found by his name don’t change his name.

## Help window content 

The content of the help window is provided by the lexicon file help.inc Add your own language and customize the content as you want.

## See Also 

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