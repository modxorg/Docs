---
title: "SmartTag"
_old_id: "1714"
_old_uri: "revo/smarttag"
---

## Description

**SmartTag** is a tagging system for MODX Revolution and is intended to replace MODX's original auto-tag TV.

By having its own tables, SmartTag can be managed easier compared to the normal auto-tag TV which is stored as comma separated values. SmartTag uses an AJAX combobox for the TV when adding a new tag, and a CMP to list and manage all the tags.

From the CMP you can rename the tag, or delete it entirely from the system, on all resources. You can convert existing auto-tag TVs to be SmartTag TV, or revert SmartTag back to other tag type.

## History

SmartTag was first written by goldsky and released on March 28, 2014.

Collaborator: [Adam Wintle](http://www.monogon.co).

## Download

It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/smarttag>

The source code and build script is also available on GitHub: <https://github.com/goldsky/SmartTag>[](https://github.com/tasianmedia/getDate)

## Bugs & Feature Requests

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/goldsky/SmartTag/issues>

## System Settings

| Name                                                 | Description                                                                                           | Default  | Version |
| ---------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------- | ------- |
| smarttag.limit                                       | Number of tags limit when listing them in Custom Manager Page                                         | 50       |         |
| smarttag.use\_filter                                 | (Optional) Whether use MODX's cleanAlias function and lowercase the character when inserting new tag. |
| Set it to false if tags are in non-latin characters. | true                                                                                                  | 1.0.2-pl |

## Template Variable

When creating the TV, you need to select the proper input type and output type.

![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/inputtype-selection.png)![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/outputtype-selection.png)

### Input Type Options

In input type options, they are exactly as same as [auto-tag](making-sites-with-modx/customizing-content/template-variables/template-variable-input-types#TemplateVariableInputTypes-AutoTag) options, except the **queryLimit**.

The default value of this queryLimit is 20.

**(v. 1.0.4-pl)** If you want the typeahead drop-down tag TV gets all tags regardless their TVs' scopes, set **Global Tags** to true.

### Output Type Options

In output type options, they adapt [Delimiter](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type) and [URL TV](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type) output types.

The difference is that in adding link for tags, you need to define the "href" of the link. This is required for link.

The content can be `[[~pageId]]` or <http://www.domain.com>

If the Output Type not set, the output will be raw values delimited by double pipelines "||".

The tags are case sensitive! If you need them to all lowercase, just rename them from the Custom Manager Page.

### Add a new Tag

You can either add new tag or use existing ones.

If you activate the field, you can type in the tag directly into that "textfield".

If you have not click **\[ENTER\]** key in **1 second**, the dropdown will come up to offer you any similar tag based on it, or just closed off directly if none is found.

The drop down will force you to select existing one if it lists tags.

If you just want to add new tag, just hit **\[ENTER\]** before **1 second**.

## Custom Manager Page

### TagCloud

The CMP is used to make manager easily manages the tags.

![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/tag-cloud-2.png)

If the button is clicked, then a new tab will be opened containing all resources that are using that clicked tag.

![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/tag-resources.png)

On here, you can then delete, rename, or remove the tag from the selected resources.

The Resource's titles are links, so they can be clicked (or ctrl+click or middle-mouse click) to open it.

### Converter

In the second page, there's a converter utility to convert existing tag types to SmartTag or revert SmartTag TVs back to the other tag types.

![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/sync.png)

When a SmartTag TV is selected, it also can be synchronized to get all values from related resources to store them into the SmartTag's DB.

## Snippet

SmartTag also provides a snippet to list the tags, based on some filters.

### smarttagTags

| Name              | Description                                                                                                                                                                                             | Value Type                 | Default Value        | Since Version |
| ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------- | -------------------- | ------------- |
| docIds            | Comma delimited values of Documents' IDs                                                                                                                                                                | String                     |                      | 1.0.0-beta1   |
| parentIds         | Comma delimited values of Parent Documents' IDs                                                                                                                                                         | String                     |                      | 1.0.0-beta5   |
| allTags           | Show all tags                                                                                                                                                                                           | String                     |                      | 1.0.0-beta5   |
| tvNames           | Explicitly define which TVs. Prerequisites: either **&docIds** or **&parentIds**                                                                                                                        | Comma separated TVs' names |                      | 1.0.0-pl      |
| includeEmptyTags  | Do you want to include tags without resources?                                                                                                                                                          | Boolean: 0                 | 1                    | 0             | 1.0.0-beta1 |
| includeHiddenDocs | Do you want to include tags on hidden resources?                                                                                                                                                        | Boolean: 0                 | 1                    | 0             | 1.0.0-beta5 |
| limit             | Maximum number of list. 0 will be ignored. There is "no limit" option, as intended. If you want to list all, just put 1000000 (a million) limit, but you are responsible for any problem to the server. | Integer                    | 10                   | 1.0.0-beta1   |
| phsPrefix         | Prefix for the placeholders                                                                                                                                                                             | String                     | smarttag             | 1.0.0-beta1   |
| sort              | Comma delimited multiple sorting. Format: field direction,field direction. Mind the space in between.                                                                                                   | String                     | count desc,tag asc   | 1.0.0-beta1   |
| tplItem           | Name of chunk for item template of the output. @BINDING enabled (eg: @FILE:\[path/to/file.tpl\]).                                                                                                       | String                     | smarttagtags.item    | 1.0.0-beta1   |
| tplWrapper        | Name of chunk for wrapper template of the output. @BINDING enabled (eg: @FILE:\[path/to/file.tpl\]).                                                                                                    | String                     | smarttagtags.wrapper | 1.0.0-beta1   |

To list the tags, you **MUST** either provide docIds, parentIds, or allTags properties (parameters).
