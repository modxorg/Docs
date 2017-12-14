---
title: "tagLister.tagLister"
_old_id: "1015"
_old_uri: "revo/taglister/taglister.taglister"
---

 tagLister Snippet 
-------------------

 This snippet displays a list of the most commonly used tags on your site.

 Usage 
-------

 Simply place the snippet anywhere you want to show a list of commonly-used tags, and pass the ID or name of the TV and the target Resource ID you want the links to go to:

```
<pre class="brush: php">[[!tagLister? &tv=`tags` &target=`123`]]

``` Properties 
------------

<table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> tpl </td> <td> Name of a Chunk that will be used for each result. </td> <td> tag </td> </tr><tr><td> tv </td> <td> The name or ID of the TV being used for tags. </td> <td> tags </td> </tr><tr><td> tvDelimiter </td> <td> The delimiter being used between tags in the TV. Usually a comma, sometimes a space. </td> <td> , </td> </tr><tr><td> target </td> <td> The target Resource to point the tag links to. </td> <td> 1 </td> </tr><tr><td> tagVar   
</td> <td> The request parameter used for outputting the tag in the default tpl.   
</td> <td> tag   
</td> </tr><tr><td> tagKeyVar   
</td> <td> The request parameter used for outputting the key in the default tpl.   
</td> <td> </td> </tr><tr><td> sortBy </td> <td> Field to sort by. Can be either tag or count. </td> <td> count </td> </tr><tr><td> sortDir </td> <td> Order which to sort by. </td> <td> ASC </td> </tr><tr><td> limit </td> <td> Limits the number of tags returned. </td> <td> 10 </td> </tr><tr><td> cls </td> <td> A CSS class to add to each row. </td> <td> tl-tag </td> </tr><tr><td> all </td> <td> Whether to show 'All tags' link. </td> <td> false </td> </tr><tr><td> allTpl </td> <td> Name of a Chunk that will be used for the 'All Tags' link </td> <td> all </td> </tr><tr><td> altCls </td> <td> A CSS class to add to each alternate row. </td> <td> tl-tag-alt </td> </tr><tr><td> firstCls </td> <td> Optional. A CSS class to add to the first row. If empty will ignore. </td> <td> </td> </tr><tr><td> lastCls </td> <td> Optional. A CSS class to add to the last row. If empty will ignore. </td> <td> </td> </tr><tr><td> activeCls   
</td> <td> Optional. A CSS class to add to the active row. Will be ignored if empty.   
</td> <td> </td> </tr><tr><td> toPlaceholder </td> <td> If set, will set the output of this snippet to this placeholder rather than output it. </td> <td> </td> </tr><tr><td> toLower   
</td> <td> If set to 1/true the tags will be changed to lowercase text.   
</td> <td> false   
</td> </tr><tr><td> weights   
</td> <td> </td> <td> 0   
</td> </tr><tr><td> weightCls   
</td> <td> </td> <td> </td> </tr><tr><td> parents   
</td> <td> Comma delimited list of parents to use to limit the search for tags to.   
</td> <td> </td> </tr><tr><td> depth   
</td> <td> Depth of parents to search in.   
</td> <td> 10   
</td></tr></tbody></table> tagLister Chunks 
------------------

 There are 2 chunks that are processed in tagLister. Their corresponding parameters are:

- [tpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.tpl "tagLister.tagLister.tpl") - The Chunk to use for each tag listed.
- [allTpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.all "tagLister.tagLister.all") - The Chunk to use for the 'All Tags' link.

 Examples 
----------

 Display a list of the top 5 tags for the 'tags' TV, and link to Resource ID 123:

```
<pre class="brush: php">[[!tagLister? &tv=`tags` &limit=`5` &target=`123`]]

```See Also
--------

1. [tagLister.getResourcesTag](/extras/revo/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/revo/taglister/taglister.taglister)
  1. [tagLister.tagLister.all](/extras/revo/taglister/taglister.taglister/taglister.taglister.all)
  2. [tagLister.tagLister.tpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/revo/taglister/taglister.tolinks)
  1. [tagLister.tolinks.tpl](/extras/revo/taglister/taglister.tolinks/taglister.tolinks.tpl)