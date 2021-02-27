---
title: "getResourceField"
_old_id: "653"
_old_uri: "revo/getresourcefield"
---

## What is getResourceField?

getResourceField is a simple snippet which can be used to display a single field, including template variables, of a different resource for MODX Revolution.

## History

getResourceField was first released on September 16th, 2010 by [paulmerchant](https://modx.com/extras/package/getresourcefield), co-authored by Shaun McCormick.

### Download

The snippet can be retrieved through the Package Manager, or downloaded manually from the [Repository](https://modx.com/extras/package/getresourcefield).

## Usage

The minimum tag is as follows:

``` php
[[getResourceField]]
```

This will output the pagetitle of the current resource.

### getResourceField parameters

| Name      | Description                                                                                      | Default value              |
| --------- | ------------------------------------------------------------------------------------------------ | -------------------------- |
| id        | The resource ID to get the field from.                                                           | $modx->resource->get('id') |
| field     | The field or template variable name to return.                                                   | ?pagetitle                 |
| isTV      | When set to 1 or true, the field is considered to be a template variable.                        | false                      |
| processTV | When set to 1 or true, the template variable will be processed according to its output settings. | false                      |
| default   | The value (string) to return if the field is not found or is empty.                              |                            |

### Examples

Return the pagetitle from the resource with id 123:

``` php
[[getResourceField? &id=`123`]]
```

Return the processed TV with name myTV of the parent resource, and if it is empty output 'Sorry, no data available':

``` php
[[getResourceField? &id=`[[*parent]]` &field=`myTV` &processTV=`1` &default=`Sorry, no data available`]]
```

Return the introtext field of the ultimate parent (note that this requires the UltimateParent snippet to be installed):

``` php
[[getResourceField? &id=`[[UltimateParent]]` &field=`introtext`]]
```

## Errors

One error that this Snippet is prone to is deceptively subtle: you can end up with a redirect loop. Consider the example where you've defined a template variable on your homepage, e.g. `[[*featured_article]]`, and you use this in your getResourceField Snippet call:

``` php
 [[getResourceField? &id=`[[*featured_article]]` &field=`content`]]
```

If that TV is not set, the default behavior is to use the id of the current page. If your Snippet call is in the content of your page and you are requesting the content as your field, your Snippet can go down the rabbit hole and infinitely loop on itself, causing your page request to time out with too many redirects.

Bottom line: if the Snippet call is inside the same field that you are requesting (e.g. content), then make sure the id parameter never points to the current page.
