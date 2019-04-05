---
title: "CustomUrls"
_old_id: "625"
_old_uri: "revo/customurls"
---

- [What is CustomUrls?](#CustomUrls-WhatisCustomUrls%3F)
  - [Requirements](#CustomUrls-Requirements)
  - [Public Releases](#CustomUrls-PublicReleases)
  - [Download](#CustomUrls-Download)
  - [Support, Comments, Development and Bug Reporting](#CustomUrls-Support%2CComments%2CDevelopmentandBugReporting)
- [Usage](#CustomUrls-Usage)
  - [Rules properties](#CustomUrls-Rulesproperties)
- [Pattern examples](#CustomUrls-Patternexamples)



## What is CustomUrls?

This extra allows you to define custom alias or URI patterns for your resources. **It supports translit and Redirector packages**.

You can build your patterns from resource fields, TV, snippets and output filters and set some constraints like you'd do with custom forms.

For example, with CustomURLs you can add the resource's ID or publish month in the aliases of all resources or just for ones whose parent = 1 or template = 1.

### Requirements

- MODx Revolution 2.2.x or later
- PHP5 or later

### Public Releases

| Version | Date | Author | Product |
|---------|------|--------|---------|
| 1.0.0-rc2 | September 9, 2012 | ben\_omycode | Revolution |
| 1.0.0-rc1 | August 23, 2012 | ben\_omycode | Revolution |

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/customurls>

### Support, Comments, Development and Bug Reporting

**Github** : <https://github.com/benjamin-vauchel/customurls>
**Support/Comments** : <http://forums.modx.com/thread/78843/support-comments-for-customurls>

## Usage

To start with CustomUrls, go to Components > Custom URLs and add a rule.

### Rules properties

| Name | Description | Example |
|------|-------------|---------|
| Pattern | Your custom URL pattern built from text, resource fields, TV, snippet and output filters. You also can use _cu.parent_ placeholder to get the complete parent alias path. | \[\[+id\]\]-\[\[+alias\]\] |
| Constraint field | Can be any resource field : id, parent, template ... | template |
| Constraint value |  | 2 |
| User group | User group for whom rule is active | Administrators |
| URI | By default, an alias is created but you can choose to create URI instead | false |
| Override | Override alias or URI when resource is updated. | true |
| Active | Is the rule active ? | true |

## Pattern examples

Simple text :

``` php 
simple-text
```

Default MODx alias :

``` php 
[[+alias]]
```

Resource placeholders :

``` php 
[[+id]]-[[+alias]]
```

TVs :

``` php 
[[+tv.mytv]]-[[+id]]
```

Snippets :

``` php 
[[MySnippet? &id=`[[+id]]`]]
```

Output filters :

``` php 
[[+publishedon:strtotime:date=`%Y-%m-%d`]]/[[+id]]-[[+alias]]
```

Default MODx URI :

``` php 
[[+cu.parent_uri]]/[[+alias]]
```

More complex URI

``` php 
[[+cu.parent_uri]]/some-text/[[getResourceField? &id=`[[+parent]]`]]/[[+id]]-[[+alias]]
```