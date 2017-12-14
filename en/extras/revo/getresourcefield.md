---
title: "getResourceField"
_old_id: "653"
_old_uri: "revo/getresourcefield"
---

<div>- [What is getResourceField?](#getResourceField-WhatisgetResourceField%3F)
- [History](#getResourceField-History)
  - [Download](#getResourceField-Download)
- [Usage](#getResourceField-Usage)
  - [getResourceField parameters](#getResourceField-getResourceFieldparameters)
  - [Examples](#getResourceField-Examples)
- [Errors](#getResourceField-Errors)

</div>What is getResourceField?
-------------------------

getResourceField is a simple snippet which can be used to display a single field, including template variables, of a different resource for MODx Revolution.

History
-------

getResourceField was first released on September 16th, 2010 by [paulmerchant](http://modxcms.com/extras/author/paulmerchant), co-authored by Shaun McCormick.

### Download

The snippet can be retrieved through the Package Manager, or downloaded manually from the [Repository](http://modxcms.com/extras/package/702).

Usage
-----

The minimum tag is as follows:

```
<pre class="brush: php">
[[getResourceField]]

```This will output the pagetitle of the current resource.

### getResourceField parameters

<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default value   
</th></tr><tr><td>id   
</td><td>The resource ID to get the field from.   
</td><td>$modx->resource->get('id')   
</td></tr><tr><td>field   
</td><td>The field or template variable name to return.   
</td><td>?pagetitle   
</td></tr><tr><td>isTV   
</td><td>When set to 1 or true, the field is considered to be a template variable.   
</td><td>false   
</td></tr><tr><td>processTV   
</td><td>When set to 1 or true, the template variable will be processed according to its output settings.   
</td><td>false   
</td></tr><tr><td>default   
</td><td>The value (string) to return if the field is not found or is empty.   
</td><td> </td></tr></tbody></table>### Examples

Return the pagetitle from the resource with id 123:

```
<pre class="brush: php">
 [[getResourceField? &id=`123`]]

```Return the processed TV with name myTV of the parent resource, and if it is empty output 'Sorry, no data available':

```
<pre class="brush: php">
 [[getResourceField? &id=`[[*parent]]` &field=`myTV` &processTV=`1` &default=`Sorry, no data available`]]

```Return the introtext field of the ultimate parent (note that this requires the UltimateParent snippet to be installed):

```
<pre class="brush: php">
 [[getResourceField? &id=`[[UltimateParent]]` &field=`introtext`]]

```Errors
------

One error that this Snippet is prone to is deceptively subtle: you can end up with a redirect loop. Consider the example where you've defined a template variable on your homepage, e.g. \[\[\*featured\_article\]\], and you use this in your getResourceField Snippet call:

```
<pre class="brush: php">
 [[getResourceField? &id=`[[*featured_article]]` &field=`content`]]

```If that TV is not set, the default behavior is to use the id of the current page. If your Snippet call is in the content of your page and you are requesting the content as your field, your Snippet can go down the rabbit hole and infinitely loop on itself, causing your page request to time out with too many redirects.

Bottom line: if the Snippet call is inside the same field that you are requesting (e.g. content), then make sure the id parameter never points to the current page.