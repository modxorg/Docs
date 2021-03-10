---
title: "fastField"
_old_id: "638"
_old_uri: "revo/fastfield"
---

## What is fastField?

fastField is a plugin which adds new type of tag `[[#...]]` . It can be used to display a single field, including template variables and properties, of a different resource for MODX Revolution 2.2+. It also can display the value of superglobal PHP variables $\_POST, $\_GET and others.

## History

fastField was first released on November 29th, 2012 by [argnist](https://modx.com/extras/author/argnist).

## Download

The plugin can be retrieved through the Package Manager, or downloaded manually from the [Repository](https://modx.com/extras/package/fastfield).

## Usage

The structure of tag is as follows: `[[#resource_id.field]]`

where `resource_id` is an ID of necessary resource, eg. "123", and field is a resource field, eg. "pagetitle". For Template Variables the field should be prepended by "tv.". For Resource Properties it should be prepended by "properties." or "property.".

For usage with global arrays you must replace `resource_id` by array name, eg. "post" and field by the name of a variable.

In general, this plugin replaces [getResourceField](extras/getresourcefield) and [getReqParam](https://modx.com/extras/package/getreqparam) snippets.

## Examples

Return the pagetitle from the resource with id 123:

``` php
[[#123.pagetitle]]
```

Return the introtext of a parent of a current resource and display description for empty one:

``` php
[[#[[*parent]].introtext:default=`[[#[[*parent]].description]]`]]
```

Or, more efficiently (see [this MODX blog article](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/)):

``` php
[[[[#[[*parent]].introtext:default=`#[[*parent]].description`]]]]
```

Return the content of the resources in `rowTpl` chunk while [Wayfinder](extras/wayfinder) usage:

``` php
[[#[[+wf.docid]].content]]
```

Return TV image from the resource with id 10:

``` php
[[#10.tv.image]]
```

Return property `articlesPerPage` from the resource with id 1 of custom resource type [Articles](extras/articles)

``` php
[[#1.properties.articles.articlesPerPage]]
```

Return the value of $\_POST\['myVar'\]:

``` php
[[!#post.myVar]]
```

Supported global arrays: `$_GET`, `$_POST`, `$_REQUEST`, `$_SERVER`, `$_FILES`, `$_COOKIE`, `$_SESSION`. The type of array after # is case-insensitive. The name of array element is case-sensitive. You should use uncached tag, eg. `[[!#get.name]]`, for cached resources.

**CAUTION**: **It is dangerous to use raw global variables on the page. For example, use `:stripTags` [output filter](/building-sites/tag-syntax/output-filters) to prevent XSS-attacks (eg. `[[!#get.name:stripTags]]`)!**

## How it works

MODX uses `modParser` class for parsing default tags. This plugin adds class `fastFieldParser` that extends modParser. So, if `modParser` is modified in new version of MODX, the behaviour of plugin will be unpredictable.
