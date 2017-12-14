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

 [<span class="octicon octicon-link"></span>](#installation)Installation
------------------------------------------------------------------------

 Install via Package Management, or download the package from the [MODX Extras repository](http://modx.com/extras/)

**Tagger FURLs are currently not working when using any resource extensions (.html,...) except /.** Please change your extension to **/** at least on the resource where the TaggerGetResourcesWhere snippet is called.

- Content -> Content Types -> HTML (.html) -> /

 [<span class="octicon octicon-link"></span>](#groups)Groups
------------------------------------------------------------

 After installation you will need to set up some groups. Groups are representing fields that will be added to your Resource panel. Open components menu, find Tagger and go to **Groups** tab. Add new group.

**\*\*WARNING\*\*** Please make sure that group alias will not match any Resource alias, otherwise resource with same alias will be unreachable.

 **GROUP OPTIONS:**

 <table><tbody><tr><td> **Option** </td> <td> **Required?** </td> <td> **Description** </td> </tr><tr><td> Name </td> <td> required </td> <td> Label of the field that will be added to Resource panel </td> </tr><tr><td>Description</td> <td>optional</td> <td>Description is showed on field hover</td> </tr><tr><td>Alias</td> <td>optional</td> <td>If not filled, will be generated automatically. Is used in FURLs. </td> </tr><tr><td> Field type </td> <td> required </td> <td> Tag field - multi select field, Combo box - classic one item select field </td> </tr><tr><td> Place </td> <td> required </td> <td> Where will be this group rendered. Options are: In tab, Above content, Below content, Bottom page, In TVs section</td> </tr><tr><td>Position of Tagger tab in TVs section</td> <td>optional</td> <td>If not filled 9999 will be used. Position of Tagger group in TVs tab panel. Use 0 to make Tagger group first.</td> </tr><tr><td> Remove unused tags </td> <td> optional </td> <td> If set to **yes**, all tags, that are not assigned to at least one resource will be removed from database. </td> </tr><tr><td> Allow new tags from field </td> <td> optional </td> <td> If set to **yes**, users will be able to add new tags from field. Setting to **no** can be useful for example for list of categories </td> </tr><tr><td> Allow blank </td> <td> optional </td> <td> If set to **no**, field will be marked as required and users will have to select at least on tag before saving the Resource </td> </tr><tr><td> Allow type </td> <td> optional </td> <td> If set to **no**, users will not be able to type in the field. Clicking to the field will trigger showing list of available tags. </td> </tr><tr><td> Show autotag </td> <td> optional </td> <td> If set to **yes**, all tags will be displayed below the field. Users will be able to click on them to select/unselect. Available only for **Tag field.** </td> </tr><tr><td>Hide input</td> <td>optional</td> <td>Can be used only with **Show autotag** enabled. Will hide the input field and assign button, so users will be able to only click on existing tags.</td> </tr><tr><td>Tag limit</td> <td>optional</td> <td>Will limit number of tags that users can select. Setting to 0 will allow to select infinite number of tags.</td> </tr><tr><td> Show for Templates </td> <td> required </td> <td> Comma separated list of template **ID**s for which this group should be available for editing. </td></tr></tbody></table>#### Changing labels of Tagger places

System Settings under Tagger namespace are available for these settings: tagger.place\_in\_tab\_label, tagger.place\_tvs\_tab\_label, tagger.place\_above\_content\_label, tagger.place\_below\_content\_label, tagger.place\_bottom\_page\_label

You can change their value to text or a lexicon key. If you want to have different name based on Resource Template, you can use following notation:  
**1==Label For Template with ID 1||2==Label For Template with ID 2**

**Default label:** tagger.tab.label

 [<span class="octicon octicon-link"></span>](#basic-usage)Basic Usage
----------------------------------------------------------------------

###  [<span class="octicon octicon-link"></span>](#taggergettags)TaggerGetTags

 This Snippet allows you to list tags for resource(s), group(s) and all tags

 **PROPERTIES:**

 <table><tbody><tr><td> **Property** </td> <td> **Type** </td> <td> **Required?** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> &resources

 </td> <td> string </td> <td> optional </td> <td> Comma separated list of resources for which Tags will be listed

 </td> <td> </td> </tr><tr><td> &groups

 </td> <td> string

 </td> <td> optional

 </td> <td> Comma separated list of Tagger Groups for which Tags will be listed

 </td> <td> </td> </tr><tr><td> &rowTpl

 </td> <td> string

 </td> <td> optional

 </td> <td> Name of a chunk that will be used for each Tag. If no chunk is given, array with available placeholders will be rendered

 </td> <td> </td> </tr><tr><td>&tpl\_N</td> <td>string</td> <td>optional</td> <td>Name of chunk that will be used for every Nth tag</td> <td></td> </tr><tr><td> &outTpl

 </td> <td> string

 </td> <td> optional

 </td> <td> Name of a chunk that will be used for wrapping all tags. If no chunk is given, tags will be rendered without a wrapper. Placeholder: \[\[+tags\]\]

 </td> <td> </td> </tr><tr><td> &separator

 </td> <td> string

 </td> <td> optional

 </td> <td> String separator, that will be used for separating Tags

 </td> <td> </td> </tr><tr><td>&limit</td> <td>int</td> <td>optional</td> <td>Limit number of returned Tags</td> <td>0</td> </tr><tr><td>&offset</td> <td>int</td> <td>optional</td> <td>Offset the output by this number of Tags</td> <td>0</td> </tr><tr><td>&totalPh</td> <td>string</td> <td>optional</td> <td>Placeholder to output the total number of Tags regardless of &limit and &offset</td> <td>tags\_total</td> </tr><tr><td> &target

 </td> <td> int </td> <td> optional

 </td> <td> An ID of a resource that will be used for generating URI for a Tag. If no ID is given, current Resource ID will be used

 </td> <td> current resource </td> </tr><tr><td> &showUnused

 </td> <td> int </td> <td> optional

 </td> <td> If set to 1, Tags that are not assigned to any Resource will be included to the output as well

 </td> <td>0 </td> </tr><tr><td>&toPlaceholder</td> <td>string</td> <td>optional</td> <td>If set, output will return in a placeholder with given name</td> <td></td> </tr><tr><td>&showDeleted</td> <td>int</td> <td>optional</td> <td>If set to 1, Tags that are assigned only to deleted Resources will be included in the output as well</td> <td>0</td> </tr><tr><td>&showUnpublished</td> <td>int</td> <td>optional</td> <td>If set to 1, Tags that are assigned only to unpublished Resources will be included in the output as well</td> <td>0</td> </tr><tr><td>&contexts</td> <td>string</td> <td>optional</td> <td>If set, will display only tags for resources in given contexts. Contexts can be separated by a comma</td> <td></td> </tr><tr><td>&wrapIfEmpty</td> <td>int</td> <td>optional</td> <td>If set to 1, outTpl will be used even if there will be no tags to display.</td> <td>1</td> </tr><tr><td>&translate</td> <td>int</td> <td>optional</td> <td>If set, group\_name\_translated and group\_description\_translated will be added as a placeholders to rowChunk</td> <td>0</td> </tr><tr><td>&sort</td> <td>string</td> <td>optional</td> <td>Sort options in JSON. Example {"tag": "ASC"} or multiple sort options {"group\_id": "ASC", "tag": "ASC"}</td> <td></td></tr></tbody></table> **OUTPUT PLACEHOLDERS AND EXAMPLE VALUES:**

 ```
[[+id]] => 1
[[+tag]] => News<br>[[+alias]] => news
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
``` **EXAMPLE USAGE:**

 ```
// Get tags for all resources, including unused tags 
[[TaggerGetTags? &showUnused=`1`]]

// Get tags from groups 1 and 3 for all resources
[[TaggerGetTags? &groups=`1,3` &rowTpl=`tag_links_tpl`]]

// Get tags for current resource
[[!TaggerGetTags? &resources=`[[*id]]` &rowTpl=`tag_links_tpl`]]

// Get tags for current resource in getResources tpl
[[!TaggerGetTags? &resources=`[[+id]]` &rowTpl=`tag_links_tpl`]]


`````

``

#### How to translate groups

Let's say we have a group with name **Tags** and alias **tags**. To translate name and/or description of this group, we will have to create new lexicons entries in a specific format.

- Open lexicon management
- Select **Tagger** namespace and **custom** topic
- Add new lexicon entry to this namespace and topic with a key: **tagger.custom."group\_alias"** (in this example it will be tagger.custom.tags)
- If you want to translate description add one more lexicon entry with key: **tagger.custom."group\_alias"\_desc** (in this example it will be tagger.custom.tags\_desc)
- If you want to use those translations also on the frontend, call TaggerGetTags with option **&translate=`1`** (\[\[TaggetGetTags? &translate=`1`\]\]), new placeholders (group\_name\_translated, group\_description\_translated) will be available

###  [<span class="octicon octicon-link"></span>](#taggergetresourceswhere)TaggerGetResourcesWhere

 This snippet generate a SQL Query that can be used in a WHERE condition in the getResources snippet

 **PROPERTIES:**

 <table><tbody><tr><td> **Property** </td> <td> **Type** </td> <td> **Required?** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> &tags </td> <td> string </td> <td> optional </td> <td> Comma separated list of Tags for which a Resource query will be generated. By default Tags from GET param will be loaded </td> <td> </td> </tr><tr><td> &groups </td> <td> string </td> <td> optional </td> <td> Comma separated list of Tagger Groups. Only from those groups will Tags be allowed </td> <td> </td> </tr><tr><td> &where </td> <td> string </td> <td> optional </td> <td> Original getResources WHERE property. If you used WHERE property in your current getResources call, move it here </td> <td> </td> </tr><tr><td>&likeComparison</td> <td>int</td> <td>optional</td> <td>If set to 1, tags will compare using LIKE</td> <td>0</td> </tr><tr><td>&matchAll</td> <td>int</td> <td>optional</td> <td>If set to 1, resource must have all specified tags.</td> <td>0</td></tr></tbody></table> **EXAMPLE USAGE:**

 ```
[[!getResources? &where=`[[!TaggerGetResourcesWhere? &tags=`Books,Vehicles` &where=`{"isfolder": 0}`]]`]]

```