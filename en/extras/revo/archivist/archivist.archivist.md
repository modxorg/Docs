---
title: "Archivist.Archivist"
_old_id: "776"
_old_uri: "revo/archivist/archivist.archivist"
---

Archivist Snippet
-----------------

 This snippet displays monthly or yearly archive links.

Usage
-----

 Simply place the snippet wherever you would like to display archive listings in, the parents to grab archives from, and a target resource to load the archives using the [getArchives](/extras/revo/archivist/archivist.getarchives "Archivist.getArchives") snippet.

 ```
<pre class="brush: php">[[!Archivist? &target=`123` &parents=`4,12,33`]]

```Available Properties
--------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> tpl </td> <td> The chunk that will be used to display each month/year result. </td> <td> row </td> </tr><tr><td> target </td> <td> The Resource that the getArchives snippet is called on, that will display the results of the archive filter. </td> <td> </td> </tr><tr><td> parents </td> <td> Comma-delimited list of ids serving as parents. </td> <td> </td> </tr><tr><td> depth </td> <td> Integer value indicating depth to search for resources from each parent. </td> <td> 10 </td> </tr><tr><td> sortBy </td> <td> The field to sort and group results by. </td> <td> publishedon </td> </tr><tr><td> sortDir </td> <td> Order which to sort by. Defaults to DESC. </td> <td> DESC </td> </tr><tr><td> limit </td> <td> Limits the number of resources returned. </td> <td> 10 </td> </tr><tr><td> start </td> <td> Optional. An offset of resources returned by the criteria to skip. </td> <td> 0 </td> </tr><tr><td> useMonth </td> <td> If 1, will use the month in the archive list. </td> <td> 1 </td> </tr><tr><td> useDay </td> <td> If 1, will use the day in the archive list. </td> <td> 0 </td> </tr><tr><td> dateFormat </td> <td> Optional. The date format, according to MySQL DATE\_FORMAT() syntax, for each row. If blank, Archivist will calculate this automatically. </td> <td> </td> </tr><tr><td> useFurls </td> <td> If true, will generate links in pretty Friendly URL format. </td> <td> 1 </td> </tr><tr><td> extraParams </td> <td> Optional. If specified, will attach this to the URL of each row. </td> <td> </td> </tr><tr><td> cls </td> <td> A CSS class to add to each row. </td> <td> arc-row </td> </tr><tr><td> altCls </td> <td> A CSS class to add to each alternate row. </td> <td> arc-row-alt </td> </tr><tr><td> firstCls </td> <td> Optional. A CSS class to add to the first row. If empty will ignore. </td> <td> </td> </tr><tr><td> lastCls </td> <td> Optional. A CSS class to add to the last row. If empty will ignore. </td> <td> </td> </tr><tr><td> filterPrefix </td> <td> The prefix to use for GET parameters with the Archivist links. Make sure this is the same as the filterPrefix parameter on the getArchives snippet call. </td> <td> arc\_ </td> </tr><tr><td> toPlaceholder </td> <td> If set, will set the output of this snippet to this placeholder rather than output it. </td> <td> </td> </tr><tr><td> setLocale </td> <td> If true, Archivist will run the setlocale function with your cultureKey setting if your cultureKey is not "en". </td> <td> true </td> </tr><tr><td>grSnippet

</td> <td>The name of the snippet used to list results.

</td> <td> getResources</td></tr></tbody></table>Archivist Chunks
----------------

 There is 1 chunk that is processed in Archivist. Its corresponding Archivist parameter is:

- [tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl "Archivist.Archivist.tpl") - The Chunk to use for each result displayed.

Examples
--------

 Display a list of months for archives for Resources under IDs 2, 4 & 6, and when clicked, go to page 123:

 ```
<pre class="brush: php">[[!Archivist? &target=`123` &parents=`2,4,6`]]

```See Also
--------

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  1. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)