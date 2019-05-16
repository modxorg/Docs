---
title: "Static Resources and Elements"
_old_id: "195"
_old_uri: "2.x/case-studies-and-tutorials/managing-resources-and-elements-via-svn"
note: 'This document does not describe a full workflow for using static resources and elements, and could do with a rewrite.'
---

## The Problem

 When working in collaboration, teams of developers and designers often collaborate via Subversion (SVN) to make development easier between multiple people. MODX, however, stores its data in the database. This has many benefits generally, but DB-stored code cannot be version-controlled via SVN.

 However, the solution in MODX Revolution is quite simple.

## The Solution

 For Resources, it's simple. Just use [Static Resources](building-sites/resources/static-resource "Static Resource"), and point the content to a file in your SVN checkout.

 The following is relevant to older versions of MODX. For MODX 2.2.x, as with static resources, simply use [Static Elements](getting-started/maintenance/upgrading/2.2#Upgradingto2.2.x-StaticElements). Static Elements have the further advantage of being able to use [Media Sources](getting-started/maintenance/upgrading/2.2#Upgradingto2.2.x-MediaSources).

 For Elements, all you need is a simple "include" [snippet](extending-modx/snippets "Snippets"). The code:

 ``` php
if (!file_exists($file)) return '';
$o = include $file;
return $o;
```

 You can then call it like so in your Static Resources:

 ``` php
[[include? &file=`/path/to/my/svn/checkout/snippet.php`]]
```

 And you're done. You can also use tags within the 'file' parameter, such as this:

 ``` php
[[include? &file=`[[++assets_path]]/js/myscript.js`]]
```

## Conclusion

 This allows you to easily manage content via SVN. It can be achieved with [Templates](building-sites/elements/templates "Templates") and [TVs](building-sites/elements/template-variables "Template Variables") as well; just plop the include snippet wherever you need filesystem-based files.
