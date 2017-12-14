---
title: "Ditto"
_old_id: "629"
_old_uri: "evo/ditto"
---

<div>- [What is Ditto?](#Ditto-WhatisDitto%3F)
  - [Useful Links](#Ditto-UsefulLinks)
- [Getting Started With Ditto](#Ditto-GettingStartedWithDitto)
- [See Also](#Ditto-SeeAlso)

</div>What is Ditto?
--------------

This is the documentation home for the MODx Evolution <span class="error">\[Snippet\]</span> Ditto; a document aggregator for creating blogs, article and news collections, and more, with full support for templating.

Ditto lists data from documents to create output in many formats. You can specify which documents, you can specify what data, and you can specify the layout of that data.

MODx Evolution comes shipped with Ditto (currently Ditto version 2.1.1) and works straight out of the box; but if needed you can download Ditto from [the MODx Extras section](http://modxcms.com/extras/package/96 "Download Ditto"). When downloading from the Extras section make sure you get the Evolution compatible version, some of the latest releases are for Revolution only.

<div class="info">Ditto development for MODx Revolution ceased some time ago and is not expected to continue in the future. [getResources](/extras/revo/getresources "getResources") and [getPage](/extras/revo/getpage "getPage") replaces most of the functionality.</div>### Useful Links

- [Official Ditto Forums](http://modxcms.com/forums/index.php/board,180.0.html "Ditto Forums")
- [Download Ditto](http://modxcms.com/extras/package/96 "Download Ditto")
- [Cheatsheet](http://www.slideshare.net/atmaworks/ditto-cheatsheet-1-2 "Cheatsheet")

Getting Started With Ditto
--------------------------

I'll try and cover as many of the basics as I can so you can get started with Ditto straight away, here's an example which you can to get a simple blog working very quickly. I have included a couple of the many parameters you can use to build a highly flexible system.

Call Ditto as you would with any snippet, for example:

```
<pre class="brush: php">[!Ditto? &parents=`5` &extenders=`summary` &tpl=`tplBlog` &orderBy=`createdon ASC` &display=`6` &truncText=`Continue Reading This Article` &dateFormat=`%e %B %Y`!]

```In this example, there's I've called a Chunk named "tplBlog" which will determine how each blog summary is displayed, that looks like this:

```
<pre class="brush: php"><h1>[+pagetitle+]</h1>
<p>[+summary+]</p>
<p>[+link+]</p>

```See Also
--------

1. [Ditto Extenders](http://rtfm.modx.com/extras/evo/ditto/ditto-extenders)
2. [Ditto Parameters](/extras/evo/ditto/ditto-parameters)