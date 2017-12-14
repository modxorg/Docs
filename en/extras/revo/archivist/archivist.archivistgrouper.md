---
title: "Archivist.ArchivistGrouper"
_old_id: "778"
_old_uri: "revo/archivist/archivist.archivistgrouper"
---

ArchivistGrouper
================

The [Articles](/extras/revo/articles "Articles") addon 1.6.1 came with the Archivist addon 1.2.3, so I suppose this ArchivistGrouper snippet is now part of [Archivist](/extras/revo/archivist "Archivist"). No documentation yet from its creator, but I found the available properties in the snippet.

<div class="panel" style="border-width: 1px;"><div class="panelContent">The descriptions in the table are just a guess!!! Someone with more experience or the creator should confirm or adjust these!!

</div></div>Usage
-----

Simply place the snippet wherever you would like to display archive listings in, the parents to grab archives from.

```
<pre class="brush: php">
[[!ArchivistGrouper? &parents=`12`]]

```Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>mode</td><td>Choose between month and year</td><td>month</td></tr><tr><td>itemTpl</td><td>The chunk that will be used to display each item within a group</td><td> </td></tr><tr><td>parents</td><td>Comma-delimited list of ids serving as parents.</td><td> </td></tr><tr><td>target</td><td>The Resource that the getArchives snippet is called on, that will display the results of the archive filter.</td><td> </td></tr><tr><td>depth</td><td>Integer value indicating depth to search for resources from each parent.</td><td>10</td></tr><tr><td>where</td><td> </td><td> </td></tr><tr><td>hideContainers</td><td> </td><td>true</td></tr><tr><td>sortBy</td><td>The field to sort and group results by.</td><td>publishedon</td></tr><tr><td>sortDir</td><td>Order which to sort by. Defaults to DESC.</td><td>DESC</td></tr><tr><td>dateFormat</td><td>The date format, according to MySQL DATE\_FORMAT() syntax, for each row. If blank, ArchivistGrouper will calculate this automatically.</td><td> </td></tr><tr><td>limitGroups</td><td>Limits the number of groups returned.</td><td>12</td></tr><tr><td>limitItems</td><td>Limits the number of items returned. 0 means no limit??</td><td>0</td></tr><tr><td>resourceSeparator</td><td> </td><td>\\n</td></tr><tr><td>groupSeparator</td><td> </td><td>\\n</td></tr><tr><td>filterPrefix</td><td>The prefix to use for GET parameters with the Archivist links. Make sure this is the same as the filterPrefix parameter on the getArchives snippet call.</td><td>arc\_</td></tr><tr><td>useFurls</td><td>If true, will generate links in pretty Friendly URL format.</td><td>true</td></tr><tr><td>persistGetParams</td><td> </td><td>false</td></tr><tr><td>extraParams</td><td> </td><td> </td></tr><tr><td>cls</td><td>A CSS class to add to each row.</td><td>arc-resource-row</td></tr><tr><td>altCls</td><td>A CSS class to add to each alternate row.</td><td>arc-resource-row-alt</td></tr><tr><td>setLocale   
</td><td>If true, Archivist will run the setlocale function with your cultureKey setting if your cultureKey is not "en".</td><td>true</td></tr><tr><td>groupTpl</td><td>The chunk that will be used to display each month/year result.</td><td>yearContainer (when property mode=`year`)   
monthContainer (when property mode=`month`)</td></tr></tbody></table>Almost all of the descriptions are the same properties as mentioned on the [Archivist page](/extras/revo/archivist/archivist.archivist "Archivist.Archivist").

Chunks
------

If no templates are given, the defaults are used. As it got me puzzled how to create my own template for the groups, I dived into the source and found this template that is used as monthContainer:

```
<pre class="brush: php">
<li><a href="[[+url]]">[[+month_name]] [[+year]]</a>
<ul>
[[+resources]]
</ul>

```Notice the placeholder **\[\[+resources\]\]** that passes on the results to the itemTpl.

Result
------

The results looks like this:

<span class="image-wrap" style="float: left">![](https://img.skitch.com/20110321-mnufd64c1jyc941kk8nfj3t5i5.jpg)</span>