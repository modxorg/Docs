---
title: "TaggingAtoZ"
_old_id: "728"
_old_uri: "revo/taggingatoz"
---

![](taggingatoz1.png)
TaggingAtoZ is a snippet that lists tags (or theoretically other TV content as well) in groups from A to Z and an optional 0-9 group with customizable header. It can collect data from multiple TV sources.
The typical output will be something like the image on the right, though it is completely customizable and you would probably want a bit more styling and useful tags.:)

TaggingAtoZ was developed by Mark Hamstra for Vierkante Meter.

## History& Links

TaggingAtoZ was first released on October 13th, 2011 and can be downloaded from Package Management and the MODX Extras site.

The source is on Github: <https://github.com/Mark-H/TaggingAtoZ>,
which is also the place for **bugs & improvements**: <https://github.com/Mark-H/TaggingAtoZ/issues/>

General Discussion on the forum: <http://forums.modx.com/thread/71008/taggingatoz-displaying-alphabetical-grouped-tags>

| Version  | Released   | Notes                   |
| -------- | ---------- | ----------------------- |
| 1.1.0-pl | 26/10/2011 | Added &groups parameter |
| 1.0.0-pl | 13/10/2011 | First release           |

## Properties

| Property           | Description                                                                                                                                                                                                                                                                          | Default Value                                                                                          |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| tvs                | **Required**. Comma separated list of TVs (name or ID) to collect the values from.                                                                                                                                                                                                   |                                                                                                        |
| target             | **Usually Required**. ID of the resource to target to. Usually required cause you could just override it in the tplTag chunk.                                                                                                                                                        | 1                                                                                                      |
| groups             | Can be used to define which groups to use. Example: &groups=`a,b,c`. If you want to include the numeric group as well, pass the numeric group header (see &numericHeader), like so: &groups=`0-9,a,b,c`. Does not change the order, only what groups are included. _Added in 1.1.0._ |                                                                                                        |
| tagKey             | When used with getResourcesTag, this is the tag key to pass in the request. Could override in the tplTag chunk as well.                                                                                                                                                              | tag                                                                                                    |
| tagSeparator       | Separator to use between tplTag results.                                                                                                                                                                                                                                             | \\n                                                                                                    |
| groupSeparator     | Separator to use between tplGroup results.                                                                                                                                                                                                                                           | \\n                                                                                                    |
| limit              | Limit the results **per group**.                                                                                                                                                                                                                                                     | 5                                                                                                      |
| toLower            | 1                                                                                                                                                                                                                                                                                    | 0 Transform tags to lower case (allows case-insensitive counting/viewing) _Defaults to 1 since 1.1.0._ | 1 |
| encoding           | When use\_multibyte is 1, use this encoding for transforming to lower case.                                                                                                                                                                                                          | UTF-8                                                                                                  |
| use\_multibyte     | Use multibyte function in transforming to lower case.                                                                                                                                                                                                                                | 0                                                                                                      |
| groupNumeric       | 1                                                                                                                                                                                                                                                                                    | 0 Group numeric keys into one group when 1                                                             | 1 |
| numericHeader      | Header (string) to use for the numberic group                                                                                                                                                                                                                                        | 0-9                                                                                                    |
| toPlaceholder      | When set, it will output the results to the placeholder in this property                                                                                                                                                                                                             |                                                                                                        |
| groups             | Limit the output to certain groups. Specify them as a comma separated lists, such as: a,b,c,d,e,f. Use the value in numbericHeader if you want to include those, like 0-9,a,b,c,d,e,f.                                                                                               |                                                                                                        |
| parents            | Comma separated list of parent resource IDs to search in for values.                                                                                                                                                                                                                 |                                                                                                        |
| depth              | Depth to check for values (only used with &parents).                                                                                                                                                                                                                                 |                                                                                                        |
| includeDeleted     | \[1                                                                                                                                                                                                                                                                                  | 0\] If you want to include deleted resources as well, set this to 1.                                   | 0 |
| includeUnpublished | \[1                                                                                                                                                                                                                                                                                  | 0\] If you want to include unpublished resources as well, set this to 1.                               | 0 |
| tplTag             | Template chunk to use for every tag.                                                                                                                                                                                                                                                 |
Placeholders you can use:
- tag: the tag name
- tagKey: the tagKey property's value
- count: number of times this tag occured
- target: target property's value
- cls: the classes as calculated based on the cls and \*Cls properties.
- idx: the tag counter for this group. | atozTag |
| tplGroup | Template chunk to use for every group.
Placeholders you can use:
- group: the group name
- count: number of tags in this group (NOTE: this is the total amount. If you have more tags in this group than your limit property allows, this will be bigger than the number shown.
- wrapper: will be replaced with the individual tags parsed by the tplTag properties. | atozGroup |
| tplOuter | Template chunk to use to wrap all the results in.
Properties you can use
- countgroups: number of groups being displayed
- counttags: total number of tags (not neccessarily the same amount as being displayed)
- wrapper: will be replaced with individual groups parsed by the tplGroup properties | atozOuter |
| cls | Class to add to every item. |  |
| altCls | Class to use for odd items. | alt |
| firstCls | Class to use for the first tag. | first |
| lastCls | Class to use for the last tag. | last |
| weights | (int) Used in weighing tags with the weightCls property. | 0 |
| weightCls | Class to prefix for weights. |  |
| debug | Set to 1 to dump debug information. | 0 |

## Usage

To display tags from the "MyTags" TV and the TV with ID 16, pointing the links to the current resource:

``` php
[[TaggingAtoZ? &tvs=`MyTags,16` &target=`[[*id]]`]]
```
