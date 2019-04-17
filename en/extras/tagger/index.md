---
title: "Tagger"
_old_id: "1715"
_old_uri: "revo/tagger"
---

 _Tags, Categories, and More for MODX!_

 A robust and performant tag management system. Summary of the many, many features:

1. Tested with up to a million tags
2. Paginated drop-down and type-ahead for easy tag input
3. Combo-box or tag-field input types
4. Optionally remove unused tags from the database automatically
5. Optionally restrict tag creation to the CMP, versus on input
6. Optionally use Auto-Tag cloud for input

 Display and list: all tags, tags from specified group(s), omit unused tags, Resources with a given tag, etc. Supplies getResources with a &where condition, so that all the templating and sorting abilities of getResources are at your fingertips.

## Installation

 Install via Package Management, or download the package from the [MODX Extras repository](http://modx.com/extras/)

 **Tagger FURLs are currently not working when using any resource extensions (.html,...) except /.** Please change your extension to **/** at least on the resource where the TaggerGetResourcesWhere snippet is called.

- Content -> Content Types -> HTML (.html) -> /

## Groups

 After installation you will need to set up some groups. Groups are representing fields that will be added to your Resource panel. Open components menu, find Tagger and go to **Groups** tab. Add new group.

 **\*\*WARNING\*\*** Please make sure that group alias will not match any Resource alias, otherwise resource with same alias will be unreachable.

 **GROUP OPTIONS:**

 | **Option**                            | **Required?** | **Description**                                                                                                                                          |
 | ------------------------------------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
 | Name                                  | required      | Label of the field that will be added to Resource panel                                                                                                  |
 | Description                           | optional      | Description is showed on field hover                                                                                                                     |
 | Alias                                 | optional      | If not filled, will be generated automatically. Is used in FURLs.                                                                                        |
 | Field type                            | required      | Tag field - multi select field, Combo box - classic one item select field                                                                                |
 | Place                                 | required      | Where will be this group rendered. Options are: In tab, Above content, Below content, Bottom page, In TVs section                                        |
 | Position of Tagger tab in TVs section | optional      | If not filled 9999 will be used. Position of Tagger group in TVs tab panel. Use 0 to make Tagger group first.                                            |
 | Remove unused tags                    | optional      | If set to **yes**, all tags, that are not assigned to at least one resource will be removed from database.                                               |
 | Allow new tags from field             | optional      | If set to **yes**, users will be able to add new tags from field. Setting to **no** can be useful for example for list of categories                     |
 | Allow blank                           | optional      | If set to **no**, field will be marked as required and users will have to select at least on tag before saving the Resource                              |
 | Allow type                            | optional      | If set to **no**, users will not be able to type in the field. Clicking to the field will trigger showing list of available tags.                        |
 | Show autotag                          | optional      | If set to **yes**, all tags will be displayed below the field. Users will be able to click on them to select/unselect. Available only for **Tag field.** |
 | Hide input                            | optional      | Can be used only with **Show autotag** enabled. Will hide the input field and assign button, so users will be able to only click on existing tags.       |
 | Tag limit                             | optional      | Will limit number of tags that users can select. Setting to 0 will allow to select infinite number of tags.                                              |
 | Show for Templates                    | required      | Comma separated list of template **ID**s for which this group should be available for editing.                                                           |

### Changing labels of Tagger places

 System Settings under Tagger namespace are available for these settings: tagger.place\_in\_tab\_label, tagger.place\_tvs\_tab\_label, tagger.place\_above\_content\_label, tagger.place\_below\_content\_label, tagger.place\_bottom\_page\_label

 You can change their value to text or a lexicon key. If you want to have different name based on Resource Template, you can use following notation:
**1==Label For Template with ID 1||2==Label For Template with ID 2**

 **Default label:** tagger.tab.label

## Basic Usage

### TaggerGetTags

 This Snippet allows you to list tags for resource(s), group(s) and all tags

 **PROPERTIES:**

 | **Property**     | **Type** | **Required?** | **Description**                                                                                                                                    | **Default**      |
 | ---------------- | -------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
 | &resources       | string   | optional      | Comma separated list of resources for which Tags will be listed                                                                                    |                  |
 | &groups          | string   | optional      | Comma separated list of Tagger Groups for which Tags will be listed                                                                                |                  |
 | &parents         | int      | optional      | Comma separated list of resource IDs whose children should be scanned to build the list of tags                                                    |                  |
 | &rowTpl          | string   | optional      | Name of a chunk that will be used for each Tag. If no chunk is given, array with available placeholders will be rendered                           |                  |
 | &tpl\_N          | string   | optional      | Name of chunk that will be used for every Nth tag                                                                                                  |                  |
 | &outTpl          | string   | optional      | Name of a chunk that will be used for wrapping all tags. If no chunk is given, tags will be rendered without a wrapper. Placeholder: \[\[+tags\]\] |                  |
 | &separator       | string   | optional      | String separator, that will be used for separating Tags                                                                                            |                  |
 | &limit           | int      | optional      | Limit number of returned Tags                                                                                                                      | 0                |
 | &offset          | int      | optional      | Offset the output by this number of Tags                                                                                                           | 0                |
 | &totalPh         | string   | optional      | Placeholder to output the total number of Tags regardless of &limit and &offset                                                                    | tags\_total      |
 | &target          | int      | optional      | An ID of a resource that will be used for generating URI for a Tag. If no ID is given, current Resource ID will be used                            | current resource |
 | &showUnused      | int      | optional      | If set to 1, Tags that are not assigned to any Resource will be included to the output as well                                                     | 0                |
 | &toPlaceholder   | string   | optional      | If set, output will return in a placeholder with given name                                                                                        |                  |
 | &showDeleted     | int      | optional      | If set to 1, Tags that are assigned only to deleted Resources will be included in the output as well                                               | 0                |
 | &showUnpublished | int      | optional      | If set to 1, Tags that are assigned only to unpublished Resources will be included in the output as well                                           | 0                |
 | &contexts        | string   | optional      | If set, will display only tags for resources in given contexts. Contexts can be separated by a comma                                               |                  |
 | &wrapIfEmpty     | int      | optional      | If set to 1, outTpl will be used even if there will be no tags to display.                                                                         | 1                |
 | &translate       | int      | optional      | If set, group\_name\_translated and group\_description\_translated will be added as a placeholders to rowChunk                                     | 0                |
 | &sort            | string   | optional      | Sort options in JSON. Example {"tag": "ASC"} or multiple sort options {"group\_id": "ASC", "tag": "ASC"}                                           |                  |

 **OUTPUT PLACEHOLDERS AND EXAMPLE VALUES:**

 ``` php
[[+id]] => 1
[[+tag]] => News
[[+alias]] => news
[[+group]] => 3
[[+group_id]] => 3
[[+group_name]] => Media Type
[[+group_field_type]] => tagger-combo-tag
[[+group_allow_new]] => 0
[[+group_remove_unused]] => 0
[[+group_allow_blank]] => 1
[[+group_allow_type]] => 0
[[+group_show_autotag]] => 0
[[+group_show_for_templates]] => 21
[[+cnt]] => 1
[[+uri]]
[[+idx]] = Number starting from one for each tag
[[+active]] => 1 (1/0 based on if current tag is active or not)
```

 **EXAMPLE USAGE:**

 ``` php
// Get tags for all resources, including unused tags
[[TaggerGetTags? &showUnused=`1`]]
// Get tags from groups 1 and 3 for all resources
[[TaggerGetTags? &groups=`1,3` &rowTpl=`tag_links_tpl`]]
// Get tags for current resource
[[!TaggerGetTags? &resources=`[[*id]]` &rowTpl=`tag_links_tpl`]]
// Get tags for current resource in getResources tpl
[[!TaggerGetTags? &resources=`[[+id]]` &rowTpl=`tag_links_tpl`]]
```

#### How to translate groups

 Let's say we have a group with name **Tags** and alias **tags**. To translate name and/or description of this group, we will have to create new lexicons entries in a specific format.

- Open lexicon management
- Select **Tagger** namespace and **custom** topic
- Add new lexicon entry to this namespace and topic with a key: **tagger.custom."group\_alias"** (in this example it will be tagger.custom.tags)
- If you want to translate description add one more lexicon entry with key: **tagger.custom."group\_alias"\_desc** (in this example it will be tagger.custom.tags\_desc)
- If you want to use those translations also on the frontend, call TaggerGetTags with option **&translate=`1`** (\[\[TaggetGetTags? &translate=`1`\]\]), new placeholders (group\_name\_translated, group\_description\_translated) will be available

### TaggerGetResourcesWhere

 This snippet generate a SQL Query that can be used in a WHERE condition in the getResources snippet

 **PROPERTIES:**

 | **Property**                                                                                                    | **Type** | **Required?** | **Description**                                                                                                                                    | **Default** |
 | --------------------------------------------------------------------------------------------------------------- | -------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- | ----------- |
 | &tags                                                                                                           | string   | optional      | Comma separated list of Tag aliases (NOT names or IDs) for which a Resource query will be generated. By default Tags from GET param will be loaded |             |
 | &groups                                                                                                         | string   | optional      | Comma separated list of Tagger Groups. Only from those groups will Tags be allowed                                                                 |             |
 | &where                                                                                                          | string   | optional      | Original getResources WHERE property. If you used WHERE property in your current getResources call, move it here.                                  |             |
 | &likeComparison                                                                                                 | int      | optional      | If set to 1, tags will compare using LIKE which will match partial strings instead of only exact matches.                                          | 0           |
 | &tagField                                                                                                       | string   | optional      | Field that will be used to compare with given tags.                                                                                                |
 | If you want to match against the 'full text' of the tag name you've entered, this will need to be set to 'tag'. | alias    |
 | &matchAll                                                                                                       | int      | optional      | If set to 1, resource must have all specified tags (an 'AND' match).                                                                               |
 | If set to 0 or left out, it can match any one of the tags (an 'OR' match).                                      | 0        |
 | &field                                                                                                          | string   | optional      | modResource field that will be used to compare with assigned resource ID                                                                           | id          |

 **EXAMPLE USAGE:**

 ``` php
[[!getResources?
  &where=`[[!TaggerGetResourcesWhere?
  &tags=`Books,Vehicles`
  &where=`{"isfolder": 0}`]]`
]]
```
