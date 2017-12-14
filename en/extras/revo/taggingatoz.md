---
title: "TaggingAtoZ"
_old_id: "728"
_old_uri: "revo/taggingatoz"
---

<span class="image-wrap" style="float: right">[![](/download/thumbnails/36634655/taggingatoz1.PNG)](/download/attachments/36634655/taggingatoz1.PNG)</span>  
TaggingAtoZ is a snippet that lists tags (or theoretically other TV content as well) in groups from A to Z and an optional 0-9 group with customizable header. It can collect data from multiple TV sources.   
The typical output will be something like the image on the right, though it is completely customizable and you would probably want a bit more styling and useful tags.:)

TaggingAtoZ was developed by Mark Hamstra for Vierkante Meter.

History & Links
---------------

TaggingAtoZ was first released on October 13th, 2011 and can be downloaded from Package Management and the MODX Extras site.

The source is on Github: <https://github.com/Mark-H/TaggingAtoZ>,   
which is also the place for **bugs & improvements**: <https://github.com/Mark-H/TaggingAtoZ/issues/>

General Discussion on the forum: <http://forums.modx.com/thread/71008/taggingatoz-displaying-alphabetical-grouped-tags>

<table><tbody><tr><th>Version   
</th><th>Released   
</th><th>Notes   
</th></tr><tr><td>1.1.0-pl   
</td><td>26/10/2011   
</td><td>Added &groups parameter   
</td></tr><tr><td>1.0.0-pl   
</td><td>13/10/2011   
</td><td>First release   
</td></tr></tbody></table>Properties
----------

<table><tbody><tr><th>Property   
</th><th>Description   
</th><th>Default Value   
</th></tr><tr><td>tvs   
</td><td>**Required**. Comma separated list of TVs (name or ID) to collect the values from.   
</td><td> </td></tr><tr><td>target   
</td><td>**Usually Required**. ID of the resource to target to. Usually required cause you could just override it in the tplTag chunk.   
</td><td>1   
</td></tr><tr><td>groups   
</td><td>Can be used to define which groups to use. Example: &groups=`a,b,c`. If you want to include the numeric group as well, pass the numeric group header (see &numericHeader), like so: &groups=`0-9,a,b,c`. Does not change the order, only what groups are included. _Added in 1.1.0._  
</td><td> </td></tr><tr><td>tagKey   
</td><td>When used with getResourcesTag, this is the tag key to pass in the request. Could override in the tplTag chunk as well.   
</td><td>tag   
</td></tr><tr><td>tagSeparator   
</td><td>Separator to use between tplTag results.   
</td><td>\\n   
</td></tr><tr><td>groupSeparator   
</td><td>Separator to use between tplGroup results.   
</td><td>\\n   
</td></tr><tr><td>limit   
</td><td>Limit the results **per group**.   
</td><td>5   
</td></tr><tr><td>toLower   
</td><td>1|0 Transform tags to lower case (allows case-insensitive counting/viewing) _Defaults to 1 since 1.1.0._  
</td><td>1   
</td></tr><tr><td>encoding   
</td><td>When use\_multibyte is 1, use this encoding for transforming to lower case.   
</td><td>UTF-8   
</td></tr><tr><td>use\_multibyte   
</td><td>Use multibyte function in transforming to lower case.   
</td><td>0   
</td></tr><tr><td>groupNumeric   
</td><td>1|0 Group numeric keys into one group when 1   
</td><td>1   
</td></tr><tr><td>numericHeader   
</td><td>Header (string) to use for the numberic group   
</td><td>0-9   
</td></tr><tr><td>toPlaceholder   
</td><td>When set, it will output the results to the placeholder in this property   
</td><td> </td></tr><tr><td>groups   
</td><td>Limit the output to certain groups. Specify them as a comma separated lists, such as: a,b,c,d,e,f. Use the value in numbericHeader if you want to include those, like 0-9,a,b,c,d,e,f.   
</td><td> </td></tr><tr><td>parents   
</td><td>Comma separated list of parent resource IDs to search in for values.   
</td><td> </td></tr><tr><td>depth   
</td><td>Depth to check for values (only used with &parents).   
</td><td> </td></tr><tr><td>includeDeleted   
</td><td>\[1|0\] If you want to include deleted resources as well, set this to 1.   
</td><td>0   
</td></tr><tr><td>includeUnpublished   
</td><td>\[1|0\] If you want to include unpublished resources as well, set this to 1.   
</td><td>0   
</td></tr><tr><td>tplTag   
</td><td>Template chunk to use for every tag.   
Placeholders you can use:   
- tag: the tag name
- tagKey: the tagKey property's value
- count: number of times this tag occured
- target: target property's value
- cls: the classes as calculated based on the cls and \*Cls properties.
- idx: the tag counter for this group.

</td><td>atozTag   
</td></tr><tr><td>tplGroup   
</td><td>Template chunk to use for every group.   
Placeholders you can use:   
- group: the group name
- count: number of tags in this group (NOTE: this is the total amount. If you have more tags in this group than your limit property allows, this will be bigger than the number shown.
- wrapper: will be replaced with the individual tags parsed by the tplTag properties.

</td><td>atozGroup   
</td></tr><tr><td>tplOuter   
</td><td>Template chunk to use to wrap all the results in.   
Properties you can use:   
- countgroups: number of groups being displayed
- counttags: total number of tags (not neccessarily the same amount as being displayed)
- wrapper: will be replaced with individual groups parsed by the tplGroup properties

</td><td>atozOuter   
</td></tr><tr><td>cls   
</td><td>Class to add to every item.   
</td><td> </td></tr><tr><td>altCls   
</td><td>Class to use for odd items.   
</td><td>alt   
</td></tr><tr><td>firstCls   
</td><td>Class to use for the first tag.   
</td><td>first   
</td></tr><tr><td>lastCls   
</td><td>Class to use for the last tag.   
</td><td>last   
</td></tr><tr><td>weights   
</td><td>(int) Used in weighing tags with the weightCls property.   
</td><td>0   
</td></tr><tr><td>weightCls   
</td><td>Class to prefix for weights.   
</td><td> </td></tr><tr><td>debug   
</td><td>Set to 1 to dump debug information.   
</td><td>0   
</td></tr></tbody></table>Usage
-----

To display tags from the "MyTags" TV and the TV with ID 16, pointing the links to the current resource:

```
<pre class="brush: php">
[[TaggingAtoZ? &tvs=`MyTags,16` &target=`[[*id]]`]]

```