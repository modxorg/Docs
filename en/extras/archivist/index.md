---
title: "Archivist"
_old_id: "603"
_old_uri: "revo/archivist"
---

## What is Archivist?

Archivist is an archive navigation Extra for MODx Revolution. It allows for wordpress-style navigation of Resources, as well as month/year/day archive listing and automatic FURL generation.

If you are looking to create a blog, check out [Articles](/extras/revo/articles "Articles"). It includes Archivist in an easy to use form.

## Requirements

- MODx Revolution 2.0.0-RC-2 or later
- PHP5 or later
- Extension requirements may call for FURL use and ".html" be changed to "/" : Content -> Content Types -> HTML (.html) -> /

## History

Archivist was written by [Shaun McCormick](/display/~splittingred) as a wordpress-style archiving component, and first released on June 3rd, 2010.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/archivist>

### Development and Bug Reporting

Archivist is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/Archivist>

Bugs can be filed here: <http://tracker.modx.com/projects/archivist>

## Usage

Archivist has 2 snippets - one to display the month/year/day listing ("Archivist"), and the other to display archive results ("getArchives").

- [Archivist.Archivist](/extras/revo/archivist/archivist.archivist "Archivist.Archivist") - Displays archive navigation links.
- [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives "Archivist.getArchives") - Displays results of archives.

## Examples

Display archives for your site, with a Month listing for Resources with parents 54 and 55, and then on a Resource ID of 123, display the Resources for that month.

The call for the Month listing:

``` php 
[[!Archivist? &parents=`54,55` &target=`123`]]
```

And then on your archives page:

``` php 
[[!getArchives?
   &parents=`54,55`
   &toPlaceholder=`archives`
]]

<h2>[[!+arc_month_name]] [[!+arc_year]] Archives</h2>

[[!+archives]]
```

## See Also

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  2. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)