---
title: "QuickCrumbs"
_old_id: "695"
_old_uri: "revo/quickcrumbs"
---

## What is QuickCrumbs

QuickCrumbs is a quick and efficient breadcrumb-generation [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODx Revolution. It supports [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks") tpl's for the crumbs, has a configurable separator and much more.

### History

Being developed since October 11, 2010 by [Jason Coward](http://modx.com/extras/author/opengeek).

### Requirements

- MODX Revolution

### Development & Bug reporting

ModDef is currently being developed on Github. That is also the place to **[report bugs](https://github.com/opengeek/quickcrumbs/issues)**, file **feature requests** and **improvements**. You may also fetch the latest commits from the Develop branch.

Github: <https://github.com/opengeek/quickcrumbs>

## Usage

The QuickCrumbs snippet can be called using the tag:

``` php
[[QuickCrumbs]]
```

Calls without a &tpl property specified will just output an array listing of each resulting Resource and their fields.

## Available Properties

The following properties are available for the QuickCrumbs Snippet.

### Template properties

| Name         | Description                                                                                                                                            | Default Value                                  |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------ | ---------------------------------------------- |
| tpl          | Name of a Chunk serving as a template for a Resource crumb. **NOTE: If not provided, properties are dumped to output in a pre element for each crumb** |                                                |
| siteStartTpl | An optional Chunk serving as a template for the site\_start.                                                                                           | Defaults to the \***tpl**\* if not provided.   |
| selfTpl      | An optional Chunk serving as a template for the current Resource crumb.                                                                                | Defaults to the \***tpl**\* if not provided.   |
| outerTpl     | An optional Chunk serving as a wrapper template for the complete crumbs output.                                                                        | Defaults to empty, returning the output as is. |

### Crumb Selection properties

| Name          | Description                                                                                                                                      | Default Value                                 |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------ | --------------------------------------------- |
| fields        | A comma-separate list of fields to select from the resource as placeholders. **NOTE that id, class\_key, and context\_key are always selected.** | Defaults to 'pagetitle,menutitle,description' |
| showSiteStart | Indicates if a crumb representing the site\_start Resource should be generated.                                                                  | Defaults to 1 (or true).                      |
| showSelf      | Indicates if a crumb representing the current Resource should be generated.                                                                      | Defaults to 1 (or true).                      |

### Other properties

| Name          | Description                                                                                                               | Default Value             |
| ------------- | ------------------------------------------------------------------------------------------------------------------------- | ------------------------- |
| separator     | A string to use as a separator between crumbs.                                                                            | Defaults to `»`           |
| toPlaceholder | If not empty, the output is saved to a placeholder with the specified name instead of returned directly from the Snippet. | Default is empty.         |
| debug         | If true, debugging information will be sent to the MODx log.                                                              | Defaults to 0 (or false). |

### Parent-Titles properties

| Name                    | Description                                                                                                                                               | Default Value            |
| ----------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------ |
| parentTitlesPlaceholder | If not empty, pagetitles of all the parent crumbs are compiled and set as a placeholder with the specified name, for use in the content of your Resource. | Default is empty.        |
| parentTitlesReversed    | Indicates if the parent pagetitles should be output in reverse order.                                                                                     | Default is 0 (or false). |
| titleSeparator          | A separator to use in between pagetitles used in the parentTitlesPlaceholder.                                                                             |                          |