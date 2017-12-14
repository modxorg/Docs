---
title: "CustomUrls"
_old_id: "625"
_old_uri: "revo/customurls"
---

<div>- [What is CustomUrls?](#CustomUrls-WhatisCustomUrls%3F)
  - [Requirements](#CustomUrls-Requirements)
  - [Public Releases](#CustomUrls-PublicReleases)
  - [Download](#CustomUrls-Download)
  - [Support, Comments, Development and Bug Reporting](#CustomUrls-Support%2CComments%2CDevelopmentandBugReporting)
- [Usage](#CustomUrls-Usage)
  - [Rules properties](#CustomUrls-Rulesproperties)
- [Pattern examples](#CustomUrls-Patternexamples)

</div>What is CustomUrls?
-------------------

This extra allows you to define custom alias or URI patterns for your resources. **It supports translit and Redirector packages**.

You can build your patterns from resource fields, TV, snippets and output filters and set some constraints like you'd do with custom forms.

For example, with CustomURLs you can add the resource's ID or publish month in the aliases of all resources or just for ones whose parent = 1 or template = 1.

### Requirements

- MODx Revolution 2.2.x or later
- PHP5 or later

### Public Releases

<table><tbody><tr><th>Version</th><th>Date</th><th>Author</th><th>Product</th></tr><tr><td>1.0.0-rc2</td><td>September 9, 2012</td><td>ben\_omycode</td><td>Revolution</td></tr><tr><td>1.0.0-rc1</td><td>August 23, 2012</td><td>ben\_omycode</td><td>Revolution</td></tr></tbody></table>### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/customurls>

### Support, Comments, Development and Bug Reporting

**Github** : <https://github.com/benjamin-vauchel/customurls>  
**Support/Comments** : <http://forums.modx.com/thread/78843/support-comments-for-customurls>

Usage
-----

To start with CustomUrls, go to Components > Custom URLs and add a rule.

### Rules properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Example</th></tr><tr><td>Pattern   
</td><td>Your custom URL pattern built from text, resource fields, TV, snippet and output filters. You also can use _cu.parent_ placeholder to get the complete parent alias path.</td><td>\[\[+id\]\]-\[\[+alias\]\]   
</td></tr><tr><td>Constraint field   
</td><td>Can be any resource field : id, parent, template ...</td><td>template</td></tr><tr><td>Constraint value   
</td><td> </td><td>2</td></tr><tr><td>User group</td><td>User group for whom rule is active</td><td>Administrators</td></tr><tr><td>URI</td><td>By default, an alias is created but you can choose to create URI instead</td><td>false</td></tr><tr><td>Override</td><td>Override alias or URI when resource is updated.</td><td>true</td></tr><tr><td>Active</td><td>Is the rule active ?</td><td>true</td></tr></tbody></table>Pattern examples
----------------

Simple text :

```
<pre class="brush: php">
simple-text

```Default MODx alias :

```
<pre class="brush: php">
[[+alias]]

```Resource placeholders :

```
<pre class="brush: php">
[[+id]]-[[+alias]]

```TVs :

```
<pre class="brush: php">
[[+tv.mytv]]-[[+id]]

```Snippets :

```
<pre class="brush: php">
[[MySnippet? &id=`[[+id]]`]]

```Output filters :

```
<pre class="brush: php">
[[+publishedon:strtotime:date=`%Y-%m-%d`]]/[[+id]]-[[+alias]]

```Default MODx URI :

```
<pre class="brush: php">
[[+cu.parent_uri]]/[[+alias]]

```More complex URI

```
<pre class="brush: php">
[[+cu.parent_uri]]/some-text/[[getResourceField? &id=`[[+parent]]`]]/[[+id]]-[[+alias]]

```