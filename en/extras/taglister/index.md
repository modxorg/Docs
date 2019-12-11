---
title: "tagLister"
_old_id: "729"
_old_uri: "revo/taglister"
---

## What is tagLister?

tagLister is a snippet which lists tags in order to generate tag-based navigation such as a tag cloud; the tags are unique values for a given Template Variable (one dedicated for tags). tagLister works in conjunction with several other related Snippets.

**tagLister** is used on the page where the unique tags should be displayed, and the getResourcesTag Snippet is used on the page that will display the links to the pages that were tagged by the given tag.

If you think about the various components here, we need **tagLister** to do 3 things: list the tags associated with a given post, list a tag cloud showing all available posts, and finally a page that will show all pages that have been tagged with a given tag. Those 3 tasks are handled by **tagLister**'s 3 component Snippets.

Here are the 3 components you need to establish to make this work.

### 1. Show all Pages tagged with a given Term

Create a page dedicated to showing all pages tagged with a given term. On that page, place the **getResourcesTag** Snippet. It's more or less an extension of the [getResources](extras/getresources "getResources") Snippet, so it shares most of the same arguments.

If you are tagging only resources in a certain folder, reference the folder's page ID in the **&parents** argument, otherwise use "0" to search the entire site.

``` php
[[!getResourcesTag? &parents=`0` &tagKey=`my_tags` &tpl=`result_tpl`]]
```

- **&tagKey** is the unique name of the Template Variable containing the tags
- **&tpl** is a chunk used to format each result (just like you would use for **getResources**)

Remember the page ID of this page: we will use it in the next step.

### 2. Show all tags for a given page

The next component here is showing all the given tags that appear on a given page. For this component, we rely on the **toLinks** Snippet. This will point to the page ID we created in step 1.

``` php
[[!toLinks? &items=`[[*my_tags]]` &target=`123`]]
```

The **&items** argument should include the goods: what has your page been tagged with? This should be the name of your Template Variable.

### 3. Display a Tag Cloud

The third common component here is to display a tag cloud listing all available tags. For this, we rely on the third of **tagLister**'s bundled Snippets.

## Requirements

- A series of resources (e.g. blog posts) that utilize an auto-tag Template Variable
- A page dedicated to displaying all resources that have been tagged with a given value (i.e. a page for search results)
- MODX Revolution 2.0.0-RC-2 or later
- PHP5 or later

## History

tagLister was written by [Shaun McCormick](https://github.com/splittingred) and first released on June 14th, 2010.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <https://modx.com/extras/package/taglister>

### Development and Bug Reporting

tagLister is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/tagLister>

Bugs can be filed here: <http://github.com/splittingred/tagLister/issues>

## Usage

tagLister has 1 snippet that displays a list of used tags, grabbed from the specified TV.

tagLister comes with three Snippets:

- [tagLister](extras/taglister/taglister.taglister "tagLister.tagLister") - Lists most commonly used tags.
- [getResourcesTag](extras/taglister/taglister.getresourcestag "tagLister.getResourcesTag") - For grabbing Resources filtered by tags.
- [tolinks](extras/taglister/taglister.tolinks "tagLister.tolinks") - For converting a comma-separated list into links.

## Examples

Grab a list of tags specified in the TV 'tags', which are separated by commas, and make the links go to the home page:

``` php
[[!tagLister? &tv=`tags`]]
```

Grab a list of tags specified in the TV 'blog-tags', which are separated by spaces, and make the links go to Resource ID 123:

``` php
[[!tagLister? &tv=`blog-tags` &tvDelimiter=` ` &target=`123`]]
```

## See Also

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister.taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister.taglister/taglister.taglister.all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/taglister.tolinks.tpl)
